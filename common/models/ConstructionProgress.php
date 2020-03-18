<?php

namespace common\models;

use noIT\core\behaviors\SerializedAttributes;
use Yii;
use yii\behaviors\TimestampBehavior;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "construction_progress".
 *
 * @property int $id
 * @property int $date
 * @property string $name_short_ru
 * @property string $name_short_ua
 * @property string $name_full_ru
 * @property string $name_full_ua
 * @property string $body_ru
 * @property string $body_ua
 * @property string $videos
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class ConstructionProgress extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    const PAGE_SIZE = 100;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'construction_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_short_ru', 'name_short_ua', 'name_full_ru', 'name_full_ua', 'date'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['date'], 'validateDate'],
            [['body_ru', 'body_ua'], 'string'],
            [['videos'], 'safe'],
            [['name_short_ru', 'name_short_ua', 'name_full_ru', 'name_full_ua'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'gallery' => [
                'class' => GalleryBehavior::className(),
                'type' => 'construction_progress',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@cdn') . '/construction-progress',
                'url' => Yii::getAlias('@cdnUrl') . '/construction-progress',
                'versions' => [
                    'thumb' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(1320, 743));
                    },
                ]
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'serializedAttributes' => [
                'class' => SerializedAttributes::className(),
                'attributes' => ['videos'],
            ],
        ];
    }

    public function afterFind()
    {
        if(!empty($this->date)) {
            $this->date = date('d.m.Y', $this->date);
        }

        parent::afterFind();
    }

    public function validateDate()
    {
        $time = strtotime($this->date);
        $this->date = $time;
    }
}
