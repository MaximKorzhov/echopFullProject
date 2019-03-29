<?php

namespace frontend\models;

use Yii;
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
 * @property string $name
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
            [['name'], 'string', 'max' => 50],
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
            'tel' => Yii::t('app', 'Tel'),
            'name' => Yii::t('app', 'Name'),
            'last' => Yii::t('app', 'Last'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['user_id' => 'id']);
    }

    public static function getUsers()
    {
        return ArrayHelper::map(Users::find()->all(), 'id', function($item) {
            return "{$item->name} ({$item->username})";
        });
    }
}
