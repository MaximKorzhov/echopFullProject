<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpProdam */

$this->title = Yii::t('app', 'Create Fp Prodam');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fp Prodams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fp-prodam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
