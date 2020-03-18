<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "home_slider".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $image
 * @property string $image_mobile
 * @property string $menu_bg_color
 * @property string $body_ru
 * @property string $body_ua
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class HomeSlider extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * @var boolean
     */
    public $image_remove_mobile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_remove_mobile'], 'integer'],
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['body_ru', 'body_ua'], 'string'],
            [['status', 'sort_order'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 100],
            [['menu_bg_color'], 'string', 'max' => 70],

            [['image'], 'image', 'minWidth' => 1920, 'minHeight'  => 600, 'maxSize' => 10000 * 1024],
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'jpeg, jpg, png', 'on' => 'default'],
            [['image'], 'image', 'skipOnEmpty' => true, 'on' => 'update'],

            [['image_mobile'], 'image', 'maxSize' => 10000 * 1024],
            [['image_mobile'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png', 'on' => 'default'],
            [['image_mobile'], 'image', 'skipOnEmpty' => true, 'on' => 'update'],

            [['created_at', 'updated_at'], 'integer'],
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
                        'path' => '@cdn/home-slider/{id}',
                        'url' => '@cdnUrl/home-slider/{id}',
                    ],
                    'image_mobile' => [
                        'class' => UploadImageBehavior::className(),
                        'createThumbsOnSave' => true,
                        'createThumbsOnRequest' => true,
                        'generateNewName' => true,
                        'attribute' => 'image_mobile',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/home-slider/{id}',
                        'url' => '@cdnUrl/home-slider/{id}',
                    ],
                ],
            ],

        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($this->image_remove_mobile == HomeSlider::STATUS_ENABLE) {
                $this->image_mobile = null;
            }
            return true;
        } else {
            return false;
        }
    }

}
