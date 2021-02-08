<?php

namespace frontend\controllers;

use common\models\estate\EstateFloor;
use frontend\components\EstateWidgetComponent;
use Unirest\Request;
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
     * @param $section_id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($section_id)
    {
        $section_id = intval($section_id);

        if (in_array($section_id, [151, 152, 153, 154])) {

            if (($floorModels = EstateFloor::getFloors($section_id))) {
                $floorModels = EstateFloor::transformFloors($floorModels);
            }

            $this->view->params['form_name'] = 'Секция СТ';
            Yii::$app->view->params['body__class'] = 'section page';

            return $this->render('view', [
                'section_id' => $section_id,
                'floorModels' => $floorModels,
            ]);

        } else {
            throw new NotFoundHttpException('not found');
        }
    }
}