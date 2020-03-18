<?php

namespace common\models\settings;

use Yii;

class AttractionSectionSettings extends Settings
{
    public static $SECTION = 'AttractionSectionSettings';

    public $name_ru;
    public $name_ua;
    public $list_ru;
    public $list_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'list_ru' => 'Список (RU)',
            'list_ua' => 'Список (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
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
                "list_{$language}" => $this->unserializeAttribute("list_{$language}", self::$SECTION),
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
            $this->serializeAttribute("list_{$language}", self::$SECTION);

        }

        return true;
    }
}