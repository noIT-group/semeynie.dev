<?php

namespace frontend\models;

use Yii;

class Document extends \common\models\Document
{
    /**
     * @return mixed
     */
    public function getName()
    {
        $current_language = Yii::$app->language;

        return trim($this->getAttribute("name_{$current_language}"));
    }

    /**
     * @return mixed
     */
    public function getImage_big_thumb()
    {
        return $this->getThumbUploadUrl('image', 'thumb-big');
    }

    /**
     * @return mixed
     */
    public function getImage_small_thumb()
    {
        return $this->getThumbUploadUrl('image', 'thumb-small');
    }
}