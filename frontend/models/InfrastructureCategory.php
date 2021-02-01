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
                    return $path . 'infrastructure2.svg';
                case self::ICON_CAFE:
                    return $path . 'infrastructure3.svg';
                case self::ICON_SUPER_MARKET:
                    return $path . 'infrastructure4.svg';
                case self::ICON_TRADE_CENTER:
                    return $path . 'infrastructure5.svg';
                case self::ICON_PHARMACY:
                    return $path . 'infrastructure6.svg';
                case self::ICON_AUTO_SERVICE:
                    return $path . 'infrastructure7.svg';
                case self::ICON_CINEMAS:
                    return $path . 'infrastructure8.svg';
                case self::ICON_MARKETS:
                    return $path . 'infrastructure9.svg';
                case self::ICON_SPORTS:
                    return $path . 'infrastructure10.svg';
            }

        }
    }
}