<?php

namespace frontend\components;

use yii\base\Component;

class EstateWidgetComponent extends Component
{
    const WIDGET_DOMAIN = 'https://katalog.estate';

    const API_TOKEN = 'zfregkmwlrlwerr';

    /**
     * @return string
     */
    public function getDomain()
    {
        return static::WIDGET_DOMAIN;
    }

    public function getProjectUrl()
    {
        return static::WIDGET_DOMAIN . '/st';
    }
}