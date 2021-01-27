<?php

namespace frontend\widgets;

use Yii;
use common\models\Feedback;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class FormWidget extends Widget
{
    const VIEW_TYPE_RECALL = 'recall';
    const VIEW_TYPE_CONSULTATION = 'consultation';
    const VIEW_TYPE_WRITE_US = 'write_us';

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

        if(!in_array($this->view_type, [self::VIEW_TYPE_RECALL, self::VIEW_TYPE_CONSULTATION, self::VIEW_TYPE_WRITE_US])) {
            throw new NotFoundHttpException('incorrect value $view_type');
        }

        $model = new Feedback();

        $form_name = isset(Yii::$app->view->params['form_name']) ? Yii::$app->view->params['form_name'] : '-';

        return $this->render("form/{$this->view_type}", ['model' => $model, 'form_name' => $form_name]);
    }
}