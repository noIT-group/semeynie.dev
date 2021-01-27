<?php

/**
 * @var $this View
 */

use frontend\widgets\FormWidget;
use frontend\widgets\SocialNetworkWidget;
use yii\web\View;

$this->title = Yii::t('app', 'contact_txt');

?>
<section class="hero fix">
    <div class="hero__inner">

        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>

        <div class="contact__info">
            <span class="title"><?= Yii::t('app', 'sale_department_label') ?></span>
            <div class="contact__info-inner">
                <div class="contact__map">
                    <div id="contact-map"></div>
                </div>
                <div class="contact__info-desc">
                    <a href="tel:+380487528694" class="contact__text">+38 (048) 752-86-94 </a>
                    <a href="mailto:sale@odesskie-tradicii.com" class="contact__text">sale@odesskie-tradicii.com</a>
                    <p class="contact__text">ул. Академика Воробьева, 1 Работаем без выходных:<br> с 9-00 до 18-00</p>
                </div>
            </div>
        </div>

    </div>
</section>

<?= FormWidget::widget(['view_type' => FormWidget::VIEW_TYPE_WRITE_US]) ?>
