<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MultiSlider */
/* @var $form \yii\widgets\ActiveForm */

$languages = Yii::$app->languageHelper->getLanguages();

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="row justify-content-between">
        <?php foreach($languages as $lang) : ?>
            <div class="col like-box">
                <?= $form->field($model, "caption_{$lang}")->textInput(['maxlength' => true]) ?>
            </div>
        <?php endforeach ?>
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

    <div class="row justify-content-between">
        <div class="col like-box">
            <?= $form->field($model, 'status')->widget(MetronicSingleCheckbox::className(), [
                'label' => 'Видимый'
            ]) ?>
        </div>
        <div class="col like-box">
            <?= $form->field($model, 'sort_order')->widget(MetronicBoostrapSelect::className(), [
                'items' => ArrayHelper::map(Yii::$app->componentHelper->range(1, 10), 'label', 'value')
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