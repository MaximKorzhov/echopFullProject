<?php

use frontend\Helpers\OrganizationHelper;
use yii\data\ActiveDataProvider as ActiveDataProviderAlias;
use yii\helpers\Html;
use frontend\models\Order;
use \yii\grid\GridView;
use frontend\components\NumberColumn;

/** @var Order[] $orders */
/** @var array $customersGroup */
/** @var ActiveDataProviderAlias $dataProvider */
/** @var int $id */
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
    .layer-left {
        float: left; /* Обтекание по правому краю */
        width: 50%; /* Ширина слоя */
    }
    .layer-right {
        text-align: left;
    }
</style>

<div class="content-orders clearfix">
    <div class="list-org">
        <div class="list-org-inner">
            <?php foreach ($customersGroup as $name => $value) : ?>
                <div class="product-item">
                    <?= Html::a(Html::tag('p', $name . '<br/>' . 'date: ' . current($value), ['class' => 'int']), '/order/index?id=' . key($value)) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="list-orders">
        <div class="inner-details bgcolor clearfix">
            <div><h2>Заказ № <?= $orders[$id]->orderGroup->id ?> от <?= $orders[$id]->orderGroup->date ?></h2></div>
            <div class="layer-left">
                <p>Номер заказа: <?= $orders[$id]->orderGroup->id ?></p>
                <p>Получатель заказа: <?= OrganizationHelper::getCurrentOrg()->name ?></p>
                <p>Юридическое лицо магазина: <?= $orders[$id]->org->name ?></p>
                <p>Адрес доставки: <?= "Этого поля в таблице нет"; ?></p>
            </div>
            <div class="layer-right">
                <p>Дата заказа: <?= $orders[$id]->orderGroup->date ?></p>
                <p>ФИО заказчика: <?= $orders[$id]->org->user->fullname ?></p>
                <p>Телефон заказчика: <?= $orders[$id]->org->user->tel ?></p>
                <p>E-mail заказчика: <?= $orders[$id]->org->user->email ?></p>
            </div>
            <div style="clear: left"></div>
        </div>
        <div class="list-orders-inner">
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showFooter' => true,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => '№',
                        ],
                        'position.art',
                        'position.shtrih',
                        'position.name',
                        'position.price',
                        'number',
                        [
                            'attribute' => Yii::t('app', 'Amount'),
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
                        'position.sales_tax',
                        [
                            'label' => Yii::t('app', 'Tax Amount'),
                            'content' => function($data) {
                                return $data->position->sales_tax * 0.01 * ($data->position->price * $data->number);
                            },
                            'filter' => false,
                            'class' => NumberColumn::className(),
                        ],
                        [
                            'label' => Yii::t('app', 'Total Amount'),
                            'content' => function($data) {
                                return ($data->position->price * $data->number)  + $data->position->sales_tax * 0.01 * ($data->position->price * $data->number);
                            },
                            'filter' => false,
                            'class' => NumberColumn::className(),
                        ],
                    ],
                ]);
            ?>
        </div>
    </div>
</div>