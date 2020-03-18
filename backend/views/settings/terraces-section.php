<?php

use common\models\settings\TerracesSectionSettings;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\settings\TerracesSectionSettings */

$this->title = 'Преимущества -> Террасы';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/terraces-section']];

$languages = Yii::$app->languageHelper->getLanguages();

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">
                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "title_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row justify-content-between">
                <?php foreach($languages as $lang) : ?>
                    <div class="col like-box">
                        <?= $form->field($model, "name_{$lang}")->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row justify-content-between">
                <div class="col like-box">
                    <?php foreach($languages as $lang) : ?>
                        <?= $form->field($model, "body_{$lang}")->editor([
                            'settings' => [
                                'lang' => 'ru',
                                'minHeight' => 300,
                                'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'alignment', 'horizontalrule'],
                                'formatting' => ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                                'plugins' => [
                                    'fullscreen',
                                ],
                            ]
                        ]) ?>
                        <hr>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col like-box">
                    <label>Галерея</label>
                    <?= \zxbodya\yii2\galleryManager\GalleryManager::widget(
                        [
                            'model' => $model,
                            'behaviorName' => 'gallery',
                            'apiRoute' => 'settings/galleryApi'
                        ]
                    ) ?>
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