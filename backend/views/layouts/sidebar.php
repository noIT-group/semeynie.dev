<?php

use \backend\widgets\MetronicSidebar;
use yii\helpers\Html;

?>
<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">

        <!-- SIDEBAR START -->
        <?= MetronicSidebar::widget( [
            'items' => [

                [
                    'label'    => 'Обратная связь',
                    'icon'     => 'flaticon-mail',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Заявки', 'url' => [ '/feedback/index' ] ],
                        [ 'label' => 'Подписки', 'url' => [ '/subscribe/index' ] ],
                    ]
                ],
                [
                    'label'    => 'Главная',
                    'icon'     => 'fab fa-fort-awesome',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Слайдер', 'url' => [ '/home-slider/index' ] ],
                        [ 'label' => 'Идея', 'url' => [ '/settings/idea-section' ] ],
                        [ 'label' => 'Преимущества', 'url' => [ '/settings/advantage-section' ] ],
                        [ 'label' => 'Слайдер преимуществ', 'url' => [ '/slider-advantage/index' ] ],
                        [ 'label' => 'Процесс строительства', 'url' => [ 'settings/progress-bar-settings' ] ],
                    ]
                ],
                [
                    'label'    => 'О проекте',
                    'icon'     => 'fa fa-at',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Первая подача', 'url' => [ '/settings/first-serve-section' ] ],
                        [ 'label' => 'Что такое Атмосфера?', 'url' => [ '/settings/what-is-atmosphere-section' ] ],
                        [ 'label' => 'Цифры', 'url' => [ '/settings/number-section' ] ],
                        [ 'label' => 'Жить не выходя из дома', 'url' => [ '/settings/live-no-without-home-section' ] ],
                        [ 'label' => 'Документы', 'url' => [ '/document/index' ] ],
                        [ 'label' => 'Слайдер преимуществ', 'url' => [ '/slider-advantage-about/index' ] ],
                    ]
                ],
//                [
//                    'label'    => 'Конструктор (X)',
//                    'icon'     => 'fa fa-at',
//                    'template' => 'submenu',
//                    'url'      => [ '#' ],
//                    'items'    => [
//                        [ 'label' => 'Очередь', 'url' => [ '/queue/index' ] ],
//                        [ 'label' => 'Секция', 'url' => [ '/section/index' ] ],
//                        [ 'label' => 'Этаж', 'url' => [ '/floor/index' ] ],
//                        [ 'label' => 'Квартира', 'url' => [ '/flat/index' ] ],
//                    ]
//                ],
                [
                    'label'    => 'Преимущества',
                    'icon'     => 'flaticon-list-2',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Слайдер вверху', 'url' => [ '/settings/advantage-upper-slider' ] ],
                        [ 'label' => 'Террасы', 'url' => [ '/settings/terraces-section' ] ],
                        [ 'label' => 'Расположение', 'url' => [ '/settings/disposition-section' ] ],
                        [ 'label' => 'Эргономичность', 'url' => [ '/settings/ergonomic-section' ] ],
                        [ 'label' => 'Рассрочка', 'url' => [ '/settings/installment-plan-section' ] ],
                    ]
                ],
                [
                    'label'    => 'Расположение',
                    'icon'     => 'flaticon-map-location',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Содержимое', 'url' => [ '/settings/location-section' ] ],
                        [ 'label' => 'Карта', 'url' => [ '/settings/map-section' ] ],
                    ]
                ],
//                [
//                    'label'    => 'Инфраструктура',
//                    'icon'     => 'flaticon-search-1',
//                    'template' => 'submenu',
//                    'url'      => [ '#' ],
//                    'items' => [
//                        [ 'label' => 'Объекты инфраструктуры', 'url' => [ '/infrastructure-object/index' ] ],
//                        [ 'label' => 'Слайдер вверху', 'url' => [ '/settings/infrastructure-upper-slider' ] ],
//                        [ 'label' => 'Первый блок', 'url' => [ '/settings/infrastructure-first-section' ] ],
//                        [ 'label' => 'Второй блок', 'url' => [ '/settings/infrastructure-second-section' ] ],
//                        [ 'label' => 'Третий блок', 'url' => [ '/settings/infrastructure-third-section' ] ],
//                    ],
//                ],attraction-section.php

                [
                    'label'    => 'Центр притяжения',
                    'template' => 'single',
                    'icon'     => 'flaticon-search-1',
                    'url'      => [ '/settings/attraction-section' ],
                ],

                [
                    'label'    => 'О застройщике',
                    'icon'     => 'flaticon-suitcase',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items' => [
                        [ 'label' => 'Слайдер', 'url' => [ '/about-developer-slider/index' ] ],
                        [ 'label' => 'Проекты', 'url' => [ '/project/index' ] ],
                        [ 'label' => 'О проекте', 'url' => [ '/settings/about-project-section' ] ],
                        [ 'label' => 'Документы', 'url' => [ '/document/index' ] ],
                    ],
                ],
                //
                [
                    'label'    => 'Галерея',
                    'template' => 'single',
                    'icon'     => 'fa fa-eye',
                    'url'      => [ '/gallery/index' ],
                ],
                [
                    'label'    => 'Ход строительства',
                    'template' => 'single',
                    'icon'     => 'flaticon-search-1',
                    'url'      => [ '/construction-progress/index' ],
                ],
                [
                    'label'    => 'Настройки',
                    'icon'     => 'fa fa-cog',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'Каналы, группы, чаты', 'url' => [ '/settings/social-group-settings' ] ],
                        [ 'label' => 'Email и контакты', 'url' => [ '/settings/site-config-settings' ] ],
                    ]
                ],
                [
                    'label'    => 'Пользователи',
                    'icon'     => 'flaticon-users',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [
                            'label' => 'Управление пользователями',
                            'icon'  => 'fa fa-user`',
                            'url'   => [ '/user/admin/index' ],
                        ],
                        [
                            'label' => 'Подсказки в админке',
                            'url'   => [ '/tips/tip/index' ],
                        ],
                    ]
                ],

                [
                    'label'    => 'SEO-инструменты',
                    'icon'     => 'flaticon-layers',
                    'template' => 'submenu',
                    'url'      => [ '#' ],
                    'items'    => [
                        [ 'label' => 'SEO по URL', 'url' => [ '/seo/seo-by-url/index' ] ],
                    ]
                ],


            ]
        ]) ?>
        <!-- SIDEBAR END -->

    </div>
    <!-- END: Aside Menu -->

</div>
<!-- END: Left Aside -->