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
        'css/blueimp-gallery.min.css?4488484',
        'css/slick.css?4488484',
        'css/jquery.fancybox.min.css?4488484',
        'css/jquery.mCustomScrollbar.css?4488484',
        'css/style.min.css?4488484',
        'custom/custom.css?4488484'
    ];

    public $js = [
        'js/main.min.js?4488484',
        'custom/app.js?4488484',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}