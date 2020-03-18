<?php

namespace common\models\settings;

use Yii;

class LocationSectionSettings extends Settings
{
    public static $SECTION = 'LocationSectionSettings';

    public $name_ru;
    public $name_ua;
    public $body_ru;
    public $body_ua;
    public $button_text_ru;
    public $button_text_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Заголовок/посыл (RU)',
            'name_ua' => 'Заголовок/посыл (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
            'button_text_ru' => 'Текст на кнопке выбора квартиры (RU)',
            'button_text_ua' => 'Текст на кнопке выбора квартиры (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [['body_ru', 'body_ua', 'button_text_ru', 'button_text_ua'], 'string'],
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
                "body_{$language}" => $settings->get("body_{$language}", self::$SECTION),
                "button_text_{$language}" => $settings->get("button_text_{$language}", self::$SECTION),
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
            $settings->set("body_{$language}", $this->getValue("body_{$language}"), self::$SECTION, 'string');
            $settings->set("button_text_{$language}", $this->getValue("button_text_{$language}"), self::$SECTION, 'string');

        }

        return true;
    }
}