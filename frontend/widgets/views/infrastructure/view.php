<?php

/**
 * @var $this View
 * @var $infrastructureCategoryModels InfrastructureCategory
 * @var $infrastructureCategoryModels InfrastructureCategory
 */

use frontend\models\InfrastructureCategory;
use yii\web\View;
use yii\helpers\Html;

?>
<section class="map-block fix">

    <div class="map">
        <div class="google-maps js-google-maps"></div>
        <div class="toggle__wrap">
            <input id="inp" type="checkbox">
            <label for="inp" class="toggle"></label>
            <label for="inp" class="text"><?= Yii::t('app', 'summary_txt') ?></label>
            <label for="inp" class="text"><?= Yii::t('app', 'infrastructure_txt') ?></label>
        </div>
    </div>

    <div class="map-block__inner">
        <div class="map-block__description">
            <div class="map-block__item">
                <div class="map-block__time"><span>15 </span>минут</div>
                <div class="map-block__desc">до центра города</div>
            </div>
            <div class="map-block__item">
                <div class="map-block__time"><span>15 </span>минут</div>
                <div class="map-block__desc">до моря</div>
            </div>
            <div class="map-block__item">
                <div class="map-block__time"><span>12 </span>минут</div>
                <div class="map-block__desc">до супермаркета</div>
            </div>
            <div class="map-block__item">
                <div class="map-block__time"><span>20 </span>минут</div>
                <div class="map-block__desc">до школы</div>
            </div>
        </div>

        <?php if ($infrastructureCategoryModels) : ?>
            <div class="map-block__infrastructure">
                <span class="map-block__infrastructure-title"><?= Yii::t('app', 'show_on_map_txt') ?>:</span>

                <select multiple="multiple" class="map-block__select">
                    <?php foreach ($infrastructureCategoryModels as $infrastructureCategoryIndex => $infrastructureCategoryModel) : ?>
                        <option value="<?= $infrastructureCategoryModel->id ?>"><?= $infrastructureCategoryModel->name ?></option>
                    <?php endforeach ?>
                </select>

                <div class="map-block__infrastructure-inner">
                    <?php foreach ($infrastructureCategoryModels as $infrastructureCategoryIndex => $infrastructureCategoryModel) : ?>
                        <div class="map-block__infrastructure-item <?= ($infrastructureCategoryIndex === 0) ? 'active' : null ?>">
                            <div class="map-block__infrastructure-icon">
                                <?= Html::img($infrastructureCategoryModel->icon) ?>
                            </div>
                            <span class="map-block__infrastructure-desc"><?= $infrastructureCategoryModel->name ?></span>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        <?php endif ?>


    </div>

</section>
