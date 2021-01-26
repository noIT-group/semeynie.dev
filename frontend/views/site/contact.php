<?php

/**
 * @var $this View
 */

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

<section class="fix contact__form">

    <span class="title sub-title"><?= Yii::t('app', 'write_us_txt') ?></span>

    <form action="#" class="form form__contact">

        <div class="form__contact-wrap">
            <div class="form__row">
                <input type="text" required placeholder="<?= Yii::t('app', 'form_name_txt') ?>*"  name="name" class="form__input">
                <input type="text" required placeholder="<?= Yii::t('app', 'form_phone_txt') ?>*"  name="phone" class="form__input" id="phone">
            </div>
            <textarea name="comment" placeholder="<?= Yii::t('app', 'form_message_txt') ?>" class="form__input form__textarea" required></textarea>
        </div>

        <div class="contact__form-hide">
            <div class="modal__content">
                <div class="check">
                    <div id="check-part-1" class="check__sign"></div>
                    <div id="check-part-2" class="check__sign"></div>
                </div>
                <div class="description">
                    <p><strong>Спасибо!</strong><br>Ваши контакты отправлены отделу продаж и в скором времени с Вами свяжется наш менеджер </p>
                </div>
            </div>
        </div>

        <button class="btn btn_beige form__btn contact__btn" type="submit"><?= Yii::t('app', 'submit_txt') ?></button>
    </form>

</section>
