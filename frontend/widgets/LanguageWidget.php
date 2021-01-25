<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class LanguageWidget extends Widget
{
    /** @var $items array */
    private $items;

    public function init()
    {
        $route = Yii::$app->controller->route;

        $params = $_GET;

        array_unshift($params, '/' . $route);

        foreach (Yii::$app->urlManager->languages as $language) {

            $isWildcard = substr($language, -2) === '-*';

            if ($isWildcard) {
                $language = substr($language, 0, 2);
            }

            $params['language'] = $language;

            $this->items[$language] = $params;

        }

        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        if ($this->items) {

            $current_language = Yii::$app->language;

            $list = [];

            foreach ($this->items as $item_key => $item) {

                $list[] = [
                    'url' => Url::to($item),
                    'label' => static::setLabel($item['language']),
                    'selected' => ($item_key === $current_language),
                ];

            }

            return $this->render("language", ['list' => $list]);
        }
    }

    /**
     * @param $languageCode
     * @return string
     */
    private static function setLabel($languageCode)
    {
        if ($languageCode == 'ru') {
            return 'ru';
        } else if ($languageCode === 'ua') {
            return 'ukr';
        } else {
            return '-';
        }
    }
}