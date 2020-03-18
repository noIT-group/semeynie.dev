<?php

namespace common\models\settings;

use Yii;

class InfrastructureSecondSectionSettings extends Settings
{
    public static $SECTION = 'InfrastructureSecondSectionSettings';

    public $name_ru;
    public $name_ua;
    public $title_ru;
    public $title_ua;
    public $body_ru;
    public $body_ua;
    public $list_1_ru;
    public $list_1_ua;
    public $list_2_ru;
    public $list_2_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Заголовок секции (RU)',
            'name_ua' => 'Заголовок секции (UA)',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание секции (RU)',
            'body_ua' => 'Описание секции (UA)',
            'list_1_ru' => 'Пункт 1 (Бутики) (RU)',
            'list_1_ua' => 'Пункт 1 (Бутики) (UA)',
            'list_2_ru' => 'Пункт 2 (Рестораны) (RU)',
            'list_2_ua' => 'Пункт 2 (Рестораны) (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [['title_ru', 'title_ua', 'body_ru', 'body_ua'], 'string'],
            [['list_1_ru', 'list_1_ua', 'list_2_ru', 'list_2_ua'], 'each', 'rule' => ['safe']],
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
                "list_1_{$language}" => $this->unserializeAttribute("list_1_{$language}", self::$SECTION),
                "list_2_{$language}" => $this->unserializeAttribute("list_2_{$language}", self::$SECTION),
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

            $settings->set("body_{$language}", $this->getValue("body_{$language}"), self::$SECTION, 'string');

            $this->serializeAttribute("list_1_{$language}", self::$SECTION);

            $this->serializeAttribute("list_2_{$language}", self::$SECTION);

        }

        return true;
    }
}