<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $org frontend\models\Organization[] */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use frontend\models\Catalog;
use frontend\models\CatalogSearchModel;

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
        position: relative;
        box-shadow: 0 20px 35px 30px rgba(0,0,0,0.5);
        height: 100%;
    }
    .products-toolbox {
        width: 100%;
        /*box-shadow: 0 0 5px rgba(0,0,0,0.5);*/
        padding: 10px;
    }
    .products-icon {
        float: left;
        padding-left: 25px;
    }
    .products-edit {
        width: 100%;
        height: calc(100% - 45px);
        padding-top: 3px;
    }
    .inner-products-edit {
        box-shadow: 10px 20px 20px 20px rgba(0,0,0,0.5);
        overflow-y: auto;
        height: 100%;
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
            <div class="products-edit bg">
                <div class="inner-products-edit bgcolor">
                    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'art')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'shtrih')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                                      
                    <?php $y = Catalog::getParentGroup() ?>
                    <?= $form->field($model, 'group')->dropDownList(Catalog::getParentGroup(),
                         [
                             'prompt' => 'Выбрать группу...',
                             'onchange' => '
                                $.post(
                                 "'.Url::toRoute('/ajax/ajax-catalog').'",
                                 {id : $(this).val()},
                                 function(data){
                                     $("select#podgroup").html(data).attr("disabled", false)})'
                         ]) ?>
                    <?php $w = $model->isNewRecord ?>
                    <?php $r = Catalog::getSubGroup(Yii::$app->request->post('id')) ?>
                    <?= $form->field($model, 'podgroup')->dropDownList($model->isNewRecord ? [] : Catalog::getSubGroup($model->parent_id),
                     [
                         'prompt' => 'Выбрать подгруппу...',
                         'id' => 'podgroup',
                         'disabled' => $model->isNewRecord ? "disabled" : false,
                         'onchange' => '
                            $.post(
                             "'.Url::toRoute('/ajax/ajax-catalog').'",
                             {id : $(this).val()},
                             function(data){
                                 $("select#catalog_id").html(data).attr("disabled", false)})'
                     ]) ?>
                    <?= $form->field($model, 'catalog_id')->dropDownList($model->isNewRecord ? [] : Catalog::getSubGroup($model->parent_id),
                         [
                             'prompt' => 'Выбрать товар...',
                             'id' => 'catalog_id',
                             'disabled' => $model->isNewRecord ? 'disabled' : false
                    ]) ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'podrobno')->textInput() ?>
                    <?= $form->field($model, 'add_pole')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'org_id')->label(Yii::t('app', 'Person'))->dropDownList($org, ['prompt' => Yii::t('app', 'Select Organization...')]) ?>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
