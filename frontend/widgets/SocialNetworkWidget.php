<?php

namespace frontend\widgets;

use frontend\models\SocialGroupSettings;
use Yii;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class SocialNetworkWidget extends Widget
{
    const VIEW_TYPE_SIDEBAR = 'sidebar';
    const VIEW_TYPE_FOOTER = 'footer';

    /**
     * @var $view_type string
     */
    public $view_type;

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function run()
    {
        if(!($this->view_type)) {
            throw new NotFoundHttpException('not init $view_type');
        }

        if(!in_array($this->view_type, [self::VIEW_TYPE_SIDEBAR, self::VIEW_TYPE_FOOTER])) {
            throw new NotFoundHttpException('incorrect value $view_type');
        }

        $socialGroupSettings = SocialGroupSettings::getSocialNetwork();

        return $this->render("social-network/{$this->view_type}", [
            'socialGroupSettings' => $socialGroupSettings,
        ]);
    }
}