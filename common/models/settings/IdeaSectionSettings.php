<?php

namespace common\models\settings;

use Yii;

class IdeaSectionSettings extends Settings
{
    public static $SECTION = 'IdeaSectionSettings';

    public $name_ru;
    public $name_ua;
    public $title_ru;
    public $title_ua;
    public $title_summary_ru;
    public $title_summary_ua;
    public $body_1_ru;
    public $body_1_ua;
    public $body_2_ru;
    public $body_2_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Название секции (RU)',
            'name_ua' => 'Название секции (UA)',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'title_summary_ru' => 'Подпись к заголовку (RU)',
            'title_summary_ua' => 'Подпись к заголовку (UA)',
            'body_1_ru' => 'Текст 1 (RU)',
            'body_1_ua' => 'Текст 1 (UA)',
            'body_2_ru' => 'Текст 2 (RU)',
            'body_2_ua' => 'Текст 2 (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [[
                'title_ru', 'title_ua',
                'title_summary_ru', 'title_summary_ua',
                'body_1_ru', 'body_1_ua',
                'body_2_ru', 'body_2_ua'
            ], 'string'],
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
                "title_summary_{$language}" => $settings->get("title_summary_{$language}", self::$SECTION),
                "body_1_{$language}" => $settings->get("body_1_{$language}", self::$SECTION),
                "body_2_{$language}" => $settings->get("body_2_{$language}", self::$SECTION),
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

            $settings->set("name_{$language}", $this->getValue("name_{$language}"), self::$SECTION, 'string');

            $settings->set("title_{$language}", $this->getValue("title_{$language}"), self::$SECTION, 'string');

            $settings->set("title_summary_{$language}", $this->getValue("title_summary_{$language}"), self::$SECTION, 'string');

            $settings->set("body_1_{$language}", $this->getValue("body_1_{$language}"), self::$SECTION, 'string');

            $settings->set("body_2_{$language}", $this->getValue("body_2_{$language}"), self::$SECTION, 'string');

        }

        return true;
    }
}