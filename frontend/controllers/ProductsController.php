<?php

namespace frontend\controllers;

use frontend\models\Products;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex($id = 0)
    {
        $model = Products::find()->all();

        if (\Yii::$app->request->isAjax)
        {
            return $this->renderAjax('index', [
                'model' => $model,
                'id' => $id
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'id' => $id
        ]);
    }
}
