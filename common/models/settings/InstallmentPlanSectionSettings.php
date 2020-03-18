<?php

namespace common\models\settings;

use Yii;

class InstallmentPlanSectionSettings extends Settings
{
    public static $SECTION = 'InstallmentPlanSectionSettings';

    public $title_ru;
    public $title_ua;
    public $name_ru;
    public $name_ua;
    public $list_ru;
    public $list_ua;
    public $button_text_ru;
    public $button_text_ua;

    public function attributeLabels()
    {
        return [
            'title_ru' => 'Заголовок секции (RU)',
            'title_ua' => 'Заголовок секции (UA)',
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'list_ru' => 'Визуализация (RU)',
            'list_ua' => 'Визуализация (UA)',
            'button_text_ru' => 'Текст на кнопке расчета платежей (RU)',
            'button_text_ua' => 'Текст на кнопке расчета платежей (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['title_ru', 'title_ua'], 'required'],
            [['name_ru', 'name_ua', 'button_text_ru', 'button_text_ua'], 'string'],
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
                "name_{$language}" => $settings->get("name_{$language}", self::$SECTION),
                "list_{$language}" =>  $this->unserializeAttribute("list_{$language}", self::$SECTION),
                "button_text_{$language}" =>  $settings->get("button_text_{$language}", self::$SECTION)
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
            $this->serializeAttribute("list_{$language}", self::$SECTION);
            $settings->set("button_text_{$language}", $this->getValue("button_text_{$language}"), self::$SECTION, 'string');

        }

        return true;
    }
}