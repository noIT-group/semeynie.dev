<?php

namespace common\models\settings;

use Yii;
use yii\base\Model;

abstract class Settings extends Model
{
    /**
     * @param $attribute
     * @param $section
     *
     * @return array|mixed
     */
    protected function unserializeAttribute($attribute, $section)
    {
        $settings = Yii::$app->settings;

        if( ($list = unserialize($settings->get($attribute, $section))) ) {
            return $list;
        } else {
            return [];
        }

    }

    /**
     * @param $attribute
     * @param $section
     */
    protected function serializeAttribute($attribute, $section)
    {
        $settings = Yii::$app->settings;

        $settings->set($attribute, serialize($this[$attribute]), $section, 'string');
    }

    /**
     * @param $attribute string
     * @return |null
     */
    protected function getValue($attribute)
    {
        return isset($this->$attribute) ? $this->$attribute : null;
    }
}