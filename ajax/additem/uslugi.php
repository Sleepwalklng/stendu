<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



// Личные вещи
$MY_HL_BLOCK_ID = 1;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

$name = $_REQUEST['NAME'];
$arParams = array("replace_space" => "-", "replace_other" => "-");
$transURL = Cutil::translit($name, "ru", $arParams);
$arFileArray = array(
    "name" => $_FILES["FILE"]["name"],
    "size" => $_FILES["FILE"]["size"],
    "tmp_name" => $_FILES["FILE"]["tmp_name"],
    "type" => $_FILES["FILE"]["type"],
    "MODULE_ID" => "highloadblock"
);

$FileID = CFile::SaveFile($arFileArray, "highloadblock");
global $USER;
$ID_user = $USER->GetID() ?? '1';
$date = new \Bitrix\Main\Type\DateTime();


    $arr = array(
    'UF_NAME' => $_REQUEST['UF_NAME'],
    'UF_DATA' => $date,
    'UF_STATUS' => $_REQUEST['UF_STATUS'],
    'UF_EMAIL' => $_REQUEST['UF_EMAIL'],
    'UF_PHONE' => $_REQUEST['UF_PHONE'],
    'UF_SELLER' => $_REQUEST['UF_SELLER'],
    'UF_SESSION_CODE' => $transURL,
    'UF_TYPE_USLUGI' => $_REQUEST['UF_TYPE_USLUGI'],
    'UF_USER_ID' => $ID_user,
    'UF_COMMENT' => $_REQUEST['UF_COMMENT'],
    'UF_ADRES' => $_REQUEST['UF_ADRES'],
    'UF_ADRES_CODE' => $_REQUEST['UF_ADRES_CODE'],
    'UF_PHOTO' => $_FILES['FILE'],
    'UF_PRICE' => $_REQUEST['UF_PRICE'],


);

if (!empty($_REQUEST['UF_NAME']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_PHONE'])&& !empty($_REQUEST['UF_TYPE_USLUGI'])) {
    if ($_REQUEST['oper'] == 'add') {
        $result = $entity_data_class::add($arr);
    } else {
        $result = $entity_data_class::update($_REQUEST['itemId'], $arr);
    }
    if ($result->isSuccess()) {
        echo json_encode(1);
    }
} else {
    $res_json = [];
    if (empty($_REQUEST['UF_NAME'])) {
        $res_json['UF_NAME'] = 'Укажите название';
    }
    if (empty($_REQUEST['UF_PRICE'])) {
        $res_json['UF_PRICE'] = 'Укажите цену';
    }
    if (empty($_REQUEST['UF_PHONE'])) {
        $res_json['UF_PHONE'] = 'Укажите телефон';
    }
    if (empty($_REQUEST['UF_TYPE_USLUGI'])) {
        $res_json['UF_TYPE_USLUGI'] = 'Укажите тип услуги';
    }
    echo json_encode($res_json);
}
?>
