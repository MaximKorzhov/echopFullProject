<?php

use yii\data\ActiveDataProvider as ActiveDataProviderAlias;
use yii\helpers\Html;
use frontend\models\Order;
use \yii\grid\GridView;
use frontend\components\NumberColumn;

/* @var Order[] $items  */
/** @var ActiveDataProviderAlias $dataProvider */

?>

<style>
    .int {
        padding: 10px;
        display: table;
    }
    .content-orders {
        height: 100%;
        width: 100%;
    }
    .list-org {
        width: 30%;
        float: left;
    }
    .list-orders {
        width: 50%;
        float: left;
    }
        .inner-products-edit {
        box-shadow: 10px 20px 20px 20px rgba(0,0,0,0.5);
        overflow-y: auto;
        height: 100%;
        padding: 20px;
    }
    .products-edit {
        width: 100%;
        height: calc(100% - 45px);
        padding-top: 3px;
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
    .layer-left {        
    float: left; /* Обтекание по правому краю */
    width: 50%; /* Ширина слоя */
   }
   .layer-right {        
    text-align: left;
   }
   .clear {
    clear: left; /* Отмена обтекания */
   }
    .leftstr, .rightstr {
    float: left; /* Обтекание справа */ 
    width: 50%; /* Ширина текстового блока */ 
   }
   .rightstr {
    text-align: left; /* Выравнивание по правому краю */ 
   }      
</style>

<div class="content-orders clearfix">
    <div class="list-org">
        <div class="list-org-inner">
           <?php foreach ($customers as $key => $order) : ?>
                <div class="product-item">                                
                    <?= Html::a(Html::tag('p', $order->org->name . '<br/>' . "order's amount=" /*. Order::getTotal($dataProvider->models)*/, ['class' => 'int']), ['/order/index', 'id'=> $order->org_id, 'group' => $key]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="list-orders">                           
        <div class="inner-details bgcolor clearfix">
            <div>
                <?= $currentOrder->org->name?>
            </div>
            <div><h2>Заказ № <?= $currentOrder->ord->id ?> от <?= $currentOrder->ord->data ?></h2></div>
            <div class="layer-left">
                <p>Номер заказа: <?= $currentOrder->ord->id ?></p>                
                <p>Получатель заказа: <?= $supplier->name ?></p>
                <p>Юридическое лицо магазина: <?= $currentOrder->org->name ?></p>                    
                <p>Адрес доставки: <?= "Этого поля в таблице нет"; ?></p>                    
            </div>
            <div class="layer-right">
                <p>Дата заказа: <?= $currentOrder->ord->data ?></p>                
                <p>ФИО заказчика: <?= $currentOrder->org->user->fullname ?></p>
                <p>Телефон заказчика: <?= $currentOrder->org->user->tel ?></p>                
                <p>E-mail заказчика: <?= $currentOrder->org->user->email ?></p>                
            </div>
            <div style="clear: left"></div>        
        </div>
              
        <div class="list-orders-inner">
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showFooter' => true,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
//                        'ord.id',                        
                        'id',
                        'position.name',
                        [
                            'attribute' => 'position.price',
                            'class' => NumberColumn::className(),
                        ],
                        'number',
                        [
                            'attribute' => 'amount',
                            'content' => function($data) {
                                return $data->position->price * $data->number;
                            },
                            'filter' => false,
                            'class' => NumberColumn::className(),
                        ],
                                    
//                        [
//                            'attribute' => 'amount',
//                            'content' => function($data) {
//                                return $data->position->price * $data->number;
//                            },
//                            'filter' => false,
//                            'footer' => Order::getTotal($dataProvider->models)
//                        ],
                        'date_from',
                        'date_to',
                    ],
                ]);
            ?>
        </div>
    </div>
</div>