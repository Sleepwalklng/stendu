<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent(
    "vladek:transport.elements",
    "filter",
    false
);?>