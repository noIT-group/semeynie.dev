<?php

namespace noIT\auth\controllers;

use Yii;
use Da\User\Event\FormEvent;
use Da\User\Form\LoginForm;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SecurityController extends \Da\User\Controller\SecurityController
{
    /**
     * Controller action responsible for handling login page and actions.
     *
     * @return array|string|Response
     * @throws InvalidParamException
     * @throws InvalidConfigException
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->getIsGuest()) {
            return $this->goHome();
        }

        /** @var LoginForm $form */
        $form = $this->make(LoginForm::className());

        /** @var FormEvent $event */
        $event = $this->make(FormEvent::className(), [$form]);

        if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($form);
        }

        if ($form->load(Yii::$app->request->post())) {

            if ($this->module->enableTwoFactorAuthentication && $form->validate()) {

                if ($form->getUser()->auth_tf_enabled) {
                    Yii::$app->session->set('credentials', ['login' => $form->login, 'pwd' => $form->password]);

                    return $this->redirect(['confirm']);
                }

            }

            $this->trigger(FormEvent::EVENT_BEFORE_LOGIN, $event);

            if ($form->login()) {
                $form->getUser()->updateAttributes([
                    'last_login_at' => time(),
                    'last_login_ip' => Yii::$app->request->getUserIP(),
                ]);

                $this->trigger(FormEvent::EVENT_AFTER_LOGIN, $event);

                return $this->goBack();
            } else {
                $this->trigger(FormEvent::EVENT_FAILED_LOGIN, $event);
            }

        }

        return $this->render(
            '@backend/views/site/login',
            [
                'model' => $form,
                'module' => $this->module,
            ]
        );
    }
}