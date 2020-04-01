
<?php

use frontend\Helpers\OrganizationHelper;
use yii\data\ActiveDataProvider as ActiveDataProviderAlias;
use yii\helpers\Html;
use frontend\models\Order;
use \yii\grid\GridView;
use frontend\components\NumberColumn;
use yii\widgets\Pjax;

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
        width: 20%;
        float: left;
    }
    .list-orders {
        width: 60%;
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
/*___________________________________________*/
     a, a:link, a:visited, a:hover, a:active {
        text-decoration: none;
        cursor: pointer;
        color: #000;
    }
    a:hover {
        color: #000;
    }
    a:hover span {
        color: #fff;
    }
    .middle-panel {
        padding-left: 5px;
        width: 40%;
        height: 100%;
        float: left;
    }
    .inner-middle-panel {
        height: 100%;
        width: 100%;
    }
    .right-panel {
        padding-left: 5px;
        width: 40%;
        height: 100%;
        float: left;
    }
    .inner-right-panel {
        height: 100%;
        width: 100%;
    }
    .products-list {
        width: 100%;
        height: calc(100% - 45px);
        padding-top: 5px;
    }
    .inner-products-list {
        overflow-y: auto;
        height: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 20px;
    }
    .inner-product-item {
        padding: 10px 5px;
        width: 100%;
    }
    .inner-product-item:hover {
        color: #000;
        background: #eee;
        width: 100%;
        border-radius: 10px 10px;
        padding: 10px 5px;
    }
    .product-item-active {
        color: #000;
        background: #eee;
        width: 100%;
        border-radius: 10px 10px;
        padding: 10px 5px;
    }
    .product-item {
        width: 100%;
        padding: 5px 0;
        color: #fff;
    }
    .product-toolbox {
        width: 100%;
    }
    .inner-product-toolbox {
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 10px;
    }
    .product-icon {
        float: left;
        padding-left: 25px;
    }
    .inner-product-toolbox span.glyphicon-remove {
        color: #d33;
    }
    .inner-product-toolbox span.glyphicon-remove:hover {
        color: #f00;
    }
    .inner-product-toolbox span.glyphicon-plus {
        color: #3d3;
    }
    .inner-product-toolbox span.glyphicon-plus:hover {
        color: #0f0;
    }
    .glyphicon {
    	font-size: 20px;
    }
    @media screen and (max-width: 768px) {
    	.middle-panel {
            padding-left: 5px;
        	width: 50%;
    	}
    	.right-panel {
        	width: 50%;
    	}
              
</style>

<div class="content-orders clearfix">
    <div class="list-org">
        <div class="list-org-inner">
            <?php if (OrganizationHelper::getCurrentOrg()->org_type_id == 1) :?>                    
               <?php foreach ($customers as $key => $order) : ?>             
                    <div class="product-item">                                
                        <?= Html::a(Html::tag('p', $order->org->name . '<br/>' . "order's amount=", ['class' => 'int']), ['/order/index', 'id'=> $order->org_id, 'group' => $key]) ?>
                    </div>
                <?php endforeach; ?>                            
            <?php else :?>
                <div class="inner-details bgcolor clearfix">
                    <div class="product-toolbox">
                        <div class="inner-product-toolbox clearfix">
                            <div class="product-icon">
                                <?=
                                    Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-plus"]), '/catalog/index', [
                                        'title' => Yii::t('app', 'Add'),
                                        'data-pjax' => '1',
                                    ])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner-details bgcolor clearfix">
                    <?php foreach ($suppliers as $key => $order) : ?>             
                        <div class="product-item">                                
                            <?= Html::a(Html::tag('p', $order->position->org->name . '<br/>' . "order's amount=" /*. Order::getTotal($dataProvider->models)*/, ['class' => 'int']), ['/order/index', 'id'=> $order->org_id, 'group' => $key]) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="list-orders">                           
        <div class="inner-details bgcolor clearfix">
            <div>
                <button type="submit" class="btn btn-default"><?= $currentOrder->org->name ?></button>                
            </div>
        </div>
        <div class="inner-details bgcolor clearfix">
            <div><h2>Заказ № <?= $currentOrder->ord->id ?> от <?= $currentOrder->ord->date ?></h2></div>
            <div class="layer-left">
                <p>Номер заказа: <?= $currentOrder->ord->id ?></p>                
                <p>Получатель заказа: <?= $currentOrder->org->user->username ?></p>
                <p>Юридическое лицо магазина: <?= $currentOrder->org->name ?></p>                    
                <p>Адрес доставки: <?= "Этого поля в таблице нет"; ?></p>                    
            </div>
            <div class="layer-right">
                <p>Дата заказа: <?= $currentOrder->ord->date ?></p>                
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
                    'summary' => false,
                    'showFooter' => true,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => '№'. "\n".'пп' ,
                        ],
//                        'ord.id',                        
//                        'id',
                        [
                            'attribute' => 'position.art',
                            'header' => 'Артикул',
                        ],
                        [
                            'attribute' => 'position.shtrih',
                            'header' => 'Штрихкод',
                        ],
                        [
                            'attribute' => 'position.name',
                            'header' => 'Название товара',
                        ],
                        [
                            'attribute' => 'number',
                            'header' => 'Количество товара',
                        ],                        
                        [
                            'attribute' => 'position.price',
                            'header' => 'Цена',
                            'class' => NumberColumn::className(),
                        ],                        
                        [
                            'attribute' => 'amount',
                            'header' => 'Стоимость',
                            'content' => function($data) {
                                return $data->position->price * $data->number;
                            },
                            'filter' => false,
                            'class' => NumberColumn::className(),
                        ], 
                        [
                            'attribute' => 'position.sales_tax',
                            'header' => 'Ставка'."\n".'НДС',
                        ],  
                        [                            
                            'label' => 'Сумма'."\n".'НДС',
                            'content' => function($data) {
                                return $data->position->sales_tax *0.01* ($data->position->price * $data->number);
                            },
                            'filter' => false,
                            'class' => NumberColumn::className(),
                        ],             
                        [                            
                            'label' => 'Стоимость'."\n".'с НДС',
                            'content' => function($data) {
                                return ($data->position->price * $data->number)  + $data->position->sales_tax *0.01* ($data->position->price * $data->number);
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
//                        'date_from',
//                        'date_to',
                    ],
                ]);
            ?>
        </div>
    </div>
</div>