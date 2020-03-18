<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Flat */
/* @var $sections array */
/* @var $floors array */

$__params = require __DIR__ .'/__params.php';

$this->title = "Квартира №: $model->id";
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['flat/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['flat/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

        <?= $this->render('_form', [
            'model' => $model,
            'sections' => $sections,
            'floors' => $floors,
        ]) ?>

    </div>
</div>
