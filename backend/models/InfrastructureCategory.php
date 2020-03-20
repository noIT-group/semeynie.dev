<?php

namespace backend\models;

class InfrastructureCategory extends \common\models\InfrastructureCategory
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
            'svg_icon' => 'SVG иконка',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}