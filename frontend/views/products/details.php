<style>
    span.glyphicon-pencil {
        color: #d58512;
    }
    span.glyphicon-pencil:hover {
        color: #f5a532;
    }
</style>
<?php
/* @var $id */
/* @var \frontend\models\Products $item  */

use yii\helpers\Html;
use \frontend\models\Products;

echo Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]), '/products/update?id=' . $item->id, [
    'title' => Yii::t('app', 'Edit'),
    'data-pjax' => '1',
]);
?>
<h2><?= $item->name ?></h2>
<p>Номер Товара в системе: <?= $item->id ?></p>
<p>Артикул Товара: <?= $item->art ?></p>
<p>Штрих-код Товара: <?= $item->shtrih ?></p>
<p>Единица измерения: <?= $item->size ?></p>
<p>Цена: <?= $item->price ?></p>
<p>Дата поступления: <?= $item->date ?></p>
<p>Поставщик: <?= $item->org->name ?></p>
