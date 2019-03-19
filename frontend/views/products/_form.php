<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Products */
/* @var $form yii\widgets\ActiveForm */

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
        color: #2aabd2;
    }
    span.glyphicon-floppy-saved:hover {
        color: #6aebff;
    }
</style>
<?=
    Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-floppy-saved', 'type' => 'submit']), 'javascript:submit()', [
        'title' => Yii::t('app','Save'),
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

    <?= $form->field($model, 'from_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
