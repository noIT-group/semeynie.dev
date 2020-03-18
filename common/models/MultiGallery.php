<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "multi_gallery".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 */
class MultiGallery extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'multi_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название галлереи',
        ];
    }

    public function behaviors()
    {
        return [
            'multi-gallery' => [
                'class' => GalleryBehavior::className(),
                'type' => 'multi-gallery',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@cdn') . '/multi-gallery',
                'url' => Yii::getAlias('@cdnUrl') . '/multi-gallery',
                'versions' => [
                    'thumb_idea_section' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(1000, 563));
                    },
                ]
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }
}
