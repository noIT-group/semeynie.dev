<?php

/**
 * @var $this View
 */

use frontend\widgets\DocumentListWidget;
use frontend\widgets\MainSectionWidget;
use frontend\widgets\MessengersWidget;
use frontend\widgets\SliderAdvantageWidget;
use frontend\widgets\SocialNetworksWidget;
use noIT\core\helpers\Url;
use yii\web\View;

$first_serve_name = Yii::$app->languageHelper->getSettingsAttribute('FirstServeSectionSettings.name');
$first_serve_title = Yii::$app->languageHelper->getSettingsAttribute('FirstServeSectionSettings.title');
$first_serve_body = Yii::$app->languageHelper->getSettingsAttribute('FirstServeSectionSettings.body');

$what_is_atmo_name = Yii::$app->languageHelper->getSettingsAttribute('WhatIsAtmosphereSectionSettings.name');
$what_is_atmo_title = Yii::$app->languageHelper->getSettingsAttribute('WhatIsAtmosphereSectionSettings.title');
$what_is_atmo_body = Yii::$app->languageHelper->getSettingsAttribute('WhatIsAtmosphereSectionSettings.body');
$what_is_atmo_link_anchor = Yii::$app->languageHelper->getSettingsAttribute('WhatIsAtmosphereSectionSettings.link_anchor');
$what_is_atmo_link_url = Yii::$app->languageHelper->getSettingsAttribute('WhatIsAtmosphereSectionSettings.link_url');

$number_list = @unserialize( Yii::$app->languageHelper->getSettingsAttribute('NumberSectionSettings.list') );

$live_no_without_home_name = Yii::$app->languageHelper->getSettingsAttribute('LiveNoWithoutHomeSectionSettings.name');
$live_no_without_home_title = Yii::$app->languageHelper->getSettingsAttribute('LiveNoWithoutHomeSectionSettings.title');
$live_no_without_home_body = Yii::$app->languageHelper->getSettingsAttribute('LiveNoWithoutHomeSectionSettings.body');
$live_no_without_home_video = Yii::$app->settings->get('LiveNoWithoutHomeSectionSettings.video');

?>
<?= MainSectionWidget::widget(['view' => 'about']) ?>
<main>

    <section class="main_content from_whoo_section">
        <div class="content_wrap">
            <div class="loop_block">
                <img class="move_on_scroll" src="/img/from_whoo_section.png" alt="" data-move-acselerat="60">
            </div>
            <div class="text_cont">
                <p class="small_deckription move_on_scroll" data-move-acselerat="20"><?= $first_serve_name ?></p>
                <h2 class="head move_on_scroll" data-move-acselerat="20"><?= $first_serve_title ?></h2>
                <?php if($first_serve_body) : ?>
                    <div class="main_description move_on_scroll" data-move-acselerat="20"><?= $first_serve_body ?></div>
                <?php endif ?>
            </div>
        </div>
    </section>

    <section class="main_content house_with_atmosphere">
        <div class="fly_letters move_on_scroll" data-move-acselerat="10">АТ</div>
        <div class="main_bg_img">
            <img src="/img/house_with_atmosphere.jpg" alt="АТМОСФЕРА <?= date('Y') ?>">
            <div class="main_text_content text_cont move_on_scroll" data-move-acselerat="20">
                <?php if($what_is_atmo_link_url && $what_is_atmo_link_anchor) : ?>
                    <div class="btn_wrp">
                        <a class="btn lines" href="<?= $what_is_atmo_link_url ?>">
                            <span class="design"><span></span><span></span><span></span><span></span></span>
                            <span class="text"><?= $what_is_atmo_link_anchor ?></span>
                        </a>
                    </div>
                <?php endif ?>
                <p class="small_deckription"><?= $what_is_atmo_name ?></p>
                <?php if($what_is_atmo_title) : ?>
                    <h2 class="head"><?= $what_is_atmo_title ?></h2>
                <?php endif ?>
                <?php if($what_is_atmo_body) : ?>
                    <div class="main_description"><?= $what_is_atmo_body ?></div>
                <?php endif ?>
            </div>
        </div>
    </section>

    <?php if($number_list) : ?>
        <?php $number_list = array_values($number_list) ?>
        <section class="few_numbers_section">
            <div class="content_wrap">
                <div class="item top1 move_on_scroll" data-move-acselerat="18">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <div class="main_info">
                        <div class="head"><?= $number_list[0]['number'] ?></div>
                        <div class="text"><?= $number_list[0]['body'] ?></div>
                    </div>
                </div>
                <div class="item move_on_scroll" data-move-acselerat="8">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <div class="main_info">
                        <div class="head"><?= $number_list[1]['number'] ?></div>
                        <div class="text"><?= $number_list[1]['body'] ?></div>
                    </div>
                </div>
                <div class="item top2 move_on_scroll" data-move-acselerat="35">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <div class="main_info">
                        <div class="head"><?= $number_list[2]['number'] ?></div>
                        <div class="text"><?= $number_list[2]['body'] ?></div>
                    </div>
                </div>
                <div class="item top1 move_on_scroll" data-move-acselerat="10">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <div class="main_info">
                        <div class="head"><?= $number_list[3]['number'] ?></div>
                        <div class="text"><?= $number_list[3]['body'] ?></div>
                    </div>
                </div>
                <div class="item move_on_scroll" data-move-acselerat="30">
                    <span class="design"><span></span><span></span><span></span><span></span></span>
                    <div class="main_info">
                        <div class="head"><?= $number_list[4]['number'] ?></div>
                        <div class="text"><?= $number_list[4]['body'] ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>

    <section class="main_content without_leaving_home">
        <div class="content_wrap">
            <div class="loop_block">
                <img class="move_on_scroll" src="/img/gallery-new.jpg" alt="Атмосфера" data-move-acselerat="20">
            </div>
            <div class="text_cont">
                <p class="small_deckription move_on_scroll" data-move-acselerat="20"><?= $live_no_without_home_name ?></p>
                <?php if($live_no_without_home_title) : ?>
                    <h2 class="head move_on_scroll" data-move-acselerat="20"><?= $live_no_without_home_title ?></h2>
                <?php endif ?>
                <?php if($live_no_without_home_body) : ?>
                    <div class="main_description move_on_scroll" data-move-acselerat="20"><?= $live_no_without_home_body ?></div>
                <?php endif ?>
                <div class="item_button" style="margin-top: 20px">
                    <a class="btn lines" href="<?= Url::to(['site/vantage']) ?>">
                        <span class="design"><span></span><span></span><span></span><span></span></span>
                        <span class="text"><?= Yii::t('app', 'more_details__button_txt') ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?= DocumentListWidget::widget(['view' => 'block_1']) ?>
    <?= SliderAdvantageWidget::widget(['type' => 'about']) ?>

</main>
