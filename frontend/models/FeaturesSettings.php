<?php

namespace frontend\models;

use Yii;

class FeaturesSettings extends \common\models\settings\FeaturesSettings
{
    /**
     * @return array
     */
    public static function getAll()
    {
        $array = [
            'list' => Yii::$app->settingsLanguageGetter->getSerializedAttribute('FeaturesSettings.list'),
        ];

        return $array;
    }
}