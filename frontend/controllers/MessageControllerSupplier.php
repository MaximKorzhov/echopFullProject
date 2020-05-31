<?php
namespace frontend\controllers;

use frontend\models\OrderGroup;
use frontend\models\Order;
use frontend\models\Position;
use frontend\Helpers\OrganizationHelper;
use yii\helpers\ArrayHelper;
use frontend\components\iMessage;

class MessageControllerSupplier implements iMessage
{
    public function getContacts()
    {
        return ArrayHelper::index (Order::find()
            ->select([ Order::tableName() . '.org_id', Order::tableName() . '.order_group_id'])
            ->joinWith('position')
            ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
            ->distinct()
            ->all(), 'org_id');
    }

    public function getOrders($contact = 0)
    {
        return ArrayHelper::index (OrderGroup::find()
            ->joinWith('orders')
            ->where(['.org_id' => $contact->org_id])
            ->all(), 'id');
    }
}
