<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */

$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'registration' => $registration,
        'organizations' => $organizations,
    ]) ?>

</div>
