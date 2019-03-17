<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shops".
 *
 * @property int $id
 * @property string $unp
 * @property string $bank
 * @property string $contact_id
 * @property string $name
 * @property string $schet
 * @property string $balans
 * @property string $status
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unp', 'bank', 'contact_id', 'name', 'schet', 'balans', 'status'], 'string', 'max' => 45],
            [['unp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'unp' => Yii::t('app', 'Unp'),
            'bank' => Yii::t('app', 'Bank'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'name' => Yii::t('app', 'Name'),
            'schet' => Yii::t('app', 'Schet'),
            'balans' => Yii::t('app', 'Balans'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
