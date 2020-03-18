<?php

namespace backend\models;

class ConstructionProgress extends \common\models\ConstructionProgress
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'name_short_ru' => 'Название (Короткое) (RU)',
            'name_short_ua' => 'Название (Короткое) (UA)',
            'name_full_ru' => 'Название (Полное) (RU)',
            'name_full_ua' => 'Название (Полное) (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'videos' => 'Видео - Youtube',
            'status' => 'Статус',
        ];
    }
}