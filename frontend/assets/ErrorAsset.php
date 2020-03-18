<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ErrorAsset extends AssetBundle
{
    public $basePath = '@webroot/404';
    public $baseUrl = '@web/404';

    public $css = [
        'styles/404.min.css?4488484',
    ];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}