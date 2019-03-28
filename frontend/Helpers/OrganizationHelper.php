<?php

namespace frontend\Helpers;

use \frontend\models\Organization;

class OrganizationHelper
{
    /**
     * @return Organization
     */
    public static function getOrg() : Organization
    {
        if (!\Yii::$app->session->get('org'))
        {
            \Yii::$app->session->set('org', Organization::findOne(['user_id' => \Yii::$app->user->id]));
        }
        return \Yii::$app->session->get('org');
    }
}
