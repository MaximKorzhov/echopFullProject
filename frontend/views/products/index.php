<?php
/* @var $this yii\web\View */
/* @var \frontend\models\Products[] $model  */

use yii\widgets\Pjax;
use yii\helpers\Html;

?>

<style>
	* {
		box-sizing: border-box;
	}
    a {
        cursor: pointer;
    }
    a:hover {
        text-decoration: none;
        color: #000;
    }
    a:active {
        background: #0f0f0f;
        color: #fff;
    }
    .content-products {
        padding: 10px 0;
        width: 100%;
        height: 100vh;
    }
    .products-list {
        width: 45%;
        float: left;
        height: 100vh;
        margin: 0 20px;
        border: 1px solid grey;
        border-radius: 10px 10px;
    }
    .product-details {
        width: 45%;
        float: left;
        height: 100vh;
        padding: 10px;
        margin: 0 20px;
        border: 1px solid grey;
        border-radius: 10px 10px;
    }
    .product-item {
        padding: 10px;
    }
</style>

<?php Pjax::begin(); ?>

<div class="content-products">
    <div class="products-list">
        <?php foreach ($model as $k => $product) { ?>
            <div class="product-item">
            	<?= Html::a($product->name, ['/products/index?id=' . $k], ['class' => 'button']) ?>
            </div>
        <?php } ?>
    </div>
    <div class="product-details">
    	<h2><?= $model[$id]->name ?></h2>
    	<p>Номер Товара в системе: <?= $model[$id]->id ?></p>
    	<p>Артикул Товара: <?= $model[$id]->art ?></p>
    	<p>Штрих-код Товара: <?= $model[$id]->shtrih ?></p>
    	<p>Единица измерения: <?= $model[$id]->size ?></p>
    	<p>Цена: <?= $model[$id]->price ?></p>
    	<p>Дата поступления: <?= $model[$id]->date ?></p>
    </div>
</div>

<?php Pjax::end(); ?>
