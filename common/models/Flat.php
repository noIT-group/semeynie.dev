<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "flat".
 *
 * @property int $id
 * @property string $flat_img
 * @property double $square_size
 * @property string $coordinate
 * @property int $room_quantity
 * @property int $wind_rose
 * @property int $floor_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Floor $floor
 * @property Section $section
 * @property integer $section_id
 */
class Flat extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coordinate', 'room_quantity', 'wind_rose', 'floor_id'], 'required'],
            [['square_size'], 'number'],
            [['room_quantity', 'wind_rose', 'floor_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['coordinate'], 'string', 'max' => 255],
            [['flat_img'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],
            [['flat_img'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['flat_img'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Floor::className(), 'targetAttribute' => ['floor_id' => 'id']],
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
                    'flat_img' => [
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
                        'attribute' => 'flat_img',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/constructor/flat/{id}',
                        'url' => '@cdnUrl/constructor/flat/{id}',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floor::className(), ['id' => 'floor_id']);
    }

    /**
     * @return Section|null
     */
    public function getSection()
    {
        return $this->floor ? $this->floor->section : null;
    }

    /**
     * @return int|null
     */
    public function getSection_id()
    {
        return $this->floor ? $this->floor->section_id : null;
    }
}
