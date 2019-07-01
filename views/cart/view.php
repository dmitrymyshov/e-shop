<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <?php if(!empty($session['cart'])): ?>
                <?php foreach($session['cart'] as $id => $item):?>
                    <div class="cart-details" style="position: relative">
                        <div class="cart-image" style="left: 0"><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 100]) ?></div>
                        <div class="cart-inf">
                            <div class="cart-inf-top">
                                <div class="cart-pro-name"><?= $item['name']?></div>
                            </div>
                            <div class="order-inf-bottom">
                                <div class="order-pro-price">
                                    <?= $item['price']?> руб.
                                </div>
                                <div class="order-pro-qty">
                                    Количество: <?= $item['qty']?>
                                </div>
                                <?php if ($session['cart'][$id]['sizeNumbers'] != null):?>
                                    <div class="order-pro-size">
                                        Размер: <?= $item['sizeNumbers'][$item['size']]?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="cart-pro-del"><span data-id="<?= $id?>" class="glyphicon-remove del-item" aria-hidden="true"></span></div>
                    </div>
                <?php endforeach?>
                <div class="itogo">
                    <div style="display: block; float: right"><?= $session['cart.sum']?> руб.</div>
                    <div style="display: block; float: right; padding-right: 5px">Итого:</div>
                </div>
        <hr/>
        <?php $form = ActiveForm::begin()?>
        <?= $form->field($order, 'name')?>
        <?= $form->field($order, 'email')?>
        <?= $form->field($order, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '+7 (999) 999 99 99',
        ]);?>
        <?= $form->field($order, 'address')?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-default header-cart', 'style' => 'float: left; margin-top: 15px'])?>
        <?php ActiveForm::end()?>
    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif;?>
</div>