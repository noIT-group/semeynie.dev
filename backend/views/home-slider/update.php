<?php

use backend\models\MultiSlider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\MultiSlider */

$__params = require __DIR__ .'/__params.php';

$this->title = "Слайд: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['home-slider/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['home-slider/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
