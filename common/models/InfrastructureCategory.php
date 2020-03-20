<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "infrastructure_category".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $svg_icon
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property InfrastructureObject[] $infrastructureObjects
 */
class InfrastructureCategory extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infrastructure_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['svg_icon'], 'string'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ]
        ];
    }

    /**
     * @param array $attribute
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getValue($attribute = ['id', 'name_ru'])
    {
        return InfrastructureCategory::find()->select($attribute)->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastructureObjects()
    {
        return $this->hasMany(InfrastructureObject::className(), ['category_id' => 'id']);
    }
}
