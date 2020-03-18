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
        <?= MetronicSidebar::widget([
            'items' => [

                [
                    'label' => 'Обратная связь',
                    'icon' => 'flaticon-mail',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'Заявки', 'url' => ['/feedback/index']],
                    ]
                ],
                [
                    'label' => 'Главная',
                    'icon' => 'fab fa-fort-awesome',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'Слайдер', 'url' => ['/home-slider/index']],
                    ]
                ],
                [
                    'label' => 'О застройщике',
                    'icon' => 'fab fa-fort-awesome',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'Контент', 'url' => ['/settings/about-developer-settings']],
                        ['label' => 'Документы', 'url' => ['/document/index']],
                        ['label' => 'Объекты застройщика', 'url' => ['/developer-object/index']],
                    ]
                ],
                [
                    'label' => 'Галерея',
                    'icon' => 'fab fa-fort-awesome',
                    'template' => 'single',
                    'url' => ['/gallery/index'],
                ],
                [
                    'label' => 'Генплан',
                    'icon' => 'fab fa-fort-awesome',
                    'template' => 'single',
                    'url' => ['/genplan/index'],
                ],
//                [
//                    'label' => 'Выбрать квартиру',
//                    'icon' => 'fa fa-at',
//                    'template' => 'single',
//                    'url' => ['#'],
//                ],
                [
                    'label' => 'О застройщике',
                    'icon' => 'fab fa-fort-awesome',
                    'template' => 'single',
                    'url' => ['/settings/about-developer-settings'],
                ],
                [
                    'label' => 'Настройки',
                    'icon' => 'fa fa-cog',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'Меню', 'url' => ['/settings/navigation-menu-settings']],
                        ['label' => 'Каналы, группы, чаты', 'url' => ['/settings/social-group-settings']],
                        ['label' => 'Email и контакты', 'url' => ['/settings/site-config-settings']],
                    ]
                ],
                [
                    'label' => 'Пользователи',
                    'icon' => 'flaticon-users',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        [
                            'label' => 'Управление пользователями',
                            'icon' => 'fa fa-user`',
                            'url' => ['/user/admin/index'],
                        ],
                        [
                            'label' => 'Подсказки в админке',
                            'url' => ['/tips/tip/index'],
                        ],
                    ]
                ],

                [
                    'label' => 'SEO-инструменты',
                    'icon' => 'flaticon-layers',
                    'template' => 'submenu',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'SEO по URL', 'url' => ['/seo/seo-by-url/index']],
                    ]
                ],


            ]
        ]) ?>
        <!-- SIDEBAR END -->

    </div>
    <!-- END: Aside Menu -->

</div>
<!-- END: Left Aside -->