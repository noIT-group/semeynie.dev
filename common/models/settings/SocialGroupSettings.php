<?php

namespace common\models\settings;

use Yii;

class SocialGroupSettings extends Settings
{
    public static $SECTION = 'SocialGroupSettings';

    public $social_network;
    public $messengers;

    public function attributeLabels()
    {
        return [
            'social_network' => 'Каналы и группы',
            'messengers' => 'Официальные чаты',
        ];
    }

    public function rules()
    {
        return [
            [['social_network', 'messengers'], 'each', 'rule' => ['safe']]
        ];
    }

    public function init()
    {
        parent::init();

        $this->social_network = $this->unserializeAttribute('social_network', self::$SECTION);
        $this->messengers = $this->unserializeAttribute('messengers', self::$SECTION);
    }

    public function save()
    {
        $this->serializeAttribute('social_network', self::$SECTION);
        $this->serializeAttribute('messengers', self::$SECTION);

        return true;
    }
}