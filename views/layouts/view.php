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
    <div class="col-sm-5">
        <div class="view-product">
            <?= Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="">
<?php $count = count($gallery); $i = 0; foreach($gallery as $img): ?>
    <?php if($i % 3 == 0):?>
        <div class="item <?php if($i == 0) echo ' active'?>">
    <?php endif;?>
        <a href=""><?= Html::img($img->getUrl('84x85'), ['alt' => ''])?></a>
    <?php $i++; if($i % 3 == 0 || $i == $count):?>
        </div>
    <?php endif;?>
<?php endforeach;?>
            </div>

            <!-- Controls -->
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <?php if($product->new): ?>
                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
            <?php endif?>
            <?php if($product->sale): ?>
                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
            <?php endif?>
            <h2><?= $product->name?></h2>
            <p>Web ID: 1089772</p>
            <img src="/images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?= $product->price?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty" />
									<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault add-to-cart cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
								</span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>
            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            <?= $product->content?>
        </div><!--/product-information-->
    </div>
</div>

<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
<?php if($i % 3 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                        <h2>$<?= $hit->price?></h2>
                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name?></a></p>
                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
<?php $i++; if($i % 3 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->

</div>
</div>
</div>
</section>