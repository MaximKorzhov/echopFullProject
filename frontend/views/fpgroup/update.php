<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fpgroup */

$this->title = Yii::t('app', 'Update Fpgroup: {name}', [
    'name' => $model->gr_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fpgroups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gr_id, 'url' => ['view', 'id' => $model->gr_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fpgroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
