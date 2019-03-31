<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($organizations, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($organizations, 'unp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($users, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'last')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($users, 'status')->textInput() ?>
    <?= $form->field($users, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($users, 'password_reset_token')->textInput(['maxlength' => true]) ?>
    <?= $form->field($users, 'created_at')->textInput() ?>
    <?= $form->field($users, 'updated_at')->textInput() ?>
    
    <div style="color:#999;margin:1em 0">
        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'register user'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
