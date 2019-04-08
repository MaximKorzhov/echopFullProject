<?php

namespace frontend\controllers;

use Yii;
use frontend\Helpers\OrganizationHelper;
use frontend\models\Organization;
use frontend\models\Product;
use yii\db\StaleObjectException;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ProductsController extends AppController
{
    /**
     * @param int $id
     * @return string
     */
    public function actionIndex($id = 0)
    {
        $items = ArrayHelper::index(Product::findAll(['org_id' => OrganizationHelper::getOrg()->id]), 'id');

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
            'id' => $id,
            'org' => Organization::getOrgListByUserId(Yii::$app->user->id)
        ]);
    }

    /**
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "Продукт удален");

        return $this->redirect(['index']);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('index', [
            'items' => $model,
            'id' => $model->id,
            'org' => Organization::getOrgListByUserId(Yii::$app->user->id)
        ]);
    }

    /**
     * @param int $id
     * @return string|Response
     */
    public function actionUpdate($id = 0)
    {
        /* @var Product[] $items */
        $items = ArrayHelper::index(Product::findAll(['org_id' => OrganizationHelper::getOrg()->id]), 'id');

        if ($items[$id]->load(Yii::$app->request->post()) && $items[$id]->save())
        {
            Yii::$app->session->setFlash('success', "Изменения сохранены");
            return $this->redirect(['index', 'id' => $id]);
        }

        return $this->render('index', [
            'items' => $items,
            'id' => $id,
            'org' => Organization::getOrgListByUserId(Yii::$app->user->id)
        ]);
    }

    /**
     * @param $id
     * @return Product|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
