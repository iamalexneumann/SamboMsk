<?php
$image = Sprint\Editor\Blocks\Image::getImage(
    $block, [
        'width'  => 500,
        'height' => 500,
        'exact'  => 0,
        //'jpg_quality' => 75
    ]
);
?>

<?php if ($image): ?>
<figure class="float-block <?= $block['css_class']; ?>">
    <img alt="<?= $image['DESCRIPTION']; ?>" src="<?= $image['SRC']; ?>"/>
    <?php if ($image['DESCRIPTION']): ?>
    <figcaption class="float-block__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
    <?php endif; ?>
</figure>
<?php endif; ?>