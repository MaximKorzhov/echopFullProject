<?php
/* @var $id */
/* @var Product $item  */
use frontend\models\Messages;
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
        padding-top: 5px;
        height: calc(100% - 45px);
    }
    .inner-details {
        overflow-y: auto;
        height: 100%;
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
        <h2>По заказу <?= $orders[$id]->zakaz_id ?> от <?= $orders[$id]->ord->data ?></h2>
        <?php foreach ($messages as $message): ?>                        
            <div class="inner-message bgcolor clearfix">
                <p><font style="font-weight: bold"><?= $message->orgTo->name?></font></p>
                <?= $message->message_text?>
            </div>
        <?php endforeach; ?>        
        <p>________________________</p>
        <p>Данные поставщика:</p>
        <p><?= $supplier->user->fullname ?></p>
        <p><?= $supplier->name ?></p>
        <p>Контактный телефон: <?= $supplier->user->tel ?></p>
        <p>Электронный адрес: <?= $supplier->user->email ?></p>        
    </div>
</div>