<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string $unp
 * @property string $bank
 * @property int $user_id
 * @property string $name
 * @property string $schet
 * @property string $balans
 * @property string $status
 * @property int $org_type_id
 *
 * @property OrgType $orgType
 * @property User $user
 * @property Position[] $positions
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'org_type_id'], 'integer'],
            [['unp', 'name', 'schet', 'balans', 'status'], 'string', 'max' => 45],
            [['bank'], 'string', 'max' => 100],
            [['unp'], 'unique'],
            [['org_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgType::className(), 'targetAttribute' => ['org_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'schet' => Yii::t('app', 'Schet'),
            'balans' => Yii::t('app', 'Balans'),
            'status' => Yii::t('app', 'Status'),
            'org_type_id' => Yii::t('app', 'Org Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgType()
    {
        return $this->hasOne(OrgType::className(), ['id' => 'org_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['org_id' => 'id']);
    }

    public static function getOrgList()
    {
        return ArrayHelper::map(Organizations::find()->all(), 'id', 'name');
    }
}
