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
        width: 20%;
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
    .central-panel {
        padding-left: 5px;
        width: 40%;
        height: 100%;
        float: left;
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
    
    .layer-left {        
    float: left; /* Обтекание по правому краю */
    width: 50%; /* Ширина слоя */
</style>

<div class="middle-panel">
    <div class="inner-middle-panel bgcolor">                            
        <div class="inner-products-list bgcolor">
            <?php foreach ($catalog as $key => $category) : ?>             
                <div class="product-item">
                    <?= Html::a(Html::tag('div', $category->name_of_category, ['class' => $key == $id ? 'product-item-active' :'inner-product-item']), ['/order/create', 'id'=> $key]) ?>
                </div>
            <?php endforeach; ?>
        </div> 
    </div>
</div>    
<div class="central-panel">
    <div class="inner-right-panel bgcolor">  
        <div class="inner-products-list bgcolor">
            <div><h2><?= $catalog[$id]->name_of_category ?></h2></div>
            <?php foreach ($catalog[$id]->productTypes as $key => $product_type) : ?>
                <div class="layer-left">
                    <div class="product-item">
                        <?= Html::a(Html::tag('div', $product_type->product_type, ['class' => $product_type->id == $key ? 'product-item-active' :'inner-product-item']), ['/order/created', 'id'=> $key]) ?>
                        <?php foreach ($product_type->name as $key => $product_name) : ?>
                            <?= Html::a(Html::tag('div', $product_name->product_names, ['class' => $product_name->id == $key ? 'product-item-active' :'inner-product-item']), ['/order/created', 'id'=> $key]) ?>
                        <?php endforeach; ?>
                    </div>                    
                </div>
            <?php endforeach; ?>
        </div>        
    </div>
</div>