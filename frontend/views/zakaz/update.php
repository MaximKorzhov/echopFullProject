<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpZakaz */

$this->title = Yii::t('app', 'Update Fp Zakaz: {name}', [
    'name' => $model->zakaz_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fp Zakazs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->zakaz_id, 'url' => ['view', 'id' => $model->zakaz_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fp-zakaz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
