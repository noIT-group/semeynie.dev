<?php

use noIT\seo\helpers\RedirectHelper;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'on beforeRequest' => function () {
        RedirectHelper::beforeRequest();
    },
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'i18n' => [
            'class' => 'yii\i18n\I18N',
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app'  => 'app.php',
                    ],
                ],
            ],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'noIT\UrlManager',
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableDefaultLanguageUrlCode' => false,
            'enableLanguageDetection' => false,
            'enableLanguagePersistence' => false,
            'rules' => require(__DIR__ . '/routes.php'),
            'languages' => ['ru', 'ua'],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/vendors.min.js',
                        'js/input.mask.js',
                        'custom/libs/jquery.mask.min.js',
                        'custom/fancybox/fancybox.min.js',
                        'https://cdn.jsdelivr.net/npm/sweetalert2@8',
                    ]
                ]
            ]
        ],
        'siteSettingsComponent' => [
            'class' => 'frontend\components\SiteSettingsComponent'
        ],
        'settingsLanguageGetter' => [
            'class' => 'frontend\components\SettingsLanguageGetter',
        ],
        'estateWidget' => [
            'class' => 'frontend\components\EstateWidgetComponent',
        ],
    ],
    'params' => $params,
];
