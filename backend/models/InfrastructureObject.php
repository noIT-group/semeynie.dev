<?php

namespace backend\models;

class InfrastructureObject extends \common\models\InfrastructureObject
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
            'coordinate' => 'Координаты',
            'category_id' => 'Категория инфраструктуры',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}