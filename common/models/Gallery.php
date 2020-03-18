<?php

namespace common\models;

use noIT\core\behaviors\SerializedAttributes;
use Yii;
use yii\behaviors\TimestampBehavior;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_ua
 * @property string $name_ru
 * @property string $name_ua
 * @property string $body_ru
 * @property string $body_ua
 * @property string $video
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class Gallery extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['title_ru', 'title_ua', 'name_ru', 'name_ua'], 'string', 'max' => 255],
            [['body_ru', 'body_ua'], 'string'],
            [['video'], 'each', 'rule' => ['safe']],
        ];
    }

    public function behaviors()
    {
        return [
            'gallery' => [
                'class' => GalleryBehavior::className(),
                'type' => 'gallery',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@cdn') . '/gallery',
                'url' => Yii::getAlias('@cdnUrl') . '/gallery',
                'versions' => [
                    'thumb' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(1320, 743));
                    },
                ]
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'serializedAttributes' => [
                'class' => SerializedAttributes::className(),
                'attributes' => ['video'],
            ],
        ];
    }
}
