<?php
namespace backend\controllers;

use common\models\settings\SiteConfigSettings;
use common\models\settings\SocialGroupSettings;
use yii\web\Controller;
use Yii;
use zxbodya\yii2\galleryManager\GalleryManagerAction;

class SettingsController extends Controller
{
    public function actions() {
        return [
            'body-image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => Yii::getAlias('@cdnUrl/settings/body'),
                'path' => Yii::getAlias('@cdn/settings/body'),
                'unique' => true,
                'translit' => true,
            ],
            'body-images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => Yii::getAlias('@cdnUrl/settings/body'),
                'path' => Yii::getAlias('@cdn/settings/body'),
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif']],
            ],
            'body-file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => Yii::getAlias('@cdnUrl/settings/body'),
                'path' => Yii::getAlias('@cdn/settings/body'),
            ],
            'galleryApi' => [
                'class' => GalleryManagerAction::className(),
                'types' => [
                    'terraces-section-settings' => TerracesSectionSettings::className()
                ]
            ],

        ];
    }

    // Настройки (START)
    public function actionSocialGroupSettings()
    {
        $model = new SocialGroupSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('social-group-settings', ['model' => $model]);
    }

    public function actionSiteConfigSettings()
    {
        $model = new SiteConfigSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('site-config-settings', ['model' => $model]);
    }
    // Настройки (END)
}