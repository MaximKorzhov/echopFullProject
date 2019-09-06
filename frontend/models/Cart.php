<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $shop_id
 * @property int $position_id
 * @property string $date_from
 * @property string $date_to
 * @property int $soob_id
 * @property string $number
 * @property int $supplier_id
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_id', 'position_id', 'number', 'supplier_id'], 'required'],
            [['shop_id', 'position_id', 'soob_id', 'supplier_id'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['number'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'position_id' => Yii::t('app', 'Position ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'soob_id' => Yii::t('app', 'Soob ID'),
            'number' => Yii::t('app', 'Number'),
            'supplier_id' => Yii::t('app', 'Supplier ID'),
        ];
    }
}
