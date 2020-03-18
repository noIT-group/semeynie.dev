<?php

use frontend\widgets\MessengersWidget;
use frontend\widgets\SocialNetworksWidget;
use yii\helpers\Url;

?>
<footer class="section_footer">
    <div class="boxes">
        <div class="adress auto_height">
            <div class="item">
                <div class="head"><?= Yii::t('app', 'sale_department__label') ?></div>
                <?php if($email = Yii::$app->siteSettingsComponent->getEmail()) : ?>
                    <div>
                        <a class="link_with_icons" href="mailto:<?= $email ?>">
                            <img src="/img/email_icon.svg" alt="<?= $email ?>"><span><?= $email ?></span>
                        </a>
                    </div>
                <?php endif ?>
                <?php if($phones = Yii::$app->siteSettingsComponent->getPhones(true)) : ?>
                    <?php foreach($phones as $phone) : ?>
                        <div>
                            <a class="link_with_icons" href="tel:<?= $phone['phone_link'] ?>">
                                <img src="/img/phone_icon.svg" alt="<?= $phone['phone_anchor'] ?>"><span><?= $phone['phone_anchor'] ?></span>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="item">
                <div class="head"><?= Yii::t('app', 'house_address__label') ?></div>
                <div>
                    <a class="link_with_icons" href="<?= Url::to(['site/location']) ?>#location_anchor">
                        <img src="/img/location.svg" alt="<?= Yii::t('app', 'house_address__label') ?>"><span><?= Yii::t('app', 'house_address__button_txt') ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="navigation">
            <div class="tagline"><?= Yii::t('app', 'will_be_a_neighbour__label') ?></div>
            <div class="main_tag floor_open">
                <div class="lines top"></div><span><?= Yii::t('app', 'select_apartment__label') ?></span>
                <div class="lines bottom"></div>
            </div>
            <div class="navigation_links">
                <a class="link" href="<?= Url::to(['site/about']) ?>"><?= Yii::t('app', 'about_project__button_txt') ?></a>
                <a class="link" href="<?= Url::to(['site/vantage']) ?>"><?= Yii::t('app', 'advantages__button_txt') ?></a>
                <a class="link" href="<?= Url::to(['site/gallery']) ?>"><?= Yii::t('app', 'gallery__button_txt') ?></a>
                <a class="link" href="<?= Url::to(['site/location']) ?>"><?= Yii::t('app', 'contacts__button_txt') ?></a>
                <a class="link" href="<?= Url::to(['site/about-developer']) ?>"><?= Yii::t('app', 'about_builder__button_txt') ?></a>
            </div>
        </div>

        <div class="sosials auto_height">
            <?= SocialNetworksWidget::widget(['view' => 'block_1']) ?>
            <?= MessengersWidget::widget(['view' => 'block_1']) ?>
            <div class="fly_link">
                <a href="https://noit.group/" target="_blank" title="<?= Yii::t('app', 'developed_by_us__label') ?>"><?= Yii::t('app', 'made__string') ?><span class="development-link"><span class="un_hover inner_el"><?= Yii::t('app', 'with_love__string') ?> ♡</span><span class="hover inner_el">в noIT Group</span></span></a>
            </div>
        </div>
    </div>
</footer>