<?php

/* @var $this yii\web\View */
/* @var $items frontend\models\Product */
/* @var $org frontend\models\Organization[] */

?>
<style>
    .products-create {
        height: 100%;
    }
</style>
<div class="products-create">
    <?= $this->render('_form', [
        'model' => $items,
        'org' => $org
    ]) ?>
</div>
