<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/icomoon.css',
        'css/main.min.css',
        'custom/fancybox/fancybox.min.css',
        'custom/style.css',
    ];

    public $js = [
        'js/common.js',
        'custom/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}