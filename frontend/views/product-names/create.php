<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductNames */

$this->title = Yii::t('app', 'Create Product Names');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-names-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
