<?php

namespace frontend\models;

use Yii;

class InfrastructureObject extends \common\models\InfrastructureObject
{
    /**
     * @return mixed
     */
    public function getName()
    {
        $current_language = Yii::$app->language;

        return trim($this->getAttribute("name_{$current_language}"));
    }
}