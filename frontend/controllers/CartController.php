<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cart;
use frontend\models\CartSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\CatalogController;
use frontend\models\Position;
use frontend\models\PositionSearchModel;
use yii\filters\VerbFilter;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $cartSession = Yii::$app->session;
        $products = $cartSession['cart']->products; 
                
        return $this->render('index', [

        'cart' => $products,                   
        ]);
    }

    /**
     * Displays a single Cart model.
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
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = 0)
    {
        $value = 0;
        $data = Yii::$app->request->post();
        
        $cartSession = Yii::$app->session;
            
        if($id === 0)
        {
            $id = $data['productId'];
        }
        if(!array_key_exists('action', $data))
        {
            $value = $data['value'];                        
        }
        elseif($data['action'] === "minus")
        {
            $value = --$data['value']; 
        }
        elseif($data['action'] === "plus")
        {
            $value = ++$data['value'];                    
        }
        $cartSession['cart']->products[$id][1] = $value;
        
        $products = $cartSession['cart']->products; 
        
        return $this->render('index', [

        'cart' => $products,                   
        ]);
    }
    /**
     * Deletes an existing Cart model.
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
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
