<?php

namespace common\models\settings;

use Yii;

class AboutDeveloperProjectSettings extends Settings
{
    public static $SECTION = 'AboutDeveloperProjectSettings';

    public $body_ru;
    public $body_ua;

    public function attributeLabels()
    {
        return [
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
            [['body_ru', 'body_ua'], 'string'],
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $this->setAttributes([
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
            $settings->set("body_{$language}", $this->getValue("body_{$language}"), self::$SECTION, 'string');
        }

        return true;
    }
}