<?php

namespace common\models\settings;

use Yii;

class NavigationMenuSettings extends Settings
{
    public static $SECTION = 'NavigationMenuSettings';

    public $header_menu;
    public $burger_menu;
    public $footer_menu;

    public function attributeLabels()
    {
        return [
            'header_menu' => 'Строковое меню',
            'burger_menu' => 'Бургер меню',
            'footer_menu' => 'Меню в подвале',
        ];
    }

    public function rules()
    {
        return [
            [['header_menu', 'burger_menu', 'footer_menu'], 'each', 'rule' => ['safe']]
        ];
    }

    public function init()
    {
        parent::init();

        $settings = Yii::$app->settings;

        $this->header_menu = unserialize($settings->get('header_menu', self::$SECTION));
        $this->burger_menu = unserialize($settings->get('burger_menu', self::$SECTION));
        $this->footer_menu = unserialize($settings->get('footer_menu', self::$SECTION));

    }

    /**
     * @return bool
     */
    public function save()
    {
        $this->serializeAttribute('header_menu', self::$SECTION);
        $this->serializeAttribute('burger_menu', self::$SECTION);
        $this->serializeAttribute('footer_menu', self::$SECTION);

        return true;
    }
}