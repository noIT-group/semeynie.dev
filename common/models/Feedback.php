<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Feedback extends ActiveRecord
{
    const SECRET_KEY = 'not-machine';

    /**
     * @var $secret_form_key string
     */
    public $secret_form_key;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone', 'email', 'message'], 'string'],
            [['data'], 'safe'],
            ['secret_form_key', 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'ip' => 'IP',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'message' => 'Сообщение',
            'data' => 'Данные',
            'model' => 'Модель',
            'status' => 'Статус обращения',
            'source' => 'Источник',
            'created_at' => 'Дата',
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ],
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!$this->source) {
            $this->source = Yii::$app->request->referrer;
        }

        $this->ip = $_SERVER['REMOTE_ADDR'];

        return parent::beforeSave($insert);
    }

    /**
     * @return string
     */
    public function getEmailBody()
    {
        $name = !empty($this->name) ? trim($this->name) : '-';
        $phone = !empty($this->phone) ? trim($this->phone) : '-';
        $email = !empty($this->email) ? trim($this->email) : '-';
        $message = !empty($this->message) ? trim($this->message) : '-';
        $source = !empty($this->source) ? trim($this->source) : '-';

        $array = [
            "Имя: $name",
            "Телефон: $phone",
            "Email: $email",
            "Сообщение: $message",
            "Источник: $source",
        ];

        return implode("\n", $array);
    }

    /**
     * @return bool|mixed
     */
    public function sendEmail()
    {
        $toEmail = Yii::$app->settings->get('admin_email', 'SiteConfigSettings');

        return Yii::$app->mailer->compose()
            ->setTo([$toEmail])
            ->setFrom([Yii::$app->params['adminEmailFrom'] => Yii::$app->params['adminNameFrom']])
            ->setSubject("ФОРМА - Симейные Традиции")
            ->setTextBody($this->getEmailBody())
            ->send();
    }
}