<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SectionSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $queues array */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'name_ru') ?>

<?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
    'label' => 'Видимый',
]) ?>

<?= $form->field($model, 'queue_id')->widget(MetronicBoostrapSelect::className(), [
    'items' => ArrayHelper::map($queues, 'id', 'name_ru')
]) ?>

<div class="form-group">
    <br>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
