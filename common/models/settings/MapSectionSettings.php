<?php

namespace common\models\settings;

use Yii;

class MapSectionSettings extends Settings
{
	public static $SECTION = 'MapSectionSettings';

	public $longitude;
	public $latitude;
	public $zoom;

	public function attributeLabels()
	{
		return [
			'longitude' => 'Долгота',
			'latitude' => 'Широта',
			'zoom' => 'Zoom карты',
		];
	}

	public function rules()
	{
		return [
			[['longitude', 'latitude', 'zoom'], 'required'],
		];
	}

	public function init()
	{
		parent::init();

		$settings = Yii::$app->settings;

		$this->longitude = $settings->get('longitude', self::$SECTION);

		$this->latitude = $settings->get('latitude', self::$SECTION);

		$this->zoom = $settings->get('zoom', self::$SECTION);
	}

	/**
	 * @return bool
	 */
	public function save()
	{
		$settings = Yii::$app->settings;

		$settings->set('longitude', $this->longitude, self::$SECTION, 'string');

		$settings->set('latitude', $this->latitude, self::$SECTION, 'string');

		$settings->set('zoom', $this->zoom, self::$SECTION, 'string');

		return true;
	}
}