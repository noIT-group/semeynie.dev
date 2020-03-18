<?php

namespace frontend\components;

use Yii;
use yii\base\Component;

class LanguageHelper extends Component
{
    /**
     * @param $model
     * @param $attribute
     * @param null $language
     * @return |null
     */
    public function getAttribute($model, $attribute, $language = null)
    {
        if($language === null) {
            $language = $lang = Yii::$app->language;
        }

        $attribute = $attribute . '_' . $language;

        return isset($model->$attribute) ? $model->$attribute : null;
    }

    /**
     * @param $attribute
     * @param null $language
     * @return mixed
     */
    public function getSettingsAttribute($attribute, $language = null)
    {
        if($language === null) {
            $language = $lang = Yii::$app->language;
        }

        $attribute = $attribute . '_' . $language;

        return Yii::$app->settings->get($attribute);
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return ['ru', 'ua'];
    }
}