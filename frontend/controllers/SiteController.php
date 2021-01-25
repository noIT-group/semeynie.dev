<?php

namespace frontend\controllers;

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

        return $this->render('index', []);
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        Yii::$app->view->params['body__class'] = 'developer page static';

        return $this->render('about');
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

        return $this->render('gallery');
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
