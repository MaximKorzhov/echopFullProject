<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $org frontend\models\Organization[] */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJs('
', $this::POS_HEAD);
?>

<style>
    span.glyphicon-floppy-saved {
        color: #3d3;
    }
    span.glyphicon-floppy-saved:hover {
        color: #0f0;
    }
    span.glyphicon-floppy-remove {
        padding-left: 25px;
        color: #d33;
    }
    span.glyphicon-floppy-remove:hover {
        color: #f00;
    }
</style>
<div class="products-form">
    <?php $form = ActiveForm::begin(); ?>
    <?=
        Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-floppy-saved', ]), '', [
            'title' => Yii::t('app','Save'),
            'data' => [
                'method' => 'post',
                'params' => [
                    'action' => 'create'
                ]
            ],
        ]);
    ?>
    <?=
        Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-floppy-remove']), '/products/index?id=' . $model->id, [
            'title' => Yii::t('app','Cancel'),
            'data-pjax' => '1',
        ]);
    ?>
    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'art')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'shtrih')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date')->textInput() ?>
    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'podgroup')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'podrobno')->textInput() ?>
    <?= $form->field($model, 'add_pole')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'org_id')->label(Yii::t('app', 'Person'))->dropDownList($org, ['prompt' => Yii::t('app', 'Select Organization...')]) ?>
    <?php ActiveForm::end(); ?>
</div>
