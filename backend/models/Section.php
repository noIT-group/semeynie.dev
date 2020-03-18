<?php

namespace backend\models;

class Section extends \common\models\Section
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название секции (RU)',
            'name_ua' => 'Название секции (UA)',
            'status' => 'Статус',
            'queue_id' => 'Номер очереди',
        ];
    }
}