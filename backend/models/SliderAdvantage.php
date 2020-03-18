<?php

namespace backend\models;

class SliderAdvantage extends \common\models\SliderAdvantage
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип страницы',
            'image' => 'Картинка',
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}