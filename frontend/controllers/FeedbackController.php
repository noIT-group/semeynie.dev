<?php

namespace frontend\controllers;

use common\models\Feedback;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Feedback controller
 */
class FeedbackController extends Controller
{
    const REMOTE_URI = '/remote-lead';
    const PROJECT_ID = 111111;

    private $status = 'error';

    /**
     * @return array|Response
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
            return $this->handleRequest(Yii::$app->request->isAjax);
        } else {
            throw new NotFoundHttpException('not found');
        }
    }

    /**
     * @param bool $isAjax
     * @return array|Response
     * @throws NotFoundHttpException
     */
    protected function handleRequest($isAjax = true)
    {
        if ($isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        }

        $formData = Yii::$app->request->post();

        $modelName = base64_decode($formData['model']);

        $path = explode('\\', $modelName);

        $onlyModelName = array_pop($path);

        $formParams = Yii::$app->request->post($onlyModelName);

        if (isset($formData['secret_form_key']) && $formData['secret_form_key'] === Feedback::SECRET_KEY) {

            if (!class_exists($modelName)) {
                throw new NotFoundHttpException('Page not found');
            }

            /** @var Feedback $model */
            $model = new $modelName();

            if ($model->load($formData) && $model->save()) {

                $this->status = 'success';

                if (!$this->sendRequestToEstateLead($formParams)) {
                    $model->sendEmail();
                }

            }

        }

        if ($isAjax) {
            return ['status' => $this->status];
        } else {
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

    }

    /**
     * @param $formParams array
     * @return bool|mixed
     */
    public function sendRequestToEstateLead($formParams)
    {

        if (YII_ENV_DEV) {
            return true;
        }

        $url = Yii::$app->estateWidget->getDomain() . self::REMOTE_URI;

        $formParams = array_merge($formParams, [
            'project_id' => self::PROJECT_ID,
            'source' => Yii::$app->request->referrer,
        ]);

        /**
         * @var $client Client
         */
        $client = new Client();

        try {

            $response = $client->request('POST', $url, [
                'form_params' => $formParams,
            ]);

            if (($response = $response->getBody())) {

                $response = json_decode($response, true);

                return (isset($response['status']) && $response['status']) ? true : false;
            } else {
                return false;
            }

        } catch (GuzzleException $e) {
            return false;
        }
    }
}
