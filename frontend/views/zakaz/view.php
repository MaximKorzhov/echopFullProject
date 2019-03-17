<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpZakaz */

$this->title = $model->zakaz_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fp Zakazs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fp-zakaz-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->zakaz_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->zakaz_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'zakaz_id',
            'zakaz_from',
            'zakaz_to',
            'position_id',
            'date_from',
            'date_to',
            'state',
            'soob_id',
            'zak_id',
            'summ',
        ],
    ]) ?>

</div>
