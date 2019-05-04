<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $art
 * @property string $shtrih
 * @property string $name
 * @property string $price
 * @property string $date
 * @property string $group
 * @property string $podgroup
 * @property string $size
 * @property resource $podrobno
 * @property string $add_pole
 * @property int $org_id
 *
 * @property Order[] $orders
 * @property Organization $org
 */
class Position extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['date'], 'safe'],
            [['podrobno'], 'string'],
            [['org_id'], 'integer'],
            [['sales_tax'], 'integer'],            
            [['art', 'shtrih', 'group', 'podgroup', 'size', 'add_pole', 'sales_tax'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 90],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['org_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'art' => Yii::t('app', 'Art'),
            'shtrih' => Yii::t('app', 'Shtrih'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'date' => Yii::t('app', 'Date'),
            'group' => Yii::t('app', 'Group'),
            'podgroup' => Yii::t('app', 'Podgroup'),
            'size' => Yii::t('app', 'Size'),
            'podrobno' => Yii::t('app', 'Podrobno'),
            'add_pole' => Yii::t('app', 'Add Pole'),
            'org_id' => Yii::t('app', 'Org ID'),
            'sales_tax' => Yii::t('app', 'Sales Tax'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['position_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }

    public static function getPositions()
    {
        return ArrayHelper::map(Position::find()->all(), 'id', 'name');
    }
}
