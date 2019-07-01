<?php if ($category['parent_id'] == 0 && $category['id'] != 1) :?>
    <li>
        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>">
            <?= $category['name']?>
        </a>
    </li>
<?php endif;?>