<?php
namespace common\models;

class Feedback extends \noIT\feedback\models\Feedback
{
    const SECRET_KEY = 'not-machine';

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
}