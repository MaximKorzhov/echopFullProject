<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FpZakaz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fp-zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'zakaz_from')->textInput() ?>

    <?= $form->field($model, 'zakaz_to')->textInput() ?>

    <?= $form->field($model, 'position_id')->textInput() ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soob_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zak_id')->textInput() ?>

    <?= $form->field($model, 'summ')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
