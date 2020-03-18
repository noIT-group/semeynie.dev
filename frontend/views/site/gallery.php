<?php

/**
 * @var $this View
 * @var $models Gallery
 * @var $model Gallery
 */

use common\models\Gallery;
use frontend\widgets\MainSectionWidget;
use noIT\core\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

$this->registerCss('body { background: #00263b; color: #fff; }');

$gallery_label = Yii::t('app', 'gallery__button_txt');

?>
<?= MainSectionWidget::widget(['view' => 'gallery']) ?>
<main>
    <?php if($models) : ?>
        <section class="okean_liner">

            <?php foreach($models as $model) : ?>

                <div class="margg_block centered">
                    <?php if(Yii::$app->languageHelper->getAttribute($model, 'title')) : ?>
                        <h2 class="big_head text_cont"><?= Yii::$app->languageHelper->getAttribute($model, 'title') ?></h2>
                    <?php endif ?>
                    <div class="move_on_scroll" data-move-acselerat="20">
                        <h3 class="small_head text_cont"><?= Yii::$app->languageHelper->getAttribute($model, 'name') ?></h3>
                        <div class="text_cont">
                            <?= Yii::$app->languageHelper->getAttribute($model, 'body') ?>
                        </div>
                    </div>
                </div>

                <?php if($gallery_images = $model->getBehavior('gallery')->getImages()) : ?>
                    <div class="margg_block move_on_scroll" data-move-acselerat="25">
                        <div class="slider_shadow_unwisible">
                            <?php $number = 1 ?>
                            <?php foreach($gallery_images as $image_index => $single_image) : ?>
                                <div class="slide">
                                    <?= Html::img($single_image->getUrl('thumb'), [
                                        'alt' => Yii::$app->languageHelper->getAttribute($model, 'name') . ' -  ' .$number,
                                    ]) ?>
                                </div>
                                <?php $number++ ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>

            <?php endforeach ?>

        </section>
    <?php endif ?>

    <section class="parkdesign">

        <div class="normal_slider left">
            <div class="slide"><img src="/img/galery_page/3/01_12.jpg" alt="<?= $gallery_label ?> 12"></div>
            <div class="slide"><img src="/img/galery_page/3/02_11.jpg" alt="<?= $gallery_label ?> 13"></div>
        </div>

        <div class="main_content left">
            <div class="head_block">
                <h3><?= Yii::t('app', 'gallery_promo__label') ?></h3>
                <a class="btn lines white popup_open" href="#" data-popup-type="consultation">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <span class="text"><?= Yii::t('app', 'manages_consultation__label') ?></span>
                </a>
            </div>
        </div>

        <a class="img_block right vantages" href="<?= Url::to(['site/vantage']) ?>">
            <img class="bg_img"
                 src="/img/gallery_section/vantage.jpg"
                 alt="<?= Yii::t('app', 'advantages__button_txt') ?> ЖК Атмосфера"
            >
            <div class="info">
                <span class="text"><?= Yii::t('app', 'advantages__button_txt') ?></span>
            </div>
        </a>

        <div class="more_img left">
            <img src="/img/galery_page_last_img.jpg" alt="<?= $gallery_label ?> 3">
        </div>
    </section>
</main>