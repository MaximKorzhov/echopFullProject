<?php

namespace frontend\models;

use Yii;

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
 * @property Organizations $org
 */
class Position extends \yii\db\ActiveRecord
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
            [['art', 'shtrih', 'group', 'podgroup', 'size', 'add_pole'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 90],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['org_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['position_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'org_id']);
    }
}
