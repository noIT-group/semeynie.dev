<?php

namespace common\models\settings;

use Yii;

class SiteConfigSettings extends Settings
{
    public static $SECTION = 'SiteConfigSettings';

    public $admin_email;
    public $email;
    public $phone;
    public $work_time;

    public function attributeLabels()
    {
        return [
            'admin_email' => 'Email(ы) для получения писем',
            'email' => 'Email',
            'phone' => 'Телефоны',
            'work_time' => 'Время работы (Например: 9-00 до 18-00)',
        ];
    }

    public function rules()
    {
        return [
            [['admin_email', 'email', 'work_time'], 'string'],
            [['phone'], 'each', 'rule' => ['safe']]
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $this->admin_email = $settings->get('admin_email', self::$SECTION);

        $this->email = $settings->get('email', self::$SECTION);

        $this->work_time = $settings->get('work_time', self::$SECTION);

        if( ($phone = unserialize($settings->get('phone', self::$SECTION))) ) {
            $this->phone = $phone;
        } else {
            $this->phone = [];
        }
    }

    /**
     * @return bool
     */
    public function save()
    {
        $settings = Yii::$app->settings;

        $settings->set('admin_email', $this->admin_email, self::$SECTION, 'string');

        $settings->set('email', $this->email, self::$SECTION, 'string');

        $settings->set('work_time', $this->work_time, self::$SECTION, 'string');

        $settings->set('phone', serialize($this->phone), self::$SECTION, 'string');

        return true;
    }
}