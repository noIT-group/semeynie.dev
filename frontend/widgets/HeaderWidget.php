<?php

namespace frontend\widgets;

use yii\base\Widget;

class HeaderWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        return $this->render('header');
    }
}