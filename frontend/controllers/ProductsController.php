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

use frontend\models\Catalog;
use frontend\models\CatalogSearchModel;
use frontend\models\Position;
use frontend\models\PositionSearchModel;

class ProductsController extends AppController
{
    /**
     * @param int $id
     * @return string
     */
    public function actionIndex($id = 0)
    {
        $items = ArrayHelper::index(Product::findAll(['org_id' => OrganizationHelper::getCurrentOrg()->id]), 'id');

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
        $product = new Product();
        if ($product->load(Yii::$app->request->post()) && $product->save())
        {
            Yii::$app->session->setFlash('success');
            return $this->redirect(['index', 'id' => $product->id]);
        }

        return $this->render('index', [
            'items' => $product,            
            'org' => Organization::getOrgListByUserId(Yii::$app->user->id)
        ]);
    }

    /**
     * @param int $id
     * @return string|Response
     */
    public function actionUpdate($id)
    {
        /* @var Product[] $items */
        $items = ArrayHelper::index(Product::findAll(['org_id' => OrganizationHelper::getCurrentOrg()->id]), 'id');

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
