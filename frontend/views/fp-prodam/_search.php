<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpProdamSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fp-prodam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unp') ?>

    <?= $form->field($model, 'bank') ?>

    <?= $form->field($model, 'contact_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'schet') ?>

    <?php // echo $form->field($model, 'balans') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
