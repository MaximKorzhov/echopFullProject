<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use frontend\models\Catalog;
/**
 * Description of AjaxController
 *
 * @author Максим
 */
class AjaxController extends Controller
{
    public $option;
    public function actionAjaxCatalog()
    {
        if(Yii::$app->request->isAjax){

        	$id = Yii::$app->request->post('id');

            $subcategories = Catalog::find()->select(['name', 'id'])->where('parent_id=:id', [':id' => $id])->all();

//            $this->option  = '<option value="">Выберите регион...</option>';
             foreach($subcategories as $subcategory)
             {
                 $this->option .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
             }
             
            return $this->option;

        }
        return false;
    }
}
