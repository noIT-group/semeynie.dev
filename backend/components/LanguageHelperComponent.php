<?php

namespace backend\components;

use yii\base\Component;

class LanguageHelperComponent extends Component
{
    /**
     * @return array
     */
    public function getLanguages()
    {
        return ['ru', 'ua'];
    }
}