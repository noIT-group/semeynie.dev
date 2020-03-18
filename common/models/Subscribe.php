<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "subscribe".
 *
 * @property int $id
 * @property string $ip
 * @property string $name
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Subscribe extends \yii\db\ActiveRecord
{
    const SECRET_KEY = 'not-machine';

    public $secret_form_key;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 255],
            ['secret_form_key', 'string', 'max' => 50],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ],
        ];
    }

    public function beforeSave($insert)
    {
        $this->ip = $_SERVER['REMOTE_ADDR'];

        return parent::beforeSave($insert);
    }
}