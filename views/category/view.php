<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>SNEAKER</span> PLACE</h1>
                                <h2>МАГАЗИН КРОССОВОК</h2>
                                <p>ВСЕ ТОВАРЫ В НАЛИЧИИ</p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>SNEAKER</span> PLACE</h1>
                                <h2>МАГАЗИН КРОССОВОК</h2>
                                <p>ВСЕ ТОВАРЫ В НАЛИЧИИ</p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>SNEAKER</span> PLACE</h1>
                                <h2>МАГАЗИН КРОССОВОК</h2>
                                <p>ВСЕ ТОВАРЫ В НАЛИЧИИ</p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
<div class="container">
<div class="row">
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Каталог</h2>
        <ul class="catalog category-products">
            <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
        </ul>
        <form method="get" action="<?= \yii\helpers\Url::to(['category/filter'])?>" onsubmit="myFunction()">
            <input type='hidden' name='range' id='range'>
            <div class="price-range"><!--price-range-->
                <h2>По цене</h2>
                <div class="well text-center" style="position: relative; padding-bottom: 70px">
                    <input type="text" class="span2" value="" data-slider-min="<?=$min;?>" data-slider-max="<?=$max;?>" data-slider-step="5" data-slider-value="[<?=round(($max-$min)/3);?>,<?=round(($max-$min)/3*2);?>]" id="sl2" ><br />
                    <b class="pull-left"><?=$min;?> р.</b> <b class="pull-right"><?=$max;?> р.</b>
                    <input type="submit" value="Применить" style="position: absolute; bottom: 0; left: 29%; margin-bottom: 15px" class="btn-filter">
                </div>
            </div><!--/price-range-->
        </form>
    </div>
</div>

<div class="col-sm-9 padding-right">
<div class="features_items"><!--features_items-->
<h2 class="title text-center"><?= $category->name?></h2>
    <?php if(!empty($products)): ?>
        <?php $i = 0; foreach($products as $product): ?>
        <?php $mainImg = $product->getImage();?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <div>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                    <?= Html::img($mainImg->getUrl('820x615'), ['alt' => $product->name, 'class' => 'pro-img-main'])?>
                                    <?php if($product->new): ?>
                                        <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new-img-main'])?>
                                    <?php endif?>
                                    <?php if($product->sale): ?>
                                        <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale-img-main'])?>
                                    <?php endif?>
                                </a>
                            </div>
                            <h2><?= $product->price?> руб.</h2>
                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class=""><?= $product->name?></a></p>
                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php $i++?>
            <?php if($i % 3 == 0): ?>
                <div class="clearfix"></div>
            <?php endif;?>
            <?php endforeach;?>
        <div class="clearfix"></div>
        <div class="pag-block">
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
        <?php else :?>
        <h2>Здесь товаров пока нет...</h2>
    <?php endif;?>
<!--<ul class="pagination">
    <li class="active"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">&raquo;</a></li>
</ul>-->
</div><!--features_items-->
</div>
</div>
</div>
</section>