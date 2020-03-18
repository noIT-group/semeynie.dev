<?php

use Da\User\Module;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru_RU',
    'name' => 'Семейные Традиции',
    'defaultRoute' => 'feedback',
    'as beforeRequest' => [
        'class' => \yii\filters\AccessControl::className(),
        'ruleConfig' => [
            'class' => \Da\User\Filter\AccessRuleFilter::className(),
        ],
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => Da\User\Module::className(),
            'layout' => '@backend/views/layouts/main-clear',
            'administrators' => [
                'root',
            ],
            'controllerMap' => [
                'admin' => 'noIT\auth\controllers\AdminController',
                'role' => 'noIT\auth\controllers\RoleController',
                'permission' => 'noIT\auth\controllers\PermissionController',
                'rule' => 'noIT\auth\controllers\RuleController',
            ],
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ]
        ],
        'tips' => [
            'class'  => 'noIT\tips\Module',
            'models' => [
                \common\models\Feedback::className() => 'Заявки',
                \common\models\settings\SocialGroupSettings::className() => 'Настройки -> Социальные группы',
                \common\models\settings\SiteConfigSettings::className() => 'Настройки -> Настройки -> Email и контакты',
            ],
        ],
        'seo' => [
            'class' => 'noIT\seo\Module',
        ],
    ],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => \Da\User\Model\User::className(),
            'loginUrl' => ['user/login'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend',
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
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'metronic-admin/vendors/base/vendors.bundle.js',
                        'metronic-admin/custom/js/jquery-migrate.min.js',
                        'metronic-admin/demo/default/base/scripts.bundle.js',
                        'metronic-admin/components-bundle/js/bootstrap-select.js',
                    ]
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require (__DIR__ . '/routes.php'),
        ],
        'componentHelper' => [
            'class' => 'backend\components\ComponentHelper'
        ],
        'languageHelper' => [
            'class' => 'backend\components\LanguageHelperComponent'
        ],
    ],
    'params' => $params,
];
