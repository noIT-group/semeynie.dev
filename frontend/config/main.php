<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languages'],
    'language' => 'ru_ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'class' => 'common\components\Request', // custom
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
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
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
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
            'class' => 'common\components\UrlManager',  // custom
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require (__DIR__ . '/routes.php'),
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/jquery-3.4.1.min.js',
                        'js/slick.min.js',
                        'js/jquery.blueimp-gallery.min.js',
                        'js/jquery.fancybox.min.js',
                        'js/jquery.mCustomScrollbar.concat.min.js',
                        'js/jquery.mask.min.js',
                        'js/typed.min.js',
                        'https://api.thefloors.io/v1/site/239/widget',
                        'https://cdn.jsdelivr.net/npm/sweetalert2@8',
                    ]
                ]
            ]
        ],
        'siteSettingsComponent' => [
            'class' => 'frontend\components\SiteSettingsComponent'
        ],
        'languageHelper' => [
            'class' => 'frontend\components\LanguageHelper'
        ],
    ],
    'modules' => [
        'languages' => [
            'class' => 'common\modules\languages\Module',  // custom
            'languages' => [
                'ru' => 'ru',
                'ua' => 'ua',
            ],
            'default_language' => 'ru',
            'show_default' => false,
        ],
    ],
    'params' => $params,
];
