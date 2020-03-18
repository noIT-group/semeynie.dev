<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->response->statusCode . ' ' . Yii::t('app', 'error__label');

?>
<div class="ni-error-tilda">
    <svg class="ni-error-tilda__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2567 683">
        <path transform="translate(351 -122)" d="M2162.022 432.616c-414.983 445.301-877.335 450.113-1338.834 180.18-394.152-230.54-556-224.695-867.872 143.334-40.873 25.513-139.967 98.754-262.577-5.484-109.534-93.122 21.212-234.866 21.212-234.866C164.353-7.953 591.064 80.658 962.68 298.284 1310.796 502.148 1512.536 569.524 1887 182c11.373-11.372 185.433-127.448 288.858-2.708 97.892 118.06-14.126 253.05-13.835 253.324z"></path>
    </svg>
</div>
<div class="ni-error-main">
    <div class="ni-error-main-content">
        <div class="ni-error-main__number">
            <p><?= Yii::$app->response->statusCode ?></p>
        </div>
        <div class="ni-error-main__description">
            <p><?= nl2br(Html::encode($message)) ?></p>
        </div><a class="ni-error-main__btn" href="<?= Url::to(['site/index']) ?>"><?= Yii::t('app', 'home_page__button_txt') ?></a>
    </div>
</div>

