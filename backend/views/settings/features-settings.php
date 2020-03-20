<?php

use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\settings\FeaturesSettings */

$this->title = 'Преимущества';
$this->params['breadcrumbs'][] = ['label' => 'Главная'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/features-settings']];

$languages = Yii::$app->languageHelper->getLanguages();

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <?php foreach($languages as $lang) : ?>
                <div class="row justify-content-between">
                    <div class="col like-box">
                        <?= $form->field($model, "list_{$lang}")->widget(MultipleInput::className(), [
                            'allowEmptyList' => true,
                            'enableGuessTitle' => false,
                            'min' => 1,
                            'max' => 3,
                            'sortable' => false,
                            'rendererClass' => \noIT\multipleInput\renderers\ListRenderer::className(),
                            'columns' => [
                                [
                                    'name' => 'name',
                                    'title' => 'Заголовок',
                                ],
                                [
                                    'name' => 'body',
                                    'title' => 'Описание (Скрытое)',
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