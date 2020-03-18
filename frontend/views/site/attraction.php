<?php

/**
 * @var $this View
 * @var $attraction_list AttractionSectionSettings
 */

use common\models\settings\AttractionSectionSettings;
use frontend\widgets\MainSectionWidget;
use yii\web\View;

$attraction_name = Yii::$app->languageHelper->getSettingsAttribute('AttractionSectionSettings.name');
$attraction_list = @unserialize( Yii::$app->languageHelper->getSettingsAttribute('AttractionSectionSettings.list') );

?>
<?= MainSectionWidget::widget(['view' => 'attraction']) ?>
<main>

    <section class="attraction_page">

        <h2 class="head move_on_scroll" data-move-acselerat="20"><?= $attraction_name ?></h2>

        <?php if($attraction_list) : ?>
            <?php $attraction_list = array_values($attraction_list) ?>
            <div class="pseudo_grids">

                <div class="pseudo_grid">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/attraction_page_item1.jpg" alt="<?= strip_tags($attraction_list[0]['name']) ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll" data-move-acselerat="10"><?= $attraction_list[0]['character'] ?></span>
                        </div>
                        <div class="text waves move_on_scroll" data-move-acselerat="25">
                            <h5 class="color_head"><?= $attraction_list[0]['name'] ?></h5>
                            <div class="innter_text"><?= $attraction_list[0]['body'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="pseudo_grid">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/attraction_page_item2.jpg" alt="<?= strip_tags($attraction_list[1]['name']) ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll move_letter_to_left" data-move-acselerat="10"><?= $attraction_list[1]['character'] ?></span>
                        </div>
                        <div class="text waves move_on_scroll" data-move-acselerat="25">
                            <h5 class="color_head"><?= $attraction_list[1]['name'] ?></h5>
                            <div class="innter_text"><?= $attraction_list[1]['body'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="pseudo_grid">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/attraction_page_item3.jpg" alt="<?= strip_tags($attraction_list[2]['name']) ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll move_letter_to_left" data-move-acselerat="10"><?= $attraction_list[2]['character'] ?></span>
                        </div>
                        <div class="text waves move_on_scroll" data-move-acselerat="25">
                            <h5 class="color_head"><?= $attraction_list[2]['name'] ?></h5>
                            <div class="innter_text"><?= $attraction_list[2]['body'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="pseudo_grid">
                    <div class="item_name">
                        <div class="bg">
                            <img class="move_on_scroll" src="/img/attraction_page_item4.jpg" alt="<?= strip_tags($attraction_list[3]['name']) ?>" data-move-acselerat="20">
                            <span class="letter move_on_scroll move_letter_to_left" data-move-acselerat="10"><?= $attraction_list[3]['character'] ?></span>
                        </div>
                        <div class="text waves move_on_scroll" data-move-acselerat="25">
                            <h5 class="color_head"><?= $attraction_list[3]['name'] ?></h5>
                            <div class="innter_text"><?= $attraction_list[3]['body'] ?></div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif ?>

    </section>

</main>