<?php
/* @var $this yii\web\View */
/* @var Product[] $items  */
/* @var $id */
/* @var $org frontend\models\Organization[] */

use frontend\models\Product;
use yii\widgets\Pjax;
use yii\helpers\Html;

$this->registerJs('
    $(".delete-prod").on("click", function() {
        return confirm("Вы действительно хотите удалить товар?"); 
    });
');
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
        padding-left: 10px;
        width: 40%;
        height: 100%;
        float: left;
    }
    .inner-middle-panel {
        height: 100%;
        width: 100%;
    }
    .right-panel {
        padding-left: 10px;
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
        padding-top: 10px;
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
    	.inner-right-panel {
        	/*padding-top: 10px;*/
        	/*padding-left: 20px;*/
        	/*padding-right: 5px;*/
    	}
    }
</style>
<div class="middle-panel">
    <div class="inner-middle-panel">
        <?php if (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'update') : ?>
            <div class="product-toolbox">
                <div class="inner-product-toolbox clearfix">
                    <div class="product-icon">
                        <?=
                            Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-plus"]), '/products/create', [
                                'title' => Yii::t('app', 'Add'),
                                'data-pjax' => '1',
                            ])
                        ?>
                    </div>
                    <div class="product-icon">
                        <?php if (!empty($items)) : ?>
                            <?=
                                Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-remove"]), '/products/delete?id=' . $items[$id]->id, [
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
            </div>
        <?php endif; ?>
            <?php
                if (Yii::$app->controller->action->id == 'create')
                {
                    echo $this->render('/products/create', [
                        'id' => $id,
                        'items' => $items,
                        'org' => $org
                    ]);
                }
            ?>
            <?php if (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'update') : ?>
                <div class="products-list">
                    <div class="inner-products-list">
                        <?php foreach ($items as $product): ?>
                            <div class="product-item">
                                <?= Html::a(Html::tag('div', $product->name, ['class' => $product->id == $id ? 'product-item-active' : 'inner-product-item']), ['/products/index?id=' . $product->id]) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>
<div class="right-panel">
    <div class="inner-right-panel">
        <?php
//            Pjax::begin();

            if (Yii::$app->controller->action->id == 'update')
            {
                echo $this->render('/products/update', [
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

//            Pjax::end();
        ?>
    </div>
</div>
