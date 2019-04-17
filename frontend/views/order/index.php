<?php

use yii\helpers\Html;
use frontend\models\Order;

$items = [
    (object)['name' => 'name1'],
    (object)['name' => 'name2'],
    (object)['name' => 'name3'],
    (object)['name' => 'name4'],
];
?>

<style>
    .int {
        padding: 20px;
        display: table;
    }
</style>

<div class="content-products clearfix">
    <?php foreach ($items as $order) : ?>
        <div class="product-item">
            <?= Html::tag('p', $order->name, ['class' => 'int']) ?>
        </div>
    <?php endforeach; ?>
</div>