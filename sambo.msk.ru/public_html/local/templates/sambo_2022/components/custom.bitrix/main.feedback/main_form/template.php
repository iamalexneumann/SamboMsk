<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$six_digit_random_number = rand(100000, 999999);
$CurDir = $APPLICATION->GetCurDir();
$param_halls_url = $arParams["HALLS_URL"] ?? '/nashi-zaly/';
$param_redirect_url = $arParams["REDIRECT_URL"] ?? '';
$this->addExternalJS(SITE_TEMPLATE_PATH . "/libs/jquery.inputmask.min.js");
?>
<?php
if (!empty($arResult["ERROR_MESSAGE"])):
    foreach($arResult["ERROR_MESSAGE"] as $error_message):
?>
<div class="alert alert-danger">
    <?= $error_message; ?>
</div>
<?php
    endforeach;
endif;
?>

<?php
if ($arResult["OK_MESSAGE"] <> ''):
    if ($param_redirect_url):
        header('Location: ' . $param_redirect_url);
    else:
?>
<div class="alert alert-success">
    <?= $arResult["OK_MESSAGE"]; ?>
</div>
<?php
    endif;
endif;
?>
<form action="<?= POST_FORM_ACTION_URI; ?>" method="POST" class="main-form">
    <?= bitrix_sessid_post(); ?>
    <div class="main-form__item">
        <label for="user-name-<?= $six_digit_random_number; ?>" class="form-label main-form__label">
            <?= GetMessage("MFT_NAME"); ?>:
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>
            <span class="main-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="text" name="user_name" value="<?= $arResult["AUTHOR_NAME"]; ?>" placeholder="<?= GetMessage("MFT_NAME_PLACEHOLDER"); ?>"
               class="form-control main-form__form-control" id="user-name-<?= $six_digit_random_number; ?>"
            <?php if ($arResult["AUTHOR_NAME"]): ?> readonly<?php endif; ?>
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?> required<?php endif; ?>>
    </div>

    <div class="main-form__item">
        <label for="user-phone-<?= $six_digit_random_number; ?>" class="form-label main-form__label">
            <?= GetMessage("MFT_USER_PHONE"); ?>:
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("USER_PHONE", $arParams["REQUIRED_FIELDS"])): ?>
            <span class="main-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="tel" name="USER_PHONE" placeholder="<?= GetMessage("MFT_USER_PHONE_PLACEHOLDER"); ?>"
               class="form-control main-form__form-control" id="user-phone-<?= $six_digit_random_number; ?>"
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("USER_PHONE", $arParams["REQUIRED_FIELDS"])): ?> required<?php endif; ?>>
    </div>

    <?php
    if (count($GLOBALS['halls_list']) > 0):

        $select_disabled = false;
        for ($i = 0; $i < count($GLOBALS['halls_list']); $i++) {
            $hall_url = $param_halls_url . $GLOBALS['halls_list'][$i]["CODE"] . '/';
            while ($CurDir === $hall_url) {
                $select_disabled = true;
                break;
            }
        }
    ?>
    <div class="main-form__item">
        <label for="halls-list-<?= $six_digit_random_number; ?>" class="form-label main-form__label">
            <?= GetMessage("MFT_HALLS_LIST"); ?>:
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("HALLS_LIST", $arParams["REQUIRED_FIELDS"])): ?>
            <span class="main-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <select class="form-select main-form__form-select" id="halls-list-<?= $six_digit_random_number; ?>" name="HALLS_LIST"
                aria-label="<?= GetMessage("MFT_HALLS_LIST_ARIA_LABEL"); ?>"
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("HALLS_LIST", $arParams["REQUIRED_FIELDS"])): ?> required<?php endif; ?>>
            <option value=""
                    <?php if (($select_disabled === true) && ($APPLICATION->GetCurDir() !== $hall_url)): ?> disabled<?php endif; ?>>
                <?= GetMessage("MFT_HALLS_LIST"); ?>:
            </option>
            <?php foreach ($GLOBALS['halls_list'] as $hall_item):
                $hall_url = $param_halls_url . $hall_item["CODE"] . '/';
            ?>
            <option value="<?= $hall_item["NAME"]; ?> (<?= 'https://' . SITE_SERVER_NAME . $hall_url; ?>)"
                    <?php if ($CurDir === $hall_url): ?> selected<?php endif; ?>
                    <?php if (($select_disabled === true) && ($APPLICATION->GetCurDir() !== $hall_url)): ?> disabled<?php endif; ?>>
                <?= $hall_item["NAME"]; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>

    <div class="main-form__item">
        <div class="form-check main-form__form-check">
            <input class="form-check-input main-form__check-input" type="checkbox" id="privacy-policy-<?= $six_digit_random_number; ?>" checked required>
            <label class="form-check-label main-form__check-label" for="privacy-policy-<?= $six_digit_random_number; ?>">
                <?= GetMessage("MFT_PRIVACY_POLICY_CHECKBOX_TEXT"); ?>
            </label>
        </div>
    </div>

    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="submit" name="submit" value="<?= GetMessage("MFT_SUBMIT"); ?>" class="btn btn-light">
</form>