<?php
/* @var $this yii\web\View */
/* @var \frontend\models\Products[] $items  */
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
        color: #fff;
    }
    a:hover {
        color: #000;
    }
    a:hover span {
        color: #fff;
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
        overflow: auto;
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
        overflow: auto;
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
    .product-item-active {
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
        color: #fff;
    }
</style>

<div class="content-products clearfix">
    <div class="products-list">
        <?php foreach ($items as $product) { ?>
            <div class="product-item">
                <?= Html::a(Html::tag('div', $product->name, ['class' => $product->id == $id ? 'product-item-active' : 'product-item-inner']), ['/products/index?id=' . $product->id]) ?>
            </div>
        <?php } ?>
    </div>
    <div class="product-details">
        <?php
            Pjax::begin();

            if (Yii::$app->controller->action->id == 'update')
            {
                echo $this->render('/products/update', [
                    'id' => $id,
                    'item' => $items[$id]
                ]);
            }

            if (Yii::$app->controller->action->id == 'index')
            {
                echo $this->render('details', [
                    'id' => $id,
                    'item' => $items[$id]
                ]);
            }

            Pjax::end();
        ?>
    </div>
</div>
