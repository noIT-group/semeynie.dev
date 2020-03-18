<?php

namespace backend\models;

class DeveloperObject extends \common\models\DeveloperObject
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
            'image_logo' => 'Логотип',
            'image_illustration' => 'Иллюстрация',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'link' => 'Ссылка на сайт',
            'status' => 'Статус',
            'sort_order' => 'Порядок сортировки',
        ];
    }
}