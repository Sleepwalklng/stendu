<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

CModule::IncludeModule('highloadblock');

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\UserField\DictionaryField;
use Bitrix\Main\UserField\Types\DateTimeType;
use lib\GetUserData;

global $USER;
$ID_user = $USER->GetID();

function GetEntityDataClass1($HlBlockId)
{
    if (empty($HlBlockId) || $HlBlockId < 1) {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

$searchQuery = "%{$_REQUEST['SEARCH']}%";

$entity_data_class_transport = GetEntityDataClass1(3);

$entity_data_class_job = GetEntityDataClass1(11);

$entity_data_class_services = GetEntityDataClass1(1);

$entity_data_class_houses = GetEntityDataClass1(2);

$entity_data_class_clothes = GetEntityDataClass1(13);

$array_all = [];
$i = 0;
$rsData = $entity_data_class_transport::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_TRANSPORT_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    if ($stmp = MakeTimeStamp($arItem['UF_TRANSPORT_CREATED_DATE'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $entity_data_class_type_tr = GetEntityDataClass1(6);
    $rstype = $entity_data_class_type_tr::getList(array());
    while ($el = $rstype->fetch()) {
        $arTypes[] = $el;
    }
    foreach ($arTypes as $arType):
        if ($arItem['UF_TRANSPORT_MARK'] == $arType['ID']):
            $url = $arType['UF_TRANSPORT_MARK_CODE'];
        endif;
    endforeach;
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["URL"] = "/transport/" . $url . "/" . $arItem['UF_TRANSPORT_CODE'] . "/";
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["RAZDEL"] = 1;
    $array_all[$i]["TYPE"] = 'TRANSPORT';
    $array_all[$i]["PRICE"] = $arItem['UF_TRANSPORT_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_TRANSPORT_ADDRESS'];
    $array_all[$i]["PHOTO"] = $arItem['UF_TRANSPORT_IMAGES'];
    $array_all[$i]["NAME"] = $arItem['UF_TRANSPORT_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_TRANSPORT_DESC'];
    $array_all[$i]["USER_ID"] = $arItem['UF_TRANSPORT_USER_ID'];

    $i++;
}


$rsData = $entity_data_class_job::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["URL"] = "/rabota/" . $arItem['UF_SESSION_CODE'] . "/";
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["RAZDEL"] = 3;
    $array_all[$i]["TYPE"] = 'JOB';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADRES'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTO'];
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_COMMENT'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}


$rsData = $entity_data_class_services::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $entity_data_class_type_uslugi = GetEntityDataClass1(7);
    $rstype = $entity_data_class_type_uslugi::getList(array());
    while ($el = $rstype->fetch()) {
        $arTypes[] = $el;
    }
    foreach ($arTypes as $arType):
        if ($arItem['UF_TYPE_USLUGI'] == $arType['ID']):
            $url = $arType['UF_SESSION_CODE'];
        endif;
    endforeach;

    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["URL"] = "/uslugi/" . $url . "/" . $arItem['UF_SESSION_CODE'] . "/";
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'SERVICE';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADRES'];
    $array_all[$i]["RAZDEL"] = 4;
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTO'];
    $array_all[$i]["TEXT"] = $arItem['UF_COMMENT'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}

$rsData = $entity_data_class_houses::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    if ($arItem['UF_DEAL_TYPE'] == 67)
        $url = 'snyat';
    elseif ($arItem['UF_DEAL_TYPE'] == 68)
        $url = 'posutochno';
    elseif ($arItem['UF_DEAL_TYPE'] == 66)
        $url = 'kupit';
    elseif ($arItem['UF_DEAL_TYPE'] == 69)
        $url = 'zapros-na-nedvizhimost';

    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["RAZDEL"] = 2;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'HOUSES';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADDRESS'];
    $array_all[$i]["URL"] = "/nedvizhimost/" . $url . "/" . $arItem['UF_SESSION_CODE'] . "/";
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_DESCRIPTION'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTOS'];
    $i++;
}


$rsData = $entity_data_class_clothes::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }
    $array_all[$i]["URL"] = "/lichnye-veshchi/" . $arItem['UF_SESSION_CODE'] . "/";
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'CLOTHING';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADDRESS'];
    $array_all[$i]["RAZDEL"] = 5;
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTOS'];
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_DESCRIPTION'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];
    foreach ($arElements as $item) {
//        echo $item;
        $resultFav[] = $item;

    }
}


//echo '<pre>';
//print_r($array_all);
//echo '</pre>';
$dates = array_column($array_all, 'DATA-FILTER');

// Сортируем массивы в соответствии с датами
if ($_REQUEST['DATA_SORT'] == 'DESC') {
    array_multisort($dates, SORT_DESC, $array_all);
} elseif ($_REQUEST['DATA_SORT'] == 'ASC') {
    array_multisort($dates, SORT_ASC, $array_all);
} elseif ($_REQUEST['DATA_SORT'] == 'all') {
    shuffle($array_all);
}

$prices = array_column($array_all, 'PRICE');
if ($_REQUEST['PRICE_SORT'] == 'DESC') {
    array_multisort($prices, SORT_DESC, $array_all);
} elseif ($_REQUEST['PRICE_SORT'] == 'ASC') {
    array_multisort($prices, SORT_ASC, $array_all);

} elseif ($_REQUEST['PRICE_SORT'] == 'all' && $_REQUEST['DATA_SORT'] == 'all') {
    shuffle($array_all);
}
//
//echo $_REQUEST['DATA_SORT'].'<br>';
//echo '<pre>';
//print_r($array_all);
//echo '</pre>';
$prices_array = explode(';', $_REQUEST['my_range']);
$i = 0;
foreach ($array_all as $value):
    if (isset($_REQUEST['my_range'])) {
        if ($prices_array[0] > $value['PRICE'] || $prices_array[1] < $value['PRICE']) {
            continue;
        }
    } else {
        if (empty($_REQUEST['PRICE_OT'])){$_REQUEST['PRICE_OT'] = 0;}
        if (empty($_REQUEST['PRICE_DO'])){$_REQUEST['PRICE_DO'] = 10000000000;}
        if ($_REQUEST['PRICE_OT'] > $value['PRICE'] || $_REQUEST['PRICE_DO'] < $value['PRICE']) {
            continue;
        }
    }
    $i++;
endforeach;
echo $i;
?>
