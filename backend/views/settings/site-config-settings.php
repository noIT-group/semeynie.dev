<?php

use common\models\settings\SiteConfigSettings;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\SiteConfigSettings */

$this->title = 'Настройки -> Email и контакты';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/site-config-settings']];

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">

                <div class="col like-box">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true])
                        ->label('Email(ы) для получения писем. Указывать через запятую.') ?>
                </div>

            </div>

            <div class="row justify-content-between">

                <div class="col like-box">
                    <?= $form->field($model, 'phone')->widget(MultipleInput::className(), [
                        'allowEmptyList'    => true,
                        'enableGuessTitle'  => false,
                        'sortable' => true,
                        'addButtonPosition' => MultipleInput::POS_HEADER,
                        'columns' => [
                            [
                                'name'  => 'phone_link',
                                'title' => 'Телефон (ссылка)',
                            ],
                            [
                                'name'  => 'phone_anchor',
                                'title' => 'Телефон (анкор)',
                            ],
                            [
                                'name'  => 'source',
                                'title' => 'Источник',
                                'type' => \dosamigos\selectize\SelectizeDropDownList::className(),
                                'options' => [
                                    'items' => Yii::$app->calltracker->types,
                                    'options' => [
                                        'placeholder' => 'Выбирите источники или оставьте пустым',
                                        'multiple' => true,
                                    ],
                                ],
                            ]
                        ]
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

        </div>
    </div>

<?php ActiveForm::end(); ?>