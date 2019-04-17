<?php

namespace frontend\controllers;

use Yii;
use frontend\Helpers\OrganizationHelper;
use frontend\models\Organization;
use yii\helpers\ArrayHelper;
use frontend\models\Order;
use frontend\models\OrderSearchModel;
use frontend\models\Position;
use frontend\models\PositionSearchModel;
use frontend\models\Users;
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
     * @return mixed
     */
    public function actionIndex($id = 0)
    { 
        $positions = Position::findAll([
        'org_id' => OrganizationHelper::getOrg()
        ]);

        foreach ($positions as $position)
        {
            $order = Order::find()->where(['position_id' => $position])->one();
            if(isset($order)) $orders[] = $order;
        }

        foreach ($orders as $order)
        {
            $items[] = $order->position;  
            $organisations[] = $order->org;
        }        
        
        foreach ($organisations as $organisation)
        {
            $users[] = $organisation->user;
        }
//        foreach ($positions as $position)
//        {
//            $items[] = Order::find()->where(['position_id' => $position])->with([
//            'position' => function ($query)
//            {
//                $query->andWhere(['org_id' => OrganizationHelper::getOrg()]);
//            },
//            'org',
//            ])->one();
//        }        
    
        if ($id == 0)
        {
            $id = key($items);
        }
        
        return $this->render('index', [
            'organisations' => $organisations,
            'id' => $id,
            'org' => Organization::getOrgListByUserId(Yii::$app->user->id)
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
