<?php

use backend\models\HomeSlider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderAdvantage */
/* @var $types [] */

$__params = require __DIR__ .'/__params.php';

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['slider-advantage/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['slider-advantage/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
			'types' => $types,
		]) ?>

    </div>
</div>
