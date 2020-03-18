<?php

use backend\widgets\MetronicSingleCheckbox;
use common\models\settings\AdvantageUpperSliderSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\AdvantageUpperSliderSettings */

$this->title = 'Преимущества -> Слайдер вверху';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/advantage-upper-slider']];

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
                <div class="col like-box">
                    <?php foreach($languages as $lang) : ?>
                        <?= $form->field($model, "links_{$lang}")->widget(MultipleInput::className(), [
                            'allowEmptyList' => true,
                            'enableGuessTitle' => false,
                            'sortable' => true,
                            'max' => 4,
                            'addButtonPosition' => MultipleInput::POS_FOOTER,
                            'columns' => [
                                [
                                    'name' => 'link',
                                    'title' => 'Ссылка',
                                ],
                                [
                                    'name' => 'anchor',
                                    'title' => 'Анкор',
                                ],
                            ]
                        ]) ?>
                        <hr>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col like-box">
                    <label class="control-label">Фоновая иллюстрация</label>
                    <?php if($model->image) : ?>
                        <?= Html::img($model->image, [
                            'width' => '100%',
                            'box-sizing' => 'border-box',
                        ]) ?>
                        <hr>
                        <?= $form->field($model, 'image_remove')->widget(MetronicSingleCheckbox::className(), [
                            'value' => AdvantageUpperSliderSettings::ENABLE,
                            'label' => 'Удалить изображение'
                        ])->label(false) ?>
                    <?php endif ?>

                    <?= $form->field($model, 'image')->fileInput()->label(false) ?>
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

        </div>
    </div>

<?php ActiveForm::end(); ?>