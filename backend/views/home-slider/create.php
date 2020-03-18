<?php

use backend\models\MultiSlider;

/* @var $this yii\web\View */
/* @var $model backend\models\MultiSlider */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['home-slider/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['home-slider/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
