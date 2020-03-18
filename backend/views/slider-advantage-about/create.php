<?php

use backend\models\HomeSlider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderAdvantage */
/* @var $types [] */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['slider-advantage-about/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['slider-advantage-about/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
			'types' => $types,
		]) ?>

    </div>
</div>
