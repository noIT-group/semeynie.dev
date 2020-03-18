<?php

use backend\widgets\MetronicBoostrapSelect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Subscribe */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

    <div class="row justify-content-between">
        <div class="col like-box">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col like-box">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row justify-content-between">
        <div class="col like-box">
            <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col like-box">
            <?= $form->field($model, 'status')->widget(MetronicBoostrapSelect::className(), [
                'items' => Yii::$app->params['subscribe-status']
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