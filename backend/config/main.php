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
    'name' => 'Atmosphere CMS',
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
                \backend\models\HomeSlider::className() => 'Главная -> Слайдер',
                \common\models\settings\IdeaSectionSettings::className() => 'Главная -> Идея',
                \common\models\settings\AdvantageSectionSettings::className() => 'Главная -> Преимущества',
                \common\models\settings\FirstServeSectionSettings::className() => 'О проекте -> Первая подача',
                \common\models\settings\WhatIsAtmosphereSectionSettings::className() => 'О проекте -> Что такое Атмосфера?',
                \common\models\settings\NumberSectionSettings::className() => 'О проекте -> Цифры',
                \common\models\settings\LiveNoWithoutHomeSectionSettings::className() => 'О проекте -> Жить не выходя из дома',
                \backend\models\SliderAdvantage::className() => 'О проекте -> Слайдер преимуществ',
                \common\models\settings\AdvantageUpperSliderSettings::className() => 'Преимущества -> Слайдер вверху',
                \common\models\settings\TerracesSectionSettings::className() => 'Преимущества -> Террасы',
                \common\models\settings\DispositionSectionSettings::className() => 'Преимущества -> Расположение',
                \common\models\settings\ErgonomicSectionSettings::className() => 'Преимущества -> Эргономичность',
                \common\models\settings\InstallmentPlanSectionSettings::className() => 'Преимущества -> Рассрочка',
                \common\models\settings\LocationSectionSettings::className() => 'Расположение -> Содержимое',
                \common\models\settings\MapSectionSettings::className() => 'Расположение -> Карта',
                \backend\models\InfrastructureObject::className() => 'Инфраструктура -> Объекты инфраструктуры',
                \common\models\settings\InfrastructureUpperSliderSettings::className() => 'Инфраструктура -> Слайдер вверху',
                \common\models\settings\InfrastructureFirstSectionSettings::className() => 'Инфраструктура -> Первый блок',
                \common\models\settings\InfrastructureSecondSectionSettings::className() => 'Инфраструктура -> Второй блок',
                \common\models\settings\InfrastructureThirdSectionSettings::className() => 'Инфраструктура -> Третий блок',
                \common\models\AboutDeveloperSlider::className() => 'О застройщике -> Слайдер',
                \backend\models\Project::className() => 'О застройщике -> Проекты',
                \common\models\settings\AboutProjectSectionSettings::className() => 'О застройщике -> О проекте',
                \backend\models\Document::className() => 'Документы',
                \backend\models\Gallery::className() => 'Галлерея',
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
