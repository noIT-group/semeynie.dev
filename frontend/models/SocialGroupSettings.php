<?php

namespace frontend\models;

use Yii;

class SocialGroupSettings
{
    /**
     * @return mixed
     */
    public static function getSocialNetwork()
    {
        if(($socialGroupSettings = Yii::$app->settings->get('SocialGroupSettings.social_network'))) {
            return @unserialize($socialGroupSettings);
        }
    }
}