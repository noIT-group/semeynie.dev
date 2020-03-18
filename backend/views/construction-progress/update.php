<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\ConstructionProgress */

$__params = require __DIR__ .'/__params.php';

$this->title = $model->name_full_ru;
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['construction-progress/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['construction-progress/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
