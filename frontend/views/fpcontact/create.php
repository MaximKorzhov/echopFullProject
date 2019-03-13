<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fpcontact */

$this->title = Yii::t('app', 'Create Fpcontact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fpcontacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fpcontact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
