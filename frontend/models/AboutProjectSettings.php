<?php

namespace frontend\models;

use Yii;

class AboutProjectSettings extends \common\models\settings\AboutProjectSettings
{
    /**
     * @return array
     */
    public static function getAll()
    {
        $array = [
            'name' => Yii::$app->settingsLanguageGetter->getAttribute('AboutProjectSettings.name'),
            'body' => Yii::$app->settingsLanguageGetter->getAttribute('AboutProjectSettings.body'),
        ];

        return $array;
    }
}