<?php

/**
 * @var $this View
 * @var $multiGalleryModel MultiGallery
 * @var $constructionProgressModel ConstructionProgress
 */

use common\models\ConstructionProgress;
use common\models\MultiGallery;
use frontend\widgets\FirstQueueSection;
use frontend\widgets\MainSectionWidget;
use frontend\widgets\ProjectListWidget;
use frontend\widgets\SliderAdvantageWidget;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;

$idea_name = Yii::$app->languageHelper->getSettingsAttribute('IdeaSectionSettings.name');
$idea_title = Yii::$app->languageHelper->getSettingsAttribute('IdeaSectionSettings.title');
$idea_title_summary = Yii::$app->languageHelper->getSettingsAttribute('IdeaSectionSettings.title_summary');
$idea_body_1 = Yii::$app->languageHelper->getSettingsAttribute('IdeaSectionSettings.body_1');
$idea_body_2 = Yii::$app->languageHelper->getSettingsAttribute('IdeaSectionSettings.body_2');
$idea_video = Yii::$app->settings->get('IdeaSectionSettings.video');

$advantage_name = Yii::$app->languageHelper->getSettingsAttribute('AdvantageSectionSettings.name');
$advantage_title = Yii::$app->languageHelper->getSettingsAttribute('AdvantageSectionSettings.title');
$advantage_list = @unserialize( Yii::$app->languageHelper->getSettingsAttribute('AdvantageSectionSettings.list') );

if(!($progress_procent = Yii::$app->settings->get('ProgressBarSettings.procent'))) {

    $start_date = strtotime('01.09.2019');
    $finish_date = strtotime('31.12.2022');

    $current_date = strtotime(date('d.m.Y'));

    $total_process_time = $finish_date - $start_date;

    $single_procent = $total_process_time / 100;

    $current_time_range = $current_date - $start_date;

    $progress_procent = round($current_time_range / $single_procent);

}

