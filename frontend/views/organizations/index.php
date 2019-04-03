<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrganizationSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organization');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'unp',
            'bank',
//            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function($data) {
                    return "{$data->user->fullname} ({$data->user->username})";
                },
            ],
            'name',
            //'schet',
            //'balans',
            //'status',
//            'org_type_id',
            [
                'attribute' => 'org_type_id',
                'value' => 'orgType.name',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
