<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fpgroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fpgroup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gr_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gr_pod')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
