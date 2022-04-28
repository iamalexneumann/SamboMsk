<?php
$elements = Sprint\Editor\Blocks\IblockElements::getList(
    $block, [
        'NAME',
        'DETAIL_PAGE_URL',
        'PREVIEW_PICTURE',
    ]
);
?>
<div class="row article-photos-list">
    <?php
    foreach ($elements as $aItem):
        $image_arr = [
            "file" => [
                  "ID" => $aItem['PREVIEW_PICTURE'],
            ]
        ];
        $image = Sprint\Editor\Blocks\Image::getImage(
            $image_arr, [
                'width'  => 500,
                'height' => 500,
                'exact'  => 1,
            ]
        );
    ?>
    <div class="col-lg-4 col-md-6 articles-list-vertical__col">
        <figure class="article-vertical photos-article">
            <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" class="article-vertical__img-link" rel="nofollow">
                <img src="<?= $image["SRC"]; ?>"
                     class="article-vertical__img"
                     alt="<?= $aItem['NAME']; ?>">
            </a>
            <div class="article-vertical__wrapper">
                <div class="article-vertical__header">
                    <div class="article-vertical__title">
                        <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" class="article-vertical__link"><?= $aItem['NAME']; ?></a>
                    </div>
                </div>
                <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" class="btn btn-primary article-vertical__btn" rel="nofollow">
                    Смотреть альбом <i class="fa-solid fa-angle-right article-vertical__btn-icon"></i>
                </a>
            </div>
            <figcaption class="d-none"><?= $aItem['NAME']; ?></figcaption>
        </figure>
    </div>
    <?php endforeach; ?>
</div>



