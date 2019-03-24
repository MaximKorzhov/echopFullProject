<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">
$org_name;
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($organizations, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($organizations, 'unp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($registration, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'last')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration, 'status')->textInput() ?>
    <?= $form->field($registration, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($registration, 'password_reset_token')->textInput(['maxlength' => true]) ?>
    <?= $form->field($registration, 'created_at')->textInput() ?>
    <?= $form->field($registration, 'updated_at')->textInput() ?>
    
    <div style="color:#999;margin:1em 0">
        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'register user'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
