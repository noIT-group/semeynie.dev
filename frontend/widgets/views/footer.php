<?php

use frontend\widgets\LanguageWidget;
use frontend\widgets\SocialNetworkWidget;
use yii\helpers\Url;

/**
 * @var $navigationMenuSettings array
 */

?>
<footer class="footer">
    <div class="footer__inner fix_min">
        <?php if (isset($navigationMenuSettings['footer_menu']) && ($footer_menu = $navigationMenuSettings['footer_menu'])) : ?>
            <div class="footer__item footer__menu">
                <?php foreach($footer_menu as $footer_menu_item) : ?>
                    <a href="<?= $footer_menu_item['link'] ?>" class="footer__menu-link"><?= $footer_menu_item['anchor'] ?></a>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="footer__item footer__consultation">
            <a href="#modal__more" class="btn btn_beige footer__btn"><?= Yii::t('app', 'get_consultation_txt') ?></a>
        </div>
        <div class="footer__item footer__info">
            <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_FOOTER]) ?>
            <a href="tel:+380977777370" class="footer__link footer__phone">+38 (097) 777 73 70 </a>
            <a href="mail:sales@semeinie.tradicii.com" class="footer__link footer__email">sales@semeinie.tradicii.com</a>
        </div>
        <div class="footer__hide-desc">
            <a href="mail:sales@semeinie.tradicii.com" class="footer__link footer__email">sales@semeinie.tradicii.com</a>
            <a href="tel:+380977777370" class="footer__link footer__phone">+38 (097) 777 73 70 </a>
        </div>
    </div>
</footer>
