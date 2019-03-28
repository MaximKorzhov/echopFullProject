<?php

/* @var $this yii\web\View */
/* @var $items frontend\models\Products */
/* @var $org frontend\models\Organizations[] */

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
