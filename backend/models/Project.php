<?php

namespace backend\models;

class Project extends \common\models\Project
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
            'logotype' => 'Логотип',
            'url' => 'Ссылка на сайт',
            'status' => 'Статус',
            'sort_order' => 'Порядок вывода',
        ];
    }
}
