<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@cache',
        ],
        'settings' => [
            'class' => 'pheme\settings\components\Settings',
        ],
        'i18n' => [
            'class' => 'yii\i18n\I18N',
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'artboximage' => [
            'class' => 'common\components\artboximage\ArtboxImage',
            'driver' => 'GD',  //GD or Imagick
            'rootPath' => Yii::getAlias('@cdn'),
            'rootUrl' => '/cdn',
            'presets' => [
                'admin_thumb' => [
                    'resize' => [
                        'width' => 120,
                    ],
                ],
                'admin_thumb_sm' => [
                    'resize' => [
                        'width' => 50,
                    ],
                ],
                'admin_preview' => [
                    'resize' => [
                        'width' => 134,
                        'height' => 200,
                        'master' => \yii\image\drivers\Image::CROP
                    ],
                ],
            ]
        ],
        'siteSettingsComponent' => [
            'class' => 'frontend\components\SiteSettingsComponent'
        ],
        'calltracker' => [
            'class' => \noIT\calltracker\Calltracker::className(),
            'types' => [
                '*' => 'Если нет другого',
                'googleads' => 'Google Ads',
                'yandexdirect' => 'Яндекс Директ',
                'facebook' => 'Facebook',
                'instagram' => 'Instagram',
            ],
            'items' => function () {
                return Yii::$app->siteSettingsComponent->getPhones(true);
            },
            'limit' => 2,
            'sourcesFiled' => 'source',
        ],
    ],
];
