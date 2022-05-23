<?php
$image_lqip = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 100,
//        'height' => 100,
        'exact'  => 0,
    ]
);
$image = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 500,
//        'height' => 500,
        'exact'  => 0,
    ]
);
?>

<?php if ($image): ?>
<figure class="float-block <?= $block['css_class']; ?>">
    <img alt="<?= $image['DESCRIPTION']; ?>" class="lazyload blur-up" width="500"
         src="<?= $image_lqip['SRC']; ?>" data-src="<?= $image['SRC']; ?>"/>
    <?php if ($image['DESCRIPTION']): ?>
    <figcaption class="float-block__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
    <?php endif; ?>
</figure>
<?php endif; ?>