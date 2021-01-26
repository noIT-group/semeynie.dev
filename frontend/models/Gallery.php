<?php

namespace frontend\models;

use Yii;

class Gallery extends \common\models\Gallery
{
    /**
     * @return mixed
     */
    public function getCaption()
    {
        $current_language = Yii::$app->language;

        return trim($this->getAttribute("caption_{$current_language}"));
    }

    /**
     * @return mixed
     */
    public function getImage_thumb()
    {
        return $this->getThumbUploadUrl('image', 'thumb');
    }
}