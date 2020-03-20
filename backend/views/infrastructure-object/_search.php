<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InfrastructureObjectSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $infrastructureCategory array */

?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'name_ru') ?>

<?= $form->field($model, 'category_id')->widget(MetronicBoostrapSelect::className(), [
    'items' => ArrayHelper::map($infrastructureCategory, 'id', 'name_ru'),
]) ?>

<?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
    'label' => 'Видимый',
]) ?>

<div class="form-group">
    <br>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
