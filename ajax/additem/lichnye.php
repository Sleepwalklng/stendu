<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



// Личные вещи
$MY_HL_BLOCK_ID = 13;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

$name = $_REQUEST['name'];
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
    'UF_SESSION_CODE' => $transURL,
    'UF_DATE' => $date,
    'UF_USER_ID' => $ID_user,
    'UF_STATUS' => $_REQUEST['UF_STATUS'],
    'UF_EMAIL' => $_REQUEST['UF_EMAIL'],
    'UF_PHONE' => $_REQUEST['UF_PHONE'],
    'UF_ADDRESS' => $_REQUEST['UF_ADDRESS'],
    'UF_ADRES_CODE' => $_REQUEST['UF_ADRES_CODE'],
    'UF_PRICE' => $_REQUEST['UF_PRICE'],

    'UF_DESCRIPTION' => $_REQUEST['UF_DESCRIPTION'],
    'UF_STATE' => $_REQUEST['UF_STATE'],
    'UF_CATEGORY' => $_REQUEST['UF_CATEGORY'],
    'UF_TYPE' => $_REQUEST['UF_TYPE'],
    'UF_CATEGORIES_OUTERWEAR' => $_REQUEST['UF_CATEGORIES_OUTERWEAR'],
    'UF_MAIN_CATEGORY' => $_REQUEST['UF_MAIN_CATEGORY'],

    'UF_COLOR' => $_REQUEST['UF_COLOR'],
    'UF_SIZE' => $_REQUEST['UF_SIZE'],
    'UF_SIZE_FOOT' => $_REQUEST['UF_SIZE_FOOT'],
    'UF_SIZE_CLOTHES_CHILD' => $_REQUEST['UF_SIZE_CLOTHES_CHILD'],
    'UF_FOOT_SIZE_CHILD' => $_REQUEST['UF_FOOT_SIZE_CHILD'],
    'UF_SIZE_CLOTHES_MAN' => $_REQUEST['UF_SIZE_CLOTHES_MAN'],
    'UF_SIZE_FOOT_MAN' => $_REQUEST['UF_SIZE_FOOT_MAN'],

    'UF_COMMUNICATION' => $_REQUEST['UF_COMMUNICATION'],
    'UF_VIDEO' => $_REQUEST['UF_VIDEO'],

    'UF_PHOTOS' => array(CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($FileID)))

);
if (!empty($_REQUEST['UF_NAME']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_PHONE'])) {
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
    echo json_encode($res_json);
}
?>