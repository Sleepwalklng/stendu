<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use lib\GetUserData;



const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES = 14;
if (!empty($_POST['categoriesId'])) {
    $entity_data_class_personal_items_categories = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES);
    $rsData = $entity_data_class_personal_items_categories::getList(array());
    while ($el = $rsData->fetch()) {
        $name = str_replace("</br>", "", $el['UF_NAME']);
        if ($_POST['categoriesId'] == $el['ID']) {
            $categoriesFilterId = $el['ID'];
        } elseif ($_POST['categoriesId'] == $name) {
            $categoriesFilterId = $el['ID'];
        }
    }
}

const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER = 15;
if (!empty($_POST['categoria'])) {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['categoria'] == $el['UF_NAME']):
            $categoria = $el['ID'];
        endif;
//    $Count[] = $el;
    }
}

if (!empty($_POST['color']) && $_POST['color'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(21);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['color'] == $el['UF_NAME']):
            $color = $el['ID'];
        endif;
    }
}

if (!empty($_POST['size_foot_man']) && $_POST['size_foot_man'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(27);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['size_foot_man'] == $el['UF_SIZE']):
            $SizeFootMan = $el['ID'];
        endif;
    }
}

if (!empty($_POST['select_size_man']) && $_POST['select_size_man'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(26);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['select_size_man'] == $el['UF_NAME']):
            $SizeMan = $el['ID'];
        endif;
    }
}

if (!empty($_POST['size_foot_child']) && $_POST['size_foot_child'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(24);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['size_foot_child'] == $el['UF_SIZE']):
            $footSizeChild = $el['ID'];
        endif;
    }
}

if (!empty($_POST['size_child']) && $_POST['size_child'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(25);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['size_child'] == $el['UF_NAME']):
            $SizeChild = $el['ID'];
        endif;
    }
}

if (!empty($_POST['size_foot']) && $_POST['size_foot'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(23);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['size_foot'] == $el['UF_SIZE']):
            $footSize = $el['ID'];
        endif;
    }
}

if (!empty($_POST['category_size']) && $_POST['category_size'] != 'Все') {
    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(22);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['category_size'] == $el['UF_NAME']):
            $Size = $el['ID'];
        endif;
    }
}
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER = 16;
if (!empty($_POST['type'])) {
    $entity_data_class_personal_items_types_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER);
    $rsDataTypeFilter = $entity_data_class_personal_items_types_filter::getList(array());
    while ($el = $rsDataTypeFilter->fetch()) {
        if ($_POST['type'] == $el['UF_NAME']):
            $type = $el['ID'];
        endif;
    }
}
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR = 20;
$entity_data_class_personal_items_outerwear = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR);
$rsDataTypeFilter = $entity_data_class_personal_items_outerwear::getList(array());
while ($el = $rsDataTypeFilter->fetch()) {
    if ($_POST['outerwear'] == $el['UF_NAME']):
        $outerwear = $el['ID'];
    endif;
}

function userFieldEnum($id, $val): int
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        if ($val == $ob['VALUE']) {
            $itemId = $ob['ID'];
        }
    };

    return $itemId;
}

if (!empty($_POST['region']) && $_POST['region'] !== 'Все') {
    $regionId = userFieldEnum(232, $_POST['region']);
}

const MY_HL_BLOCK_ID_PERSONAL_ITEMS = 13;
$entity_data_class_personal_items = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS);
$list_array = array("select" => array("*"), "order" => array("ID" => "DESC"),);
if (!empty($_POST['selectPrice']) || !empty($_POST['selectDate'])) {
    if (empty($_POST['selectDate'])) {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
    } elseif (empty($_POST['selectPrice'])) {
        $list_array['order'] = array("UF_DATE" => $_POST['selectDate']);
    } else {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice'], "UF_DATE" => $_POST['selectDate']);
    }
}
$list_array['filter']['UF_STATUS'] = 24;
if ($type) {
    $list_array['filter']['UF_TYPE'] = $type;

}
if ($Size && $Size != 'Все') {
    $list_array['filter']['UF_SIZE'] = $Size;
}
if ($categoriesFilterId) {
    $list_array['filter']['UF_MAIN_CATEGORY'] = $categoriesFilterId;
}
if ($footSize && $footSize != 'Все') {
    $list_array['filter']['UF_SIZE_FOOT'] = $footSize;
}
if ($SizeMan && $SizeMan != 'Все') {
    $list_array['filter']['UF_SIZE_CLOTHES_MAN'] = $SizeMan;
}
if ($SizeFootMan && $SizeFootMan != 'Все') {
    $list_array['filter']['UF_SIZE_FOOT_MAN'] = $SizeFootMan;
}
if ($SizeChild && $SizeChild != 'Все') {
    $list_array['filter']['UF_SIZE_CLOTHES_CHILD'] = $SizeChild;
}
if ($footSizeChild && $footSizeChild != 'Все') {
    $list_array['filter']['UF_FOOT_SIZE_CHILD'] = $footSizeChild;
}
if ($color && $color != 'Все') {
    $list_array['filter']['UF_COLOR'] = $color;
}
//if ($regionId) {
//    $list_array['filter']['UF_REGION'] = $regionId;
//}
if ($outerwear) {
    $list_array['filter']['UF_CATEGORIES_OUTERWEAR'] = $outerwear;
}
if ($categoria) {
    $list_array['filter']['UF_CATEGORY'] = $categoria;
}
if (!empty($_POST['state'])) {
    $list_array['filter']['UF_STATE'] = $_POST['state'];
}
if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}
if (!empty($_POST['apartment'])) {
    $list_array['filter']['UF_SELLER'] = $_POST['apartment'];
}


$resPersonalItems = $entity_data_class_personal_items::getList($list_array);
while ($ob = $resPersonalItems->fetch()) {
//    if (!empty($categoriesFilterId)) {
//
//        foreach ($categoriesFilterId as $id) {
//
//            if ($id == $ob['UF_CATEGORY']) {
//                $arPersonalItems[] = $ob;
//            }
//        }
//
//    } elseif(empty($_POST['categoriesId'])) {

    $arPersonalItems[] = $ob;
//    }
}

$count = count($arPersonalItems);


echo $count;

?>