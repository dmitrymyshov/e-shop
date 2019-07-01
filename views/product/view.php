<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<section>
<div class="container">
<div class="row">
<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();
?>
<div class="col-sm-13 padding-right">
<div class="product-details"><!--product-details-->
    <div class="col-sm-7">
        <div class="gallery-box">
            <div class="view">
                <div class="big-image">
                    <div class="img-main">
                        <?= Html::img($mainImg->getUrl(), ['alt' => $product->name, 'class' => 'pro-img'])?>
                    </div>
                    <?php if($product->new): ?>
                        <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new-img'])?>
                    <?php endif;?>
                    <?php if($product->sale): ?>
                        <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale-img'])?>
                    <?php endif;?>
                </div>
            </div>
            <?php if(count($gallery) > 1):?>
                <div class="thumbnails">
                    <?php foreach ($gallery as $item):?>
                        <a href="" class="<?php echo ($item->isMain) ? 'active': '' ;?>" ><?= Html::img($item->getUrl(), ['alt' => ''])?></a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="product-information"><!--/product-information-->
            <h2><?= $product->name?></h2>
            <div class="product-price">
                <span><?= $product->price?> руб.</span>
            </div>
            <div class="pro-description">
                <?= $product->content?>
            </div>
            <div class="pro-category">
                <span>
                    <label><div class="text-item">Категория:</div><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></label>
                </span>
            </div>
            <div class="pro-size">
                <?php if(!empty($product->sizeNumbers)): ?>
                    <span>
                        <label><div class="text-item">Размер:</div><?= Html::dropDownList(null, 'null', $product->sizeNumbers, ['id' => 'size']);?></label>
                    </span>
                <?php endif;?>
            </div>
            <div class="pro-qty">
                <span>
                    <label><div class="text-item">Количество:</div><input type="number" value="1" id="qty" /></label>
                </span>
            </div>
            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault add-to-cart cart">
                <i class="fa fa-shopping-cart"></i>
                В корзину
            </a>
        </div><!--/product-information-->
    </div>
</div>
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
</div>
</div>
</div>
</section>