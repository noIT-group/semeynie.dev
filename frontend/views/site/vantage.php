<?php

/**
 * @var $this View
 * @var $model TerracesSectionSettings
 */

use common\models\settings\TerracesSectionSettings;
use frontend\widgets\MainSectionWidget;
use yii\helpers\Html;
use yii\web\View;

$terraces_title = Yii::$app->languageHelper->getSettingsAttribute('TerracesSectionSettings.title');
$terraces_name = Yii::$app->languageHelper->getSettingsAttribute('TerracesSectionSettings.name');
$terraces_body = Yii::$app->languageHelper->getSettingsAttribute('TerracesSectionSettings.body');

$disposition_title = Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.title');
$disposition_name = Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.name');
$disposition_body_1 = Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.body_1');
$disposition_short_message = Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.short_message');
$disposition_body_2 = Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.body_2');
$disposition_list = @unserialize(Yii::$app->languageHelper->getSettingsAttribute('DispositionSectionSettings.list'));

$ergonomic_title = Yii::$app->languageHelper->getSettingsAttribute('ErgonomicSectionSettings.title');
$ergonomic_name = Yii::$app->languageHelper->getSettingsAttribute('ErgonomicSectionSettings.name');
$ergonomic_list = @unserialize(Yii::$app->languageHelper->getSettingsAttribute('ErgonomicSectionSettings.list'));

$installment_plan_title = Yii::$app->languageHelper->getSettingsAttribute('InstallmentPlanSectionSettings.title');
$installment_plan_name = Yii::$app->languageHelper->getSettingsAttribute('InstallmentPlanSectionSettings.name');
$installment_plan_list = @unserialize(Yii::$app->languageHelper->getSettingsAttribute('InstallmentPlanSectionSettings.list'));
$installment_plan_button_text = Yii::$app->languageHelper->getSettingsAttribute('InstallmentPlanSectionSettings.button_text');

