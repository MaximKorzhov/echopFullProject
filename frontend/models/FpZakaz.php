<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fp_zakaz".
 *
 * @property int $zakaz_id
 * @property int $zakaz_from
 * @property int $zakaz_to
 * @property int $position_id
 * @property string $date_from
 * @property string $date_to
 * @property string $state
 * @property string $soob_id
 * @property int $zak_id
 * @property string $summ
 */
class FpZakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fp_zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zakaz_from', 'zakaz_to', 'position_id', 'zak_id'], 'required'],
            [['zakaz_from', 'zakaz_to', 'position_id', 'zak_id'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['state', 'soob_id', 'summ'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'zakaz_id' => Yii::t('app', 'Zakaz ID'),
            'zakaz_from' => Yii::t('app', 'Zakaz From'),
            'zakaz_to' => Yii::t('app', 'Zakaz To'),
            'position_id' => Yii::t('app', 'Position ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'state' => Yii::t('app', 'State'),
            'soob_id' => Yii::t('app', 'Soob ID'),
            'zak_id' => Yii::t('app', 'Zak ID'),
            'summ' => Yii::t('app', 'Summ'),
        ];
    }
}
