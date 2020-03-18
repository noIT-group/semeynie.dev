<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $logotype
 * @property string $url
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class Project extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ru', 'sort_order'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ru', 'url'], 'string', 'max' => 255],

            [['logotype'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],

            [['logotype'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['logotype'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],

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
                    'logotype' => [
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
                                'width' => 200,
                                'height' => 280,
                                'quality' => 90,
                                'mode' => ManipulatorInterface::THUMBNAIL_OUTBOUND
                            ],
                        ],
                        'attribute' => 'logotype',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/project/{id}',
                        'url' => '@cdnUrl/project/{id}',
                    ],
                ],
            ],
        ];
    }
}
