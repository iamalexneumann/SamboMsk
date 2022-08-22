<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */

$image = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 1024,
        'height' => 768,
        'exact'  => 0,
        //'jpg_quality' => 75
    ]
);
?>
<?php if ($image): ?>
<figure class="card">
    <img alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image['SRC'] ?>">
    <?php if ($image['DESCRIPTION']): ?>
    <figcaption class="float-block__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
    <?php endif; ?>
</figure>
<?php endif; ?>
