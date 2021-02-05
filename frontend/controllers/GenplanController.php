<?php

namespace frontend\controllers;

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
     * @param $section_number string
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($section_id)
    {
        $section_id = intval($section_id);

        if (in_array($section_id, [151, 152, 153, 154])) {

            if (($floorModels = $this->getFloors($section_id))) {
                $floorModels = $this->transformFloors($floorModels);
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

    /**
     * @param $section_number
     * @return mixed|void
     */
    protected function getFloors($section_number)
    {
        try {

            $url = EstateWidgetComponent::WIDGET_DOMAIN . '/api/floors';

            $body = ['token' => EstateWidgetComponent::API_TOKEN];

            $response = Request::post($url, [], $body);

            if ($response && ($body = $response->body)) {
                return isset($body->response) ? $body->response : null;
            }

        } catch (\Exception $exception) {
            exit($exception);
        }

    }

    /**
     * @param $floorModels
     * @return mixed
     */
    protected function transformFloors($floorModels)
    {
        $widget_domain = Yii::$app->estateWidget->getProjectUrl();

        foreach ($floorModels as &$floorModel) {

            $floorModel->number_txt = $floorModel->number . ' ' . Yii::t('app', 'floor_txt');

            $floorModel->available_flats = intval($floorModel->available_flats);

            $floorModel->iframe_url = "{$widget_domain}/{$floorModel->section_id}/flats/{$floorModel->id}";

            if (($floorModel->available_flats)) {
                $floorModel->available_flats_txt = ' ' . Yii::t('app', 'in_sale_txt', ['value' => $floorModel->available_flats]);
            } else {
                $floorModel->available_flats_txt = Yii::t('app', 'none_in_sale_txt');
            }

        }

        return $floorModels;
    }
}