<?php

namespace backend\models;

class Flat extends \common\models\Flat
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flat_img' => 'План квартиры',
            'square_size' => 'Площадь квартиры',
            'coordinate' => 'Координаты квартиры',
            'room_quantity' => 'Количество комнат',
            'wind_rose' => 'Роза ветров',
            'floor_id' => 'Этаж квартиры',
            'status' => 'Статус',
        ];
    }
}