<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Messages;
use frontend\models\MessagesSearchModel;
use frontend\models\OrderGroup;
use frontend\models\Users;
use frontend\models\Order;
use frontend\models\Organization;
use frontend\models\Position;
use frontend\Helpers\OrganizationHelper;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\Downloads;
use frontend\components\iMessage;

/**
 * MessageController implements the CRUD actions for Messages model.
 */
class MessageControllerShop extends Controller implements iMessage
{

    public function getContacts()
    {
        return ArrayHelper::index(Position::find()
            ->select([Position::tableName() . '.org_id'])
            ->joinWith('orders')
            ->where([Order::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
            ->distinct()
            ->all(), 'org_id');
    }

    public function getOrders($id = 0)
    {
        return ArrayHelper::index(OrderGroup::find()
            ->joinWith('orders')
            ->where(['.org_id' => OrganizationHelper::getCurrentOrg()->id])
            ->all(), 'id');
    }
}