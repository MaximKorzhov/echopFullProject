<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Organization */
/* @var $type frontend\models\OrgType[] */
/* @var $users frontend\models\Users[] */

$this->title = Yii::t('app', 'Update Organization: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organizations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => $type,
        'users' => $users,
    ]) ?>

</div>
