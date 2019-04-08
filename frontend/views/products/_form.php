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
    .products-form {
        height: 100%;
    }
    .inner-products-form {
        height: 100%;
    }
    .products-toolbox {
        width: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 10px;
    }
    .products-icon {
        float: left;
        padding-left: 25px;
    }
    .products-edit {
        width: 100%;
        height: calc(100% - 45px);
        padding-top: 10px;
    }
    .inner-products-edit {
        overflow-y: auto;
        height: 100%;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        padding: 20px;
    }
    .products-edit-form {
        height: 100%;
    }
</style>

<?php $form = ActiveForm::begin(['options' => ['class' => 'products-edit-form']]); ?>
    <div class="products-form">
        <div class="inner-products-form">
            <div class="products-toolbox clearfix">
                <div class="products-icon">
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
                </div>
            </div>
            <div class="products-edit">
                <div class="inner-products-edit">
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
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
