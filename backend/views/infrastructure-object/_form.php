<?php

use backend\models\InfrastructureObject;
use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InfrastructureObject */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'category_number')->widget(MetronicBoostrapSelect::className(), [
            'items' => Yii::$app->params['infrastructure_object_category'],
        ]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'body_ru')->editor([
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 300,
                'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                'plugins' => [
                    'fullscreen',
                ],
            ]
        ]) ?>
        <hr>
        <?= $form->field($model, 'body_ua')->editor([
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 300,
                'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                'plugins' => [
                    'fullscreen',
                ],
            ]
        ]) ?>
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
            'items' => ArrayHelper::map(Yii::$app->componentHelper->range(1, 100), 'label', 'value')
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

