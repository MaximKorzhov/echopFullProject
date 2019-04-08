<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'org_id',
            'position_id',
            'date_from',
            'date_to',
            //'state',
            //'soob_id',
            //'number',
//            [
//                'attribute' => 'state',
//                'footer' => 'Total',
//            ],
           
//            [
//                'attribute' => 'soob_id',
//                'label' => 'NDS',
//                'footer' => $total + $total * 0.18,
//                'content' => function($data) {
//                    return '<span style="color: red;">' . ($data->price + $data->price * 0.18) . '</span>';
//                }
//            ],
//            [
//                'attribute' => 'price',
//                'footer' => $total,
//            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
