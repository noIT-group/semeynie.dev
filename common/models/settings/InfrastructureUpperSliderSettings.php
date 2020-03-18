<?php

namespace common\models\settings;

use Yii;
use yii\helpers\BaseFileHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class InfrastructureUpperSliderSettings extends Settings
{
    const IMAGE_FOLDER = 'infrastructure-upper-slider';

    public static $SECTION = 'InfrastructureUpperSliderSettings';

    public $title_ru;
    public $title_ua;
    public $links_ru;
    public $links_ua;
    public $image;

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
            [['title_ru', 'title_ua'], 'required'],
            [['links_ru', 'links_ua'], 'each', 'rule' => ['safe']],

            [['image'], 'image', 'minWidth' => 1920, 'minHeight'  => 600, 'maxSize' => 10000 * 1024],
            [['image'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png'],
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
                "links_{$language}" => $this->unserializeAttribute("links_{$language}", self::$SECTION)
            ]);

        }

        $image = $settings->get('image', static::$SECTION);

        $this->image = Yii::getAlias("@cdnUrl/" . self::IMAGE_FOLDER ."/$image");
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