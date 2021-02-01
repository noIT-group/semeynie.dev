<?php

namespace frontend\models;

use frontend\components\EstateWidgetComponent;
use Yii;
use yii\helpers\Url;

class NavigationMenuSettings extends \common\models\settings\NavigationMenuSettings
{
    /**
     * @return array
     */
    public static function getAll()
    {
        $array = [
            'header_menu' => self::getContent(Yii::$app->settings->get('NavigationMenuSettings.header_menu')),
            'burger_menu' => self::getContent(Yii::$app->settings->get('NavigationMenuSettings.burger_menu')),
            'footer_menu' => self::getContent(Yii::$app->settings->get('NavigationMenuSettings.footer_menu')),
        ];

        $array = self::convertLinkToCurrentLanguage($array);

        return $array;
    }

    /**
     * @param $serializeData string
     * @return array
     */
    private static function getContent($serializeData)
    {
        if (($data = unserialize($serializeData))) {

            $languages = Yii::$app->urlManager->languages;

            $current_language = Yii::$app->language;

            $array = [];

            foreach ($data as $data_index => $data_item) {

                foreach ($data_item as $data_item_index => $data_item_value) {

                    if (strpos($data_item_index, "_{$current_language}") !== false) {
                        $key = str_replace("_{$current_language}", '', $data_item_index);
                        $array[$data_index][$key] = $data_item_value;
                    } else {

                        foreach ($languages as $language_index => &$language) {

                            if ($language === $current_language) {
                                unset($languages[$language_index]);
                                continue;
                            }

                            if (strpos($data_item_index, "_{$language}") === false) {
                                $array[$data_index][$data_item_index] = $data_item_value;
                            }

                        }


                    }

                }

            }

            return $array;

        }
    }

    /**
     * @param $array
     * @return mixed
     */
    private static function convertLinkToCurrentLanguage($array)
    {
        if (is_array($array) && $array) {

            foreach ($array as $array_index => &$array_item) {

                if (is_array($array_item) && $array_item) {

                    foreach ($array_item as $array_item_index => &$array_item_value) {

                        if (is_array($array_item_value) && $array_item_value) {

                            foreach ($array_item_value as $array_item_inner_index => &$array_item_inner_value) {

                                if (in_array('link', [$array_item_inner_index])) {

                                    if (strpos($array_item_inner_value, '#') !== false) {

                                        if (Yii::$app->controller->route !== 'site/index') {
                                            $array_item_inner_value = Url::to(['site/index']) . $array_item_inner_value;
                                        }

                                    } elseif (strpos($array_item_inner_value, EstateWidgetComponent::WIDGET_DOMAIN) === false) {

                                        if (Yii::$app->language === 'ua') {

                                            if (strpos($array_item_inner_value, '/ua') === false) {
                                                $array_item_inner_value = '/ua' . $array_item_inner_value;
                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

        return $array;
    }
}