<?php

namespace frontend\controllers;
use yii\web\Controller;
use Yii;

/**
 * Description of ExampleClass
 *
 * @author Максим
 */
class ExampleController extends Controller 
{
    public function actionExam()
    {
        if(Yii::$app->request->post())
        {
            if (Yii::$app->request->post()['params'] === 'minus') 
            {

                $we = --Yii::$app->request->post()['value'];

            }
            if (Yii::$app->request->post()['params'] === 'plus') 
            {

                $we = ++Yii::$app->request->post()['value'];

            }
        }
        else
        {
            $we = 1;
        }
        
        return $this->render('pjax', [               
            'data' => $we,
           
        ]);
    }     
}
