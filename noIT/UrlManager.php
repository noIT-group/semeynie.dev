<?php

namespace noIT;

use Yii;
use yii\web\UrlNormalizerRedirectException;

class UrlManager extends \codemix\localeurls\UrlManager
{
    /**
     * Redirect to the current URL with given language code applied
     *
     * @param string $language the language code to add. Can also be empty to
     * not add any language code.
     * @throws \yii\base\Exception
     * @throws \yii\web\NotFoundHttpException
     */
    protected function redirectToLanguage($language)
    {
        try {
            $result = parent::parseRequest($this->_request);
        } catch (UrlNormalizerRedirectException $e) {
            if (is_array($e->url)) {
                $params = $e->url;
                $route = array_shift($params);
                $result = [$route, $params];
            } else {
                $result = [$e->url, []];
            }
        }
        if ($result === false) {
            throw new \yii\web\NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
        list ($route, $params) = $result;
        if($language){
            $params[$this->languageParam] = $language;
        }
        // See Yii Issues #8291 and #9161:
        $params = $params + $this->_request->getQueryParams();
        array_unshift($params, $route);
        $url = $this->createUrl($params);
        // Required to prevent double slashes on generated URLs
        if ($this->suffix === '/' && $route === '' && count($params) === 1) {
            $url = rtrim($url, '/').'/';
        }
        // Prevent redirects to same URL which could happen in certain
        // UrlNormalizer / custom rule combinations
        if ($url === $this->_request->url) {
            return;
        }
        Yii::trace("Redirecting to $url.", __METHOD__);

        Yii::$app->getResponse()->redirect($url, 301);
        if (YII2_LOCALEURLS_TEST) {
            // Response::redirect($url) above will call `Url::to()` internally.
            // So to really test for the same final redirect URL here, we need
            // to call Url::to(), too.
            throw new \yii\base\Exception(\yii\helpers\Url::to($url));
        } else {
            Yii::$app->end();
        }
    }
}