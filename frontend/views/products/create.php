<?php

/* @var $this yii\web\View */
/* @var $organisations frontend\models\Product */
/* @var $org frontend\models\Organization[] */

?>
<style>
    .products-create {
        height: 100%;
    }
    .products-list {
        height: 100%;
        padding-top: 0;
    }
</style>
<div class="products-create">
    <?= $this->render('_form', [
        'model' => $organisations,
        'org' => $org
    ]) ?>
</div>
