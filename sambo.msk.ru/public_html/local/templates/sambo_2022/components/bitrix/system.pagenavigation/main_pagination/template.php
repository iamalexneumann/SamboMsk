<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>
<ul class="pagination" aria-label="Навигация по страницам">
    <?php
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

    if ($arResult["bDescPageNumbering"] === true):
        $bFirst = true;
        if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
            if ($arResult["bSavePage"]):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]+1); ?>" aria-label="Предыдущая">
                        <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                    </a>
                </li>
            <?php
            elseif ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1)):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>" aria-label="Предыдущая">
                            <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                        </a>
                    </li>
                <?php
                else:
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]+1); ?>" aria-label="Предыдущая">
                            <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                        </a>
                    </li>
                <?php
            endif;

            if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
                $bFirst = false;
                if ($arResult["bSavePage"]):
                    ?>
                    <li class="page-item">
                        <a class="page-link"  href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= $arResult["NavPageCount"]; ?>">1</a>
                    </li>
                <?php
                else:
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>">1</a>
                    </li>
                <?php
                endif;
                if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= intval($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2); ?>">...</a>
                    </li>
                <?php
                endif;
            endif;
        endif;
        do {
            $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

            if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                ?>
                <li class="page-item active" aria-current="page">
                    <span class="page-link"><?= $NavRecordGroupPrint; ?></span>
                </li>
            <?php
            elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>"><?= $NavRecordGroupPrint; ?></a>
                </li>
            <?php
            else:
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= $arResult["nStartPage"]; ?>"><?= $NavRecordGroupPrint; ?></a>
                </li>
            <?php
            endif;

            $arResult["nStartPage"]--;
            $bFirst = false;
        } while ($arResult["nStartPage"] >= $arResult["nEndPage"]);

        if ($arResult["NavPageNomer"] > 1):
            if ($arResult["nEndPage"] > 1):
                if ($arResult["nEndPage"] > 2):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= round($arResult["nEndPage"] / 2); ?>">...</a>
                    </li>
                <?php
                endif;
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=1"><?= $arResult["NavPageCount"]; ?></a>
                </li>
            <?php
            endif;
            ?>
            <li class="page-item">
                <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]-1); ?>" aria-label="Следующая">
                    <span aria-hidden="true"><?= GetMessage("nav_next"); ?></span>
                </a>
            </li>
        <?php
        endif;

    else:
        $bFirst = true;

        if ($arResult["NavPageNomer"] > 1):
            if ($arResult["bSavePage"]):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]-1); ?>" aria-label="Предыдущая">
                        <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                    </a>
                </li>
            <?php
            elseif ($arResult["NavPageNomer"] > 2):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]-1); ?>" aria-label="Предыдущая">
                            <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                        </a>
                    </li>
                <?php
                else:
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>" aria-label="Предыдущая">
                            <span aria-hidden="true"><?= GetMessage("nav_prev"); ?></span>
                        </a>
                    </li>
                <?php
            endif;

            if ($arResult["nStartPage"] > 1):
                $bFirst = false;
                if ($arResult["bSavePage"]):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=1">1</a>
                    </li>
                <?php
                else:
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>">1</a>
                    </li>
                <?php
                endif;
                if ($arResult["nStartPage"] > 2):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= round($arResult["nStartPage"] / 2); ?>">...</a>
                    </li>
                <?php
                endif;
            endif;
        endif;

        do
        {
            if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                ?>
                <li class="page-item active" aria-current="page">
                    <span class="page-link"><?= $arResult["nStartPage"]; ?></span>
                </li>
            <?php
            elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?><?= $strNavQueryStringFull; ?>"><?= $arResult["nStartPage"]; ?></a>
                </li>
            <?php
            else:
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= $arResult["nStartPage"]; ?>"><?= $arResult["nStartPage"]; ?></a>
                </li>
            <?php
            endif;
            $arResult["nStartPage"]++;
            $bFirst = false;
        } while($arResult["nStartPage"] <= $arResult["nEndPage"]);

        if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
            if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2); ?>">...</a>
                    </li>
                <?php
                endif;
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= $arResult["NavPageCount"]; ?>"><?= $arResult["NavPageCount"]; ?></a>
                </li>
            <?php
            endif;
            ?>
            <li class="page-item">
                <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]+1); ?>" aria-label="Следующая">
                    <span aria-hidden="true"><?= GetMessage("nav_next"); ?></span>
                </a>
            </li>
        <?php
        endif;
    endif;

    if ($arResult["bShowAll"]):
        if ($arResult["NavShowAll"]):
            ?>
            <li class="page-item">
                <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>SHOWALL_<?= $arResult["NavNum"]; ?>=0"><?= GetMessage("nav_paged"); ?></a>
            </li>
        <?php
        else:
            ?>
            <li class="page-item">
                <a class="page-link" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>SHOWALL_<?= $arResult["NavNum"]; ?>=1"><?= GetMessage("nav_all"); ?></a>
            </li>
        <?php
        endif;
    endif
    ?>
</ul>
