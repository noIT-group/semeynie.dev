<?php

namespace common\models;

use Yii;
use mohorev\file\UploadImageBehavior;
use yii\behaviors\TimestampBehavior;
use noIT\upload\UploadsBehavior;
use Imagine\Image\ManipulatorInterface;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $image
 * @property string $file
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class Document extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],

            [['image'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],

            [['image'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['image'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],

            [['file'], 'file', 'skipOnEmpty' => true, 'on' => ['default', 'update']],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'imageUploads' => [
                'class' => UploadsBehavior::className(),
                'attributes' => [
                    'image' => [
                        'class' => UploadImageBehavior::className(),
                        'createThumbsOnSave' => true,
                        'createThumbsOnRequest' => true,
                        'generateNewName' => true,
                        'thumbs' => [
                            'thumb-big' => [
                                'width' => 860,
                                'quality' => 90,
                                'mode' => ManipulatorInterface::THUMBNAIL_OUTBOUND
                            ],
                            'thumb-small' => [
                                'width' => 222,
                                'height' => 318,
                                'quality' => 90,
                                'mode' => ManipulatorInterface::THUMBNAIL_OUTBOUND
                            ],
                        ],
                        'attribute' => 'image',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/document/{id}',
                        'url' => '@cdnUrl/document/{id}',
                    ],
                    'file' => [
                        'class' => UploadImageBehavior::className(),
                        'createThumbsOnSave' => true,
                        'createThumbsOnRequest' => true,
                        'generateNewName' => true,
                        'attribute' => 'file',
                        'scenarios' => ['default'],
                        'path' => '@cdn/document/{id}',
                        'url' => '@cdnUrl/document/{id}',
                    ],
                ],
            ],
        ];
    }
}
