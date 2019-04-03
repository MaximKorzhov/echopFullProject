<?php

namespace frontend\models;

use yii\base\Exception;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $fullname;
    public $tel;

    public $name;
    public $unp;
    public $org_type_id;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\Users', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\Users', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['tel',], 'string', 'max' => 255],

            ['name', 'required'],
            ['unp', 'string'],
            ['org_type_id', 'required'],

            [['fullname'], 'string', 'max' => 50],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User
     * @throws Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Users();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->tel = $this->tel;
        $user->fullname = $this->fullname;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if (!$user->save())
        {
            return null;
        }

        $organizations = new Organization();
        $organizations->name = $this->name;
        $organizations->unp = $this->unp;
        $organizations->user_id = $user->id;
        $organizations->org_type_id = $this->org_type_id;

        if ($organizations->save())
        {
            return $user;
        }

        return null;
    }
}
