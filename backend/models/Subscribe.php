<?php


namespace backend\models;


class Subscribe extends \common\models\Subscribe
{

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'IP',
            'name' => 'Имя',
            'email' => 'Email',
            'status' => 'Статус видимости',
        ];
    }
}