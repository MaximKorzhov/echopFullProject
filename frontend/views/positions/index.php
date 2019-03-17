<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PositionsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Positions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Positions'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
   <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'art',
            'shtrih',
            'name',
            'price',
            'date',
            'group',
            'podgroup',
            'size',
            'podrobno',
            'add_pole',
//            'from_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
