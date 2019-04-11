<?php

use yii\helpers\Html;
use yii\grid\GridView;

use frontend\models\Order;
use yii\widgets\Pjax;

$this->registerJs('
    $(".delete-prod").on("click", function() {
        return confirm("Вы действительно хотите удалить товар?"); 
    });
');
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
        width: 100%;
        height: 100vh;
        background-color: #fff;
    }
    .products-list {
        width: 45%;
        float: left;
        height: 100%;
        padding-left: 3px;
        /*border: 1px solid #fff;*/
        /*border-radius: 10px 10px;*/
    }
    .products-list-inner {
        width: 100%;
        height: 100%;
        overflow: auto;
        padding-top: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .product-details {
        width: 55%;
        float: left;
        height: 100%;
        padding-left: 3px;
        margin: 0;
    }
    .product-details-inner {
        color: #fff;
        overflow: auto;
        width: 100%;
        height: 100%;
        padding-top: 20px;
        padding-left: 50px;
        padding-right: 50px;
    }
    .product-item-inner:hover {
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
    .product-item-inner {
        padding: 10px 5px;
        width: 100%;
    }
    .product-item {
        width: 100%;
        padding: 5px 0;
        color: #fff;
    }
    .product-toolbox {
        padding: 20px 0 40px 20px;
    }
    .product-toolbox-inner {
        padding: 10px;
        float: left;
    }
    .product-toolbox-inner span.glyphicon-remove {
        color: #d33;
    }
    .product-toolbox-inner span.glyphicon-remove:hover {
        color: #f00;
    }
    .product-toolbox-inner span.glyphicon-plus {
        color: #3d3;
    }
    .product-toolbox-inner span.glyphicon-plus:hover {
        color: #0f0;
    }
</style>
<div class="content-products clearfix">
    <div class="products-list">
        <?php if (Yii::$app->controller->action->id == 'index'): ?>
            <div class="product-toolbox bgcolor">
                <div class="product-toolbox-inner">
                    <?=
                        Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-plus"]), '/order/create', [
                            'title' => Yii::t('app', 'Add'),
                            'data-pjax' => '1',
                        ])
                    ?>
                </div>
                <div class="product-toolbox-inner">
                    <?php if (!empty($items)) : ?>
                        <?=
                            Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-remove"]), '/order/delete?id=' . $items[$id]->id, [
                                'title' => Yii::t('app', 'Delete'),
                                'data-pjax' => '1',
                                'class' => 'delete-prod',
                                'data' => [
                                    'method' => 'post',
                                    'params' => ['id' => $items[$id]->id],
                                ],
                            ])
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    	<div class="products-list-inner bgcolor">
        	<?php
                if (Yii::$app->controller->action->id == 'create')
                {
                    echo $this->render('/order/create', [
                        'id' => $id,
                        'items' => $items,
                        'org' => $org
                    ]);
                }
        	?>
            <?php if (Yii::$app->controller->action->id == 'index'): ?>
                <?php foreach ($items as $product): ?>
                    <div class="product-item">
                        <?= Html::a(Html::tag('div', $product->name, ['class' => $product->id == $id ? 'order-item-active' : 'order-item-inner']), ['/order/index?id=' . $product->id]) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
    	</div>
    </div>
    <div class="product-details">
        <div class="product-details-inner bgcolor">
            <?php
                Pjax::begin();

                if (Yii::$app->controller->action->id == 'update')
                {
                    echo $this->render('/order/update', [
                        'id' => $id,
                        'item' => $items[$id],
                        'org' => $org
                    ]);
                }

                if (Yii::$app->controller->action->id == 'index')
                {
                    if (!empty($items))
                    {
                        echo $this->render('details', [
                            'id' => $id,
                            'item' => $items[$id]
                        ]);
                    }
                }

                Pjax::end();
            ?>
        </div>
    </div>
</div>