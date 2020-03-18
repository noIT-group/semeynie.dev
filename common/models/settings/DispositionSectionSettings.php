<?php

namespace common\models\settings;

use Yii;

class DispositionSectionSettings extends Settings
{
    public static $SECTION = 'DispositionSectionSettings';

    public $title_ru;
    public $title_ua;
    public $name_ru;
    public $name_ua;
    public $body_1_ru;
    public $body_1_ua;
    public $short_message_ru;
    public $short_message_ua;
    public $body_2_ru;
    public $body_2_ua;
    public $list_ru;
    public $list_ua;

    public function attributeLabels()
    {
        return [
            'title_ru' => 'Заголовок секции (RU)',
            'title_ua' => 'Заголовок секции (UA)',
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'body_1_ru' => 'Описание, часть 1 (RU)',
            'body_1_ua' => 'Описание, часть 1 (UA)',
            'short_message_ru' => 'Короткий посыл (RU)',
            'short_message_ua' => 'Короткий посыл (UA)',
            'body_2_ru' => 'Описание, часть 2 (RU)',
            'body_2_ua' => 'Описание, часть 2 (UA)',
            'list_ru' => 'Преимущества (RU)',
            'list_ua' => 'Преимущества (RU)',
        ];
    }

    public function rules()
    {
        return [
            [['title_ru', 'title_ua'], 'required'],
            [['name_ru', 'name_ua', 'body_1_ru', 'body_1_ua', 'short_message_ru', 'short_message_ua', 'body_2_ru', 'body_2_ua'], 'string'],
            [['list_ru', 'list_ua'], 'each', 'rule' => ['safe']],
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
                "name_{$language}" =>  $settings->get("name_{$language}", self::$SECTION),
                "body_1_{$language}" => $settings->get("body_1_{$language}", self::$SECTION),
                "short_message_{$language}" => $settings->get("short_message_{$language}", self::$SECTION),
                "body_2_{$language}" => $settings->get("body_2_{$language}", self::$SECTION),
                "list_{$language}" => $this->unserializeAttribute("list_{$language}", self::$SECTION)
            ]);

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

            $settings->set("name_{$language}", $this->getValue("name_{$language}"), self::$SECTION, 'string');

            $settings->set("body_1_{$language}", $this->getValue("body_1_{$language}"), self::$SECTION, 'string');

            $settings->set("short_message_{$language}", $this->getValue("short_message_{$language}"), self::$SECTION, 'string');

            $settings->set("body_2_{$language}", $this->getValue("body_2_{$language}"), self::$SECTION, 'string');

            $this->serializeAttribute("list_{$language}", self::$SECTION);

        }

        return true;
    }
}