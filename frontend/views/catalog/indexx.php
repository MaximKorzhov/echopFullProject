<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'name',
                'value' => 'name',
            ],
            [
                'attribute' => 'age',
                'filter' => '<input class="form-control" name="filterage" value="'. $searchModel['age'] .'" type="text">',
                'value' => 'age',
            ],
            'height:ntext',
        ],
    ]); ?>
<?php Pjax::end(); ?>