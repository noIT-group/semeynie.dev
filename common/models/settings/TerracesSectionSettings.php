<?php

namespace common\models\settings;

use Yii;
use yii\base\ModelEvent;
use zxbodya\yii2\galleryManager\GalleryBehavior;

class TerracesSectionSettings extends Settings
{
    public static $SECTION = 'TerracesSectionSettings';

    const EVENT_AFTER_UPDATE = 'afterUpdate';
    const EVENT_BEFORE_DELETE = 'beforeDelete';
    const EVENT_AFTER_FIND = 'afterFind';

    public $title_ru;
    public $title_ua;
    public $name_ru;
    public $name_ua;
    public $body_ru;
    public $body_ua;

    public $id = 'terraces-section-settings';

    public function attributeLabels()
    {
        return [
            'title_ru' => 'Заголовок секции (RU)',
            'title_ua' => 'Заголовок секции (UA)',
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['title_ru', 'title_ua'], 'required'],
            [['name_ru', 'name_ua', 'body_ru', 'body_ua'], 'string'],
        ];
    }

    public function behaviors()
    {
        return [
            'gallery' => [
                'class' => GalleryBehavior::className(),
                'type' => 'terraces-section-settings',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@cdn') . '/terraces-section',
                'url' => Yii::getAlias('@cdnUrl') . '/terraces-section',
                'versions' => [
                    'thumb_slider' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(1575, 885));
                    },
                ]
            ],
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $this->setAttributes([
                "title_{$language}" => $settings->get("title_{$language}", self::$SECTION),
                "name_{$language}" => $settings->get("name_{$language}", self::$SECTION),
                "body_{$language}" => $settings->get("body_{$language}", self::$SECTION),
            ]);

        }

        $this->afterFind();
    }

    /**
     * @return bool
     */
    public function save()
    {
        $settings = Yii::$app->settings;

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $settings->set("title_{$language}", $this->getValue("title_{$language}"), self::$SECTION, 'string');
            $settings->set("name_{$language}", $this->getValue("name_{$language}"), self::$SECTION, 'string');
            $settings->set("body_{$language}", $this->getValue("body_{$language}"), self::$SECTION, 'string');

        }

        $this->afterUpdate();

        return true;
    }

    /** ~Gallery Code **/
    public static function getPrimaryKey()
    {
        return ['id'];
    }

    /**
     * @return array
     */
    public static function primaryKey()
    {
        return self::getPrimaryKey();
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        $event = new ModelEvent();
        $this->trigger(self::EVENT_BEFORE_DELETE, $event);

        return $event->isValid;
    }

    public function afterFind()
    {
        $this->trigger(self::EVENT_AFTER_FIND);
    }

    public function afterUpdate()
    {
        $this->trigger(self::EVENT_AFTER_UPDATE);
    }

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->getBehavior('gallery')->getImages();
    }

    /**
     * @param $id
     * @return TerracesSectionSettings
     */
    public static function findOne($id)
    {
        return new TerracesSectionSettings();
    }
}