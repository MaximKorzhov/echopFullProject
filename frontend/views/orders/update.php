<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */
/* @var $org frontend\models\Organization[] */
/* @var $pos frontend\models\Position[] */

$this->title = Yii::t('app', 'Update Order: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'org' => $org,
        'pos' => $pos,
    ]) ?>

</div>
