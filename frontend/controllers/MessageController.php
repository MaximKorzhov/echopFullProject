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

/**
 * MessageController implements the CRUD actions for Messages model.
 */
class MessageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Messages models.
     * @return mixed
     */
    public function actionIndex($id = 0, $orderId = 0)
    {
        $allOrders = ArrayHelper::index (Order::find()
                        ->select([Organization::tableName() . '.name', Order::tableName() . '.order_group_id', Order::tableName() . '.date_to', Order::tableName() . '.date_from', Order::tableName() . '.org_id', OrderGroup::tableName() . '.id', Users::tableName() . '.username'])
                        ->joinWith('position') 
                        ->joinWith('org.user')
                        ->joinWith('ord')
                        ->joinWith('org')
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                        ->distinct()
                        ->all(), 'order_group_id');   
        $shops = ArrayHelper::index (Order::find()
                        ->select([ Order::tableName() . '.org_id', Order::tableName() . '.order_group_id'])
                        ->joinWith('position')                                    
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                        ->distinct()
                        ->all(), 'org_id');   

        $supplier = Organization::findOne(OrganizationHelper::getCurrentOrg()->id);
        
        if ($id == 0)
        {
            $id = key($shops);             
        }
        
        $orders = ArrayHelper::index (OrderGroup::find()
                        ->joinWith('orders')
                        ->where(['.org_id' => $shops[$id]->org_id])                          
                        ->all(), 'id'); 
        
        if ($orderId == 0)
        {
            $orderId = key($orders);
        }
        $messages = Messages::find()                                                    
                        ->where(['zakaz_id' => $orders[$orderId]->id])                          
                        ->all(); 

        return $this->render('index', [            
            'orders' => $orders,
            'messages' => $messages,
            'supplier' => $supplier,
            'allOrders'=>$allOrders,
            'shops' => $shops,
            'orderId' => $orderId,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single Messages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Messages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreated($id = 0)
    {   
        $allOrders = ArrayHelper::index (Order::find()
                        ->select([Organization::tableName() . '.name', Order::tableName() . '.order_group_id', Order::tableName() . '.date_to', Order::tableName() . '.date_from', Order::tableName() . '.org_id', OrderGroup::tableName() . '.id', Users::tableName() . '.username'])
                        ->joinWith('position') 
                        ->joinWith('org.user')
                        ->joinWith('ord')
                        ->joinWith('org')
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                        ->distinct()
                        ->all(), 'order_group_id');    
        
        if ($id == 0)
        {
            $id = key($allOrders);             
        }  
        
        $model = new Messages();
        $dropdownOrders = Messages::find()
                        ->select(['zakaz_id', 'id'])
                        ->indexBy('zakaz_id')                
                        ->column();        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->zakaz_id = $allOrders[$id]->id;
        $model->from_id = OrganizationHelper::getCurrentOrg()->id;
        $model->to_id = $allOrders[$id]->org_id;
        
        return $this->render('created', [
            'model' => $model,
            'dropdownOrders' => $dropdownOrders,
            'allOrders' => $allOrders,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing Messages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = 0)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Messages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Messages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
