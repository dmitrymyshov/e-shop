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

                <?php if( !empty($news) ): ?>
                    <div class="features_items"><!--Новинки-->
                        <h2 class="title text-center">Новинки</h2>
                        <div class="owl-carousel owl-theme" style="width: 95%; margin: 0 auto;">
                        <?php foreach($news as $newItem): ?>
                            <?php $mainImg = $newItem->getImage('820x615');?>
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div>
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $newItem->id]) ?>">
                                                    <?= Html::img($mainImg->getUrl('820x615'), ['alt' => $newItem->name, 'class' => 'pro-img-main'])?>
                                                    <?php if($newItem->new): ?>
                                                        <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new-img-main'])?>
                                                    <?php endif?>
                                                    <?php if($newItem->sale): ?>
                                                        <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale-img-main'])?>
                                                    <?php endif?>
                                                </a>
                                            </div>
                                            <h2><?= $newItem->price?> руб.</h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $newItem->id]) ?>" class=""><?= $newItem->name?></a></p>
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $newItem->id])?>" data-id="<?= $newItem->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>

                                    </div>
                                </div>
                        <?php endforeach;?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( !empty($hits) ): ?>
                    <div class="features_items"><!--Хиты-->
                        <h2 class="title text-center">Хиты</h2>
                        <div class="owl-carousel owl-theme" style="width: 95%; margin: 0 auto;">
                            <?php foreach($hits as $hit): ?>
                                <?php $mainImg = $hit->getImage('820x615');?>
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= Html::img($mainImg->getUrl('820x615'), ['alt' => $hit->name, 'class' => 'pro-img-main'])?></a>
                                                <h2><?= $hit->price?> руб.</h2>
                                                <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" class=""><?= $hit->name?></a></p>
                                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if($hit->new): ?>
                                                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new-img-main'])?>
                                            <?php endif?>
                                            <?php if($hit->sale): ?>
                                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale-img-main'])?>
                                            <?php endif?>
                                        </div>
                                    </div>

                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( !empty($sale) ): ?>
                    <div class="features_items"><!--Распродажа-->
                        <h2 class="title text-center">Распродажа</h2>
                        <div class="owl-carousel owl-theme" style="width: 95%; margin: 0 auto;">
                        <?php foreach($sale as $saleItem): ?>
                            <?php $mainImg = $saleItem->getImage('820x615');?>
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $saleItem->id]) ?>"><?= Html::img($mainImg->getUrl('820x615'), ['alt' => $saleItem->name, 'class' => 'pro-img-main'])?></a>
                                            <h2><?= $saleItem->price?> руб.</h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $saleItem->id]) ?>" class=""><?= $saleItem->name?></a></p>
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $saleItem->id])?>" data-id="<?= $saleItem->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($saleItem->new): ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new-img-main'])?>
                                        <?php endif?>
                                        <?php if($saleItem->sale): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale-img-main'])?>
                                        <?php endif?>
                                    </div>
                                </div>
                        <?php endforeach;?>
                        </div>
                    </div>
                <?php endif; ?>



            </div>
        </div>
    </div>
</section>