<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "infrastructure_category".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $svg_icon
 * @property int $status
 * @property int $sort_order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property InfrastructureObject[] $infrastructureObjects
 */
class InfrastructureCategory extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 10;
    const STATUS_DISABLE = 0;

    const ICON_KINDERGARTENS = 'kindergartens';
    const ICON_SCHOOLS = 'schools';
    const ICON_CAFE = 'cafe';
    const ICON_SUPER_MARKET = 'super_market';
    const ICON_TRADE_CENTER = 'trade_center';
    const ICON_PHARMACY = 'pharmacy';
    const ICON_AUTO_SERVICE = 'auto_service';
    const ICON_CINEMAS = 'cinemas';
    const ICON_MARKETS = 'markets';
    const ICON_SPORTS = 'sports';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infrastructure_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_ua', 'sort_order'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_ua', 'svg_icon'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ]
        ];
    }

    /**
     * @param array $attribute
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getValue($attribute = ['id', 'name_ru'])
    {
        return InfrastructureCategory::find()->select($attribute)->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastructureObjects()
    {
        return $this->hasMany(InfrastructureObject::className(), ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getAllIcon()
    {
        return [
            self::ICON_KINDERGARTENS => 'Детские сады',
            self::ICON_SCHOOLS => 'Школы',
            self::ICON_CAFE => 'Кафе',
            self::ICON_SUPER_MARKET => 'Супермакеты',
            self::ICON_TRADE_CENTER => 'Торговые центры',
            self::ICON_PHARMACY => 'Аптеки',
            self::ICON_AUTO_SERVICE => 'Автосервисы',
            self::ICON_CINEMAS => 'Кинотеатры',
            self::ICON_MARKETS => 'Рынки',
            self::ICON_SPORTS => 'Спорт',
        ];
    }

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getIconLabel($key)
    {
        $items = self::getAllIcon();

        return isset($items[$key]) ? $items[$key] : '-';
    }
}
