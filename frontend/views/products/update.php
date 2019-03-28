<?php
/* @var $this yii\web\View */
/* @var $item frontend\models\Product */
/* @var $id */
/* @var $org frontend\models\Organization[] */

use yii\helpers\Html;

//$this->title = Yii::t('app', 'Update Product: {name}', [
//    'name' => $item->name,
//]);
?>
<style>
    .products-update {
        height: 100%;
    }
</style>
<div class="products-update">

<!--    <h1>--><?php //echo Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $item,
        'id' => $id,
        'org' => $org
    ]) ?>

</div>
