<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpZakaz */

$this->title = Yii::t('app', 'Create Fp Zakaz');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fp Zakazs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fp-zakaz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
