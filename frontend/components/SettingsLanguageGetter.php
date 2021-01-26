<?php

namespace frontend\components;

use Yii;
use yii\base\Component;

class SettingsLanguageGetter extends Component
{
    /**
     * @param $attribute string
     * @param null $language string
     * @return mixed
     */
    public function getAttribute($attribute, $language = null)
    {
        if($language === null) {
            $language = Yii::$app->language;
        }

        $attribute = $attribute . '_' . $language;

        return trim(Yii::$app->settings->get($attribute));
    }

    /**
     * @param $attribute string
     * @param null $language string
     * @return mixed
     */
    public function getSerializedAttribute($attribute, $language = null)
    {
        $value = $this->getAttribute($attribute, $language);

        return @unserialize($value);
    }
}