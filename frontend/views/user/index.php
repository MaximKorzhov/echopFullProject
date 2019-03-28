<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
        	[
        		'attribute' => 'status',
        		'content' => function($data) {
                    if ($data->status)
                    {
        			    return '<span style="color: green;">' . User::getStatus($data->status) . '</span>';
                    }
                    return '<span style="color: red;">' . User::getStatus($data->status) . '</span>';
    			}
			],
        	[
        		'attribute' => 'created_at',
        		'content' => function($data) {
        			return date('d.m.Y H:m:s', $data->created_at);
    			}
			],
            [
                'attribute' => 'updated_at',
                'content' => function($data) {
                    return date('d.m.Y H:m:s', $data->updated_at);
                }
            ],
            'tel',
            'name',
            'last',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