?>
<?= MainSectionWidget::widget(['view' => 'home']) ?>
<main>

    <section class="main_content idea_section" id="about">

        <div class="top_line line">
            <div class="left">
                <div class="section_number">
                    <div class="bg move_on_scroll" data-move-acselerat="10"><img src="/img/numbers/bg_01.png" alt="<?= $idea_name ?>"></div>
                    <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                        <div class="count">01</div>
                        <div class="section_number_name"><?= $idea_name ?></div>
                    </div>
                </div>
            </div>
            <div class="descritpton right">
                <h2 class="h2"><?= $idea_title ?><img class="move_on_scroll" src="/img/decor_1_section.png" alt="<?= $idea_title ?>" data-move-acselerat="55"></h2>
                <?php if($idea_title_summary) : ?>
                    <div class="descritpton_contnet"><?= $idea_title_summary ?></div>
                <?php endif ?>
            </div>
        </div>

        <div class="botton_line line">

            <div class="left motto">
                <?php if($idea_body_1) : ?>
                    <div class="top"><?= $idea_body_1 ?></div>
                <?php endif ?>
                <?php if($idea_body_2) : ?>
                    <div class="botton"><?= $idea_body_2 ?></div>
                <?php endif ?>
            </div>

            <?php if( ($gallery_images = $multiGalleryModel->getBehavior('multi-gallery')->getImages()) ) : ?>
                <div class="right slider right move_on_scroll" data-move-acselerat="25">
                    <div class="slide_wrp slider_one_on_line">
                        <div class="slider_contnet">
                            <?php foreach($gallery_images as $single_gallery_image) : ?>
                                <div class="slide">
                                    <?= Html::img($single_gallery_image->getUrl('thumb_idea_section')) ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="slider_keys">
                            <button class="prev_slide arrow"></button>
                            <div class="count">
                                <div class="active">1</div>/
                                <div class="all">1</div>
                            </div>
                            <button class="next_slide arrow"></button>
                        </div>
                    </div>
                </div>
            <?php endif ?>

        </div>

    </section>

    <section class="main_content vantage_section" id="vantage">
        <div class="boxes">
            <div class="section_number">
                <div class="bg move_on_scroll move_on_scroll" data-move-acselerat="10"><img src="/img/numbers/bg_02.png" alt="<?= $advantage_name ?>"></div>
                <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                    <div class="count tight">02</div>
                    <div class="section_number_name"><?= $advantage_name ?></div>
                </div>
            </div>
            <?php if($advantage_title) : ?>
                <h2 class="h2 move_on_scroll" data-move-acselerat="20"><?= $advantage_title ?></h2>
            <?php endif ?>
        </div>

        <?php if($advantage_list) : ?>
            <?php $advantage_list = array_values($advantage_list) ?>
            <div class="vantage_items">
                <div class="vantage_item terraces">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/terraces.jpg" alt="<?= $advantage_list[0]['character'] ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll" data-move-acselerat="10"><?= $advantage_list[0]['character'] ?></span>
                        </div>
                        <h4 class="h4 move_on_scroll" data-move-acselerat="20"><?= $advantage_list[0]['name'] ?></h4>
                    </div>
                    <div class="item_description move_on_scroll" data-move-acselerat="20">
                        <span class="liner">
                            <?= $advantage_list[0]['teaser'] ?>
                            <a class="read_more" href="#"> ..<?= Yii::t('app', 'read_more__button_txt') ?></a>
                        </span>
                        <span class="hidden"><?= $advantage_list[0]['body'] ?></span>
                    </div>
                    <?php if($advantage_list[0]['link']) : ?>
                        <div class="item_button">
                            <a class="btn lines" href="<?= $advantage_list[0]['link'] ?>">
                                <span class="design"><span></span><span></span><span></span><span></span></span>
                                <span class="text"><?= Yii::t('app', 'more_details__button_txt') ?></span>
                            </a>
                        </div>
                    <?php endif ?>
                </div>

                <div class="vantage_item autonomy">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/autonomy.jpg" alt="<?= $advantage_list[1]['character'] ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll" data-move-acselerat="10"><?= $advantage_list[1]['character'] ?></span>
                        </div>
                        <h4 class="h4 move_on_scroll" data-move-acselerat="20"><?= $advantage_list[1]['name'] ?></h4>
                    </div>
                    <div class="item_description move_on_scroll" data-move-acselerat="20">
                        <span class="liner">
                            <?= $advantage_list[1]['teaser'] ?>
                            <a class="read_more" href="#"> ..<?= Yii::t('app', 'read_more__button_txt') ?></a>
                        </span>
                        <span class="hidden"><?= $advantage_list[1]['body'] ?></span>
                    </div>
                    <?php if($advantage_list[1]['link']) : ?>
                        <div class="item_button">
                            <a class="btn lines" href="<?= $advantage_list[1]['link'] ?>">
                                <span class="design"><span></span><span></span><span></span><span></span></span>
                                <span class="text"><?= Yii::t('app', 'more_details__button_txt') ?></span>
                            </a>
                        </div>
                    <?php endif ?>
                </div>

                <div class="vantage_item location">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/location.jpg" alt="<?= $advantage_list[2]['character'] ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll" data-move-acselerat="10"><?= $advantage_list[2]['character'] ?></span>
                        </div>
                        <h4 class="h4 move_on_scroll" data-move-acselerat="20"><?= $advantage_list[2]['name'] ?></h4>
                    </div>
                    <div class="item_description move_on_scroll" data-move-acselerat="20">
                        <span class="liner">
                            <?= $advantage_list[2]['teaser'] ?>
                            <a class="read_more" href="#"> ..<?= Yii::t('app', 'read_more__button_txt') ?></a>
                        </span>
                        <span class="hidden"><?= $advantage_list[2]['body'] ?></span>
                    </div>
                    <?php if($advantage_list[2]['link']) : ?>
                        <div class="item_button">
                            <a class="btn lines" href="<?= $advantage_list[2]['link'] ?>">
                                <span class="design"><span></span><span></span><span></span><span></span></span>
                                <span class="text"><?= Yii::t('app', 'more_details__button_txt') ?></span>
                            </a>
                        </div>
                    <?php endif ?>
                </div>

                <div class="vantage_item ergonomics">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/ergonomics.jpg" alt="<?= $advantage_list[3]['character'] ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll" data-move-acselerat="10"><?= $advantage_list[3]['character'] ?></span>
                        </div>
                        <h4 class="h4 move_on_scroll" data-move-acselerat="20"><?= $advantage_list[3]['name'] ?></h4>
                    </div>
                    <div class="item_description move_on_scroll" data-move-acselerat="20">
                        <span class="liner">
                            <?= $advantage_list[3]['teaser'] ?>
                            <a class="read_more" href="#"> ..<?= Yii::t('app', 'read_more__button_txt') ?></a>
                        </span>
                        <span class="hidden"><?= $advantage_list[3]['body'] ?></span>
                    </div>
                    <?php if($advantage_list[3]['link']) : ?>
                        <div class="item_button">
                            <a class="btn lines" href="<?= $advantage_list[3]['link'] ?>">
                                <span class="design"><span></span><span></span><span></span><span></span></span>
                                <span class="text"><?= Yii::t('app', 'more_details__button_txt') ?></span>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>

    </section>

    <section class="main_content choise_section">
        <div class="section_number">
            <div class="bg move_on_scroll" data-move-acselerat="10">
                <img src="/img/numbers/bg_03.png" alt="<?= Yii::t('app', 'select_apartment__label') ?>">
            </div>
            <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                <div class="count tight">03</div>
                <div class="section_number_name"><?= Yii::t('app', 'select_apartment__html') ?></div>
            </div>
        </div>
        <div class="choise_block_wrap">
            <div class="choise_block">
                <div class="image_part">
                    <a class="btn lines open_hash_link section2_btn fly_btns" href="https://atmosphere.od.ua/#thefloors/239/facilities/204/plans/section/1046" data-hover-el="section2">
                        <span class="design"><span></span><span></span><span></span><span></span></span>
                        <span class="text"><?= Yii::t('app', 'section__label') ?> 2</span>
                    </a>
                    <a class="btn lines open_hash_link section3_btn fly_btns" href="https://atmosphere.od.ua/#thefloors/239/facilities/204/plans/section/1047" data-hover-el="section3">
                        <span class="design"><span></span><span></span><span></span><span></span></span>
                        <span class="text"><?= Yii::t('app', 'section__label') ?> 3</span>
                    </a>
                    <div class="imgs">
                        <img class="bg" src="/img/choise_section/bg.jpg" alt="">
                        <img class="main_svg svg" src="/img/choise_section/section_main.svg" alt="">
                        <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1108.9 937.9">
                            <path class="section2 section" d="M689.5 865.9s-27.9-22.6-56-53c-6.5-7.1-24.1 1.7-89-60-2.5-2.4-52.2-16.2-63-22-10.8-5.8-5-4-5-4l-31-139 48-119s65.8 16.8 147 65c81.3 48.2 129.8 79.3 198 149l-16 18-54 82-2 6-26 27-11 15-7 7h-5l-28 28z" fill-rule="evenodd" clip-rule="evenodd" fill="rgba(27,160,195,.4)" data-hover-el="section2_btn"></path>
                            <path class="section3 section" d="M477.5 729s-34.3-10.7-63-28c-28.8-17.3-39.3-21.2-80-53-40.8-31.8-60.8-53.7-66-59-5.3-5.3-32-36-32-36l-95-166 105-75s53.8 51.8 78 67c24.2 15.2 84.8 53.8 97 59s74 31 74 31l-48 119 30 141z" fill-rule="evenodd" clip-rule="evenodd" fill="rgba(27,160,195,.4)" data-hover-el="section3_btn"></path>
                        </svg>
                    </div>
                </div>
                <div class="accordeon">
                    <div class="tabs blue_color">
                        <div class="tab active">
                            <div class="name_of_item"><?= Yii::t('app', 'first_queue__label') ?></div>
                            <div class="lines"></div>
                            <div class="swich_content" style="display:block">
                                <?php if(Yii::$app->language === 'ru') : ?>
                                    <b>- сдача декабрь 2022 года</b><br>- 2,3 секции<br>- 25 этажей<br>- 1,2,3 комнатные квартиры<br>- коммерческие помещения<br>- паркоместа<br>
                                <?php else : ?>
                                    <b>- здача грудень 2022 року </b><br>- 2,3 секції <br>- 25 поверхів<br>- 1,2,3 кімнатні квартири<br>- комерційні приміщення<br>- паркомісця<br>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="tab unactive">
                            <div class="name_of_item"><?= Yii::t('app', 'second_queue__label') ?></div>
                            <div class="lines"></div>
                            <div class="swich_content"></div>
                        </div>
                        <div class="tab unactive">
                            <div class="name_of_item"><?= Yii::t('app', 'third_queue__label') ?></div>
                            <div class="lines"></div>
                            <div class="swich_content"></div>
                        </div>
                    </div>
                    <div class="btn_wrp">
                        <a class="floor_open btn lines" href="#">
                            <span class="design"><span></span><span></span><span></span><span></span></span>
                            <span class="text"><?= Yii::t('app', 'know_mode__button_txt') ?></span>
                        </a>
                        <a class="btn lines light popup_open" href="#" data-popup-type="consultation">
                            <span class="design"><span></span><span></span><span></span><span></span></span>
                            <span class="text"><?= Yii::t('app', 'calculate_credit__button_txt') ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= FirstQueueSection::widget() ?>

    <section class="main_content gallery_section" id="gallery">

        <div class="section_number four move_on_scroll" data-move-acselerat="20">
            <div class="bg">
                <img src="/img/numbers/bg_04.png" alt="<?= Yii::t('app', 'beauty_belong__label') ?>">
            </div>
            <div class="count_n_name">
                <div class="count tight">04</div>
                <div class="section_number_name"><?= Yii::t('app', 'beauty_belong__html') ?></div>
            </div>
        </div>

        <div class="design_img move_on_scroll" data-move-acselerat="20">
            <div class="img">3D</div>
        </div>

        <div class="fly_links">
            <div class="item1 link link move_on_scroll" data-move-acselerat="25">
                <img class="bg_img" src="/img/gallery_section/item2.jpg" alt="<?= Yii::t('app', 'gallery__button_txt') ?> 1">
            </div>
            <a class="vantages link move_on_scroll" href="<?= Url::to(['site/vantage']) ?>" data-move-acselerat="32">
                <img class="bg_img" src="/img/gallery_section/vantage.jpg" alt="<?= Yii::t('app', 'advantages__button_txt') ?>">
                <div class="info">
                    <span class="text"><?= Yii::t('app', 'advantages__button_txt') ?></span>
                </div>
            </a>
            <div class="item2 link link move_on_scroll" data-move-acselerat="45">
                <img class="bg_img" src="/img/gallery_section/item.jpg" alt="<?= Yii::t('app', 'gallery__button_txt') ?> 2">
            </div>
            <a class="gallery link link move_on_scroll" href="<?= Url::to(['site/gallery']) ?>" data-move-acselerat="20">
                <img class="bg_img" src="/img/gallery_section/14-house.jpg" alt="<?= Yii::t('app', 'gallery__button_txt') ?> 3">
                <div class="info">
                    <img src="/img/gallery_section/fgallery_icon.svg" alt="<?= Yii::t('app', 'gallery__button_txt') ?> 4">
                    <span class="text"><?= Yii::t('app', 'gallery__button_txt') ?></span>
                </div>
            </a>
            <div class="item3 link move_on_scroll" data-move-acselerat="35">
                <img class="bg_img" src="/img/gallery_section/item3.jpg" alt="<?= Yii::t('app', 'gallery__button_txt') ?> 5">
            </div>
        </div>
    </section>

    <section class="construction_progress">
        <div class="content">
            <div class="top_line">
                <div class="main_progress">
                    <div class="tabs blue_color">
                        <div class="tab unactive normal_color reverse_icon">
                            <div class="name_of_item"><?= Yii::t('app', 'first_queue__label') ?></div>
                            <div class="lines thin"></div>
                            <div class="cont"><i><?= Yii::t('app', 'finish__label') ?>: <?= Yii::t('app', 'December') ?> 2022</i></div>
                        </div>
                    </div>
                    <div class="progress_bar">
                        <div class="line"><span style="width: <?= $progress_procent ?>%"></span></div>
                        <div class="pick" style="left: <?= $progress_procent ?>%"><?= $progress_procent ?> %</div>
                    </div>
                </div>
                <div class="section_number">
                    <div class="bg move_on_scroll" data-move-acselerat="10"><img src="/img/numbers/bg_01.png" alt=""></div>
                    <div class="count_n_name move_on_scroll" data-move-acselerat="20">
                        <div class="count e5">05</div>
                        <div class="section_number_name"><?= Yii::t('app', 'current_build_step__label') ?></div>
                    </div>
                </div>
            </div>
            <div class="main_line">
                <div class="boxes">
                    <div class="item move_on_scroll popup_open" data-move-acselerat="56" data-popup-type="construction_progress_youtube">
                        <img class="main_el" src="/img/construction_progress_el1-new.jpg">
                        <div class="text">
                            <div class="head"><?= Yii::t('app', 'video_report__button_txt') ?></div>
                            <div class="cont"><?= Yii::$app->languageHelper->getAttribute($constructionProgressModel, 'name_short') ?></div>
                        </div>
                    </div>
                    <div class="item move_on_scroll" data-move-acselerat="35">
                        <a class="link" href="<?= Url::to(['construction-progress/index']) ?>">
                            <img class="main_el" src="/img/construction_progress_el2.jpg">
                            <div class="text">
                                <div class="head"><?= Yii::t('app', 'building_process_button_txt') ?></div>
                            </div>
                        </a>
                    </div>
                    <div class="item move_on_scroll" data-move-acselerat="75">
                        <img class="main_el" src="/img/construction_progress_el3.jpg">
                        <div class="text">
                            <div class="head"><?= Yii::t('app', 'finish__label') ?></div>
                            <div class="cont"><?= Yii::t('app', 'December') ?> 2022</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= ProjectListWidget::widget(['view' => 'block_1' ] ) ?>

    <?= SliderAdvantageWidget::widget(['type' => 'home']) ?>

    <section class="skimmer_section">
        <video loop autoplay muted>
            <source src="/video/video_1.mp4" type="video/mp4">
            <source src="/video/video_1.webm" type="video/webm">
            <source src="/video/video_1.ogv" type="video/ogg">
        </video>
    </section>

</main>