<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="row"> 

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="img-fluid">                                    
            <?php if(!isset($product->picture)) : ?>                                                                                 
                <?= Html::img('@web/uploads/not_found.jpg') ?>
            <?php else : ?>
                <?= Html::img('@web/uploads/' . "$product->picture") ?>
            <?php endif; ?>
        </div>           
    </div>
   
    <div class="col-lg-4 col-md-4 col-sm-12 desc">
     
        <h3><?= $cart->name ?></h3>
        <p><?= $cart->podrobno ?></p>
        <p><?= $cart->price ?> руб./шт</p>                
        
        <?php Pjax::begin(); ?>
        <?= Html::beginForm(['catalog/buy-later', 'id' => $cart->id], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity">
                            <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-minus', ]), '', [
                                        'title' => Yii::t('app','Index'),
                                        'data' => [
                                            'method' => 'post',
                                            'params' => [                                                
                                                'action' => 'minus',
                                                'productId' => $cart->id,                                              
                                            ]
                                        ],
                                    ]);
                            ?>
                          </button>
                      </span>
                       <?= Html::input('text', 'string', '1', ['class' => 'form-control', 'data' => ['method' => 'post']]) ?>
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                            <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus', ]), '', [
                                    'title' => Yii::t('app','Index'),
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [                                            
                                            'action' => 'plus',
                                            'productId' => $cart->id, 
                                        ]
                                    ],
                                ]);
                            ?>    
                          </button>
                      </span>
                </div>
            </div
            <div class='container text-center'> 
                <div class="simpl-btn">                   
                    <?= Html::submitButton('В корзину', ['class' => 'btn btn-warning']) ?>                       
                </div>
            </div>
        <?= Html::endForm() ?>
        <?php Pjax::end(); ?>        
    </div>    
</div>