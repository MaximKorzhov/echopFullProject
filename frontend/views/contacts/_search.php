<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactsSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'pass') ?>

    <?php // echo $form->field($model, 'last') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
