<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InfrastructureObject */
/* @var $form yii\widgets\ActiveForm */
/* @var $infrastructureCategory array */

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

<hr>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'coordinate')->textInput(['maxlength' => true])  ?>
    </div>
    <div class="col like-box">
        <?= $form->field($model, 'category_id')->widget(MetronicBoostrapSelect::className(), [
            'items' => ArrayHelper::map($infrastructureCategory, 'id', 'name_ru'),
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
            'items' => ArrayHelper::map(Yii::$app->componentHelper->range(1, 40), 'label', 'value')
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
