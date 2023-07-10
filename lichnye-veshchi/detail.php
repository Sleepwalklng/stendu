<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");
CModule::IncludeModule('highloadblock');

?>
<?$APPLICATION->IncludeComponent("personal_items:personal_items.detail", ".default", Array(),false);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
