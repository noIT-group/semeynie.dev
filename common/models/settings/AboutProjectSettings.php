<?php

namespace common\models\settings;

use Yii;

class AboutProjectSettings extends Settings
{
    public static $SECTION = 'AboutProjectSettings';

    public $name_ru;
    public $name_ua;
    public $body_ru;
    public $body_ua;

    public function attributeLabels()
    {
        return [
            'name_ru' => 'Заголовок (RU)',
            'name_ua' => 'Заголовок (UA)',
            'body_ru' => 'Описание (RU)',
            'body_ua' => 'Описание (UA)',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body_ru', 'body_ua'], 'required'],
            [['body_ru', 'body_ua'], 'string'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],
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
        }

        return true;
    }
}