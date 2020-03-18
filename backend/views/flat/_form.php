<?php

use backend\widgets\MetronicSingleCheckbox;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use backend\widgets\MetronicBoostrapSelect;

/* @var $this yii\web\View */
/* @var $model backend\models\Flat */
/* @var $form yii\widgets\ActiveForm */
/* @var $sections array */
/* @var $floors array */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
        <?php if(!empty($model->flat_img)) : ?>
            <?= Html::img($model->getUploadUrl('flat_img'), ['class' => 'img-thumbnail']); ?>
        <?php endif ?>
        <?= $form->field($model, 'flat_img')->fileInput() ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'square_size')->textInput() ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'room_quantity')->widget(MetronicBoostrapSelect::className(), [
            'items' => ArrayHelper::map(Yii::$app->componentHelper->range(1, 8), 'label', 'value')
        ]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'wind_rose')->widget(MetronicBoostrapSelect::className(), [
            'items' => ArrayHelper::map(Yii::$app->componentHelper->arrayMutator([0, 45, 90, 135, 180, 225, 270, 315, 360]), 'label', 'value')
        ]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'coordinate')->textInput(['maxlength' => true]) ?>
    </div>
</div>


<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'section_id')->dropDownList(ArrayHelper::map($sections, 'id', 'name'), [
            'id' => 'flat-section_id',
            'prompt' => 'Выберите секцию',
        ])->label('Секция дома') ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'floor_id')->widget(DepDrop::classname(), [
            'data' => ArrayHelper::map($floors, 'id', 'name'),
            'options' => [
                'id' => 'flat-floor_id',
                'prompt' => 'Выберите этаж',
            ],
            'pluginOptions' => [
                'depends' => [
                    'flat-section_id'
                ],
                'placeholder' => 'Выберите этаж',
                'url' => Url::to(['flat/get-selected-model-attribute'])
            ]
        ]); ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
            'label' => 'Видимый'
        ]) ?>
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
