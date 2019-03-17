<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpZakazSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fp-zakaz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'zakaz_id') ?>

    <?= $form->field($model, 'zakaz_from') ?>

    <?= $form->field($model, 'zakaz_to') ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'date_from') ?>

    <?php // echo $form->field($model, 'date_to') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'soob_id') ?>

    <?php // echo $form->field($model, 'zak_id') ?>

    <?php // echo $form->field($model, 'summ') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
