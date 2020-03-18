<?php

namespace backend\models;

class HomeSlider extends \common\models\HomeSlider
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
            'image_mobile' => 'Иллюстрация для мобильных устройств',
            'menu_bg_color' => 'Background бокового меню',
            'body_ru' => 'Описание слайда (RU)',
            'body_ua' => 'Описание слайда (UA)',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}