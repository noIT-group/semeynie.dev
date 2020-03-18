<?php
namespace noIT\core\helpers;

use Yii;

class Core {
    /**
     * Get param value from name (key)
     */
    public static function getParam($key, $default = null) {
        $result = $default;

        if (isset(Yii::$app->params[$key])) {
            $result = Yii::$app->params[$key];
        }

        return $result;
    }
}