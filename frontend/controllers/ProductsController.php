<?php

namespace frontend\controllers;

use frontend\models\Products;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class ProductsController extends \yii\web\Controller
{
    /**
     * @param int $id
     * @return string
     */
    public function actionIndex($id = 0)
    {
        $items = ArrayHelper::index(Products::find()->all(), 'id');
            $id = key($items);
        }

        if ($id == 0)
        {
            $id = key($items);
        }

//        if (\Yii::$app->request->isAjax)
//        {
//            return $this->renderAjax('index', [
//                'items' => $items,
//                'id' => $id
//            ]);
//        }

        return $this->render('index', [
            'items' => $items,
            'id' => $id
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(\Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('index', [
            'items' => $model,
            'id' => $model->id
        ]);
    }

    /**
     * @param int $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id = 0)
    {
        /* @var \frontend\models\Products[] $items */
        $items = ArrayHelper::index(Products::find()->all(), 'id');

        if ($items[$id]->load(\Yii::$app->request->post()) && $items[$id]->save())
        {
            return $this->redirect(['index', 'id' => $id]);
        }

        return $this->render('index', [
            'items' => $items,
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return Products|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
        }

        return $this->render('index', [
            'items' => $items,
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return Products|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
}
