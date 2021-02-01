<?php

use frontend\components\EstateWidgetComponent;
use frontend\widgets\LanguageWidget;
use yii\helpers\Url;

/**
 * @var $navigationMenuSettings array
 */

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
                    <?php if (isset($navigationMenuSettings['header_menu']) && ($header_menu = $navigationMenuSettings['header_menu'])) : ?>
                        <div class="menu-slide__inner">
                            <?php foreach ($header_menu as $header_menu_item) : ?>
                                <?php if (strpos($header_menu_item['link'], EstateWidgetComponent::WIDGET_DOMAIN) !== false) : ?>
                                    <a href="#" data-iframe-src="<?= $header_menu_item['link'] ?>" class="menu-slide__link js_popup_open"><?= $header_menu_item['anchor'] ?></a>
                                <?php elseif(strpos($header_menu_item['link'], '#') !== false) : ?>
                                    <a href="<?= $header_menu_item['link'] ?>" class="menu-slide__link js-scroll-to"><?= $header_menu_item['anchor'] ?></a>
                                <?php else : ?>
                                    <a href="<?= $header_menu_item['link'] ?>" class="menu-slide__link"><?= $header_menu_item['anchor'] ?></a>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <a href="<?= Url::to(['site/index']) ?>" class="logo">
                <img src="/img/header/logo.svg" data-src="/img/header/logo.svg">
            </a>
        </div>
        <div class="header_center header__item">
            <span class="header__desc"><?= Yii::t('app', 'logotype_note_txt') ?></span>
        </div>
        <div class=" header__item header_right">
            <?= LanguageWidget::widget() ?>
            <a href="tel:0487529683" class="header__phone phone"><i class="icon-phone icon"></i>(048) 752 96 83</a>
        </div>
    </div>
    <?php if (isset($navigationMenuSettings['burger_menu']) && ($burger_menu = $navigationMenuSettings['burger_menu'])) : ?>
        <div class="fix">
            <nav class="main-menu">
                <div class="main-menu__inner">
                    <?php foreach ($burger_menu as $burger_menu_item) : ?>
                        <?php if (strpos($burger_menu_item['link'], EstateWidgetComponent::WIDGET_DOMAIN) !== false) : ?>
                            <a href="#" data-iframe-src="<?= $burger_menu_item['link'] ?>" class="main-menu__link js_popup_open"><?= $burger_menu_item['anchor'] ?></a>
                        <?php elseif(strpos($burger_menu_item['link'], '#') !== false) : ?>
                            <a href="<?= $burger_menu_item['link'] ?>" class="main-menu__link js-scroll-to"><?= $burger_menu_item['anchor'] ?></a>
                        <?php else : ?>
                            <a href="<?= $burger_menu_item['link'] ?>" class="main-menu__link"><?= $burger_menu_item['anchor'] ?></a>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </nav>
        </div>
    <?php endif ?>
</header>
