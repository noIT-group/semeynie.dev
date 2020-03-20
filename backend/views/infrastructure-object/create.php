<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\InfrastructureObject */
/* @var $infrastructureCategory array */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => 'Инфраструктура'];
$this->params['breadcrumbs'][] = ['label' => 'Обьекты', 'url' => ['infrastructure-object/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['infrastructure-object/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">
        <?= $this->render('_form', [
            'model' => $model,
            'infrastructureCategory' => $infrastructureCategory,
        ]) ?>
    </div>
</div>
