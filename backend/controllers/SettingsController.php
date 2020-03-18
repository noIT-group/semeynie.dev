<?php
namespace backend\controllers;

use common\models\MultiGallery;
use common\models\settings\AboutProjectSectionSettings;
use common\models\settings\AdvantageSectionSettings;
use common\models\settings\AdvantageUpperSliderSettings;
use common\models\settings\AttractionSectionSettings;
use common\models\settings\DispositionSectionSettings;
use common\models\settings\ErgonomicSectionSettings;
use common\models\settings\FirstServeSectionSettings;
use common\models\settings\IdeaSectionSettings;
use common\models\settings\InfrastructureFirstSectionSettings;
use common\models\settings\InfrastructureSecondSectionSettings;
use common\models\settings\InfrastructureThirdSectionSettings;
use common\models\settings\InfrastructureUpperSliderSettings;
use common\models\settings\InstallmentPlanSectionSettings;
use common\models\settings\LiveNoWithoutHomeSectionSettings;
use common\models\settings\LocationSectionSettings;
use common\models\settings\MapSectionSettings;
use common\models\settings\NumberSectionSettings;
use common\models\settings\ProgressBarSettings;
use common\models\settings\SiteConfigSettings;
use common\models\settings\SocialGroupSettings;
use common\models\settings\TerracesSectionSettings;
use common\models\settings\WhatIsAtmosphereSectionSettings;
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


    // Home Page (START)
    public function actionIdeaSection()
    {
        $model = new IdeaSectionSettings();

        $multiGalleryModel = MultiGallery::findOne(1);

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('idea-section', [
            'model' => $model,
            'multiGalleryModel' => $multiGalleryModel,
        ]);
    }

    public function actionAdvantageSection()
    {
        $model = new AdvantageSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('advantage-section', ['model' => $model]);
    }

    public function actionProgressBarSettings()
    {
        $model = new ProgressBarSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('progress-bar-section', ['model' => $model]);
    }
    // Home Page (END)

    // О проекте (START)
    public function actionFirstServeSection()
    {
        $model = new FirstServeSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('first-serve-section', ['model' => $model]);
    }

    public function actionWhatIsAtmosphereSection()
    {
        $model = new WhatIsAtmosphereSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('what-is-atmosphere-section', ['model' => $model]);
    }

    public function actionNumberSection()
    {
        $model = new NumberSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('number-section', ['model' => $model]);
    }

    public function actionLiveNoWithoutHomeSection()
    {
        $model = new LiveNoWithoutHomeSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('live-no-without-home-section', ['model' => $model]);
    }
    // О проекте (END)

    // Преимущества Page (START)
    public function actionAdvantageUpperSlider()
    {
        $model = new AdvantageUpperSliderSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('advantage-upper-slider', ['model' => $model]);
    }

    public function actionTerracesSection()
    {
        $model = new TerracesSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('terraces-section', ['model' => $model]);
    }

    public function actionDispositionSection()
    {
        $model = new DispositionSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('disposition-section', ['model' => $model]);
    }

    public function actionErgonomicSection()
    {
        $model = new ErgonomicSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('ergonomic-section', ['model' => $model]);
    }

    public function actionInstallmentPlanSection()
    {
        $model = new InstallmentPlanSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('installment-plan-section', ['model' => $model]);
    }
    // Преимущества Page (END)

    // Расположение Page (START)
    public function actionLocationSection()
    {
        $model = new LocationSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('location-section', ['model' => $model]);
    }

    public function actionMapSection()
    {
        $model = new MapSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('map-section', ['model' => $model]);
    }
    // Расположение Page (END)

    // Центр притяжения Page (START)

    public function actionAttractionSection()
    {
        $model = new AttractionSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('attraction-section', ['model' => $model]);
    }
    // Центр притяжения Page (END)

    // Инфраструктура Page (START)
    public function actionInfrastructureUpperSlider()
    {
        $model = new InfrastructureUpperSliderSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('infrastructure-upper-slider', ['model' => $model]);
    }

    public function actionInfrastructureFirstSection()
    {
        $model = new InfrastructureFirstSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('infrastructure-first-section', ['model' => $model]);
    }

    public function actionInfrastructureSecondSection()
    {
        $model = new InfrastructureSecondSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('infrastructure-second-section', ['model' => $model]);
    }

    public function actionInfrastructureThirdSection()
    {
        $model = new InfrastructureThirdSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('infrastructure-third-section', ['model' => $model]);
    }
    // Инфраструктура Page (END)

    // О Застройщике (START)
    public function actionAboutProjectSection()
    {
        $model = new AboutProjectSectionSettings();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->refresh();
        }

        return $this->render('about-project-section', ['model' => $model]);
    }

    // О Застройщике (END)

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