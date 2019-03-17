<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fp_soob".
 *
 * @property int $id
 * @property string $from_id
 * @property string $to_id
 * @property string $zakaz_id
 * @property string $type
 * @property string $status
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'zakaz_id', 'type', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_id' => Yii::t('app', 'From ID'),
            'to_id' => Yii::t('app', 'To ID'),
            'zakaz_id' => Yii::t('app', 'Zakaz ID'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
