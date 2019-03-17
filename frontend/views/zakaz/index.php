<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FpZakazSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Zakazs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Zakaz'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'zakaz_id',
            'zakaz_from',
            'zakaz_to',
            'position_id',
            'date_from',
            //'date_to',
            //'state',
            //'soob_id',
            //'zak_id',
            //'summ',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
