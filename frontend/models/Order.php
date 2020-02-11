<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property int $id
  * @property int $position_id
 * @property string $date_from
 * @property string $date_to
 * @property string $state
  * @property string $number
 * @property string $column1
 *
 * @property Position $position
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_id', 'position_id'], 'required'],
            [['org_id', 'position_id'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
//             [['date_from', 'date_to'], 'date', 'format' => 'd.m.Y H:i:s'],
            [['state', 'number'], 'string', 'max' => 45],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Order Position'),
//            'ord.id' => Yii::t('app', 'Order Number'),
            'org_id' => Yii::t('app', 'Order From'),
            'position_id' => Yii::t('app', 'Position ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'state' => Yii::t('app', 'State'),
            'number' => Yii::t('app', 'Number'),
        ];
    }
    
    /**
     * @return ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOrgs()
    {
        return $this->hasMany(Organization::className(), ['id' => 'org_id']);
    }
    
    public function getOrd()
    {
        return $this->hasOne(OrderGroup::className(), ['id' => 'order_group_id']);
    }
     
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['zakaz_id' => 'order_group_id']);
    }

    public static function getTotal($items)
    {
        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->position->price * $item->number;
        }

        $total = number_format( $total, 2 );

        return $total;
    }
}
