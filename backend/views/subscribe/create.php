<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subscribe */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];

$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['subscribe/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['subscribe/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
