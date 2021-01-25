<?php

use frontend\widgets\LanguageWidget;
use yii\helpers\Url;

?>
<header class="header">
    <div class="header__inner fix">
        <div class=" header__item header_left">
            <div class="menu">
                <div class="menu_mob">
                    <div class="menu__trigger">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </div>
                <div class="menu-slide">
                    <div class="menu-slide_top">
                        <div class="menu__trigger">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </div>
                        <a href="<?= Url::to(['site/index']) ?>" class="logo">
                            <img src="/img/header/logo.svg" data-src="/img/header/logo.svg">
                        </a>
                    </div>
                    <div class="menu-slide__inner">
                        <a href="#" class="menu-slide__link">О проекте</a>
                        <a href="#" class="menu-slide__link">Генплан</a>
                        <a href="#" class="menu-slide__link">Выбрать квартиру</a>
                        <a href="#" class="menu-slide__link">Галерея</a>
                        <a href="#" class="menu-slide__link">Инфраструктура</a>
                        <a href="#" class="menu-slide__link">О застройщике</a>
                        <a href="#" class="menu-slide__link">О застройщике</a>
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['site/index']) ?>" class="logo"><img src="/img/header/logo.svg" data-src="/img/header/logo.svg"></a>
        </div>
        <div class="header_center header__item">
            <span class="header__desc">Новый семейный жилой комплекс в центре Таирова</span>
        </div>
        <div class=" header__item header_right">
            <?= LanguageWidget::widget() ?>
            <a href="tel:0487529683" class="header__phone phone"><i class="icon-phone icon"></i>(048) 752 96 83</a>
        </div>
    </div>
    <div class="fix">
        <nav class="main-menu">
            <div class="main-menu__inner">
                <a href="#" class="main-menu__link">О проекте</a>
                <a href="#" class="main-menu__link">Генплан</a>
                <a href="#" class="main-menu__link">Выбрать квартиру</a>
                <a href="#" class="main-menu__link">Галерея</a>
                <a href="#" class="main-menu__link">Инфраструктура</a>
                <a href="#" class="main-menu__link active">О застройщике</a>
                <a href="#" class="main-menu__link">Контакты</a>
            </div>
        </nav>
    </div>
</header>
