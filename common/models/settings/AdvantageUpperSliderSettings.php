<?php

namespace common\models\settings;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class AdvantageUpperSliderSettings extends Settings
{
    const ENABLE = 10;
    const DISABLE = 0;

    const IMAGE_FOLDER = 'advantage-upper-slider';

    public static $SECTION = 'AdvantageUpperSliderSettings';

    public $title_ru;
    public $title_ua;
    public $links_ru;
    public $links_ua;
    public $image;

    /**
     * @var boolean
     */
    public $image_remove;

    public function attributeLabels()
    {
        return [
            'title_ru' => 'Заголовок страницы (RU)',
            'title_ua' => 'Заголовок страницы (UA)',
            'links_ru' => 'Ссылки на секции (RU)',
            'links_ua' => 'Ссылки на секции (UA)',
            'image' => 'Фоновая иллюстрация'
        ];
    }

    public function rules()
    {
        return [
            [['image_remove'], 'integer'],
            [['title_ru', 'title_ua'], 'required'],
            [['links_ru', 'links_ua'], 'each', 'rule' => ['safe']],

            [['image'], 'image', 'minWidth' => 1920, 'minHeight'  => 600, 'maxSize' => 10000 * 1024],
            [['image'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png', 'on' => 'default'],
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
                "links_{$language}" => $this->unserializeAttribute("links_{$language}", self::$SECTION),
            ]);

        }

        if( $image = $settings->get('image', static::$SECTION) ) {
            $this->image = Yii::getAlias("@cdnUrl/" . self::IMAGE_FOLDER ."/$image");
        } else {
            $this->image = null;
        }

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

            $this->serializeAttribute("links_{$language}", self::$SECTION);

        }

        if($this->image_remove == AdvantageUpperSliderSettings::ENABLE) {
            $settings->delete('image', static::$SECTION);
        }

        if ( ($image = $this->uploadImage()) ) {
            $settings->set('image', $image, static::$SECTION, 'string');
        }

        return true;
    }

    /**
     * @return bool|string
     * @throws \yii\base\Exception
     */
    private function uploadImage()
    {
        $image = UploadedFile::getInstance($this, 'image');

        if(!$image) {
            return false;
        }

        $imageName = "{$image->baseName}.{$image->extension}";

        $folderPath = Yii::getAlias("@cdn/" . self::IMAGE_FOLDER);

        $imageAbsolutePath = $folderPath . "/$imageName" ;

        if(!is_dir($folderPath)) {
            FileHelper::createDirectory($folderPath);
        }

        if ( !$image->saveAs($imageAbsolutePath) ) {

            $this->addError('image', 'File not saved');

            return false;
        }

        return $imageName;
    }
}