<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use common\models\User;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $tel
 * @property string $fullname
 * @property string $last
 *
 * @property Organization[] $organizations
 */
class Users extends User
{
    /**
     * {@inheritdoc}
     */
//    public static function tableName()
//    {
//        return 'user';
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'tel', 'last'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['fullname'], 'string', 'max' => 50],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['email', 'email'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
//            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'tel' => Yii::t('app', 'Phone'),
            'fullname' => Yii::t('app', 'Full Name'),
            'last' => Yii::t('app', 'Last'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['user_id' => 'id']);
    }

    public static function getUsers()
    {
        return ArrayHelper::map(Users::find()->all(), 'id', function($item) {
            return "{$item->fullname} ({$item->username})";
        });
    }
}
