<?php
namespace frontend\controllers;

use common\models\ConsultationFeedback;
use common\models\Feedback;
use common\models\RecallFeedback;
use common\models\Subscribe;
use Yii;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Feedback controller
 */
class FeedbackController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {

            $formData = Yii::$app->request->post();

            $modelName = base64_decode($formData['model']);

            if(isset($formData['secret_form_key']) && $formData['secret_form_key'] === Feedback::SECRET_KEY) {

                if(!class_exists($modelName)) {
                    throw new NotFoundHttpException('Page not found');
                }

                /** @var Feedback $model */
                $model = new $modelName();

                if ($model->load($formData)) {

                    if ($model->save() && $model->sendEmail()) {
                        return true;
                    } else {
                        throw new NotFoundHttpException("Can't send form");
                    }

                }

            } else {
                return true;
            }

        } else {

            $formData = Yii::$app->request->post();

            $modelName = base64_decode($formData['model']);

            if(isset($formData['secret_form_key']) && $formData['secret_form_key'] === Subscribe::SECRET_KEY) {

                if(!class_exists($modelName)) {
                    throw new NotFoundHttpException('Page not found');
                }

                /** @var Feedback $model */
                $model = new $modelName();

                if ($model->load(Yii::$app->request->post())) {

                    if ($model->save() && $model->sendEmail()) {
                        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
                    } else {
                        throw new NotFoundHttpException("Can't send form");
                    }

                }

            } else {
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
            }

        }

    }
}
