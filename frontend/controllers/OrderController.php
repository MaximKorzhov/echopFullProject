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
    public function actionIndex($id = 0)
    {
        $customers = Order::find()
                        ->select([Organization::tableName() . '.name', Order::tableName() . '.order_group_id', Order::tableName() . '.date_to', Order::tableName() . '.date_from', Order::tableName() . '.org_id', OrderGroup::tableName() . '.id', Users::tableName() . '.username'])
                        ->joinWith('position') 
                        ->joinWith('org.user')
                        ->joinWith('ord')
                        ->joinWith('org')
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
                        ->distinct()
                        ->all();               
        $supplier = Organization::findOne(OrganizationHelper::getCurrentOrg()->id);
        
//        $r = array_unique(ArrayHelper::getColumn($customers, 'org.name'));
//        $r2 = ArrayHelper::map($customers, 'position.price', 'number', 'org.name');

        if ($id == 0)
        {
            $id = current(array_column($customers, 'org_id'));
        }

//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel = new OrderSearchModel();
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()
                                ->joinWith('position')
                                ->where([Order::tableName() . '.org_id' => $id]),
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'items' => $customers,
            'supplier' => $supplier,
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
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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
