<?php

namespace common\models\settings;

use Yii;

class NumberSectionSettings extends Settings
{
    public static $SECTION = 'NumberSectionSettings';

    public $list_ru;
    public $list_ua;

    public function attributeLabels()
    {
        return [
            'list_ru' => 'Цифры (RU)',
            'list_ua' => 'Цифры (UA)',
        ];
    }

    public function rules()
    {
        return [
            [['list_ru', 'list_ua'], 'each', 'rule' => ['safe']],
        ];
    }

    public function init()
    {
        parent::init();

        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {

            $this->setAttributes([
                "list_{$language}" => $this->unserializeAttribute("list_{$language}", self::$SECTION)
            ]);

        }

    }

    /**
     * @return bool
     */
    public function save()
    {
        $languages = Yii::$app->languageHelper->getLanguages();

        foreach($languages as $language) {
            $this->serializeAttribute("list_{$language}", self::$SECTION);
        }

        return true;
    }
}