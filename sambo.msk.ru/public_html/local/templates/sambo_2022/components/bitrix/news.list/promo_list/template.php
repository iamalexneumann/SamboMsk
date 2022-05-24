<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (count($arResult['ITEMS']) > 0):
?>
<div class="alert alert-primary promo-alert fade show" id="header-promo-list" role="alert">
    <div class="container">
        <ul class="promo-list carousel slide clearfix" id="promoCarousel" data-bs-ride="carousel" data-bs-interval="false">
            <?php
            foreach ($arResult['ITEMS'] as $key => $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $att_preview_text = $arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['DISPLAY_VALUE'];
                $att_btn_text = $arItem['DISPLAY_PROPERTIES']['ATT_BTN_TEXT']['DISPLAY_VALUE'];
                $att_btn_link = $arItem['DISPLAY_PROPERTIES']['ATT_BTN_LINK']['DISPLAY_VALUE'];
                ?>
                <li class="promo-list__item carousel-item<?php if ($key === 0): ?> active<?php endif; ?>"
                    id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="promo-list__content">
                    <?= $att_preview_text; ?>
                    <?php if ($att_btn_link): ?>
                        <a href="<?= $att_btn_link; ?>" class="btn btn-sm btn-outline-light promo-list__btn">
                            <?php if ($att_btn_text): echo $att_btn_text; else: echo GetMessage("PROMO_LIST_BTN_TEXT_DEFAULT"); endif; ?>
                        </a>
                    <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($arResult['ITEMS']) > 1): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
        <?php endif; ?>
        <button type="button" class="btn-close btn-close_light" data-bs-dismiss="alert" aria-label="<?= GetMessage("PROMO_LIST_BTN_CLOSE_ARIA_LABEL"); ?>">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>
<script data-skip-moving="true">
    if (sessionStorage.getItem('hideHeaderMessages') === 'true') {
        document.querySelector('#header-promo-list').classList.add('d-none');
    }

    document.querySelector('#header-promo-list .btn-close').addEventListener("click", function() {
        sessionStorage.setItem('hideHeaderMessages', 'true');
    });
</script>
<?php endif; ?>
