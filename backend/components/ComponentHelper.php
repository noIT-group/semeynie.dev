<?php
namespace backend\components;

class ComponentHelper extends \yii\base\Component
{
	public function getSortOrderRange()
	{
		$range = [];

		for($i = 1; $i < 101; $i++) {
			$range[] = [ 'value' => $i, 'label' => $i ];
		}

		return $range;
	}

	public function getStatus()
	{
		$status = [];

		$status[] = [ 'value' => 10, 'label' => 'Видимый'];
		$status[] = [ 'value' => 0, 'label' => 'Скрытый'];

		return $status;
	}

	public function getHours()
	{
		$hours = [];

		for($i = 0; $i < 24; $i++) {

			if($i < 10) {
				$label = "0{$i}";
			}  else {
				$label = $i;
			}

			$hours[] = [ 'value' => $i, 'label' => $label];

		}

		return $hours;
	}

	public function getMinutes()
	{
		$minutes = [];

		for($i = 0; $i < 60; $i++) {

			if($i < 10) {
				$label = "0{$i}";
			} else {
				$label = $i;
			}

			$minutes[] = [ 'value' => $i, 'label' => $label];

		}

		return $minutes;
	}

	public function arrayMutator($array)
	{
		$mutatedArray = [];

		if (!empty($array) && is_array($array)) {

			foreach($array as $k => $item) {
				$mutatedArray[] = [ 'value' => $item, 'label' => $item ];
			}

		}

		return $mutatedArray;
	}


	public function range($start, $end)
	{
		$mutatedArray = [];

		$index = $start;

		for($i = 0; $i < $end; $i++) {
			$mutatedArray[] = [ 'value' => $index, 'label' => $index ];
			$index++;
		}

		return $mutatedArray;
	}

}