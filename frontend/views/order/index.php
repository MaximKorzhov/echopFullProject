<?php

use yii\helpers\Html;
use frontend\models\Order;

/* @var Order[] $items  */

?>

<style>
    .int {
        padding: 10px;
        display: table;
    }
</style>

<div class="content-products clearfix">
    <?php foreach ($items as $order) : ?>
        <div class="product-item">
            <?= Html::tag('p', $order->org->name . '<br/>' . Yii::$app->formatter->asDate($order->date_to ?? 'now') . '<br/>' . 'number=' . $order->number . ', ' . 'amount=' . $order->position->price * $order->number, ['class' => 'int']) ?>
        </div>
    <?php endforeach; ?>
</div>