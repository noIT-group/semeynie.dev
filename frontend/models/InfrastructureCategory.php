<?php

namespace frontend\models;

use Yii;

class InfrastructureCategory extends \common\models\InfrastructureCategory
{
    /**
     * @return mixed
     */
    public function getName()
    {
        $current_language = Yii::$app->language;

        return trim($this->getAttribute("name_{$current_language}"));
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        $path = '/img/';

        if(($icon = $this->svg_icon)) {

            switch ($icon) {
                case self::ICON_KINDERGARTENS:
                    return $path . 'infrastructure1.svg';
                case self::ICON_SCHOOLS:
                    return $icon . 'infrastructure2.svg';
                case self::ICON_CAFE:
                    return $icon . 'infrastructure3.svg';
                case self::ICON_SUPER_MARKET:
                    return $icon . 'infrastructure4.svg';
                case self::ICON_TRADE_CENTER:
                    return $icon . 'infrastructure5.svg';
                case self::ICON_PHARMACY:
                    return $icon . 'infrastructure6.svg';
                case self::ICON_AUTO_SERVICE:
                    return $icon . 'infrastructure7.svg';
                case self::ICON_CINEMAS:
                    return $icon . 'infrastructure8.svg';
                case self::ICON_MARKETS:
                    return $icon . 'infrastructure9.svg';
                case self::ICON_SPORTS:
                    return $icon . 'infrastructure10.svg';
            }

        }
    }
}