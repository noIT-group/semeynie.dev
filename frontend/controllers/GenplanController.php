<?php

namespace frontend\controllers;

use frontend\components\EstateWidgetComponent;
use Yii;
use yii\web\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use yii\web\NotFoundHttpException;

class GenplanController extends Controller
{
    const PROJECT_ID = 5;

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
        /**
         * @var $client Client
         */
        $client = new Client();

        try {

            $request_url = EstateWidgetComponent::WIDGET_DOMAIN . "/api/" . self::PROJECT_ID . "/{$section_number}/{$section_number}/floors";

            $response = $client->request('GET', $request_url);

            if (($body = $response->getBody())) {

                $body = json_decode($body);

                return isset($body->response) ? $body->response : null;
            }

        } catch (GuzzleException $e) {
            return;
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
                $floorModel->available_flats_txt = Yii::t('app', 'in_sale_txt', ['value' => $floorModel->available_flats]);
            } else {
                $floorModel->available_flats_txt = Yii::t('app', 'none_in_sale_txt');
            }

        }

        return $floorModels;
    }
}