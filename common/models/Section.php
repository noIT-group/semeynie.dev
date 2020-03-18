<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property int $status
 * @property int $queue_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Floor[] $floors
 * @property Queue $queue
 */
class Section extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'queue_id'], 'required'],
            [['status', 'queue_id', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],
            [['queue_id'], 'exist', 'skipOnError' => true, 'targetClass' => Queue::className(), 'targetAttribute' => ['queue_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllSection()
    {
        return Section::find()->where(['status' => Section::STATUS_ENABLE])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloors()
    {
        return $this->hasMany(Floor::className(), ['section_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQueue()
    {
        return $this->hasOne(Queue::className(), ['id' => 'queue_id']);
    }
}
