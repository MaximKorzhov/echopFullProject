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
        width: 40%;
        float: left;
    }
    .list-orders {
        width: 40%;
        float: left;
    }
</style>

<div class="content-orders clearfix">
    <div class="list-org">
        <div class="list-org-inner">
            <?php foreach ($items as $order) : ?>
                <div class="product-item">
                    <?= Html::a(Html::tag('p', $order->org->name . '<br/>' . "order's amount=" /*. Order::getTotal($dataProvider->models)*/, ['class' => 'int']), '/order/index?id=' . $order->org_id) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="list-orders">
        <div class="list-orders-inner">
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showFooter' => true,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
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