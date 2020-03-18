<?php

/**
 * @var $this View
 */

use frontend\widgets\DocumentListWidget;
use frontend\widgets\MainSectionWidget;
use frontend\widgets\ProjectListWidget;
use yii\web\View;

$about_project_name = Yii::$app->languageHelper->getSettingsAttribute('AboutProjectSectionSettings.name');
$about_project_title = Yii::$app->languageHelper->getSettingsAttribute('AboutProjectSectionSettings.title');
$about_project_teaser = Yii::$app->languageHelper->getSettingsAttribute('AboutProjectSectionSettings.teaser');
$about_project_body = Yii::$app->languageHelper->getSettingsAttribute('AboutProjectSectionSettings.body');

?>
<?= MainSectionWidget::widget(['view' => 'about-developer']) ?>
<main>
    <?= ProjectListWidget::widget(['view' => 'block_2' ] ) ?>

    <section class="main_content what_is_section house_with_atmosphere">
        <div class="main_bg_img">

            <img src="/img/developer_page.jpg" alt="ЖК Атмосфера">

            <div class="main_text_content text_cont move_on_scroll" data-move-acselerat="20">

                <p class="small_deckription"><?= $about_project_name ?></p>

                <h2 class="head"><?= $about_project_title ?></h2>

                <div class="main_description">
                    <?= $about_project_teaser ?>
                    <span class="hidden">
                        <br><br>
                        <?= $about_project_body ?>
                        <br><br>
                    </span>
                    <a class="read_more" href="#">...<?= Yii::t('app', 'read_more__button_txt') ?></a>
                </div>
            </div>

        </div>
    </section>

    <?= DocumentListWidget::widget(['view' => 'block_2']) ?>

</main>