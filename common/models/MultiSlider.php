<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "multi_slider".
 *
 * @property int $id
 * @property string $image
 * @property string $type
 * @property string $caption_ru
 * @property string $caption_ua
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class MultiSlider extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    const HOME_TYPE = 'home';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'multi_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'sort_order'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['type'], 'string', 'max' => 50],
            [['caption_ru', 'caption_ua'], 'string', 'max' => 255],

            [['image'], 'image', 'minWidth' => 1920, 'minHeight'  => 600, 'maxSize' => 10000 * 1024],
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'jpeg, jpg, png', 'on' => 'default'],
            [['image'], 'image', 'skipOnEmpty' => true, 'on' => 'update'],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'uploadImageBehavior' => [
                'class' => UploadsBehavior::className(),
                'attributes' => [
                    'image' => [
                        'class' => UploadImageBehavior::className(),
                        'createThumbsOnSave' => true,
                        'createThumbsOnRequest' => true,
                        'generateNewName' => true,
                        'thumbs' => [
                            'thumb' => [
                                'width' => 1920,
                                'height' => 1080,
                                'quality' => 90,
                                'mode' => ManipulatorInterface::THUMBNAIL_OUTBOUND
                            ],
                        ],
                        'attribute' => 'image',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/multi-slider/{id}',
                        'url' => '@cdnUrl/multi-slider/{id}',
                    ],
                ],
            ],

        ];
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::HOME_TYPE => 'Главая страница',
        ];
    }
}
