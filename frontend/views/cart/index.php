<?php

use yii\helpers\Html;
use yii\widgets\Pjax;


?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    img {
 height: auto;
 max-width: 100%;
}
  
.bs-example  div[class^="col"] {
	border: 1px solid white;
	background: #f5f5f5;
	text-align: center;
	padding-top: 8px;
	padding-bottom: 8px;
	}
</style>

<div class="bs-example">
<div class="row">
    <?php if($cart === []) :?>    
        <h2>Корзина пуста</h2>    
    <?php endif; ?>
        
    <?php foreach ($cart as $product) : ?>         
        <div class="col-lg-6 col-md-6 col-sm-12 desc">
            <div class="col-sm-2">
                <?php if(!isset($product[0]->picture)) : ?>                                                                                 
                    <?= Html::img('@web/uploads/not_found.jpg') ?>
                <?php else : ?>
                    <?= Html::img('@web/uploads/' . $product[0]->picture) ?>
                <?php endif; ?>                                                                    
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-12 desc">

                <h4><?= $product[0]->name ?></h4>
                <p><?= $product[0]->podrobno ?></p>

            </div>
        <?php Pjax::begin(); ?>
        <?= Html::beginForm(['/cart/update', 'id' => $product[0]->id], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity">
                            <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-minus', ]), '/cart/update', [

                                        'data' => [
                                            'method' => 'post',
                                            'params' => [                                                
                                                'action' => 'minus',
                                                'productId' => $product[0]->id,
                                                'value' => $product[1],
                                            ]
                                        ],
                                    ]);
                            ?>
                          </button>
                      </span>
                       <?= Html::input('text', 'value', $product[1], ['class' => 'form-control', 'data' => ['method' => 'post']]) ?>
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                            <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus', ]), '/cart/update', [

                                    'data' => [
                                        'method' => 'post',
                                        'params' => [                                            
                                            'action' => 'plus',
                                            'productId' => $product[0]->id, 
                                            'value' => $product[1],
                                        ]
                                    ],
                                ]);
                            ?>    
                          </button>
                      </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">                                              
                <p><?= $product[0]->price ?> руб./шт</p>
                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity">
                 <?= Html::a(Html::tag('span', 'Удалить', ['class' => 'btn btn-outline-danger']), '/cart/delete?id=' . $product[0]->id, [
                     'data' => [
                        'method' => 'post',
                        'params' => [                                            
                            'action' => 'delete',
                            'productId' => $product[0]->id, 
                            ]
                        ],
                    ]); 
                ?>                                              
                </button>
             </div>            
        <?= Html::endForm() ?>
        </div>
    <?php Pjax::end(); ?>        
    <?php endforeach; ?>
        <div class="bs-example">
            <div class="col-lg-3 col-md-3 col-sm-6">                                              
              <h4>В корзине <?= count($cart) ?> товаров </h4>
                    <button type="button" class="btn btn-danger btn-number">
                     <?= Html::a(Html::tag('span', 'Продолжить оформление', ['class' => 'btn btn-outline-danger']), '/order/index', [
                         'data' => [
                            'method' => 'post',
                            'params' => [                                            
                                'action' => 'create',
                                'products' => $cart, 
                                ]
                            ],
                        ]); 
                    ?> 
                    </button>
            </div>   
        </div>
    </div>
</div>
