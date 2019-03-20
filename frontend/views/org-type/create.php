<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrgType */

$this->title = Yii::t('app', 'Create Org Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
