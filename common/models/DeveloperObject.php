<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "developer_object".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $image_logo
 * @property string $image_illustration
 * @property string $body_ru
 * @property string $body_ua
 * @property string $link
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class DeveloperObject extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'developer_object';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['body_ru', 'body_ua'], 'string'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua', 'link'], 'string', 'max' => 255],

            [['image_logo', 'image_illustration'], 'image', 'extensions' => 'jpeg, jpg, png'],
            [['image_logo'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['image_illustration'], 'image', 'skipOnEmpty' => true, 'on' => ['default']],
            [['image_logo', 'image_illustration'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],
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
                    'image_logo' => [
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
                        ],
                        'attribute' => 'image_logo',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/developer-object/{id}/logotype',
                        'url' => '@cdnUrl/developer-object/{id}/logotype',
                    ],
                    'image_illustration' => [
                        'class' => UploadImageBehavior::className(),
                        'createThumbsOnSave' => true,
                        'createThumbsOnRequest' => true,
                        'generateNewName' => true,
                        'attribute' => 'image_illustration',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/developer-object/{id}/illustration',
                        'url' => '@cdnUrl/developer-object/{id}/illustration',
                    ],
                ],
            ],
        ];
    }

}
