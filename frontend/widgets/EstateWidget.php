<?php

namespace frontend\widgets;

use yii\base\Widget;

class EstateWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        return $this->render('estate_iframe');
    }
}