<?php

namespace frontend\models;

use Yii;

class DeveloperObject extends \common\models\DeveloperObject
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
    public function getImage_logo_big_thumb()
    {
        return $this->getThumbUploadUrl('image_logo', 'thumb-big');
    }

    /**
     * @return mixed
     */
    public function getIllustration_image()
    {
        return $this->getUploadUrl('image_illustration');
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        $current_language = Yii::$app->language;

        return trim($this->getAttribute("body_{$current_language}"));
    }

}