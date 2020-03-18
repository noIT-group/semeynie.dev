<?php

namespace common\models\settings;

use Yii;

class SiteConfigSettings extends Settings
{
    public static $SECTION = 'SiteConfigSettings';

    public $admin_email;
    public $email;
    public $phone;

    public function attributeLabels()
    {
        return [
            'admin_email' => 'Email(ы) для получения писем',
            'email' => 'Email',
            'phone' => 'Телефоны',
        ];
    }

    public function rules()
    {
        return [
            [['admin_email', 'email'], 'string'],
            [['phone'], 'each', 'rule' => ['safe']]
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $this->admin_email = $settings->get('admin_email', self::$SECTION);

        $this->email = $settings->get('email', self::$SECTION);

        if( ($phone = unserialize($settings->get('phone', self::$SECTION))) ) {
            $this->phone = $phone;
        } else {
            $this->phone = [];
        }
    }

    public function save()
    {
        $settings = Yii::$app->settings;

        $settings->set('admin_email', $this->admin_email, self::$SECTION, 'string');

        $settings->set('email', $this->email, self::$SECTION, 'string');

        $settings->set('phone', serialize($this->phone), self::$SECTION, 'string');

        return true;
    }
}