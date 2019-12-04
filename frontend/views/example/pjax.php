<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<style>
.center{
width: 150px;
  margin: 40px auto;
  
}
</style>

<?php Pjax::begin(); ?>
    <div class="center">
        <div class="input-group">
            <span class="input-group-btn">
                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-minus', ]), '', [
                                        'title' => Yii::t('app','Index'),
                                        'data' => [
                                            'method' => 'post',
                                            'params' => [
                                                'action' => 'index',
                                                'params' => 'minus',
                                                'value'=> $data,                                              
                                            ]
                                        ],
                                    ]);
                    ?>
                </button>
            </span>
            <?= Html::input('text', 'string', $data, ['class' => 'form-control']) ?>            
            <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus', ]), '', [
                                    'title' => Yii::t('app','Index'),
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [
                                            'action' => 'index',
                                            'params' => 'plus',
                                            'value'=> $data,                                            
                                        ]
                                    ],
                                ]);
                   ?>                    
                   </button>
            </span>
        </div>
    </div>
    <p>Ответ сервера: <?= $data ?></p>
<?php Pjax::end(); ?>