?>
<?= MainSectionWidget::widget(['view' => 'vantage']) ?>
<main>

    <section class="vantage_page_terraces" id="terraces">
        <div class="boxes">

            <?php if($gallery_images = $model->getGallery()) : ?>
                <div class="normal_slider center_dots dark_dots left">
                    <?php foreach($gallery_images as $single_gallery_image) : ?>
                        <div class="slide">
                            <?= Html::img($single_gallery_image->getUrl('thumb_slider')) ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="right">
                <div class="section_number">
                    <div class="bg move_on_scroll" data-move-acselerat="10">
                        <img src="/img/numbers/bg_03.png" alt="<?= $terraces_title ?>">
                    </div>
                    <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                        <div class="count">01</div>
                        <h2 class="section_number_name"><?= $terraces_title ?></h2>
                    </div>
                </div>
                <div class="description">
                    <?php if($terraces_name) : ?>
                        <p><?= $terraces_name ?></p>
                    <?php endif ?>
                    <?php if($terraces_body) : ?>
                        <?= $terraces_body ?>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </section>

    <section class="vantage_page_location" id="location">

        <div class="fly_numbers top move_on_scroll" data-move-acselerat="20">AT</div>

        <div class="fly_numbers bottom move_on_scroll" data-move-acselerat="20">M</div>

        <img class="design_img move_on_scroll" src="/img/vantage_page_location_block.png" alt="<?= $disposition_title ?>" data-move-acselerat="25">

        <div class="section_number">
            <div class="bg move_on_scroll" data-move-acselerat="10">
                <img src="/img/numbers/bg_02.png" alt="<?= $disposition_title ?> 2">
            </div>
            <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                <div class="count tight">02</div>
                <div class="section_number_name"><?= $disposition_title ?></div>
            </div>
        </div>

        <h2 class="head width_limit move_on_scroll" data-move-acselerat="30"><?= $disposition_name ?></h2>

        <?php if($disposition_body_1) : ?>
            <div class="paragraph width_limit move_on_scroll" data-move-acselerat="30">
                <?= $disposition_body_1 ?>
            </div>
        <?php endif ?>

        <?php if($disposition_short_message) : ?>
            <h4 class="small_head width_limit move_on_scroll" data-move-acselerat="30"><?= $disposition_short_message ?></h4>
        <?php endif ?>

        <?php if($disposition_body_2) : ?>
            <div class="paragraph width_limit move_on_scroll" data-move-acselerat="30">
                <?= $disposition_body_2 ?>
            </div>
        <?php endif ?>

        <?php if($disposition_list) : ?>
            <?php $disposition_list = array_values($disposition_list) ?>
            <div class="boxes">
                <div class="item business_centers left move_on_scroll" data-move-acselerat="10">
                    <div class="img_wrp">
                        <img src="/img/location_boxes_business_centers.jpg" alt="<?= $disposition_list[0]['name'] ?>">
                        <span class="name">
                        <span class="text_wrp"><?= $disposition_list[0]['name'] ?></span>
                    </span>
                    </div>
                    <div class="description"><?= $disposition_list[0]['body'] ?></div>
                </div>
                <div class="item among_nature right move_on_scroll" data-move-acselerat="20">
                    <div class="img_wrp">
                        <img src="/img/among_nature.jpg" alt="<?= $disposition_list[1]['name'] ?>">
                        <span class="name">
                        <span class="text_wrp"><?= $disposition_list[1]['name'] ?></span>
                    </span>
                    </div>
                    <div class="description"><?= $disposition_list[1]['body'] ?></div>
                </div>
            </div>
        <?php endif ?>

    </section>

    <section class="vantage_page_ergonomics" id="ergonomics">

        <div class="boxes">
            <div class="section_number">
                <div class="bg move_on_scroll" data-move-acselerat="10">
                    <img src="/img/numbers/bg_01.png" alt="<?= $ergonomic_title ?>">
                </div>
                <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                    <div class="count tight">03</div>
                    <div class="section_number_name"><?= $ergonomic_title ?></div>
                </div>
            </div>
            <h2 class="head move_on_scroll" data-move-acselerat="20"><?= $ergonomic_name ?></h2>
        </div>

        <?php if($ergonomic_list) : ?>
            <?php $ergonomic_list = array_values($ergonomic_list) ?>
            <?php $ergonomic_list_images = ['commercial-pool-new.jpg', 'vel.png', 'lift.png', 'car.png', 'parking-new.jpg', 'lifts.png', 'laung.png' ] ?>
            <div class="pseudo_grids">
                <?php foreach($ergonomic_list as $index => $single_item) : ?>
                    <div class="pseudo_grid">
                        <div class="item_name">
                            <div class="bg">
                                <img class="move_on_scroll" src="/img/vantages_page/<?= $ergonomic_list_images[$index] ?>" alt="<?= $single_item['name'] ?>" data-move-acselerat="20">
                                <span class="letter move_on_scroll" data-move-acselerat="10"><?= $single_item['character'] ?></span>
                            </div>
                            <h4 class="h4 move_on_scroll" data-move-acselerat="25"><?= $single_item['name'] ?></h4>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    </section>

    <section class="vantage_page_installment_plan" id="installment_plan">

        <div class="boxes">

            <div class="left">
                <div class="section_number">
                    <div class="bg move_on_scroll" data-move-acselerat="10">
                        <img src="/img/numbers/bg_03.png" alt="<?= $installment_plan_title ?>">
                    </div>
                    <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                        <div class="count tight">04</div>
                        <div class="section_number_name"><?= $installment_plan_title ?></div>
                    </div>
                </div>
                <?php if($installment_plan_name) : ?>
                    <h2 class="main_head"><?= $installment_plan_name ?></h2>
                <?php endif ?>
                <div class="btn_wrp">
                    <a class="btn lines popup_open" href="#" data-popup-type="consultation">
                        <span class="design"><span></span><span></span><span></span><span></span></span>
                        <span class="text"><?= $installment_plan_button_text ?></span>
                    </a>
                </div>
            </div>

            <?php if($installment_plan_list) : ?>
                <?php $installment_plan_list = array_values($installment_plan_list) ?>
                <div class="right few_numbers_section">
                    <div class="item move_on_scroll" data-move-acselerat="10"><span class="design"><span></span><span></span><span></span><span></span></span>
                        <div class="main_info">
                            <div class="head"><?= $installment_plan_list[0]['number'] ?></div>
                            <div class="text"><?= $installment_plan_list[0]['body'] ?></div>
                        </div>
                    </div>
                    <div class="item move_on_scroll" data-move-acselerat="25"><span class="design"><span></span><span></span><span></span><span></span></span>
                        <div class="main_info">
                            <div class="head"><?= $installment_plan_list[1]['number'] ?></div>
                            <div class="text"><?= $installment_plan_list[1]['body'] ?></div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

    </section>

</main>