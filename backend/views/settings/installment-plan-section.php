<?php

use common\models\settings\InstallmentPlanSectionSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\InstallmentPlanSectionSettings */

$this->title = 'Преимущества -> Рассрочка';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/installment-plan-section']];

$languages = Yii::$app->languageHelper->getLanguages();

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">
                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "title_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row justify-content-between">
                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "name_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row justify-content-between">
                <div class="col like-box">
                    <?php foreach($languages as $lang) : ?>
                        <?= $form->field($model, "list_{$lang}")->widget(MultipleInput::className(), [
                            'allowEmptyList' => true,
                            'enableGuessTitle' => false,
                            'sortable' => false,
                            'min' => 2,
                            'max' => 2,
                            'addButtonPosition' => MultipleInput::POS_FOOTER,
                            'rendererClass' => \noIT\multipleInput\renderers\ListRenderer::className(),
                            'columns' => [
                                [
                                    'name' => 'number',
                                    'title' => 'Цифра',
                                ],
                                [
                                    'name' => 'body',
                                    'title' => 'Описание',
                                ],
                            ]
                        ]) ?>
                        <hr>
                        <br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="row justify-content-between">

                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "button_text_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>

            </div>

            <div class="row justify-content-between">
                <div class="col">
                    <div class="form-group">
                        <br>
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php ActiveForm::end(); ?>