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
       
        $string = 1;
        $r = Yii::$app->request->post('action');
        $w = $r = Yii::$app->request->post('minus');        
	
        if(Yii::$app->request->post('action') == 'minus') 
         {
             $string = Yii::$app->request->post('number') -1;
         }

          if(Yii::$app->request->post('action') == 'plus') 
          {
            $string = Yii::$app->request->post('number') +1;
          }
        
        return $this->render('ajax', [
            'stringHash' => $string,
           
        ]);
    }     
}
