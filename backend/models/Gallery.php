<?php

namespace backend\models;

class Gallery extends \common\models\Gallery
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'name_ru' => 'Название (RU)',
            'name_ua' => 'Название (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'video' => 'Видео - Youtube',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}