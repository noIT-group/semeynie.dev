<?php

namespace common\models\estate;

use frontend\components\EstateWidgetComponent;
use Unirest\Request;
use Yii;

class EstateFloor
{
    /**
     * @param $section_number
     * @return mixed|void
     */
    public static function getFloors($section_number)
    {
        try {

            $url = EstateWidgetComponent::WIDGET_DOMAIN . '/api/floors';

            $body = [
                'section_id' => $section_number,
                'token' => EstateWidgetComponent::API_TOKEN
            ];

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
    public static function transformFloors($floorModels)
    {
        if ($floorModels) {

            $widget_domain = Yii::$app->estateWidget->getProjectUrl();

            foreach ($floorModels as &$floorModel) {

                $floorModel->number_txt = $floorModel->number . ' ' . Yii::t('app', 'floor_txt');

                $floorModel->available_flats = intval($floorModel->available_flats);

                $floorModel->iframe_url = "{$widget_domain}/1/flats/{$floorModel->id}";

                if (($floorModel->available_flats)) {
                    $floorModel->available_flats_txt = ' ' . Yii::t('app', 'in_sale_txt', ['value' => $floorModel->available_flats]);
                } else {
                    $floorModel->available_flats_txt = Yii::t('app', 'none_in_sale_txt');
                }

            }

            return $floorModels;

        }
    }
}