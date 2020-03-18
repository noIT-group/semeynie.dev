<?php

use backend\models\Gallery;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Gallery */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['gallery/index']];
$this->params['breadcrumbs'][] = ['label' => $__params['create'], 'url' => ['gallery/create']];

?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

    </div>
</div>
