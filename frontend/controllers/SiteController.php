<?php

namespace frontend\controllers;

use frontend\models\AboutDeveloperSettings;
use frontend\models\AboutProjectSettings;
use frontend\models\DeveloperObject;
use frontend\models\Document;
use frontend\models\Gallery;
use frontend\models\InstallmentApartmentSettings;
use frontend\models\MultiSlider;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error'
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->view->params['body__class'] = 'home page static';

        $homeSliderModels = MultiSlider::find()
            ->where([
                'type' => MultiSlider::HOME_TYPE,
                'status' => MultiSlider::STATUS_ENABLE,
            ])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $aboutProjectSettings = AboutProjectSettings::getAll();

        $installmentApartmentSettings = InstallmentApartmentSettings::getAll();

        $aboutDeveloperSettings = AboutDeveloperSettings::getAll();

        $documentModels = Document::find()
            ->where(['status' => Document::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $developerObjectModels = DeveloperObject::find()
            ->where(['status' => DeveloperObject::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'homeSliderModels' => $homeSliderModels,
            'aboutProjectSettings' => $aboutProjectSettings,
            'installmentApartmentSettings' => $installmentApartmentSettings,
            'aboutDeveloperSettings' => $aboutDeveloperSettings,
            'documentModels' => $documentModels,
            'developerObjectModels' => $developerObjectModels,
        ]);
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        Yii::$app->view->params['body__class'] = 'developer page static';

        $documentModels = Document::find()
            ->where(['status' => Document::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $developerObjectModels = DeveloperObject::find()
            ->where(['status' => DeveloperObject::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('about', [
            'documentModels' => $documentModels,
            'developerObjectModels' => $developerObjectModels,
        ]);
    }

    /**
     * @return string
     */
    public function actionGenplan()
    {
        Yii::$app->view->params['body__class'] = 'genplan page';

        return $this->render('genplan');
    }

    /**
     * @return string
     */
    public function actionGallery()
    {
        Yii::$app->view->params['body__class'] = 'gallery page static';

        $models = Gallery::find()
            ->where(['status' => Gallery::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('gallery', ['models' => $models]);
    }

    /**
     * @return string
     */
    public function actionContacts()
    {
        Yii::$app->view->params['body__class'] = 'contact page static';

        return $this->render('contact');
    }
}
