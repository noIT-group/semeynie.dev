<?php

/**
 * @var $this View
 *
 */

use frontend\widgets\FormWidget;
use yii\helpers\Url;
use yii\web\View;

?>
<?= FormWidget::widget(['view_type' => FormWidget::VIEW_TYPE_RECALL]) ?>

<?= FormWidget::widget(['view_type' => FormWidget::VIEW_TYPE_CONSULTATION]) ?>

<div class="modal">
    <div class="remodal" data-remodal-id="modal__thanks">
        <button type="button" data-remodal-action="close" class="remodal-close"><span class="close"></span></button>
        <div class="modal__content">
            <div class="check">
                <div id="check-part-1" class="check__sign"></div>
                <div id="check-part-2" class="check__sign"></div>
            </div>
            <div class="description">
                <p><?= Yii::t('app', 'form_thanks_txt') ?></p>
            </div>
        </div>
        <a href="<?= Url::to(['site/index']) ?>" class="btn btn_beige modal__btn"><?= Yii::t('app', 'to_home_page_txt') ?></a>
    </div>
</div>
