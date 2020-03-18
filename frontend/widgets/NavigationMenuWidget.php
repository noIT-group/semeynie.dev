<?php

namespace frontend\widgets;

use yii\jui\Widget;
use yii\web\NotFoundHttpException;

class NavigationMenuWidget extends Widget
{
    const HEADER_VIEW_TYPE = 'header';
    const BURGER_VIEW_TYPE = 'burger';
    const FOOTER_VIEW_TYPE = 'footer';

    public $view_type;

    private $view_path;

    public function init()
    {
        $this->view_path = '@frontend/widgets/views/navigation-menu/';

        parent::init();
    }

    /**
     * @return string|void
     */
    public function run()
    {
        if(!$this->view_type) {
            throw new NotFoundHttpException();
        }

        return $this->render($this->viewPath . '', []);
    }
}