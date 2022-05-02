<?php if ($block['rows']): ?>
<div class="col-lg-6">
    <div class="table-responsive schedule-section__table-wrapper">
        <table class="table schedule-table table-bordered caption-top align-middle">
            <?php if ($block['table_caption']): ?>
            <caption class="schedule-table__caption"><?= $block['table_caption']; ?></caption>
            <?php endif; ?>
            <tbody>
            <?php foreach ($block['rows'] as $cols): ?>
                <tr class="schedule-table__tr">
                    <?php
                    foreach ($cols as $col_key =>$col):
                        $col = Sprint\Editor\Blocks\Table::prepareColumn($col);
                        $col_tag = '';
                        if ($col_key === 0) {
                            $col_tag = 'th';
                        } else {
                            $col_tag = 'td';
                        }
                        ?>
                        <<?= $col_tag; ?>
                            class="schedule-table__<?= $col_tag; ?>"
                            <?php if ($col_tag === 'th'): ?> scope="row"<?php endif; ?>
                            <?php if ($col['style']): ?> style="<?= $col['style']; ?>"<?php endif; ?>
                            <?php if ($col['colspan']): ?> colspan="<?= $col['colspan']; ?>"<?php endif; ?>
                            <?php if ($col['rowspan']): ?> rowspan="<?= $col['rowspan']; ?>"<?php endif; ?>
                        >
                            <?= str_replace('; ', '<br>', $col['text']); ?>
                        </<?= $col_tag; ?>>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>