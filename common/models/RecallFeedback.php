<?php
namespace common\models;

use Yii;

class RecallFeedback extends \noIT\feedback\models\Feedback
{
    const SECRET_KEY = 'not-machine';

    public $subject = 'Заказ обратного звонка - [АТМОСФЕРА]';

    public $secret_form_key;

    public function rules()
    {
        $rules = [
            [['name', 'phone'], 'required'],
            [['name'], 'string', 'min' => 2, 'max' => 60],
            ['secret_form_key', 'string', 'max' => 50],
        ];

        return array_merge(parent::rules(), $rules);
    }

    public function getEmailBody()
    {
        return "Имя: $this->name\n".
            "Телефон: $this->phone\n".
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