<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpPostav */

$this->title = Yii::t('app', 'Create Fp Postav');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fp Postavs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fp-postav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
