<?php
namespace noIT\core\helpers;

use Yii;
use yii\web\Request;

class Url extends \yii\helpers\Url {
    /**
     * Replace or set new get-params and return URL-string
     *
     * @param $params array
     * @param $absolute boolean
     * @return string
     */
    public static function toggle($toggleParams, $absolute = false) {
        $request = Yii::$app->getRequest();
        $urlManager = Yii::$app->getUrlManager();

        $params = $request instanceof Request ? $request->getQueryParams() : [];

        foreach ($toggleParams as $key => $value) {
            if (array_key_exists($key, $params) && (null === $value || $params[$key] === $value)) {
                unset($params[$key]);
            } else {
                $params[$key] = $value;
            }
        }

        if (!isset($params[0])) {
            $params[0] = Yii::$app->controller->getRoute();
        }

        if ($absolute) {
            return $urlManager->createAbsoluteUrl($params);
        }

        return $urlManager->createUrl($params);
    }
}