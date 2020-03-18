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
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'slug' => 'URL',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'category_number' => 'Категория',
            'status' => 'Статус публикации',
            'sort_order' => 'Порядок вывода',
        ];
    }
}