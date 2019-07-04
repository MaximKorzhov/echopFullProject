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

/**
 * MessageController implements the CRUD actions for Messages model.
 */
class MessageController extends Controller
{
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
    
    public function actionIndex($id = 0, $orderId = 0)
    {        
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
        
        $model = new Messages();
        $downloads = new Downloads();
        if($model->load(Yii::$app->request->post()))        
        {
            if($model->from_id == OrganizationHelper::getCurrentOrg()->id)
            {                       
                if (Yii::$app->request->isPost) 
                {
                    $fileNames = $this->uploadFile($downloads);
                    if(isset($fileNames))
                    {
                       $fileNames = implode(",", $fileNames);
                       $model->setAttribute("downloads","$fileNames");
                    }
                }

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index', 'id' => $id, 'orderId' =>$orderId]);
                }
            }
            else throw new NotFoundHttpException(Yii::t('app', 'You do not have the right to perform this action'));
        }
        
        $model->zakaz_id = $orderId;
        $model->from_id = OrganizationHelper::getCurrentOrg()->id;
        $model->to_id = $id;
        
        return $this->render('index', [  
            'model' => $model,
            'downloads' => $downloads,
            'orders' => $orders,
            'messages' => $messages,
            'supplier' => $supplier,            
            'shops' => $shops,
            'orderId' => $orderId,
            'id' => $id,
        ]);
    }

    public function uploadFile($downloads)
    {       
        if (Yii::$app->request->isPost) 
        {
            $downloads->downloads = UploadedFile::getInstances($downloads, 'downloads');
            $fileNames = $downloads->upload();
            return $fileNames;
        }
        
    }
    
    public function actionDownload($fileName)
    {
//        $model = $this->findModel($id);
        $file = Yii::getAlias('D:/Develop/eshop/frontend/uploads/'."$fileName");
        return Yii::$app->response->sendFile($file);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDeleteFile($fileName, $id)
    {
        $messageData = $this->findModel($id);
        $fileNames = explode(",", $messageData->downloads);
        if(OrganizationHelper::getCurrentOrg()->id == $messageData->from_id)
        {            
            if($fileName !== NULL)
            {
                $file = Yii::getAlias('D:/Develop/eshop/frontend/uploads/'."$fileName");
                unlink($file);
                if(($key = array_search($fileName,$fileNames)) !== FALSE)
                {
                    unset($fileNames[$key]);
                    $fileNames = implode(",", $downloads);
                    $messageData->setAttribute("downloads","$fileNames");
                    $messageData->save();
                }        
            }
            else
            {
                foreach ($fileNames as $fileName)
                {
                    if(file_exists('D:/Develop/eshop/frontend/uploads/'."$fileName"))
                    {
                        $file = Yii::getAlias('D:/Develop/eshop/frontend/uploads/'."$fileName");
                        unlink($file);
                    }
                }
                return;
            }
            return $this->redirect(['index','id' => $messageData->order->org_id, 'orderId' =>$messageData->zakaz_id]);        
        }
        else throw new NotFoundHttpException(Yii::t('app', 'You do not have the right to perform this action'));
    }
 
    public function actionCreated($shopsId, $orderId)
    {                   
        $model = new Messages();
        $dropdownOrders = Messages::find()
                        ->select(['zakaz_id', 'id'])
                        ->indexBy('zakaz_id')                
                        ->column();        

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        $model->zakaz_id = $orderId;
        $model->from_id = OrganizationHelper::getCurrentOrg()->id;
        $model->to_id = $shopsId;
        
        return $model;
        
//        return $this->render('created', [
//            'model' => $model,
//            'dropdownOrders' => $dropdownOrders,
//            'allOrders' => $allOrders,
//            'id' => $id,
//        ]);
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
    public function actionRemove($id)
    {        
        $messageData = $this->findModel($id);
        if(!empty($messageData->downloads) && $messageData->downloads !== NULL)
        {
            $this->actionDeleteFile(NULL, $id);
        }
        if(OrganizationHelper::getCurrentOrg()->id == $messageData->from_id)
        {
            $orgId = $messageData->order->org_id;
            $orderId  = $messageData->zakaz_id;
            $messageData = $this->findModel($id)->delete();

            return $this->redirect(['index','id' => $orgId, 'orderId' => $orderId]); 
        }
        throw new NotFoundHttpException(Yii::t('app', 'You do not have the right to perform this action'));
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
