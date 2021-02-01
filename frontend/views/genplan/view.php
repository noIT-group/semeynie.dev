<?php

/**
 * @var $this View
 * @var $section_id string
 * @var $floorModels array
 * @var $floorModel array
 */

use frontend\widgets\SocialNetworkWidget;
use yii\web\View;

switch ($section_id) {
    case 151:
        $section_number = 1;
        break;
    case 152:
        $section_number = 2;
        break;
    case 153:
        $section_number = 3;
        break;
    case 154:
        $section_number = 4;
        break;
    default:
        $section_number = '';
        break;
}

$this->title = Yii::t('app', 'section_txt') . " № {$section_number}";

?>
<!-- DESKTOP -->
<section class="hero fix">
    <div class="hero__inner">

        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>

        <div class="section__wrap">
            <span class="title"><?= Yii::t('app', 'select_flat_txt') ?></span>

            <div class="section__inner">

                <?php if ($floorModels) : ?>

                    <?php if (in_array($section_id, [151, 152, 153, 154])) : ?>
                        <img src="/img/section1.png" class="section__img">
                    <?php else : ?>
                        <img src="/img/section2.png" class="section__img">
                    <?php endif ?>

                    <!-- SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="1715" height="925" viewBox="0 0 1715 925"
                         class="section__svg">

                        <?php foreach ($floorModels as $floorModel) : ?>
                            <?php if ($floorModel->available_flats) : ?>
                                <a href="#"
                                   data-iframe-src="<?= $floorModel->iframe_url ?>"
                                   class="section__svg-item js_popup_open"
                                >
                                    <path data-level="<?= $floorModel->number_txt ?>"
                                          data-desc="<?= $floorModel->available_flats_txt ?>"
                                          class="section__path floors__element"
                                          d="<?= $floorModel->coordinate ?>"
                                    ></path>
                                </a>
                            <?php endif ?>
                        <?php endforeach ?>

                        <image xlink:href="/img/pin-section-empty.svg" clip-path="url(#clip-ff)" width="118"
                               height="149" x="400" y="25" class="section__pin"></image>

                        <?php if (in_array($section_id, [151, 152])) : ?>

                            <text x="450" y="80" class="section__pin pin-text1"><?= $section_number ?></text>
                            <text x="430" y="98"
                                  class="section__pin pin-text2"><?= mb_strtolower(Yii::t('app', 'section_txt')) ?></text>

                        <?php else : ?>
                            <text x="735" y="50" class="section__pin pin-text3">2</text>
                            <text x="719" y="65" class="section__pin pin-text4">секция</text>
                        <?php endif ?>

                    </svg>
                    <!-- SVG -->

                    <div class="floors__popup">
                        <span class="floors__level"></span>
                        <span class="floors__desc"></span>
                    </div>

                    <a href="#" data-iframe-src="<?= Yii::$app->estateWidget->getProjectUrl() ?>/1/filter"
                       class="params btn btn_beige-dark info-modal__btn section__btn js_popup_open"><?= Yii::t('app', 'select_by_params_txt') ?></a>

                <?php endif ?>

            </div>

        </div>
    </div>
</section>
<!-- DESKTOP -->

<!-- MOBILE -->
<section class="section_mob">
    <iframe src="<?= Yii::$app->estateWidget->getProjectUrl() . '/1/filter' ?>" frameborder="0"></iframe>
</section>
<!-- MOBILE -->

<svg class="inline-svg">
    <symbol id="check" viewbox="0 0 12 10">
        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
    </symbol>
</svg>
