<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */
/* @var $form yii\widgets\ActiveForm */
/* @var $org frontend\models\Organization[] */
/* @var $pos frontend\models\Position[] */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'org_id')->label(Yii::t('app', 'Person'))->dropDownList($org, ['prompt' => Yii::t('app', 'Select Organization...')]) ?>

    <?= $form->field($model, 'position_id')->label(Yii::t('app', 'Position'))->dropDownList($pos, ['prompt' => Yii::t('app', 'Select Position...')]) ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soob_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
