<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FloorSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $sections array */

?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'name_ru') ?>

<div style="display:flex; justify-content: flex-start">
    <?= $form->field($model, 'number') ?>
    <div style="margin-left: 16px">
        <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
            'label' => 'Видимый',
        ]) ?>
    </div>
</div>

<?= $form->field($model, 'section_id')->widget(MetronicBoostrapSelect::className(), [
    'items' => ArrayHelper::map($sections, 'id', 'name_ru')
]) ?>

<div class="form-group">
    <br>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
