<?php

namespace common\models\settings;

use Yii;

class AdvantageSectionSettings extends Settings
{
    public static $SECTION = 'AdvantageSectionSettings';

    public $name_ru;
    public $name_ua;
    public $title_ru;
    public $title_ua;
    public $list_ru;
    public $list_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Название секции (RU)',
            'name_ua' => 'Название секции (UA)',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'list_ru' => 'Преимущества (RU)',
            'list_ua' => 'Преимущества (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [['title_ru', 'title_ua'], 'string'],
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
                "name_{$language}" => $settings->get("name_{$language}", self::$SECTION),
                "title_{$language}" => $settings->get("title_{$language}", self::$SECTION),
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

            $settings->set("name_{$language}", $this->getValue("name_{$language}"), self::$SECTION, 'string');

            $settings->set("title_{$language}", $this->getValue("title_{$language}"), self::$SECTION, 'string');

            $this->serializeAttribute("list_{$language}", self::$SECTION);

        }

        return true;
    }
}