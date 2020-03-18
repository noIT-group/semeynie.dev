<?php

use backend\widgets\MetronicSingleCheckbox;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\settings\NavigationMenuSettings */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/navigation-menu-settings']];

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">
                <div class="col like-box">
                    <?= $form->field($model, 'header_menu')->widget(MultipleInput::className(), [
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
                                'name' => 'anchor_ru',
                                'title' => 'Анкор (RU)',
                            ],
                            [
                                'name' => 'anchor_ua',
                                'title' => 'Анкор (UA)',
                            ],
                        ]
                    ]) ?>
                    <hr>
                    <?= $form->field($model, 'burger_menu')->widget(MultipleInput::className(), [
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
                                'name' => 'anchor_ru',
                                'title' => 'Анкор (RU)',
                            ],
                            [
                                'name' => 'anchor_ua',
                                'title' => 'Анкор (UA)',
                            ],
                        ]
                    ]) ?>
                    <hr>
                    <?= $form->field($model, 'footer_menu')->widget(MultipleInput::className(), [
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
                                'name' => 'anchor_ru',
                                'title' => 'Анкор (RU)',
                            ],
                            [
                                'name' => 'anchor_ua',
                                'title' => 'Анкор (UA)',
                            ],
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