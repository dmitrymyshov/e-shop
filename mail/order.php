<div class="table-responsive">
    <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;">
        <thead>
        <tr style="background: #f9f9f9;">
            <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Размер</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item):?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;">
                    <?php if ($item['sizeNumbers'][$item['size']] != null):?>
                        <?= $item['sizeNumbers'][$item['size']]?>
                    <?php else:?>
                        нет
                    <?php endif;?>
                </td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] * $item['price']?></td>
            </tr>
        <?php endforeach?>
        <tr>
            <td colspan="4" style="padding: 8px; border: 1px solid #ddd;">Итого: </td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.sum']?></td>
        </tr>
        </tbody>
    </table>
</div>