<?php

namespace common\models\settings;

use Yii;

class LiveNoWithoutHomeSectionSettings extends Settings
{
    public static $SECTION = 'LiveNoWithoutHomeSectionSettings';

    public $name_ru;
    public $name_ua;
    public $title_ru;
    public $title_ua;
    public $body_ru;
    public $body_ua;
    public $video;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Название секции (RU)',
            'name_ua' => 'Название секции (UA)',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'video' => 'Видео (YouTube ID)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [['title_ru', 'title_ua', 'body_ru', 'body_ua', 'video'], 'string'],
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $this->setAttributes([
                "name_{$language}" => $settings->get("name_{$language}", self::$SECTION),
                "title_{$language}" => $settings->get("title_{$language}", self::$SECTION),
                "body_{$language}" => $settings->get("body_{$language}", self::$SECTION),
            ]);

        }

        $this->video = $settings->get('video', self::$SECTION);
    }

    /**
     * @return bool
     */
    public function save()
    {
        $settings = Yii::$app->settings;

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $settings->set("name_{$language}", $this->getValue("name_{$language}"), self::$SECTION, 'string');
            $settings->set("title_{$language}", $this->getValue("title_{$language}"), self::$SECTION, 'string');
            $settings->set("body_{$language}", $this->getValue("body_{$language}"), self::$SECTION, 'string');

        }

        $settings->set('video', $this->video, self::$SECTION, 'string');

        return true;
    }
}