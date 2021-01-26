<?php

/**
 * @var $this View
 * @var $models Gallery
 * @var $model Gallery
 */

use frontend\models\Gallery;
use frontend\widgets\SocialNetworkWidget;
use yii\web\View;

$this->title = Yii::t('app', 'gallery_txt');

?>
<section class="hero fix">
    <div class="hero__inner">

        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>

        <div class="gallery-new">
            <span class="title"><?= Yii::t('app', 'gallery_txt') ?></span>

            <?php if ($models) : ?>

                <div class="gallery-new__slider">
                    <?php foreach ($models as $model) : ?>
                        <div class="gallery-new__slide">
                            <div class="gallery-new__item">
                                <?php if ($model->image) : ?>
                                    <img data-lazy="<?= $model->image_thumb ?>">
                                <?php endif ?>
                            </div>
                            <div class="gallery-new__desc">
                                <?= $model->caption ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="gallery__slider_mob">
                    <div class="gallery__slide_mob">
                        <img data-lazy="/img/gallery__slide1.jpg">
                    </div>
                    <div class="gallery__slide_mob">
                        <img data-lazy="/img/gallery__slide2.jpg">
                    </div>
                    <div class="gallery__slide_mob">
                        <img data-lazy="/img/gallery__slide1.jpg">
                    </div>
                </div>

                <div class="gallery-new__arrow">
                    <div class="gallery__arrow-prev"><i class="icon-arrow"></i></div>
                    <div class="gallery__arrow-next"><i class="icon-arrow"></i></div>
                </div>

            <?php endif ?>

        </div>

    </div>
</section>
