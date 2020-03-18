<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Section */
/* @var $queues array */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['section/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['section/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

        <?= $this->render('_form', [
            'model' => $model,
            'queues' => $queues,
        ]) ?>

    </div>
</div>
