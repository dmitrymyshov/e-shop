<?php if ($category['id'] == 1):?>
    <li class="dropdown">
        <a style="cursor: pointer">
            <?= $category['name']?>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul role="menu" class="sub-menu">
            <?php foreach ($category['childs'] as $item):?>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $item['id']]) ?>">
                        <?= $item['name']?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </li>
    <li class="dropdown"><a style="cursor: pointer">Прочее<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
<?php else:?>
    <li>
        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>">
            <?= $category['name']?>
        </a>
    </li>
<?php endif;?>