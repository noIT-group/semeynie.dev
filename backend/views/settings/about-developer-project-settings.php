<?php

use yii\helpers\Html;
use noIT\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\settings\AboutDeveloperProjectSettings */

$this->title = 'Проекты застройщика';
$this->params['breadcrumbs'][] = ['label' => 'Главная'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['settings/about-developer-project-settings']];

$languages = Yii::$app->languageHelper->getLanguages();

?>
<?php $form = ActiveForm::begin(); ?>

    <div class="custom-form-section">

        <div class="custom-form-section-box">

            <div class="row justify-content-between">
                <div class="col like-box">
                    <?php foreach($languages as $lang) : ?>
                        <?= $form->field($model, "body_{$lang}")->editor([
                            'settings' => [
                                'lang' => 'ru',
                                'minHeight' => 160,
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