<?php

use common\models\settings\ErgonomicSectionSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\ErgonomicSectionSettings */

$this->title = 'Преимущества -> Эргономичность';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/ergonomic-section']];

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
                            'min' => 7,
                            'max' => 7,
                            'addButtonPosition' => MultipleInput::POS_FOOTER,
                            'rendererClass' => \noIT\multipleInput\renderers\ListRenderer::className(),
                            'columns' => [
                                [
                                    'name' => 'character',
                                    'title' => 'Символ',
                                ],
                                [
                                    'name' => 'name',
                                    'title' => 'Заголовок',
                                ]
                            ]
                        ]) ?>
                        <hr>
                        <br>
                    <?php endforeach ?>
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