<?php
/* @var $id */
/* @var Product $item  */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<style>
    span.glyphicon-pencil {
        color: #d58512;
    }
    span.glyphicon-pencil:hover {
        color: #f5a532;
    }
    .detail-toolbox {
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 10px;
    }
    .detail-icon {
        float: left;
        padding-left: 25px;
    }
    .details {
        width: 100%;       
        height: calc(100% - 45px);
    }
    .inner-details {
        overflow-y: auto;
        height: 110%;
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 20px;
    }
    .inner-message {
        overflow-y: auto;        
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 20px;
        margin-top: 12px;
    }
</style>

<div class="details bg">
    <div class="inner-details bgcolor clearfix">        
        <h2>По заказу <?= $orders[$orderId]->id ?> от <?= $orders[$orderId]->data ?></h2>
        <?php foreach ($messages as $message): ?>                        
            <div class="inner-message bgcolor clearfix">
                <p><font style="font-weight: bold"><?= $message->orgFrom->name?></font></p>
                <?= $message->message_text?>
            </div>
        <?php endforeach; ?>  
        <?php $form = ActiveForm::begin(); ?>                   
            <div class="inner-message bgcolor clearfix">
                <?= $form->field($model,'message_text')->textarea(['placeholder'=>'Введите текст нового сообщения','rows' => '6']); ?>
                <?= $form->field($model, 'to_id')->hiddenInput()->label(false)->hint(false); ?>
                <?= $form->field($model, 'from_id')->hiddenInput()->label(false)->hint(false); ?>
                <?= $form->field($model, 'zakaz_id')->hiddenInput()->label(false)->hint(false);?>
                <?= $form->field($model, 'type')->hiddenInput()->label(false)->hint(false);?>
                <?= $form->field($model, 'status')->hiddenInput()->label(false)->hint(false); ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-info']) ?>                                 
                </div>    
            </div>

        <?php ActiveForm::end(); ?>
        <p>________________________</p>
        <p>Данные поставщика:</p>
        <p><?= $supplier->user->fullname ?></p>
        <p><?= $supplier->name ?></p>
        <p>Контактный телефон: <?= $supplier->user->tel ?></p>
        <p>Электронный адрес: <?= $supplier->user->email ?></p>        
    </div>
</div>