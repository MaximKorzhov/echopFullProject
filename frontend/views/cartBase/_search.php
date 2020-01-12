<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CartSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'date_from') ?>

    <?= $form->field($model, 'date_to') ?>

    <?php // echo $form->field($model, 'soob_id') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'supplier_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
