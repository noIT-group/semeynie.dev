<?php

/**
 * @var $this View
 * @var $documentModels Document
 * @var $documentModel Document
 * @var $developerObjectModels DeveloperObject
 * @var $developerObjectModel DeveloperObject
 */

use frontend\models\DeveloperObject;
use frontend\models\Document;
use frontend\widgets\SocialNetworkWidget;
use yii\helpers\Html;
use yii\web\View;

$this->title = Yii::t('app', 'about_us_txt');

?>
<section class="hero fix">
    <div class="hero__inner">
        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>
    </div>
</section>

<section class="developer__hero fix">
    <h2 class="title"><?= Yii::t('app', 'about_us_txt') ?></h2>
    <p class="developer__desc">C гордостью и чувством ответственности за будущее любимого многими микрорайона Таирова,
        мы представляем наш новый жилой комплекс <strong>СЕМЕЙНЫЕ ТРАДИЦИИ</strong>. Мы вложили в него наш обширный опыт
        создания особых домов и по-настоящему комфортного жилья. Уверены, он станет реализацией актуальных потребностей
        бурно развивающегося спального района Одессы.</p>
    <div class="developer__hero-img">
        <img src="/img/developer-desc.jpg">
    </div>
    <div class="developer__hero-link">
        <a href="#" class="btn btn_beige"><?= Yii::t('app', 'select_flat_txt') ?></a>
        <a href="#" class="btn__link"><?= Yii::t('app', 'watch_gallery_txt') ?> <img src="/img/arrows-btn-link.svg"
                                                                                     class="btn__link-img"></a>
    </div>
</section>

<?php if ($documentModels) : ?>
    <section class="documents fix">
        <h2 class="title"><?= Yii::t('app', 'document_txt') ?></h2>

        <div class="documents__wrap">

            <?php foreach ($documentModels as $documentModel) : ?>
                <div class="documents__item">
                    <a href="<?= $documentModel->image_big_thumb ?>" data-fancybox>
                        <div class="documents__img">
                            <?= Html::img($documentModel->image_small_thumb) ?>
                        </div>
                        <p class="documents__desc"><?= $documentModel->name ?></p>
                    </a>
                </div>
            <?php endforeach ?>

        </div>

    </section>
<?php endif ?>

<?php if($developerObjectModels) : ?>
    <section class="other-projects fix">

        <h2 class="title"><?= Yii::t('app', 'another_developer_project_txt') ?></h2>

        <div class="other-projects__wrap">

            <?php foreach ($developerObjectModels as $developerObjectIndex => $developerObjectModel) : ?>

                <?php if($developerObjectIndex % 2) : ?>
                    <div class="other-projects__item other-projects__even">

                        <div class="other-projects_left">
                            <div class="other-projects_mob">
                                <?= Html::img($developerObjectModel->image_logo_big_thumb) ?>
                            </div>
                            <div class="other-projects__img">
                                <?= Html::img($developerObjectModel->illustration_image) ?>
                            </div>
                        </div>

                        <div class="other-projects_right">
                            <div class="other-projects__logo">
                                <?= Html::img($developerObjectModel->image_logo_big_thumb) ?>
                            </div>

                            <div class="other-projects__desc">
                                <?= $developerObjectModel->body ?>
                            </div>

                            <a href="<?= $developerObjectModel->link ?>" class="other-projects__link" target="_blank">
                                <?= Yii::t('app', 'go_to_website_txt', ['value' => $developerObjectModel->name]) ?>
                            </a>
                        </div>

                    </div>
                <?php else : ?>
                    <div class="other-projects__item other-projects__odd">

                        <div class="other-projects_left">
                            <div class="other-projects__logo">
                                <?= Html::img($developerObjectModel->image_logo_big_thumb) ?>
                            </div>

                            <div class="other-projects__desc">
                                <?= $developerObjectModel->body ?>
                            </div>

                            <a href="<?= $developerObjectModel->link ?>" class="other-projects__link" target="_blank">
                                <?= Yii::t('app', 'go_to_website_txt', ['value' => $developerObjectModel->name]) ?>
                            </a>
                        </div>

                        <div class="other-projects_right">
                            <div class="other-projects_mob">
                                <?= Html::img($developerObjectModel->image_logo_big_thumb) ?>
                            </div>
                            <div class="other-projects__img">
                                <?= Html::img($developerObjectModel->illustration_image) ?>
                            </div>
                        </div>

                    </div>
                <?php endif ?>

            <?php endforeach ?>

        </div>

    </section>
<?php endif ?>
