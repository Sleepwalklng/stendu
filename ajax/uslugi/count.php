<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
// Получение типов услуг
const MY_HL_BLOCK_ID_TYPES_USLUG = 7;

$entity_data_class_type_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_TYPES_USLUG);
$rsData = $entity_data_class_type_uslugi::getList(array());
while ($el = $rsData->fetch()) {
    if ($_POST['categoria'] == $el['UF_NAME']){
        $categoria = $el['ID'];
    }elseif (!empty($_POST['categoryId'])){
        $categoria = $el['ID'];
    }

    $arTypes[] = $el;
}

// Получение услуг
const MY_HL_BLOCK_ID_USLUGIS = 1;
$entity_data_class_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_USLUGIS);
$list_array = array("select" => array("*"), "order" => array("ID" => "ASC"));

if (!empty($_POST['selectPrice']) || !empty($_POST['selectDate'])) {
    if (empty($_POST['selectDate'])) {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
    } elseif (empty($_POST['selectPrice'])) {
        $list_array['order'] = array("UF_DATA" => $_POST['selectDate']);
    } else {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice'], "UF_DATA" => $_POST['selectDate']);
    }
}
$list_array['filter']['UF_STATUS'] = 29;
if ($categoria) {
    $list_array['filter']['UF_TYPE_USLUGI'] = $categoria;
}
if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['address'])) {
    $list_array['filter']['UF_ADRES'] = $_POST['address'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}
if (!empty($_POST['apartment'])) {
    $list_array['filter']['UF_SELLER'] = $_POST['apartment'];
}


$rsUslugi = $entity_data_class_uslugi::getList($list_array);
while ($usl = $rsUslugi->fetch()) {
    $arUslugi[] = $usl;
};
$count = count($arUslugi);

echo $count;
