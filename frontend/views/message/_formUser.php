<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//namespace frontend\models;
/* @var $this yii\web\View */
/* @var $model frontend\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Заказ <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <?php foreach ($dropdownOrders as $dropdownOrder): ?>   
                      <li><?= Html::a($dropdownOrder, ['/message/created?id=' . $dropdownOrder]) ?></li>
                        
                    <?php endforeach; ?>
                  </ul>
            </div>
           <!-- <?= $form->field($model, 'zakaz_id')->dropdownList(
                $dropdownOrders, ['prompt'=>'Выбор заказа']
            );?>-->
        </div>    
        <?= $form->field($modelUbdate, 'name') ?>
        <?= $form->field($model,'message_text')->textarea(['class' => 'my_post' ,]); ?>
        <!--<?= $form->field($model, 'from_id')->textInput(['maxlength' => true])?>-->
        <!--<?= $form->field($model, 'zakaz_id') ?>-->
        <!--<?= $form->field($model, 'type') ?>-->
        <!--<?= $form->field($model, 'status') ?>-->
    
    <?php ActiveForm::end(); ?>

</div>
