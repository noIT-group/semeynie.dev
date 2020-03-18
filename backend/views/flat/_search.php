<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FlatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'id') ?>

<?= $form->field($model, 'square_size') ?>

<?= $form->field($model, 'room_quantity')->widget(MetronicBoostrapSelect::className(), [
    'items' => \yii\helpers\ArrayHelper::map(Yii::$app->componentHelper->range(1, 8), 'label', 'value')
]) ?>

<?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
    'label' => 'Видимый'
]) ?>

<div class="form-group">
    <br>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
