<?php
namespace frontend\components;

use Yii;
use \yii\base\Component;

class SiteSettingsComponent extends Component
{
    public static $SECTION = 'SiteSettings';

    public function getPhones($allPhones = true)
    {
        if( ($phone = unserialize(Yii::$app->settings->get('phone', 'SiteConfigSettings'))) ) {
            return ($allPhones) ? $phone : $phone[0];
        } else {
            return [];
        }
    }

    public function getEmail()
    {
        return Yii::$app->settings->get('email', 'SiteConfigSettings');
    }

    public function getAdminEmail()
    {
        return Yii::$app->settings->get('admin_email', 'SiteConfigSettings');
    }

    public function getAddress()
    {
        return 'г. Одесса, Курортный пер, 2';
    }

    public function getSocialNetwork()
    {
        if( ($social_networks = unserialize(Yii::$app->settings->get('social_network', 'SocialGroupSettings'))) ) {
            return $social_networks;
        } else {
            return [];
        }
    }

    public function getMessenger()
    {
        if( ($messengers = unserialize(Yii::$app->settings->get('messengers', 'SocialGroupSettings'))) ) {
            return $messengers;
        } else {
            return [];
        }
    }

    public function getAdminEmailArray()
    {
        $emails = Yii::$app->settings->get('admin_email', 'SiteConfigSettings');

        if(strpos($emails, ',') !== false) {

            $emails = explode(',', $emails);

            for($i = 0; $i < count($emails); $i++) {
                $emails[$i] = trim($emails[$i]);
            }

        } else {
            $emails = [trim($emails)];
        }

        return array_filter($emails);
    }
}