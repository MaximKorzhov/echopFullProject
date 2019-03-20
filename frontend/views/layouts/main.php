<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>
    .bgcolor {
        background-color: #555;
    }
    .header {
        position: relative;
        min-height: 50px;
    }
    .middle {
        height: 100vh;
    }
    .leftsidebar {
        padding: 20px;
        width: 20%;
        height: 100%;
        min-width: 150px;
        float: left;
    }
    .content {
        min-height: inherit;
        width: 80%;
        float: left;
    }
    .flash-alert {
        position: absolute;
        height: 50px;
        width: 350px;
        right: 5px;
        bottom: -50px;
        z-index: 2000;
    }
</style>

<div class="wrap">
	<div class="header">
        <div class="flash-alert">
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top bgcolor',
                ],
            ]);
            $menuItems = [
                ['label' => 'Administrator', 'items'=>[                    
                        [
                            'label' => 'Группы',
                            'url' => ['/groups/index']
                        ],
                        [
                            'label' => 'Поставщики',
                            'url' => ['/suppliers/index']
                        ],
                        [
                            'label' => 'Магазины',
                            'url' => ['/shops/index']
                        ],
                        [
                            'label' => 'Заказы',
                            'url' => ['/zakaz/index']
                        ],
                        [
                            'label' => 'Сообщения',
                            'url' => ['messages/index']
                        ],
                        [
                            'label' => 'Товары',
                            'url' => ['/products/index']
                        ],
                        [
                            'label' => 'Контакты',
                            'url' => ['/contacts/index']
                        ],
                ], 'url' => ['/user/index']],
                ['label' => 'Contacts', 'url' => ['/user/index']],
                ['label' => 'Settings', 'url' => ['/user/settings']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
	</div>
    <div class="middle">
        <div class="leftsidebar bgcolor">
            <?php
                echo Nav::widget([
                    'options' => ['class' => 'nav bgcolor',],
                    'items' => [
                        [
                            'label' => 'Заказы',
                            'url' => ['#']
                        ],
                        [
                            'label' => 'Сообщения',
                            'url' => ['#']
                        ],
                        [
                            'label' => 'Товары',
                            'url' => ['/products/index']
                        ],
                    ],
                ]);
            ?>
        </div>

       	<div class="content">
           	<?= Breadcrumbs::widget([
               	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
           	]) ?>
<!--           	--><?php //echo Alert::widget(); ?>
           	<?= $content ?>
        </div>
	</div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
