<?php

/**
 * @var $this View
 */

use yii\web\View;

$items = Yii::$app->siteSettingsComponent->getSocialNetwork();

foreach($items as $item) {
    if($item['link_type'] === 'telegram') {
        $telegram_url = $item['link_url'];
        break;
    } else {
        $telegram_url = null;
    }
}

?>
<div class="popup-gull">
    <div class="popup-gull__btn-close"></div>
    <div class="popup-gull__text-block">
        <p class="popup-gull__text"></p>
        <div class="popup-gull__btns-wrap">
            <?php if($telegram_url) : ?>
                <a class="popup-gull__tel-link" href="<?= $telegram_url ?>" target="_blank" rel="nofollow">
                    <img class="popup-gull__tel-link-img" src="/img/popups/telegram.svg">Перейти в чат &#187;
                </a>
            <?php endif ?>
            <div class="popup-gull__close-for-session"><?= Yii::t('app', 'fuck_off_gull') ?></div>
        </div>
        <div class="popup-gull__text-block-arrow">
            <img src="/img/popups/arrow.png" alt="Arrow">
        </div>
    </div>
    <div class="popup-gull__img-wrap">
        <div class="popup-gull__img">
            <img class="popup-gull__img-open" src="/img/popups2/gull.svg" width="95" height="76">
            <img class="popup-gull__img-close" src="/img/popups2/gull-close-eyes.svg" width="95" height="76">
        </div>
        <div class="popup-gull__img popup-gull__img-mob">
            <img class="popup-gull__img-open" src="/img/popups2/gull-mob.svg" width="110" height="182">
            <img class="popup-gull__img-close" src="/img/popups2/gull-close-eyes-mob.svg" width="110" height="182">
        </div>
    </div>
</div>