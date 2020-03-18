<?php

namespace backend\models;

class Floor extends \common\models\Floor
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название этажа (RU)',
            'name_ua' => 'Название этажа (UA)',
            'number' => 'Номер этажа',
            'plan_img' => 'План этажа',
            'section_id' =>  'Секция',
            'status' => 'Статус',
        ];
    }
}