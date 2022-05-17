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
<form action="<?= POST_FORM_ACTION_URI; ?>" method="POST" class="modal-form">
    <?= bitrix_sessid_post(); ?>
    <div class="modal-form__item mb-3">
        <label for="user-name-<?= $six_digit_random_number; ?>" class="form-label modal-form__label">
            <?= GetMessage("MFT_NAME"); ?>:
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>
            <span class="modal-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="text" name="user_name" value="<?= $arResult["AUTHOR_NAME"]; ?>" placeholder="<?= GetMessage("MFT_NAME_PLACEHOLDER"); ?>"
               class="form-control modal-form__form-control" id="user-name-<?= $six_digit_random_number; ?>"
            <?php if ($arResult["AUTHOR_NAME"]): ?> readonly<?php endif; ?>
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?> required<?php endif; ?>>
    </div>

    <div class="modal-form__item mb-3">
        <label for="user-phone-<?= $six_digit_random_number; ?>" class="form-label modal-form__label">
            <?= GetMessage("MFT_USER_PHONE"); ?>:
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("USER_PHONE", $arParams["REQUIRED_FIELDS"])): ?>
            <span class="modal-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="tel" name="USER_PHONE" placeholder="<?= GetMessage("MFT_USER_PHONE_PLACEHOLDER"); ?>"
               class="form-control modal-form__form-control" id="user-phone-<?= $six_digit_random_number; ?>"
            <?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("USER_PHONE", $arParams["REQUIRED_FIELDS"])): ?> required<?php endif; ?>>
    </div>

    <div class="modal-form__item mb-3">
        <div class="form-check modal-form__form-check">
            <input class="form-check-input modal-form__check-input" type="checkbox" id="privacy-policy-<?= $six_digit_random_number; ?>" checked required>
            <label class="form-check-label modal-form__check-label" for="privacy-policy-<?= $six_digit_random_number; ?>">
                <?= GetMessage("MFT_MODAL_PRIVACY_POLICY_CHECKBOX_TEXT"); ?>
            </label>
        </div>
    </div>

    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="submit" name="submit" value="<?= GetMessage("MFT_MODAL_SUBMIT"); ?>" class="btn btn-danger"
           onclick="ym(56418265, 'reachGoal', 'form_submit'); return true;">
</form>