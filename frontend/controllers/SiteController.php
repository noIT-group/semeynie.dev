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

        return $this->render('about');
    }
}
