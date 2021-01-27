<?php

/**
 * @var $this View
 * @var $model Feedback
 * @var $form_name string
 */

use common\models\Feedback;
use noIT\core\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

?>
<div class="modal">
    <div class="remodal" data-remodal-id="modal__consultation">
        <button type="button" data-remodal-action="close" class="remodal-close"><span class="close"></span></button>
        <div class="modal__form">

            <?php $form = ActiveForm::begin([
                'action' => Url::to(['feedback/index']),
                'options' => [
                    'class' => 'js-form-yii',
                    'autocomplete' => 'off',
                ]
            ]);

            $template = '{input}';

            ?>

            <?= Html::hiddenInput('model', base64_encode($model::className())) ?>

            <?= Html::hiddenInput('secret_form_key', '') ?>

            <?= Html::activeInput('text', $model, 'form_name', ['value' => $form_name, 'class' => 'hidden']) ?>

            <?= Html::activeInput('text', $model, 'name', [
                'class' => 'modal__input',
                'placeholder' => Yii::t('app', 'form_name_txt') . ' *',
                'required' => true,
                'autocomplete' => 'off',
            ]) ?>

            <?= Html::activeInput('text', $model, 'phone', [
                'class' => 'modal__input js-input-phone',
                'placeholder' => Yii::t('app', 'form_phone_txt') . ' *',
                'required' => true,
                'autocomplete' => 'off',
            ]) ?>

            <?= Html::activeTextarea($model, 'message', [
                'class' => 'form__input form__textarea',
                'rows' => 4,
                'placeholder' => Yii::t('app', 'form_comment_txt'),
                'autocomplete' => 'off',
            ]) ?>

            <div class="hidden">
                <button type="submit"><?= Yii::t('app', 'get_consultation_txt') ?></button>
            </div>

            <div class="btn btn_beige modal__btn btn-send-handler"><?= Yii::t('app', 'get_consultation_txt') ?></div>

            <?php ActiveForm::end() ?>

        </div>
    </div>
</div>
