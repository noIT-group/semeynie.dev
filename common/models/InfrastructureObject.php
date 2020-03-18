<?php

namespace common\models;

use noIT\core\behaviors\SerializedAttributes;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "infrastructure_object".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_ua
 * @property string $slug
 * @property string $body_ru
 * @property string $body_ua
 * @property string $category_number
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class InfrastructureObject extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infrastructure_object';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_ua', 'category_number', 'sort_order'], 'required'],
            [['body_ru', 'body_ua'], 'string'],
            [['status', 'category_number', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['title_ru', 'title_ua', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title_ru',
            ],
        ];
    }
}
