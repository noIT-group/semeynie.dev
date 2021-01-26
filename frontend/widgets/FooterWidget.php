<?php

namespace frontend\widgets;

use frontend\models\NavigationMenuSettings;
use yii\base\Widget;

class FooterWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $navigationMenuSettings = NavigationMenuSettings::getAll();

        return $this->render('footer', [
            'navigationMenuSettings' => $navigationMenuSettings,
        ]);
    }
}