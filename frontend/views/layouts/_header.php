<?php

use frontend\widgets\ContactsWidget;
use frontend\widgets\NavigationLinksWidget;

?>
<div class="menu_btn_wrp">

    <div class="main_menu_open_button">
        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>

    <?php if($phone = Yii::$app->siteSettingsComponent->getPhones(false)) : ?>
        <div class="phone_on_scroll"><a class="item link" href="tel:<?= $phone['phone_link'] ?>"><?= $phone['phone_anchor'] ?></a>
            <div class="img_wrp item"><a href="tel:<?= $phone['phone_link'] ?>"><img src="/img/icon_phone_static.svg" alt="<?= $phone['phone_anchor'] ?>"></a></div>
        </div>
    <?php endif ?>

    <div id="main_menu"><img class="tone_img" src="/img/menu_img_tone.svg" alt="Меню">
        <div class="motto"><?= Yii::t('app', 'header_slogan__label') ?></div>
        <div class="instruction"><img src="/img/menu_arrows_icon.svg" alt="<?= Yii::t('app', 'scroll_and_click__label') ?>"><span><?= Yii::t('app', 'scroll_and_click__label') ?></span></div>
        <div class="close_btn"><span></span><span></span></div>
        <?= NavigationLinksWidget::widget() ?>
        <?= ContactsWidget::widget(['view' => 'mobile']) ?>
    </div>

</div>