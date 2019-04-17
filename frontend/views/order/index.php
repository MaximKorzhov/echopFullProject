<?php

use yii\helpers\Html;
use frontend\models\Order;
use yii\grid\GridView;

//$items = [
//    (object)['name' => 'name1'],
//    (object)['name' => 'name2'],
//    (object)['name' => 'name3'],
//    (object)['name' => 'name4'],
//];
$this->title = Yii::t('app', 'Positions');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
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
    }
</style>
<div class="middle-panel">
    <div class="inner-middle-panel bgcolor">
        <?php if (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'update') : ?>
            <div class="product-toolbox">
                <div class="inner-product-toolbox clearfix">
                    <div class="product-icon">
                        <?=
                            Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-plus"]), '/order/create', [
                                'title' => Yii::t('app', 'Add'),
                                'data-pjax' => '1',
                            ])
                        ?>
                    </div>
                    <div class="product-icon">
                        <?php if (!empty($organisations)) : ?>
                            <?=
                                Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-remove"]), '/order/delete?id=' . $organisations[$id]->id, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-pjax' => '1',
                                    'class' => 'delete-prod',
                                    'data' => [
                                        'method' => 'post',
                                        'params' => ['id' => $organisations[$id]->id],
                                    ],
                                ])
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <?php
                if (Yii::$app->controller->action->id == 'create')
                {
                    echo $this->render('/order/create', [
                        'id' => $id,
                        'organisations' => $organisations,
                        'org' => $org
                    ]);
                }
            ?>
            <?php if (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'update') : ?>
                <div class="products-list bg">
                    <div class="inner-products-list bgcolor">
                        <?php foreach ($organisations as $product): ?>
                            <div class="product-item">
                                <?= Html::a(Html::tag('div', $product->name, ['class' => $product->id == $id ? 'product-item-active' : 'inner-product-item']), ['/order/index?id=' . $product->id]) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>        
<div class="right-panel">
    <div class="inner-right-panel bgcolor">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create Position'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
//            'orders' => $orders,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'id',
                    'header' => '№',
                ],   
                [
                    'attribute' => 'art',
                    'header' => 'Артикул',
                ],
                [
                    'attribute' => 'shtrih',
                    'header' => 'Штрихкод',
                ],   
                [
                    'attribute' => 'name',
                    'header' => 'Название',
                ],                  
                [
                    'attribute' => 'price',
                    'header' => 'Цена',
                ],  
                [                
                    'label' => 'Ед. изм.',
//                    'value' => 'position.name',
                ],
                
                [
                    'label' => 'Количество',
//                    ['value' => function ($data) {return $data->'orders.number';}, 'label' => 'Количество'],
                    'value' => 'orders.number',
                ],                   
                            //'date',
                //'group',
                //'podgroup',
                //'size',
                //'podrobno',
                //'add_pole',
                //'org_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>  