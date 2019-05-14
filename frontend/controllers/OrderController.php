<?php

namespace frontend\controllers;

use Yii;
use frontend\Helpers\OrganizationHelper;
use yii\data\ArrayDataProvider;
use yii\db\StaleObjectException;
use frontend\models\Order;
use frontend\models\Position;
use yii\helpers\ArrayHelper;
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
        $orders = Order::find()
                        ->joinWith('position')
                        ->joinWith('org.user')
                        ->joinWith('org')
                        ->joinWith('orderGroup')
                        ->where([Position::tableName() . '.org_id' => OrganizationHelper::getCurrentOrg()->id])
//                        ->indexBy('org_id')
                        ->all();

        $ordersIndexed = ArrayHelper::index($orders, 'org_id');
        $customersGroup = ArrayHelper::map($orders, 'org_id', 'orderGroup.date', 'org.name');

//        $r = array_unique(ArrayHelper::getColumn($orders, 'org.name'));

        if ($id == 0)
        {
            $id = current(array_column($orders, 'org_id'));
        }

        $ordersFiltered = array_filter($orders, function($item) use ($id) {
            if ($item->org_id == $id) {
                return true;
            }
            return false;
        });

        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $ordersFiltered,
            'sort' => [
                'attributes' => ['position.name'],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'orders' => $ordersIndexed,
            'customersGroup' => $customersGroup,
            'id' => $id,
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
     * @throws StaleObjectException
     * @throws \Throwable
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
