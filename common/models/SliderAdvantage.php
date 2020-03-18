<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "slider_advantage".
 *
 * @property int $id
 * @property string $type
 * @property string $image
 * @property string $name_ru
 * @property string $name_ua
 * @property string $body_ru
 * @property string $body_ua
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 */
class SliderAdvantage extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_advantage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name_ru', 'name_ua', 'sort_order'], 'required'],
            [['body_ru', 'body_ua'], 'string'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['type', 'name_ru', 'name_ua'], 'string', 'max' => 255],

            [['image'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],

            [['image'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['image'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],
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
                            'thumb' => [
                                'width' => 1920,
                                'quality' => 1080,
                                'mode' => ManipulatorInterface::THUMBNAIL_OUTBOUND
                            ],
                        ],
                        'attribute' => 'image',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/slider-advantage/{id}',
                        'url' => '@cdnUrl/slider-advantage/{id}',
                    ],
                ],
            ],
        ];
    }

    public static function getTypes()
    {
        return [
            ['label' => 'Главная страница', 'value' => 'home'],
            ['label' => 'О проекте', 'value' => 'about'],
        ];
    }

    /**
     * @param $value
     * @return array|mixed
     */
    public static function getTypesByValue($value)
    {
        if($types = self::getTypes()) {

            foreach($types as $type) {
                if($type['value'] === $value) {
                    return $type;
                }
            }

        }

        return [];
    }
}
