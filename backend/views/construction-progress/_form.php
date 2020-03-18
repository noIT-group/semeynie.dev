<?php

use backend\widgets\MetronicSingleCheckbox;
use kartik\date\DatePicker;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model backend\models\ConstructionProgress */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'date')->widget(DatePicker::className(), [
            'language' => 'ru',
            'options' => [
                'placeholder' => 'Выберите дату',
                'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'weekStart' => '1',
                'format' => 'dd.mm.yyyy',
                'todayHighlight' => true,
            ]
        ]); ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
            'label' => 'Видимый'
        ]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'name_short_ru')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'name_full_ru')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'name_short_ua')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_full_ua')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'body_ru')->editor([
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
        <?= $form->field($model, 'body_ua')->editor([
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
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <label>Галерея</label>
        <?php if($model->isNewRecord) : ?>
            <div class="alert alert-info" role="alert" style="margin: 0">
                <div class="alert-text">Создайте галерею, чтобы получить возможность добавления <b>"Изображения"</b>.</div>
            </div>
        <?php else : ?>
            <?= GalleryManager::widget(
                [
                    'model' => $model,
                    'behaviorName' => 'gallery',
                    'apiRoute' => 'construction-progress/galleryApi'
                ]
            );?>
        <?php endif ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'videos')->widget(MultipleInput::className(), [
            'allowEmptyList' => true,
            'enableGuessTitle' => false,
            'sortable' => false,
            'addButtonPosition' => MultipleInput::POS_FOOTER,
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
