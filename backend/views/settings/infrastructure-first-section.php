<?php

use common\models\settings\InfrastructureFirstSectionSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\InfrastructureFirstSectionSettings */

$this->title = 'Инфраструктура -> Первый блок';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/infrastructure-first-section']];

$languages = Yii::$app->languageHelper->getLanguages();

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">
                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "name_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>
            </div>

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
                        <?= $form->field($model, "list_{$lang}")->widget(MultipleInput::className(), [
                            'allowEmptyList' => true,
                            'enableGuessTitle' => false,
                            'sortable' => true,
                            'min' => 1,
                            'max' => 20,
                            'rendererClass' => \noIT\multipleInput\renderers\ListRenderer::className(),
                            'columns' => [
                                [
                                    'name' => 'name',
                                    'title' => 'Заголовок',
                                ],
                                [
                                    'name' => 'body',
                                    'title' => 'Описание',
                                    'type' => Widget::className(),
                                    'options' => [
                                        'settings' => [
                                            'lang' => 'ru',
                                            'minHeight' => 240,
                                            'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                                            'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                                            'plugins' => [
                                                'fullscreen',
                                            ],
                                        ],
                                    ]
                                ],
                                [
                                    'name' => 'character',
                                    'title' => 'Символ',
                                ],
                                [
                                    'name' => 'link',
                                    'title' => 'Ссылка',
                                ],
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