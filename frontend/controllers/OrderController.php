<?php

namespace frontend\controllers;

use Throwable;
use Yii;
use frontend\Helpers\OrganizationHelper;
use frontend\models\Organization;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\helpers\ArrayHelper;
use frontend\models\Order;
use frontend\models\OrderSearchModel;
use frontend\models\Position;
use frontend\models\PositionSearchModel;
use frontend\models\OrderGroup;
use frontend\models\Users;
use frontend\models\UsersSearchModel;

use frontend\models\ProductNames;
use frontend\models\ProductNamesModel;
use frontend\models\ProductTypes;
use frontend\models\ProductTypesSearchModel;
use frontend\models\Categories;
use frontend\models\CategoriesSearchModel;

use frontend\models\Catalog;
use frontend\models\CatalogSearchModel;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @param int $id
     * @return mixed
     */
    public function actionIndex($id = 0, $group = null)
    {
        if(Yii::$app->request->post() && Yii::$app->request->post()['action'] === "create")
        {
            $this->actionCreate();    
        }
        
        $suppliers = 0;
        $customers = Order::find()
                        ->select([Organization::tableName() . '.name', Order::tableName() . '.order_group_id', Order::tableName() . '.date_to', Order::tableName() . '.date_from', Order::tableName() . '.org_id', OrderGroup::tableName() . '.id', Users::tableName() . '.username'])
                        ->joinWith('position') 
                        ->joinWith('org.user')
                        ->joinWith('ord')
                        ->joinWith('org')
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                        ->distinct()
                        ->all();   
        if (OrganizationHelper::getCurrentOrg()->org_type_id == 0)
        {
            $suppliers = array_reverse(Order::find()                        
                            ->select([Order::tableName() . '.position_id', Organization::tableName() . '.name', Order::tableName() . '.order_group_id', Order::tableName() . '.date_to', Order::tableName() . '.date_from', Order::tableName() . '.org_id', OrderGroup::tableName() . '.id', Users::tableName() . '.username'])
                            ->joinWith('position') 
                            ->joinWith('org.user')
                            ->joinWith('ord')
                            ->joinWith('org')
                            ->where([Order::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                            ->distinct()
                            ->all(), true);   
            
            if ($id == 0)
            {
                $id = current(array_column($suppliers, 'org_id')); 
                $group = key($suppliers);
            }  
            
            $currentOrder = $suppliers[$group];   
        }
        else
        {
            if ($id == 0)
            {
                $id = current(array_column($customers, 'org_id')); 
                $group = key($customers);
            }  
            
            $currentOrder = $customers[$group];   
        }

        $supplier = Organization::findOne(OrganizationHelper::getCurrentOrg()->id);
        $searchModel = new OrderSearchModel();
        $dataProvider = new ActiveDataProvider([
                        'query' => Order::find()                            
                            ->joinWith('position')                            
                            ->where([Order::tableName() . '.org_id' => $id])
                            ->andWhere([Order::tableName() . '.order_group_id' => $currentOrder->id]),
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'customers' => $customers,
            'supplier' => $supplier,   
            'suppliers' => $suppliers,
            'currentOrder' => $currentOrder,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = 0)
    {
        $cartSession = Yii::$app->session;
        $orders = $cartSession['cart']->products;
        $orderGroup = new OrderGroup();
        $orderGroup->date = date("Y-m-d");
        $orderGroup->save();
        
        foreach ($orders as $key => $order)
        {            
            $orders = OrderGroup::find()->all();
            if (!function_exists("array_key_last"))
            {                                         
                $orderGroupId = array_keys($orders)[count($orders)-1];                   
            }
            else
            {
                $orderGroupId = array_key_last($orders);                   
            }
            $model = new Order();
            $model->org_id = OrganizationHelper::getCurrentOrg()->id;
            $model->position_id = $key;
            $model->date_from = date("Y-m-d H:i:s");
            $model->date_to = date("Y-m-d H:i:s");
            $model->state = 'open';
//          $model->soob_id = $orderId;
            $model->number = $order[1];
            $model->order_group_id = $orders[$orderGroupId]->id;
            $model->save();
        }
        
        $cartSession->destroy();
        
        return;
    }
    public function actionPjaxExample5()
    {
        return $this->render('created', [
            'model' => $model,
            'catalog' => $catalog,
            'products' => $products,
            'id' => $id,
            'md5' => md5(Yii::$app->request->post('string'))
        ]);
    }
    
    public function actionUpdate($id)
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
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
