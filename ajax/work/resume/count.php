<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('highloadblock');
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

function GetEntityDataClass($HlBlockId)
{
    if (empty($HlBlockId) || $HlBlockId < 1) {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}


// Получение типов услуг
const MY_HL_BLOCK_ID_TYPES_USLUG = 10;

$entity_data_class_type_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_TYPES_USLUG);
$rsData = $entity_data_class_type_uslugi::getList(array());
while ($el = $rsData->fetch()) {
    if ($_POST['type'] == $el['UF_NAME']){
        $categoria = $el['ID'];
    }elseif (!empty($_POST['categoryId'])){
        $categoria = $el['ID'];
    }

    $arCount[] = $el;
}

function userFieldEnum($id): array
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        $arr[] = $ob;
    };
    return $arr;
}



const MY_HL_BLOCK_ID_USLUGIS = 17;
$entity_data_class_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_USLUGIS);
$list_array = array("select" => array("*"), "order" => array("ID" => "ASC"));

if ($categoria) {
    $list_array['filter']['UF_TYPE'] = $categoria;
}
if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}
if (!empty($_POST['grafic'])) {
    $list_array['filter']['UF_GRAFIC'] = $_POST['grafic'];
}
if (!empty($_POST['selectPrice'])) {
    $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
}
if (!empty($_POST['selectDate'])) {
    $list_array['order'] = array("UF_DATE" => $_POST['selectDate']);
}

$rsUslugi = $entity_data_class_uslugi::getList($list_array);
while ($usl = $rsUslugi->fetch()) {
    $arUslugi[] = $usl;
};
$count = count($arUslugi);

echo $count;
