<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */

$image_lqip = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 100,
//        'height' => 100,
        'exact'  => 0,
    ]
);

$image = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 1300,
        'height' => 970,
        'exact'  => 0,
        //'jpg_quality' => 75
    ]
);
?>

<?php if ($image): ?>
<figure class="card">
    <img alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image_lqip['SRC']; ?>"
         class="lazyload blur-up" data-src="<?= $image['SRC']; ?>">
    <?php if ($image['DESCRIPTION']): ?>
    <figcaption class="float-block__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
    <?php endif; ?>
</figure>
<?php endif; ?>
