<?php
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
    <div class="card">
        <img alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image['SRC'] ?>">
    </div>
<?php endif; ?>
