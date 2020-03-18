<?php

namespace backend\models;

class AboutDeveloperSlider extends \common\models\AboutDeveloperSlider
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название слайда (боковое меню) (RU)',
            'name_ua' => 'Название слайда (боковое меню) (UA)',
            'image' => 'Иллюстрация',
            'image_tone' => 'Значек',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание слайда (RU)',
            'body_ua' => 'Описание слайда (UA)',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}