<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeveloperObject */
/* @var $form yii\widgets\ActiveForm */

$languages = Yii::$app->languageHelper->getLanguages();

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <?php foreach($languages as $lang) : ?>
        <div class="col like-box">
            <?= $form->field($model, "name_{$lang}")->textInput(['maxlength' => true]) ?>
        </div>
    <?php endforeach ?>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<hr>

<div class="row justify-content-between">
    <div class="col like-box">
        <?php if(!empty($model->image_logo)) : ?>
            <?= Html::img($model->getUploadUrl('image_logo'), ['class' => 'img-thumbnail']); ?>
        <?php endif ?>
        <?= $form->field($model, 'image_logo')->fileInput() ?>
    </div>
</div>

<hr>

<div class="row justify-content-between">
    <div class="col like-box">
        <?php if(!empty($model->image_illustration)) : ?>
            <?= Html::img($model->getUploadUrl('image_illustration'), ['class' => 'img-thumbnail']); ?>
        <?php endif ?>
        <?= $form->field($model, 'image_illustration')->fileInput() ?>
    </div>
</div>

<hr>

<div class="row justify-content-between">
    <div class="col like-box">
        <?php foreach($languages as $lang) : ?>
            <?= $form->field($model, "body_{$lang}")->editor([
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 280,
                    'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                    'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                    'plugins' => [
                        'fullscreen',
                    ],
                ]
            ]) ?>
            <hr>
        <?php endforeach ?>
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
