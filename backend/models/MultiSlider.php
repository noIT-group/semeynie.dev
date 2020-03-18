<?php

namespace backend\models;

class MultiSlider extends \common\models\MultiSlider
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Картинка',
            'type' => 'Тип',
            'caption_ru' => 'Описание (RU)',
            'caption_ua' => 'Описание (UA)',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}