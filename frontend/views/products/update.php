<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $item frontend\models\Products */
/* @var $id */

$this->title = Yii::t('app', 'Update Products: {name}', [
    'name' => $item->name,
]);
?>
<style>
    .products-update {
        height: 100%;
    }
</style>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $item,
        'id' => $id
    ]) ?>

</div>
