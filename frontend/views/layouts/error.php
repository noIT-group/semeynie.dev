<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\ErrorAsset;

ErrorAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= Html::encode($this->title) ?></title>
    <?= $this->render('_components/_favicon') ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="ni-error">
    <header class="ni-error-header">
        <div class="wrap">
            <p>&nbsp;</p>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer class="ni-error-footer">
        <div class="wrap">
            <div class="ni-error-footer-container">
                <div class="ni-error-footer-contacts">
                    <ul class="ni-error-footer-contacts-list">
                        <?php if ( ($address = Yii::$app->siteSettingsComponent->getAddress()) ) : ?>
                            <li class="ni-error-footer-contacts-list__item">
                                <div class="ni-error-footer-contacts-list__item-icon">
                                    <svg class="ni-icon ni-icon-pin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 15 20">
                                        <path transform="translate(-142 -900)" d="M149.5 900a7.5 7.5 0 0 1 7.5 7.5c0 7.422-7.5 12.5-7.5 12.5s-7.5-5.078-7.5-12.5a7.5 7.5 0 0 1 7.5-7.5zm-2.833 7.91c0 1.606 1.268 2.908 2.833 2.908 1.565 0 2.833-1.302 2.833-2.909 0-1.606-1.268-2.909-2.833-2.909-1.565 0-2.833 1.303-2.833 2.91z"></path>
                                    </svg>
                                </div>
                                <div class="ni-error-footer-contacts-list__item-text">
                                    <p><?= $address ?></p>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if ( ($phone = Yii::$app->siteSettingsComponent->getPhones(false)) ) : ?>

                            <li class="ni-error-footer-contacts-list__item">
                                <div class="ni-error-footer-contacts-list__item-icon">
                                    <svg class="ni-icon ni-icon-iphone" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 13 20">
                                        <path transform="translate(-573 -900)" d="M575.6 900h7.8c1.436 0 2.6 1.12 2.6 2.5v15c0 1.38-1.164 2.5-2.6 2.5h-7.8c-1.436 0-2.6-1.12-2.6-2.5v-15c0-1.38 1.164-2.5 2.6-2.5zm-.6 4v10c0 .69 1.182 1 1.9 1h5.2c.718 0 1.9-.31 1.9-1v-10c0-.69-1.282-2-2-2h-5c-.718 0-2 1.31-2 2zm3.014 13.5c0 .828.665 1.5 1.486 1.5.82 0 1.486-.672 1.486-1.5s-.665-1.5-1.486-1.5c-.82 0-1.486.672-1.486 1.5z"></path>
                                    </svg>
                                </div>
                                <div class="ni-error-footer-contacts-list__item-text ni-error-footer-contacts-list__item-text--phone">
                                    <a class="u-no-wrap" href="tel:<?= $phone['phone_link'] ?>"><?= $phone['phone_anchor'] ?></a>
                                </div>
                            </li>
                        <?php endif ?>
                        <?php if ( ($email = Yii::$app->siteSettingsComponent->getEmail()) ) : ?>
                            <li class="ni-error-footer-contacts-list__item">
                                <div class="ni-error-footer-contacts-list__item-icon">
                                    <svg class="ni-icon ni-icon-letter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 15">
                                        <path transform="translate(-893 -903)" d="M895.5 903h15a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-15a2.5 2.5 0 0 1-2.5-2.5v-10a2.5 2.5 0 0 1 2.5-2.5zm-.5 4v7c0 .69 1.31 2 2 2h12c.69 0 2-1.31 2-2v-7c0-.275-.207-.647-.5-.996v.746L903 913l-7.5-6.25v-.746c-.293.349-.5.721-.5.996zm14-2h-12c-.275 0-.647.207-.996.5h.746l6.25 5 6.25-5h.746c-.349-.293-.721-.5-.996-.5z"></path>
                                    </svg>
                                </div>

                                <div class="ni-error-footer-contacts-list__item-text">
                                    <a class="u-no-wrap" href="mailto:<?= $email ?>"><?= $email ?></a>
                                </div>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
