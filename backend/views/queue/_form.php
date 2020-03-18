<?php

use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Queue */
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