<?php

use common\models\settings\LocationSectionSettings;
use common\models\settings\MapSectionSettings;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\SocialGroupSettings */

$this->title = 'Настройки -> Каналы, группы, чаты';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/social-group-settings']];

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">

                <div class="col like-box">
                    <?= $form->field($model, 'social_network')->widget(MultipleInput::className(), [
                        'allowEmptyList'    => true,
                        'enableGuessTitle'  => false,
                        'sortable' => false,
                        'addButtonPosition' => MultipleInput::POS_HEADER,
                        'columns' => [
                            [
                                'name'  => 'link_url',
                                'title' => 'URL',
                            ],
                            [
                                'name'  => 'link_type',
                                'type' => 'dropDownList',
                                'title' => 'Тип канала/группы',
                                'items' => [
                                    'instagram' => 'Instagram',
                                    'facebook' => 'Facebook',
                                    'vk' => 'VK',
                                    'youtube' => 'YouTube',
                                    'telegram' => 'Telegram',
                                ]
                            ]
                        ]
                    ]) ?>
                </div>

            </div>

            <hr>

            <div class="row justify-content-between">

                <div class="col like-box">
                    <?= $form->field($model, 'messengers')->widget(MultipleInput::className(), [
                        'allowEmptyList'    => true,
                        'enableGuessTitle'  => false,
                        'sortable' => false,
                        'addButtonPosition' => MultipleInput::POS_HEADER,
                        'columns' => [
                            [
                                'name'  => 'link_url',
                                'title' => 'URL',
                            ],
                            [
                                'name'  => 'link_type',
                                'type' => 'dropDownList',
                                'title' => 'Мессенджер',
                                'items' => [
                                    'viber' => 'Viber',
                                    'telegram' => 'Telegram',
                                    'whatsapp' => 'WhatsApp',
                                ]
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