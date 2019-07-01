<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
//        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
//        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">

</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +7 777 77 77</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> admin@admin.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row" style="position:relative">
                <div class="colsm-3">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.png', ['alt' => 'Магазин кроссовок'])?></a>
                    </div>
                </div>
                <div class="colsm-7">
                    <div class="shop-menu pull-right">
                        <a href="#" onclick="return getCart()" class="btn btn-default header-cart"><i class="fa fa-shopping-cart"></i> Корзина</a>
                    </div>
                </div>
                <div class="colsm-2">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="Поиск" name="q" class="text">
                            <input type="submit"  class="submit" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                            <?= \app\components\MenuWidget::widget(['tpl' => 'header_menu'])?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <div class="shop-menu pull-right" style="position: absolute; right: 20px; top: 0">
                            <ul class="nav ">
                                <li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-cog"></i> <?= Yii::$app->user->identity['username']?></a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Выход)</a></li>
                            </ul>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<div class="main-contant"><?= $content ?></div>

<footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row" style="position: relative">
                <div class="col-sm-3" style="padding-right: 0 !important; padding-left: 1% !important;">
                    <div class="single-widget">
                        <h2>Кроссовки</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?= \app\components\MenuWidget::widget(['tpl' => 'footer_left'])?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right: 0 !important; padding-left: 1% !important;  position: absolute; right: 52%">
                    <div class="single-widget">
                        <h2>Прочее</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?= \app\components\MenuWidget::widget(['tpl' => 'footer_right'])?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right: 0 !important; padding-left: 2% !important; position: absolute; right: 26%">
                    <div class="single-widget">
                        <h2>Помощь</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">О SNEAKER PLACE</a></li>
                            <li><a href="#">Условия доставки</a></li>
                            <li><a href="#">Гарантии</a></li>
                            <li><a href="#">Подобрать размер</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right: 0 !important; padding-left: 2% !important; position: absolute; right: 0">
                    <div class="single-widget">
                        <h2>Контакты</h2>
                        <ul class="nav nav-pills">
                            <li style="float: none !important;"><a href="#"><i class="fa fa-phone"></i> +7 777 77 77</a></li>
                            <li style="float: none !important;"><a href="#"><i class="fa fa-envelope"></i> admin@admin.com</a></li>
                        </ul>
                        <ul class="nav navbar-nav" >
                            <li style="margin-right: 10px; float: left !important;"><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li style="margin-right: 10px; float: left !important;"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li style="margin-right: 10px; float: left !important;"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '
        <button type="button" class="btn btn-default header-cart" onclick="clearCart()" style="margin-left: 5px;"><i class="fa fa-shopping-cart"></i> Очистить</button>
        <button type="button" class="btn btn-default header-cart" data-dismiss="modal" style="margin-left: 5px; padding-right: 20px;">Продолжить покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-default header-cart" style="padding-right: 20px; position: absolute; right: 355px;">Оформить заказ</a>'
]);

\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>