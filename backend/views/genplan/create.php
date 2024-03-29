<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Genplan */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['genplan/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['genplan/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
