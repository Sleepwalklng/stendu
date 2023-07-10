<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?$APPLICATION->IncludeComponent("resume:resume.detail", ".default", Array(),false);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>