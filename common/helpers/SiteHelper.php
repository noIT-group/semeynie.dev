<?php
namespace common\helpers;

use Yii;
use yii\web\NotFoundHttpException;

class SiteHelper
{
	/**
	 * @param $subject
	 * @param $data
	 *
	 * @throws NotFoundHttpException
	 */
	public static function sendEmail($subject, $data)
	{
		$adminEmail = Yii::$app->siteSettingsComponent->getAdminEmail();

		if( !(Yii::$app->mailer->compose()
		                       ->setFrom('notify@davinci-med.ru')
		                       ->setTo($adminEmail)
		                       ->setSubject($subject)
		                       ->setTextBody($data)
		                       ->send()) ) {
			throw new NotFoundHttpException('Error in mail sending');
		}  else {
			return true;
		}

	}
}