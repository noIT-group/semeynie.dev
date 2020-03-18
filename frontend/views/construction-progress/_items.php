<?php

/**
 * @var $this View
 * @var $models ConstructionProgress
 * @var $single_model ConstructionProgress
 * @var $index integer
 */

use common\models\ConstructionProgress;
use yii\helpers\Html;
use yii\web\View;

$index = 0;

?>
<?php foreach($models as $single_model) : ?>
    <div class="report-accordion__item <?= ($index === 0) ? 'active' : '' ?>">
        <div class="item-line"></div>
        <div class="item-bullet">
            <img class="bullet-close" src="/img/icons/bullet.svg" alt="Close">
            <img class="bullet-open" src="/img/icons/bullet-2.svg" alt="Open">
        </div>

        <div class="item-title">

            <div class="title-text">
                <span class="title-text__short"><?= Yii::$app->languageHelper->getAttribute($single_model, 'name_short') ?></span>
                <span class="title-text__full"><?= Yii::$app->languageHelper->getAttribute($single_model, 'name_full') ?></span>
                <div class="lines"></div>
            </div>

            <div class="quality">
                <?php if($single_model->getBehavior('gallery')->getImages()) : ?>
                    <?php $photo_counter = count($single_model->getBehavior('gallery')->getImages()) ?>
                    <div class="quality__img">
                        <svg class="quality__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 21 18">
                            <path fill="#1ba0c3" d="M14.554 9.53c0 2.339-1.8 4.24-4.01 4.24-2.211 0-4.01-1.901-4.01-4.24 0-2.338 1.799-4.24 4.01-4.24 2.21 0 4.01 1.902 4.01 4.24zm6.014-4.311v10.378c0 .941-.724 1.707-1.615 1.707H2.134c-.89 0-1.615-.766-1.615-1.707V5.219c0-.936.72-1.696 1.604-1.696h.401V1.756h2.005v1.767h.442L6.308-.011h8.472l1.336 3.534h2.849c.884 0 1.603.76 1.603 1.696zM3.861 2.463h-.669v1.06h.669zM16.558 9.53c0-3.507-2.698-6.36-6.014-6.36-3.317 0-6.015 2.853-6.015 6.36s2.698 6.36 6.015 6.36c3.316 0 6.014-2.853 6.014-6.36zm2.674-3.18c0-.78-.6-1.414-1.337-1.414s-1.337.634-1.337 1.414c0 .78.6 1.413 1.337 1.413s1.337-.634 1.337-1.413z"></path>
                        </svg><span class="quality__txt"><?= $photo_counter ?></span>
                        <div class="tooltip"><?= $photo_counter ?> Фото</div>
                    </div>
                <?php endif ?>
                <?php if($single_model->videos && ($video_counter = count($single_model->videos))) : ?>
                    <div class="quality__video">
                        <svg class="quality__icon" xmlns="http://www.w3.org/2000/svg" width="25" height="17" viewBox="0 0 25 17">
                            <path d="M24.393 6.085v4.035c0 2.559-.41 4.037-1.372 4.942-.937.882-2.387 1.242-5.002 1.242H7.072c-5.388 0-6.374-2.082-6.374-6.184V6.085c0-2.117 0-3.647.831-4.685C2.381.335 3.987-.1 7.072-.1h10.947c3.016 0 4.595.408 5.45 1.409.86 1.005.924 2.543.924 4.776zM16.32 7.992a.75.75 0 0 0-.412-.666l-4.97-2.54a.774.774 0 0 0-.75.025.75.75 0 0 0-.367.643v5.095c0 .263.14.507.368.643a.776.776 0 0 0 .75.023L15.91 8.66a.75.75 0 0 0 .41-.668z"></path>
                        </svg><span class="quality__txt"><?= $video_counter ?></span>
                        <div class="tooltip"><?= $video_counter ?> <?= Yii::t('app', 'video__label') ?></div>
                    </div>
                <?php endif ?>
            </div>

        </div>

        <div class="item-content">
            <a class="btn lines white popup_open" href="#" data-popup-type="consultation">
                <span class="design"><span></span><span></span><span></span><span></span></span>
                <span class="text"><?= Yii::t('app', 'manages_consultation__label') ?></span>
            </a>
            <div class="item-content__info">
                <?= Yii::$app->languageHelper->getAttribute($single_model, 'body') ?>
            </div>

            <div class="slider_construction">
                <?php if($single_model->videos && count($single_model->videos)) : ?>
                    <?php foreach($single_model->videos as $video) : ?>
                        <div class="slide slide-video">
                            <a href="https://www.youtube.com/watch?v=<?= $video ?>" data-fancybox="gallery-<?= $index ?>">
                                <img src="/img/construction-progress/video-bg.jpg" alt="YouTube Player">
                                <svg class="video-icon" xmlns="http://www.w3.org/2000/svg" width="100" height="69" viewBox="0 0 100 69">
                                    <path d="M100 26.138v16.974c0 10.761-1.732 16.978-5.79 20.786-3.956 3.712-10.072 5.226-21.11 5.226H26.9c-22.74 0-26.9-8.76-26.9-26.012V26.138C0 17.23 0 10.798 3.507 6.43 7.102 1.95 13.88.124 26.9.124H73.1c12.728 0 19.392 1.716 23.002 5.924C99.728 10.273 100 16.745 100 26.138zM65.932 34.16a3.156 3.156 0 0 0-1.74-2.803l-20.98-10.68a3.28 3.28 0 0 0-3.161.104 3.15 3.15 0 0 0-1.551 2.702v21.432a3.15 3.15 0 0 0 1.554 2.705 3.276 3.276 0 0 0 3.166.099L64.2 36.968a3.157 3.157 0 0 0 1.732-2.808z"></path>
                                </svg>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>

                <?php if($gallery_images = $single_model->getBehavior('gallery')->getImages()) : ?>

                    <?php $number = 1 ?>

                    <?php foreach($gallery_images as $single_image) : ?>
                        <div class="slide">
                            <a href="<?= $single_image->getUrl('original') ?>" data-fancybox="gallery-<?= $index ?>">
                                <?= Html::img($single_image->getUrl('thumb'), [
                                    'alt' => Yii::$app->languageHelper->getAttribute($single_model, 'name_short') . ' - ' . $number,
                                ]) ?>
                            </a>
                        </div>
                        <?php $number++ ?>
                    <?php endforeach ?>

                <?php endif ?>

            </div>

        </div>
    </div>
    <?php $index++ ?>
<?php endforeach ?>
