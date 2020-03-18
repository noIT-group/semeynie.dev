<?php

/* @var $this yii\web\View */
/* @var $model common\models\Subscribe */

$__params = require __DIR__ .'/__params.php';

$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['subscribe/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['update'], 'url' => ['subscribe/update', 'id' => $model->id]];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>