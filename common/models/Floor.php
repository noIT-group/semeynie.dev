<?php

namespace common\models;

use Imagine\Image\ManipulatorInterface;
use mohorev\file\UploadImageBehavior;
use noIT\upload\UploadsBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "floor".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property int $number
 * @property string $plan_img
 * @property int $section_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Flat[] $flats
 * @property Section $section
 */
class Floor extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'floor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'section_id'], 'required'],
            [['number', 'section_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua'], 'string', 'max' => 255],
            [['plan_img'], 'image', 'maxSize' => 10000 * 1024, 'extensions' => 'jpeg, jpg, png'],
            [['plan_img'], 'image', 'skipOnEmpty' => false, 'on' => ['default']],
            [['plan_img'], 'image', 'skipOnEmpty' => true, 'on' => ['update']],
            [['number', 'section_id'], 'unique', 'targetAttribute' => ['number', 'section_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::className(), 'targetAttribute' => ['section_id' => 'id']],
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
                    'plan_img' => [
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
                        'attribute' => 'plan_img',
                        'scenarios' => ['default', 'update'],
                        'path' => '@cdn/constructor/floor/{id}',
                        'url' => '@cdnUrl/constructor/floor/{id}',
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllFloor() {
        return Floor::find()->where(['status' => Floor::STATUS_ENABLE])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::className(), ['floor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }
}
