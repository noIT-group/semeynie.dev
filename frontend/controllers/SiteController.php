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
    const HOME_PAGE_GALLERY = 1;

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
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии | Террасы с видом на море",
                'description' => "Телефон отдела продаж ☎ (048) 788 18 18 ❤ 1-я очередь уже в продаже! ✅ Типы квартир: Однокомнатные, Двухкомнатные, Трехкомнатные ✦",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії | Тераси з видом на море",
                'description' => "Телефон відділу продажів ☎ (048) 788 18 18 ❤ 1-а черга вже в продажу! ✅ Типи квартир: однокімнатні, двокімнатні, трикімнатні ✦",
            ],
        ];

        $this->view->title = $data[$lang]['title'];

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $data[$lang]['description'],
        ]);

        $multiGalleryModel = MultiGallery::findOne(self::HOME_PAGE_GALLERY);

        $constructionProgressModel = ConstructionProgress::find()
            ->select(["name_short_{$lang}"])
            ->where(['status' => ConstructionProgress::STATUS_ENABLE])
            ->andWhere(['not', ['videos' => null]])
            ->orderBy(['created_at' => SORT_DESC])
            ->one();

        return $this->render('index', [
            'multiGalleryModel' => $multiGalleryModel,
            'constructionProgressModel' => $constructionProgressModel,
        ]);
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionAboutDeveloper()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('about-developer');
    }

    /**
     * @return string
     */
    public function actionAttraction()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('attraction');
    }

    /**
     * @return string
     */
    public function actionLocation()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('location');
    }

    /**
     * @return string
     */
    public function actionVantage()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        return $this->render('vantage', ['model' => new TerracesSectionSettings()]);
    }

    /**
     * @return string
     */
    public function actionGallery()
    {
        $data = [
            'ru' => [
                'title' => "ЖК «Атмосфера» официальный сайт в Одессе в Аркадии",
            ],
            'ua' => [
                'title' => "ЖК «Атмосфера» офіційний сайт в Одесі в Аркадії",
            ],
        ];

        $this->view->title = $data[Yii::$app->language]['title'];

        $models = Gallery::find()
            ->where(['status' => Gallery::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('gallery', ['models' => $models]);
    }
}
