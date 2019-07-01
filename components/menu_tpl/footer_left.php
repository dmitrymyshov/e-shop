<?php if ($category['id'] == 1):?>
    <?php foreach ($category['childs'] as $item):?>
        <li>
            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $item['id']]) ?>">
                <?= $item['name']?>
            </a>
        </li>
    <?php endforeach;?>
<?php endif;?>