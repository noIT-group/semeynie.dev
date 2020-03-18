<?php

/**
 * @var $this View
 * @var $totalCount integer
 * @var $models ConstructionProgress
 * @var $model ConstructionProgress
 */

use common\models\ConstructionProgress;
use frontend\widgets\FirstQueueSection;
use frontend\widgets\MainSectionWidget;
use yii\web\View;

?>
<?= MainSectionWidget::widget(['view' => 'construction-progress']) ?>
<main>
    <section class="report-accordion">
        <div class="report-accordion__list">
            <?= $this->render('_items', ['models' => $models]) ?>
        </div>
        <?php if($models !== null) : ?>
            <?php if($totalCount > ConstructionProgress::PAGE_SIZE) : ?>
                <div class="show-more load-more js-load-more-btn" data-next-page="1" data-pagination-observer-class="div.report-accordion__list">...<?= Yii::t('app', 'look_other_report__button_txt') ?></div>
            <?php endif ?>
        <?php endif ?>
    </section>
    <?= FirstQueueSection::widget() ?>
</main>
