<?php
namespace frontend\controllers;

use Yii;
use common\models\ConstructionProgress;
use common\models\Gallery;
use common\models\MultiGallery;
use common\models\settings\TerracesSectionSettings;
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

    public function actionIndex()
    {
        $lang = Yii::$app->language;

        $data = [
            'ru' => [
                'title' => "Семейные Традиции",
                'description' => "",
            ],
            'ua' => [
                'title' => "",
                'description' => "Сімейні традиції",
            ],
        ];

        $this->view->title = $data[$lang]['title'];

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $data[$lang]['description'],
        ]);

        return $this->render('index', []);
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        $data = [
            'ru' => [
                'title' => "О застройщике",
            ],
            'ua' => [
                'title' => "Про забудовника",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionGenplan()
    {
        $data = [
            'ru' => [
                'title' => "Генплан",
            ],
            'ua' => [
                'title' => "Генплан",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('genplan');
    }

    /**
     * @return string
     */
    public function actionChoose()
    {
        $data = [
            'ru' => [
                'title' => "Выбрать квартиру",
            ],
            'ua' => [
                'title' => "Вибрати квартиру",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('choose');
    }

    /**
     * @return string
     */
    public function actionGallery()
    {
        $data = [
            'ru' => [
                'title' => "Галерея",
            ],
            'ua' => [
                'title' => "Галерея",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('gallery');
    }

    /**
     * @return string
     */
    public function actionContacts()
    {
        $data = [
            'ru' => [
                'title' => "Контакты",
            ],
            'ua' => [
                'title' => "Контакти",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('contact');
    }
}
