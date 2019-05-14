<?php

/* @var $this View */
/* @var $content string */

use frontend\Helpers\OrganizationHelper;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;
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
    * {
        box-sizing: border-box;
    }
    html, body {
        height: 100%;
        margin: 0;
    }
    .bg {
        background-color: #ccc;
        color: #000;
    }
    .bgcolor {
        background-color: #fff;
        color: #000;
    }
    .header {
        position: relative;
        min-height: 50px;
    }
    .left-sidebar {
        width: 20%;
        height: 100%;
        min-width: 150px;
        float: left;
    }
    .inner-left-sidebar {
        overflow: auto;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
        height: 100%;
    }
    .content {
        height: calc(100% - 110px); /* 50px header + 60px footer */
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .content-panel {
        height: 100%;
    }
    .flash-alert {
        position: absolute;
        height: 50px;
        width: 350px;
        right: 5px;
        bottom: -50px;
        z-index: 2000;
    }
    li.eshop-group {
        display: none;
    }
    @media screen and (max-width: 768px) {
        li.eshop-group {
            display: block;
        }
        .left-sidebar {
            display: none;
        }
    	.content {
            padding: 5px;
        }
    	.flash-alert {
        	height: 20px;
        	width: 220px;
        	bottom: 30px;
        	right: 70px;
    	}
    }
</style>

<div class="wrap">
	<div class="header">
        <div class="flash-alert">
            <?php if ( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
            $this->registerJs(
            '$(".info").animate({opacity: 1.0}, 7000).fadeOut("slow");',
                $this::POS_READY
            );

            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                [
                    'label' => 'Administrator', 'items' => [
                        [
                            'label' => 'Группы',
                            'url' => ['/groups/index']
                        ],                       
                        [
                            'label' => 'Организации',
                            'url' => ['/organizations/index']
                        ],
                        [
                            'label' => 'Заказы',
                            'url' => ['/orders/index']
                        ],
                        [
                            'label' => 'Сообщения',
                            'url' => ['messages/index']
                        ],
                        [
                            'label' => 'Товары',
                            'url' => ['/position/index']
                        ],
                        [
                            'label' => 'Контакты',
                            'url' => ['/user/index']
                        ],
                    ],
                    'url' => ['/user/index']
                ],
                [
                    'label' => 'Shop',
                    'items' => [
                        [
                            'label' => 'Заказы',
                            'url' => ['/orders/index']
                        ],
                        [
                            'label' => 'Сообщения',
                            'url' => ['#']
                        ],
                        [
                            'label' => 'Товары',
                            'url' => ['/products/index']
                        ]
                    ],
                    'url' => ['/user/index'],
                    'options' => ['class'=>'eshop-group']
                ]
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                $menuItems[] = ['label' => 'Registration', 'url' => ['/registration/create']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ' ' . OrganizationHelper::getCurrentOrg()->name . ')',
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
    <div class="content bg clearfix">
        <div class="left-sidebar">
            <div class="inner-left-sidebar bgcolor">
                <?php
                    $menuItems = [
                        [
                            'label' => 'Заказы',
                            'url' => ['/orders/index']
                        ],
                        [
                            'label' => 'Сообщения',
                            'url' => ['#']
                        ]
                    ];

                    if (OrganizationHelper::getCurrentOrg()->org_type_id == 1)
                    {
                        $menuItems[] = [
                            'label' => 'Товары',
                            'url' => ['/products/index']
                        ];
                    }

                    echo Nav::widget([
                        'options' => ['class' => 'nav',],
                        'items' => $menuItems,
                    ]);
                ?>
            </div>
        </div>

       	<div class="content-panel">
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
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
