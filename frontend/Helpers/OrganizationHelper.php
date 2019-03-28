<?php

namespace frontend\Helpers;

use \frontend\models\Organization;

class OrganizationHelper
{
    /**
     * @var Organization
     */
    private static $org;

    /**
     * @return Organization
     */
    public static function getOrg() : Organization
    {
        if (!self::$org)
        {
            self::$org = Organization::findOne(['user_id' => \Yii::$app->user->id]);
        }
        return self::$org;
    }
}
