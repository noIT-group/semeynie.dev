<?php
namespace backend\controllers;

use common\models\settings\AboutDeveloperProjectSettings;
use common\models\settings\AboutDeveloperSettings;
use common\models\settings\AboutProjectSettings;
use common\models\settings\FeaturesSettings;
use common\models\settings\InstallmentApartmentSettings;
use common\models\settings\NavigationMenuSettings;
use common\models\settings\SiteConfigSettings;
use common\models\settings\SocialGroupSettings;
use yii\web\Controller;
use Yii;

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
        ];
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAboutProjectSettings()
    {
        $model = new AboutProjectSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('about-project-settings', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionInstallmentApartmentSettings()
    {
        $model = new InstallmentApartmentSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('installment-apartment-settings', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionFeaturesSettings()
    {
        $model = new FeaturesSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('features-settings', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAboutDeveloperProjectSettings()
    {
        $model = new AboutDeveloperProjectSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('about-developer-project-settings', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionNavigationMenuSettings()
    {
        $model = new NavigationMenuSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('navigation-menu-settings', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAboutDeveloperSettings()
    {
        $model = new AboutDeveloperSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('about-developer-settings', ['model' => $model]);
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