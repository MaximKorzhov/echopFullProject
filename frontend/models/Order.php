<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $zakaz_from
 * @property int $position_id
 * @property string $date_from
 * @property string $date_to
 * @property string $state
 * @property string $soob_id
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
            [['state', 'soob_id', 'number'], 'string', 'max' => 45],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'org_id' => Yii::t('app', 'Order From'),
            'position_id' => Yii::t('app', 'Position ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'state' => Yii::t('app', 'State'),
            'soob_id' => Yii::t('app', 'Soob ID'),
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
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }
    public function getOders()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }
    
}
