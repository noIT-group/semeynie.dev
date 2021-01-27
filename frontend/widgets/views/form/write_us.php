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
<section class="fix contact__form">

    <span class="title sub-title"><?= Yii::t('app', 'write_us_txt') ?></span>

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['feedback/index']),
        'options' => [
            'class' => 'form form__contact js-form-yii',
            'autocomplete' => 'off',
        ]
    ]);

    $template = '{input}';

    ?>


    <?= Html::hiddenInput('model', base64_encode($model::className())) ?>

    <?= Html::hiddenInput('secret_form_key', '') ?>

    <?= Html::activeInput('text', $model, 'form_name', ['value' => $form_name, 'class' => 'hidden']) ?>

    <div class="form__contact-wrap">

        <div class="form__row">

            <?= Html::activeInput('text', $model, 'name', [
                'class' => 'form__input',
                'placeholder' => Yii::t('app', 'form_name_txt') . ' *',
                'required' => true,
                'autocomplete' => 'off',
            ]) ?>

            <?= Html::activeInput('text', $model, 'phone', [
                'class' => 'form__input js-input-phone',
                'placeholder' => Yii::t('app', 'form_phone_txt') . ' *',
                'required' => true,
                'autocomplete' => 'off',
            ]) ?>

        </div>

        <?= Html::activeTextarea($model, 'message', [
            'class' => 'form__input form__textarea',
            'rows' => 4,
            'placeholder' => Yii::t('app', 'form_message_txt'),
            'autocomplete' => 'off',
        ]) ?>

    </div>

    <div class="hidden">
        <button type="submit"><?= Yii::t('app', 'submit_txt') ?></button>
    </div>

    <div class="btn btn_beige form__btn contact__btn btn-send-handler"><?= Yii::t('app', 'submit_txt') ?></div>

    <?php ActiveForm::end() ?>

</section>