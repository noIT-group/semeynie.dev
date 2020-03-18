<?php

use backend\models\SliderAdvantage;
use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderAdvantage */
/* @var $form yii\widgets\ActiveForm */
/* @var $types [] */

$model->type = 'about';

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box" style="display:none;">
        <?= $form->field($model, 'type')->widget(MetronicBoostrapSelect::className(), [
            'items' => $types,
        ]) ?>
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

