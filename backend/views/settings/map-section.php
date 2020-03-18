<?php

use common\models\settings\LocationSectionSettings;
use common\models\settings\MapSectionSettings;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\MapSectionSettings */

$this->title = 'Расположение -> Карта';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/map-section']];

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">

                <div class="col like-box">
                    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'zoom')->textInput(['maxlength' => true]) ?>
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