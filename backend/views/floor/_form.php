<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Floor */
/* @var $form yii\widgets\ActiveForm */
/* @var $sections array */
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

    <div class="row justify-content-between">
        <div class="col like-box">
            <?= $form->field($model, 'section_id')->widget(MetronicBoostrapSelect::className(), [
                'items' => ArrayHelper::map($sections, 'id', 'name')
            ]) ?>
        </div>
        <div class="col like-box">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col like-box">
            <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
                'label' => 'Видимый'
            ]) ?>
        </div>
    </div>

    <div class="row justify-content-between">
        <div class="col like-box">
            <?php if(!empty($model->plan_img)) : ?>
                <?= Html::img($model->getUploadUrl('plan_img'), ['class' => 'img-thumbnail']); ?>
            <?php endif ?>
            <?= $form->field($model, 'plan_img')->fileInput() ?>
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