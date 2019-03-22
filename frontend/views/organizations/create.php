<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Organizations */
/* @var $type frontend\models\OrgType[] */
/* @var $users frontend\models\User[] */

$this->title = Yii::t('app', 'Create Organizations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type' => $type,
        'users' => $users,
    ]) ?>

</div>
