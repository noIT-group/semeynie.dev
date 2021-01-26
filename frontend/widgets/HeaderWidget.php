<?php

namespace frontend\widgets;

use frontend\models\NavigationMenuSettings;
use yii\base\Widget;

class HeaderWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $navigationMenuSettings = NavigationMenuSettings::getAll();

        return $this->render('header', [
            'navigationMenuSettings' => $navigationMenuSettings,
        ]);
    }
}