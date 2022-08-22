<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */

$settings = !empty($block['settings']) ? $block['settings'] : [];
$tag = !empty($settings['type']) ? $settings['type'] : 'ul';
?>
<div class="sp-lists">
    <?= Sprint\Editor\Blocks\Lists::getValue($block, $tag); ?>
</div>
