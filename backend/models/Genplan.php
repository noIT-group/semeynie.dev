<?php

namespace backend\models;

class Genplan extends \common\models\Genplan
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название (RU)',
            'name_ua' => 'Название (UA)',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}