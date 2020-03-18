<?php

namespace backend\models;

class Queue extends \common\models\Queue
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название очереди (RU)',
            'name_ua' => 'Название очереди (UA)',
            'status' => 'Статус',
        ];
    }
}