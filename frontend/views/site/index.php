<?php

/**
 * @var $this View
 * @var $homeSliderModels MultiSlider
 * @var $homeSliderModel MultiSlider
 * @var $aboutProjectSettings AboutProjectSettings
 * @var $featuresSettings FeaturesSettings
 * @var $installmentApartmentSettings InstallmentApartmentSettings
 * @var $aboutDeveloperSettings AboutDeveloperSettings
 * @var $documentModels Document
 * @var $documentModel Document
 * @var $developerObjectModels DeveloperObject
 * @var $developerObjectModel DeveloperObject
 */

use frontend\models\AboutDeveloperSettings;
use frontend\models\AboutProjectSettings;
use frontend\models\DeveloperObject;
use frontend\models\Document;
use frontend\models\FeaturesSettings;
use frontend\models\InstallmentApartmentSettings;
use frontend\models\MultiSlider;
use frontend\widgets\InfrastructureWidget;
use frontend\widgets\SocialNetworkWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = Yii::t('app', 'logotype_company_txt');

?>
<section class="hero fix">
    <div class="hero__inner">

        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>

        <?php if ($homeSliderModels) : ?>
            <div class="hero__slider-wrap">
                <div class="hero__slider">
                    <?php foreach ($homeSliderModels as $homeSliderModel) : ?>
                        <div class="hero__slide"
                             style="background-image: url(<?= $homeSliderModel->image_thumb ?>)"></div>
                    <?php endforeach ?>
                </div>
                <div class="hero__arrow">
                    <div class="hero__arrow-prev"><i class="icon-arrow"></i></div>
                    <div class="hero__arrow-next"><i class="icon-arrow"></i></div>
                </div>
            </div>
        <?php endif ?>

    </div>
</section>

<?php if (isset($aboutProjectSettings['name'], $aboutProjectSettings['body']) && ($aboutProjectSettings['name'] || $aboutProjectSettings['body'])) : ?>
    <section class="about fix">
        <div class="title about__title hide"><?= Yii::t('app', 'about_project_txt') ?></div>
        <div class="about__wrap" id="about-project">
            <div class="about_left">
                <div class="about__img">
                    <img src="/img/about-img.jpg">
                </div>
            </div>
            <div class="about_right">
                <div class="about__content">
                    <div class="title about__title"><?= $aboutProjectSettings['name'] ?></div>
                    <div class="about__text">
                        <?= $aboutProjectSettings['body'] ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<?php if (isset($featuresSettings['list']) && ($featuresSettings = $featuresSettings['list'])) : ?>
    <section class="advantage fix">
        <?php $featuresImageNumber = 1 ?>
        <?php foreach ($featuresSettings as $featuresSettingsIndex => $featuresSettingsItem) : ?>
            <div class="advantage__item">
                <div class="advantage__icon">
                    <img src="/img/advantage-<?= $featuresImageNumber ?>.png?19912">
                </div>
                <div class="advantage__content">
                    <div class="advantage__title">
                        <span><?= $featuresSettingsItem['name'] ?></span>
                    </div>
                    <div class="advantage__text"><?= $featuresSettingsItem['body'] ?></div>
                </div>
            </div>
            <?php $featuresImageNumber++ ?>
        <?php endforeach ?>
    </section>
<?php endif ?>

<?php if (isset($installmentApartmentSettings['name'], $installmentApartmentSettings['body']) && ($installmentApartmentSettings['name'] || $installmentApartmentSettings['body'])) : ?>
    <section class="installment">
        <div class="installment__inner">
            <div class="installment_left">
                <div class="installment__img">
                    <img src="/img/installment-img.jpg" data-src="/img/installment-img.jpg">
                </div>
            </div>
            <div class="installment_right">
                <div class="installment__content">
                    <span class="installment__subtitle"><?= $installmentApartmentSettings['name'] ?></span>
                    <?= $installmentApartmentSettings['body'] ?>
                    <button type="button" data-remodal-target="modal__more"
                            class="btn btn_beige installment__btn"><?= Yii::t('app', 'know_more_txt') ?></button>
                </div>
            </div>
        </div>
        <div class="installment__inform">
            <div class="installment_left installment__svg">
                <div class="installment__bg-img">
                    <img src="/img/installment-tree.svg" data-src="/img/installment-tree.svg">
                </div>
            </div>
            <div class="installment_right installment__description">
                <span class="installment__title">У нас в наличии более 20 разных планировочных решений</span>
                <span class="installment__desc">Выберите наиболее подходящее</span>
                <div class="installment__wrap-button">
                    <a href="<?= Url::to(['genplan/index']) ?>"
                       class="btn btn_transparent installment__btn installment__btn_mob">
                        <i class="icon icon-click"></i><?= Yii::t('app', 'select_from_genplan_txt') ?></a>
                    <a href="#" data-iframe-src="<?= Yii::$app->estateWidget->getProjectUrl() ?>/1/filter"
                       class="btn btn_transparent installment__btn js_popup_open"><i class="icon">
                            <img src="/img/svg/nastroiki.svg"></i><?= Yii::t('app', 'search_by_params_txt') ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<section class="location fix" id="infrastructure">
    <span class="title location__title">Расположение и инфраструктура</span>
    <div class="location__inner">
        <div class="location_left">
            <div class="location__img">
                <img src="/img/about-img.jpg">
            </div>
        </div>
        <div class="location_right">
            <p class="location__text">Таирова заслуженно считается лучшим спальным районом Одессы. Южный рынок, ТЦ
                “Панорама”, “Сити-Центр“, кинотеатры “IMax” и “Золотой Дюк”, мини-рынки со свежими овощами и фруктами,
                магазины на все случаи жизни, детские развлекательные и обучающие центры, детско-юношеский ФК
                “Черноморец”, стадион и даже теннисные корты. Жителям Таирова нет необходимости совершать длительные
                поездки, чтобы закупить продукты, приодеться или интересно провести свободное время. Даже море здесь
                значительно ближе, чем может показаться. Вкусная еда, модные бренды, спорт и захватывающая индустрия
                развлечений – на Таирова есть всё!</p>
        </div>
    </div>
</section>

<?= InfrastructureWidget::widget() ?>

<section class="project fix">
    <span class="title project__title"><?= Yii::t('app', 'developer_projects_txt') ?></span>
    <div class="project__wrap">

        <?php if (isset($aboutDeveloperSettings['body']) && $aboutDeveloperSettings['body']): ?>
            <div class="project__text">
                <?= $aboutDeveloperSettings['body'] ?>
            </div>
        <?php endif ?>

        <?php if ($documentModels) : ?>
            <div class="documentation">
                <?php foreach ($documentModels as $documentIndex => $documentModel) : ?>
                    <?php if ($documentIndex === 0) : ?>
                        <a href="<?= $documentModel->image_big_thumb ?>" class="btn btn_beige project__btn"
                           data-lightbox="doc_1"><?= Yii::t('app', 'document_txt') ?></a>
                    <?php else : ?>
                        <a href="<?= $documentModel->image_big_thumb ?>" data-lightbox="doc_1"></a>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if ($developerObjectModels) : ?>
            <div class="project__inner">
                <?php foreach ($developerObjectModels as $developerObjectModel) : ?>
                    <div class="project__item">
                        <div class="project__img"
                             style="background-image: url(<?= $developerObjectModel->illustration_image ?>)">
                            <div class="project__logo">
                                <?= Html::img($developerObjectModel->image_logo_big_thumb) ?>
                            </div>
                        </div>
                        <div class="project__desc">
                            <?= $developerObjectModel->body ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    </div>
</section>
