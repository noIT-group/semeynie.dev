<?php

use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\settings\InfrastructureThirdSectionSettings */

$this->title = 'Инфраструктура -> Третий блок';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/infrastructure-third-section']];

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
                            'addButtonPosition' => MultipleInput::POS_FOOTER,
                            'columns' => [
                                [
                                    'name' => 'name',
                                    'title' => 'Заголовок',
                                ],
                                [
                                    'name' => 'link',
                                    'title' => 'Ссылка',
                                ],
                            ]
                        ]) ?>
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