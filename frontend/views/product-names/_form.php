<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductNames */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-names-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_types')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
