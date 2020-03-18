<?php

use common\models\settings\AdvantageSectionSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\AdvantageSectionSettings */

$this->title = 'Главная -> Преимущества';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/advantage-section']];

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

            <?php foreach($languages as $lang) : ?>
                <div class="row justify-content-between">
                    <div class="col like-box">
                        <?= $form->field($model, "list_{$lang}")->widget(MultipleInput::className(), [
                            'allowEmptyList' => true,
                            'enableGuessTitle' => false,
                            'min' => 4,
                            'max' => 4,
                            'sortable' => true,
                            'addButtonPosition' => MultipleInput::POS_FOOTER,
                            'rendererClass' => \noIT\multipleInput\renderers\ListRenderer::className(),
                            'columns' => [
                                [
                                    'name' => 'character',
                                    'title' => 'Буква',
                                ],
                                [
                                    'name' => 'name',
                                    'title' => 'Заголовок',
                                ],
                                [
                                    'name' => 'teaser',
                                    'title' => 'Описание (Открытое)',
                                    'type' => Widget::className(),
                                    'options' => [
                                        'settings' => [
                                            'lang' => 'ru',
                                            'minHeight' => 100,
                                            'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                                            'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                                            'plugins' => [
                                                'fullscreen',
                                            ],
                                        ],
                                    ]
                                ],
                                [
                                    'name' => 'body',
                                    'title' => 'Описание (Скрытое)',
                                    'type' => Widget::className(),
                                    'options' => [
                                        'settings' => [
                                            'lang' => 'ru',
                                            'minHeight' => 140,
                                            'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                                            'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                                            'plugins' => [
                                                'fullscreen',
                                            ],
                                        ],
                                    ]
                                ],
                                [
                                    'name' => 'link',
                                    'title' => 'Ссылка',
                                ],
                            ]
                        ]) ?>
                    </div>
                </div>
            <?php endforeach ?>

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