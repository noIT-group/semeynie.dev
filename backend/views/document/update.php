<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Document */

$__params = require __DIR__ .'/__params.php';

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['document/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['document/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
