<?php

use backend\models\Document;
use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<hr>

<div class="row justify-content-between">
    <div class="col like-box">
        <?php if(!empty($model->image)) : ?>
            <?= Html::img($model->getUploadUrl('image'), ['class' => 'img-thumbnail']); ?>
        <?php endif ?>
        <?= $form->field($model, 'image')->fileInput() ?>
    </div>
</div>

<hr>

<div class="row justify-content-between" style="display: none">
    <div class="col like-box">
        <?php if (!empty($model->file)) : ?>
            <?= Html::a('Смотреть', $model->getThumbUploadUrl('file'), ['target' => '_blank']); ?>
            <hr>
        <?php endif ?>
        <div style="display: none;">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
            'label' => 'Видимый'
        ]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'sort_order')->widget(MetronicBoostrapSelect::className(), [
            'items' => ArrayHelper::map(Yii::$app->componentHelper->range(1, 20), 'label', 'value')
        ])?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col">
        <div class="form-group">
            <br>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
