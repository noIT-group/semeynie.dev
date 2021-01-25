<?php

namespace frontend\widgets;

use yii\base\Widget;

class FooterWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        return $this->render('footer');
    }
}