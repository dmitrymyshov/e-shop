<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Просмотр товара: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?php $imgs = $model->getImages(); ?>
    <?php $allImgs = null;?>

    <?php foreach ($imgs as $item):?>
        <?php $allImgs .= "<img src='{$item->getUrl("90x90")}'>" . ' ' ;?>
    <?php endforeach;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
            'content:html',
            'price',
            [
                'attribute' => 'Размеры',
                'value' => implode(', ', $model->sizeNumbers),
                'format' => 'html',
            ],
            'keywords',
            'description',
            [
                'attribute' => 'Главная картинка',
                'value' => "<img src='{$img->getUrl('300x300')}'>",
                'format' => 'html',
            ],
            [
                'attribute' => 'Галерея',
                'value' => "$allImgs",
                'format' => 'html',
            ],
            'hit',
            'new',
            'sale',
        ],
    ]) ?>



</div>
