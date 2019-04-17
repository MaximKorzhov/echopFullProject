<?php
/* @var $id */
/* @var Product $item  */
use frontend\models\Product;
use yii\helpers\Html;
?>

<style>
    span.glyphicon-pencil {
        color: #d58512;
    }
    span.glyphicon-pencil:hover {
        color: #f5a532;
    }
    .detail-toolbox {
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 10px;
    }
    .detail-icon {
        float: left;
        padding-left: 25px;
    }
    .details {
        width: 100%;
        padding-top: 5px;
        height: calc(100% - 45px);
    }
    .inner-details {
        overflow-y: auto;
        height: 100%;
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 20px;
    }
</style>

<div class="detail-toolbox clearfix">
    <div class="detail-icon bgcolor">
        <?=
            Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]), '/products/update?id=' . $item->id, [
                'title' => Yii::t('app', 'Edit'),
                'data-pjax' => '1',
            ]);
        ?>
    </div>
</div>

<div class="details bg">
    <div class="inner-details bgcolor clearfix">
        <h2><?= $item->name ?></h2>
        <p>Номер Товара в системе: <?= $item->id ?></p>
        <p>Артикул Товара: <?= $item->art ?></p>
        <p>Штрих-код Товара: <?= $item->shtrih ?></p>
        <p>Единица измерения: <?= $item->size ?></p>
        <p>Цена: <?= $item->price ?></p>
        <p>Дата поступления: <?= $item->date ?></p>
        <p>Поставщик: <?= $item->org->name ?></p>
    </div>
</div>