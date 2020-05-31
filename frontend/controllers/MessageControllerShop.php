<?php

namespace frontend\controllers;
use frontend\models\OrderGroup;
use frontend\models\Order;
use frontend\models\Position;
use frontend\Helpers\OrganizationHelper;
use yii\helpers\ArrayHelper;
use frontend\components\iMessage;

class MessageControllerShop implements iMessage
{
    public function getContacts()
    {
        return ArrayHelper::index(Position::find()
            ->select([Position::tableName() . '.org_id', Position::tableName() . '.id'])
            ->joinWith('orders')
            ->where([Order::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
            ->distinct()
            ->all(), 'org_id');
    }

    public function getOrders($contact = 0)
    {
        return ArrayHelper::index (OrderGroup::find()
            ->joinWith('orders')
            ->where(['.org_id' => OrganizationHelper::getCurrentOrg()->id])
            ->andWhere(['.position_id' => $contact->id])
            ->all(), 'id');
    }
}