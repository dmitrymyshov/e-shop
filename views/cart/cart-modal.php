<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<?php if(!empty($session['cart'])): ?>
    <?php foreach($session['cart'] as $id => $item):?>
        <div class="cart-details">
            <div class="cart-image"><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 100]) ?></div>
            <div class="cart-inf">
                <div class="cart-inf-top">
                    <div class="cart-pro-name"><?= $item['name']?></div>
                </div>
                <div class="cart-inf-bottom">
                    <div class="cart-pro-price">
                        <?= $item['price']?> руб.
                    </div>
                    <div class="cart-pro-qty">
                        Количество: <?= $item['qty']?>
                    </div>
                    <div class="cart-pro-size">
                        <?php if ($session['cart'][$id]['sizeNumbers'] != null):?>
                            <div style="display: block; float: left; padding-right: 15px; padding-top: 5px">Размер: </div>
                            <select class="cart-size" data-jj="<?=$id;?>">
                                <?php foreach($item['sizeNumbers'] as $sizeId => $sizeItem):?>
                                    <?php if($sizeId == $item['size']):?>
                                        <option selected value="<?=$sizeId;?>"><?= $sizeItem?></option>
                                    <?php else:?>
                                        <option value="<?=$sizeId;?>"><?= $sizeItem?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="cart-pro-del"><span data-id="<?= $id?>" class="glyphicon-remove del-item" aria-hidden="true"></span></div>
        </div>
    <?php endforeach?>
        <div class="itogo">
            <div style="display: block; float: right"><?= $session['cart.sum']?> руб.</div>
            <div style="display: block; float: right; padding-right: 5px">Итого:</div>
        </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>
<script>

    $('.cart-size').on('change', function() {
        var id = $(this).data('jj'),
            size = $(this).val();
        $.ajax({
            url: '/cart/change',
            data: {id: id, size: size},
            type: 'GET'
        });
    });
</script>
