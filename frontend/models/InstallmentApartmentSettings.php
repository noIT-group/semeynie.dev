<?php

namespace frontend\models;

use Yii;

class InstallmentApartmentSettings extends \common\models\settings\InstallmentApartmentSettings
{
    /**
     * @return array
     */
    public static function getAll()
    {
        $array = [
            'name' => Yii::$app->settingsLanguageGetter->getAttribute('InstallmentApartmentSettings.name'),
            'body' => Yii::$app->settingsLanguageGetter->getAttribute('InstallmentApartmentSettings.body'),
        ];

        return $array;
    }
}