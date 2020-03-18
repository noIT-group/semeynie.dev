<?php
namespace common\models;

use Yii;

class ConsultationFeedback extends \noIT\feedback\models\Feedback
{
    const SECRET_KEY = 'not-machine';

    public $subject = 'Обращение с сайта - [АТМОСФЕРА]';

    public $secret_form_key;

    public function rules()
    {
        $rules = [
            [['name', 'phone'], 'required'],
            [['email'], 'email'],
            [['name'], 'string', 'min' => 2, 'max' => 60],
            [['message'], 'string'],
            ['secret_form_key', 'string', 'max' => 50],
        ];

        return array_merge(parent::rules(), $rules);
    }

    public function getEmailBody()
    {
        return "Имя: $this->name\n".
            "Телефон: $this->phone\n".
            "Email: $this->email\n".
            "Сообщение:\n\n $this->message\n\n".
            "Источник: ". Yii::$app->request->referrer;
    }

    public function sendEmail()
    {
        $toEmail = Yii::$app->siteSettingsComponent->getAdminEmailArray();

        return Yii::$app->mailer->compose()
            ->setTo($toEmail)
            ->setFrom([Yii::$app->params['adminEmailFrom'] => Yii::$app->params['adminNameFrom']])
            ->setSubject("{$this->subject}")
            ->setTextBody($this->getEmailBody())
            ->send();
    }
}