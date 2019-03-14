<?php
/* @var $this yii\web\View */
/* @var \frontend\models\Products[] $model  */
/* @var $id */

use yii\widgets\Pjax;
use yii\helpers\Html;

?>

<style>
	* {
		box-sizing: border-box;
	}
    a, a:link, a:visited, a:hover, a:active {
        text-decoration: none;
        cursor: pointer;
    }
    .content-products {
        padding-top: 5px;
        width: 100%;
        height: 100vh;
        background-color: #222;
    }
    .products-list {
        width: 45%;
        float: left;
        height: 100%;
        margin: 0 20px;
        /*border: 1px solid #fff;*/
        /*border-radius: 10px 10px;*/
    }
    .container {
        padding-right: 0;
        padding-left: 0;
    }
    .product-details {
        color: #fff;
        background-color: #222;
        width: 45%;
        float: left;
        height: 100%;
        padding: 0;
        margin: 0;
        /*border: 1px solid #fff;*/
        /*border-radius: 10px 10px;*/
    }
    .product-item-inner:hover {
        color: #000;
        background: #eee;
        width: 100%;
        border-radius: 10px 10px;
        padding: 10px 0;
    }
    .product-item-inner {
        padding: 10px 0;
        width: 100%;
    }
    .product-item {
        width: 100%;
        padding: 5px 0;
    }
</style>

<div class="content-products clearfix">
	<?php Pjax::begin(['id' => 'product']); ?>
        <div class="products-list">
            <?php foreach ($model as $k => $product) { ?>
                <div class="product-item">
                    <?= Html::a('<div class="product-item-inner">' . $product->name . '</div>', ['/products/index?id=' . $k]) ?>
                </div>
            <?php } ?>
        </div>
        <div class="product-details">
            <?php
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]);
                echo Html::a($icon, '/products2/update?id=' . $model[$id]->id, [
                    'title' => 'Edit',
                    'aria-label' => 'Edit',
                    'data-pjax' => '1',
                ]);
            ?>
            <h2><?= $model[$id]->name ?></h2>
            <p>Номер Товара в системе: <?= $model[$id]->id ?></p>
            <p>Артикул Товара: <?= $model[$id]->art ?></p>
            <p>Штрих-код Товара: <?= $model[$id]->shtrih ?></p>
            <p>Единица измерения: <?= $model[$id]->size ?></p>
            <p>Цена: <?= $model[$id]->price ?></p>
            <p>Дата поступления: <?= $model[$id]->date ?></p>
        </div>
	<?php Pjax::end(); ?>
</div>
