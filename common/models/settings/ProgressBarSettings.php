<?php

namespace common\models\settings;

use Yii;

class ProgressBarSettings extends Settings
{
    public static $SECTION = 'ProgressBarSettings';

    public $procent;

    public function attributeLabels()
    {
        return [
            'procent' => 'Процент процесса строительства',
        ];
    }

    public function rules()
    {
        return [
            [['procent'], 'integer'],
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $this->procent = $settings->get('procent', self::$SECTION);
    }

    /**
     * @return bool
     */
    public function save()
    {
        $settings = Yii::$app->settings;

        $settings->set('procent', $this->procent, self::$SECTION, 'string');

        return true;
    }
}