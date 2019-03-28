<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Products */
/* @var $form yii\widgets\ActiveForm */
/* @var $org frontend\models\Organizations[] */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJs('
    function submit() {
        $("form").submit();
    }
', $this::POS_HEAD);
?>

<style>
    span.glyphicon-floppy-saved {
        color: #3e3;
    }
    span.glyphicon-floppy-saved:hover {
        color: #0f0;
    }
    span.glyphicon-floppy-remove {
        padding-left: 25px;
        color: #e33;
    }
    span.glyphicon-floppy-remove:hover {
        color: #f00;
    }
</style>
<?=
    Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-floppy-saved', 'type' => 'submit']), 'javascript:submit()', [
        'title' => Yii::t('app','Save'),
        'data-pjax' => '1',
    ]);
?>
<?=
    Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-floppy-remove', 'type' => 'submit']), 'javascript:submit()', [
        'title' => Yii::t('app','Cancel'),
        'data-pjax' => '1',
    ]);
?>
<div class="products-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
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
