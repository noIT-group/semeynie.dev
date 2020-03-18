<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "about_developer_slider".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $image
 * @property string $image_tone
 * @property string $title_ru
 * @property string $title_ua
 * @property string $body_ru
 * @property string $body_ua
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class AboutDeveloperSlider extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_developer_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['title_ru', 'title_ua', 'body_ru', 'body_ua'], 'string'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 100],
            [['image'], 'image', 'minWidth' => 1920, 'minHeight'  => 600, 'maxSize' => 10000 * 1024],
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'jpeg, jpg, png', 'on' => 'default'],
            [['image'], 'image', 'skipOnEmpty' => true, 'on' => 'update'],

            [['image_tone'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],
            [['image_tone'], 'image', 'skipOnEmpty' => true, 'on' => ['default', 'update']],
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
                        'path' => '@cdn/about-developer-slider/{id}',
                        'url' => '@cdnUrl/about-developer-slider/{id}',
                    ],
                    'image_tone' => [
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
                        'attribute' => 'image_tone',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/about-developer-slider/{id}',
                        'url' => '@cdnUrl/about-developer-slider/{id}',
                    ],
                ],
            ],
        ];
    }
}
