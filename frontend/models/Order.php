<?php

namespace frontend\models;

use Yii;

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
 * @property string $summ
 * @property string $column1
 *
 * @property Position $position
 */
class Order extends \yii\db\ActiveRecord
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
            [['zakaz_from', 'position_id'], 'required'],
            [['zakaz_from', 'position_id'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['state', 'soob_id', 'summ'], 'string', 'max' => 45],
            [['column1'], 'string', 'max' => 255],
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
            'zakaz_from' => Yii::t('app', 'Zakaz From'),
            'position_id' => Yii::t('app', 'Position ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'state' => Yii::t('app', 'State'),
            'soob_id' => Yii::t('app', 'Soob ID'),
            'summ' => Yii::t('app', 'Summ'),
            'column1' => Yii::t('app', 'Column1'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }
}
