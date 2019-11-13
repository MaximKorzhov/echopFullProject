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
    .main-panel {
        padding-left: 5px;
        width: 70%;
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
    }
    /*______________________________*/
        
body{
 background: #ececec;
}    
img {
 height: auto;
 max-width: 100%;
}
.product-img {
 height: 200px;
}
.product {
 background: #fff none repeat scroll 0 0;
 border: 1px solid #c0c0c0;
 height: 590px;
 overflow: hidden;
 padding: 25px 15px;
 position: relative;
 text-align: center;
 transition: all 0.5s ease 0s;
 margin-bottom: 20px;
}
.content{
 margin-top: 50px;
}
.product:hover {
 box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
}
.product-title a {
 color: #000;
 font-weight: 500;
 text-transform: uppercase;
}
.product-desc {
    max-height: 60px;
    overflow: hidden;
}
.product-price {
 bottom: 15px;
 left: 0;
 position: absolute;
 width: 100%;
 color: #d51e08;
 font-size: 18px;
 font-weight: 500;
}

.center{
width: 150px;
  margin: 40px auto;
  
}

</style>

<?php if($catalog[$id]->parent_id !== "NULL") : ?>            
    <div class="inner-products-list bgcolor">
<h2><?= $catalog[$id]->name ?></h2>
<div class="container content">
 <div class="row">
 <div class="col-md-2">
 <div class="list-group">
 <a href="#" class="list-group-item">Футболки</a>
 <a href="#" class="list-group-item">Джинсы</a>
 <a href="#" class="list-group-item">Брюки</a>
 <a href="#" class="list-group-item">Платья</a>
 <a href="#" class="list-group-item">Куртки</a>
 </div>
 </div>
 <div class="col-md-8">
 
        
        <?php foreach ($products as $keyProduct_type => $product_type) : ?>                
            
                
                    <div class="col-sm-4">
                        <div class="product">
                            <div class="product-img">                                    
                            <?php if(!isset($product_type->picture)) : ?>                                                                                 
                                <?= Html::img('@web/uploads/not_found.jpg') ?>
                            <?php else : ?>
                                <?= Html::img('@web/uploads/' . "$product_type->picture") ?>
                            <?php endif; ?>
                            </div>
                                <p class="product-title">
                                    <h3><?= Html::a(Html::tag('div', $product_type->name, ['class' => $product_type->id == $keyProduct_type ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyProduct_type]) ?></h3>                                        
                                </p>
                                <h3><?= Html::a(Html::tag('div', "Price", ['class' => $product_type->id == $keyProduct_type ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyProduct_type]) ?></h3>                                                                       
                                <p class="product-desc">Signature NYX cosmetics</p>
                                <p class="product-price">Price: <?= $product_type->price ?></p>
                             
                                
                            
                            <h3><?= Html::a(Html::tag('div', "Exem", ['class' => $product_type->id == $keyProduct_type ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyProduct_type]) ?></h3>                                        
                                    
                                    
                            </div>
                        </div>
                    </div>                                                            
        <?php endforeach; ?>
      </div>
    </div>            
    </div>
</div>
<?php else : ?>
<div class="middle-panel">
    <div class="inner-middle-panel bgcolor">                            
        <div class="inner-products-list bgcolor">
            <?php foreach ($catalog as $keyСategory => $category) : ?>               
                <?php if($category->parent_id == "NULL") : ?>
                    <div class="product-item">
                        <?= Html::a(Html::tag('div', $category->name, ['class' => $keyСategory == $id ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyСategory]) ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> 
    </div>
</div>    
<div class="central-panel">
    <div class="inner-right-panel bgcolor">  
        <div class="inner-products-list bgcolor">
            <div><h2><?= $catalog[$id]->name ?></h2></div>
            <?php foreach ($catalog as $keyProduct_type => $product_type) : ?>
                <?php if($product_type->parent_id == $catalog[$id]->id) : ?>
                    <div class="layer-left">
                        <div class="product-item">
                            <h3><?= Html::a(Html::tag('div', $product_type->name, ['class' => $product_type->id == $keyProduct_type ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyProduct_type]) ?></h3>
                            <?php foreach ($catalog as $keyProduct_name => $product_name) : ?>
                                <?php if($product_name->parent_id == $product_type->id) : ?>
                                    </h4><?= Html::a(Html::tag('div', $product_name->name, ['class' => $product_name->id == $keyProduct_name ? 'product-item-active' :'inner-product-item']), ['/catalog/index', 'id'=> $keyProduct_name]) ?></h4>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>                    
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>        
    </div>
</div>
<?php endif; ?>
