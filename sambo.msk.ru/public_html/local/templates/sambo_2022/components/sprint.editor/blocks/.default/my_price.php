<?php if ($block['elements']): ?>
<div class="table-responsive">
    <table class="table price-table table-bordered table-striped align-middle">
        <caption class="price-table__caption">
            <?= $GLOBALS['CAPTION_PRICE_TABLE'] ?: 'Стоимость тренировок'; ?>
        </caption>
        <tbody>
            <?php foreach ($block['elements'] as $item): ?>
            <tr class="price-table__tr">
                <th class="price-table__th" scope="row"><?= $item['title']; ?></th>
                <td class="price-table__td"><?= $item['text']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>