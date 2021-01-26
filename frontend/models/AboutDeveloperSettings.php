<?php

namespace frontend\models;

use Yii;

class AboutDeveloperSettings extends \common\models\settings\AboutDeveloperSettings
{
    /**
     * @return array
     */
    public static function getAll()
    {
        $array = [
            'body' => Yii::$app->settingsLanguageGetter->getAttribute('AboutDeveloperSettings.body'),
        ];

        return $array;
    }
}