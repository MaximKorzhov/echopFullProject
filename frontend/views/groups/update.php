<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Groups */

$this->title = Yii::t('app', 'Update Groups: {name}', [
    'name' => $model->gr_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gr_id, 'url' => ['view', 'id' => $model->gr_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
