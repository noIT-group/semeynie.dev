<?php

use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AboutDeveloperSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'id') ?>

<?= $form->field($model, 'name_ru') ?>

<?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
    'label' => 'Видимый',
]) ?>

<div class="form-group">
    <br>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

