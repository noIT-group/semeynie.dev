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
            'image' => 'Картинка',
            'video' => 'Видео (youtube-ID)',
            'caption_ru' => 'Описание (RU)',
            'caption_ua' => 'Описание (UA)',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}