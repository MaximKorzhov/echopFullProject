<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Order');
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
//            'org_id',
            [
                'attribute' => 'org_id',
                'value' => 'org.name',
            ],
//            'position_id',
            [
                'attribute' => 'position_id',
                'value' => 'position.name',
            ],
            'date_from',
            'date_to',
            //'state',
            //'soob_id',
            //'summ',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
