<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "queue".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Section[] $sections
 */
class Queue extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],
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
    public static function getAllQueue() {
        return Queue::find()->where(['status' => Queue::STATUS_ENABLE])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['queue_id' => 'id']);
    }
}
