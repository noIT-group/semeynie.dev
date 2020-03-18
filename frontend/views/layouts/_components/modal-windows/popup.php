<?php

use frontend\widgets\ConstructionProgressVideoPopupWidget;
use frontend\widgets\ConsultationFormWidget;

?>
<div id="popups">

    <?= ConstructionProgressVideoPopupWidget::widget() ?>

    <div class="popup choise">
        <div class="close bg"></div>
        <div class="popup_content">
            <div class="close close_btn">+</div>
            <div class="head"><?= Yii::t('app', 'error__label') ?></div>
            <div class="main_content"><?= Yii::t('app', 'error__message') ?></div>
            <?php if($phones = Yii::$app->siteSettingsComponent->getPhones(true)) : ?>
                <div class="bott_info"><?= Yii::t('app', 'contact_us_by') ?> <?= (count($phones) === 1) ? 'телефону' : Yii::t('app', 'multi_phone__string') ?>
                    <div class="tels">
                        <?php foreach($phones as $single_phone) : ?>
                            <?= $single_phone['phone_anchor'] ?><br>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="popup thanks">
        <div class="close bg"></div>
        <div class="popup_content">
            <div class="close close_btn">+</div>
            <div class="head"><?= Yii::t('app', 'thank_you__label') ?>!</div>
            <div class="main_content"><?= Yii::t('app', 'success__message') ?></div>
        </div>
    </div>

    <div class="popup consultation">
        <div class="close bg"></div>
        <div class="popup_content">
            <div class="close close_btn">+</div>
            <div class="head"><?= Yii::t('app', 'manages_consultation__label') ?></div>
            <?= ConsultationFormWidget::widget(['view' => 'consultation-form']) ?>
        </div>
    </div>

</div>