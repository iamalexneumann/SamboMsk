<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */
?>
<div class="table-responsive">
    <table class="sp-properties table table-bordered table-striped">
        <tbody>
            <?php foreach ($block['elements'] as $item): ?>
            <tr>
                <th scope="row"><?= $item['title'] ?></th>
                <td><?= $item['text'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>