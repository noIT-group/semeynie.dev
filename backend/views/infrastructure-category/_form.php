<?php

use backend\widgets\MetronicBoostrapSelect;
use backend\widgets\MetronicSingleCheckbox;
use common\models\InfrastructureCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InfrastructureCategory */
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
        <?= $form->field($model, 'svg_icon')->widget(MetronicBoostrapSelect::className(), [
            'items' => InfrastructureCategory::getAllIcon(),
            'prompt' => 'Выберите иконку',
        ])?>
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
