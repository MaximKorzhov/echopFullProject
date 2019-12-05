<?php

use yii\helpers\Html;

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
     
        <h3><?= $product->name ?></h3>
        <p><?= $product->podrobno ?></p>
        <p><?= $product->price ?> руб./шт</p>
        
        <?php if(isset($inTheBasket)) : ?>                                                                                          
            <div class='col-lg-5 col-md-5 col-sm-12'> 
                <div class="simpl-btn">      
                    <?= Html::a(Html::tag('button', 'В корзине', ['class' => 'btn btn-success', ]), ['/catalog/get-cart'], [
                                        'title' => Yii::t('app','Index'),
                                        'data' => [
                                            'method' => 'post',
                                            'params' => [
                                                'action' => 'index',
                                                'params' => 'minus',
                                                                                        
                                            ]
                                        ],
                                    ]
                                    
                                );
                    ?>
                   
                </div>
            </div>                                
        <?php else : ?>
        
        <?= Html::beginForm(['catalog/buy-later', 'id' => $product->id], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity">
                            <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                      <input type="text" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                              <span class="glyphicon glyphicon-plus"></span>
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
        <?php endif; ?>
    </div>    
</div>
<script>
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type === 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) === input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type === 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) === input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
</script>
