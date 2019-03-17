<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $items frontend\models\Products */

//$this->title = Yii::t('app', 'Create Products');
?>
<style>
    .products-create {
        height: 100%;
    }
</style>
<div class="products-create">

<!--    <h1>--><?php //echo Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $items,
    ]) ?>

</div>
