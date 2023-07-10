<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Запрос на недвижимость");

$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "stendu",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/includes/components/nedvizhimost/zapros-na-nedvizhimost.php"
    )
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>