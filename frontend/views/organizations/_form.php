<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Organizations */
/* @var $form yii\widgets\ActiveForm */
/* @var $type frontend\models\OrgType[] */
/* @var $users frontend\models\Users[] */
?>

<div class="organizations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->label(Yii::t('app', 'User Name'))->dropDownList($users, ['prompt' => Yii::t('app', 'Select User...')]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'schet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balans')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'org_type_id')->label(Yii::t('app', 'Org Type'))->dropDownList($type, ['prompt' => Yii::t('app', 'Select Organization Type...')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
