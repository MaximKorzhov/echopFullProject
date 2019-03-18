<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $from
 * @property string $name
 * @property string $tel
 * @property string $mail
 * @property string $status
 * @property string $user
 * @property string $pass
 * @property string $last
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last'], 'safe'],
            [['from', 'name', 'tel', 'mail', 'status', 'user', 'pass'], 'string', 'max' => 45],
            [['user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from' => Yii::t('app', 'From'),
            'name' => Yii::t('app', 'Name'),
            'tel' => Yii::t('app', 'Tel'),
            'mail' => Yii::t('app', 'Mail'),
            'status' => Yii::t('app', 'Status'),
            'user' => Yii::t('app', 'User'),
            'pass' => Yii::t('app', 'Pass'),
            'last' => Yii::t('app', 'Last'),
        ];
    }
}
