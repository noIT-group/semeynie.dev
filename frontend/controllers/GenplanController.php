<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GenplanController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['form_name'] = 'Генплан СТ';
        Yii::$app->view->params['body__class'] = 'genplan page';

        return $this->render('index');
    }

    /**
     * @param $section_number string
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($section_number)
    {
        $section_number = intval($section_number);

        if(in_array($section_number, [1, 2, 3, 4])) {

            $this->view->params['form_name'] = 'Секция СТ';
            Yii::$app->view->params['body__class'] = 'section page';

            if(in_array($section_number, [1, 2])) {
                $view = 'section-1';
            } else {
                $view = 'section-2';
            }

            return $this->render($view, [
                'section_number' => $section_number,
            ]);
        } else {
            throw new NotFoundHttpException('not found');
        }
    }
}