<?php

namespace backend\models;

class Document extends \common\models\Document
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
            'image' => 'Изображение',
//            'file' => 'Файл',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}