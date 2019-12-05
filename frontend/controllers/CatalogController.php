<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Catalog;
use frontend\models\CatalogSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\Position;
use frontend\models\PositionSearchModel;

/**
 * CatalogController implements the CRUD actions for Catalog model.
 */
class CatalogController extends Controller
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
     * Lists all Catalog models.
     * @return mixed
     */
    public function actionIndex($id = 0)
    {
        $h= Yii::$app->request->post();
        $we = 0;
        
        $model = new Catalog();
        $products = 0;
        $catalog = Catalog::find()->all();
        
        if(Yii::$app->request->post())
        {
            $id = Yii::$app->request->post()['key']; 
            
            $product = Position::findOne($id);    
            
            return $this->render('details', [
            
            'product' => $product,            
        ]);
        }
        
//        $t = $model->getCart($catalog[$id]->id);
        
        
        if($id !== 0)
        {            
            $products = Position::find()              
                ->where([Position::tableName() . '.podgroup' => $catalog[$id]->id])
                ->distinct()
                ->all();           
        }
         
        return $this->render('index', [
            'model' => $model,
            'catalog' => $catalog,
            'products' => $products,
            'id' => $id,            
        ]);
    }
        
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Catalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionDetails()
    {
        $model = new Catalog();
        
        return $this->render('details', [
            'model' => $model,
        ]);
    }
    public function actionCreate()
    {
        $model = new Catalog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Catalog model.
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
     * Deletes an existing Catalog model.
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
     * Finds the Catalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    public function actionBuyLater($id)
    {
        $model = new Catalog();
        
        $inTheBasket = $model->getCart($id);                
            
        $product = Position::findOne($id);    

        return $this->render('details', [

        'product' => $product, 
        'inTheBasket' => $inTheBasket,
            
        ]);
    }
    
     public function actionGetCart()
    {               
        $cartSession = Yii::$app->session;
        $products = $cartSession['cart']->products; 
        
        foreach ($products as $product)
        {
            $cart = Position::findOne($product[0]);
        }

        return $this->render('details', [

        'cart' => $cart,                   
        ]);
    }
}
