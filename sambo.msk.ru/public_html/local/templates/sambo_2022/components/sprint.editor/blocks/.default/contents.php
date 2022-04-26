<aside class="article-content">
    <div class="article-content__title"><?= GetMessage('SPRINT_EDITOR_block_contents_title') ?></div>
    <ul class="article-content__list custom-ul-list">
        <?php
        foreach ($block['elements'] as $item):
            $cssclass = 'level' . $item['level'];
            $margin = ($item['level'] - 1) * 40;
        ?>
        <li class="article-content__item <?= $cssclass ?>">
            <a href="#<?= $item['anchor'] ?>" class="article-content__link"><?= $item['text'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</aside>
