<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

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
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
