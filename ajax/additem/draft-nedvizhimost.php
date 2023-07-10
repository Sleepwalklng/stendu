<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
global $USER;
$ID_user = $USER-> GetID();


// недвижимость
const MY_HL_BLOCK_ID_NEDVIZHIMOST = 2;
$entity_data_class_nedv = GetEntityDataClass(MY_HL_BLOCK_ID_NEDVIZHIMOST);
$rsNedv = $entity_data_class_nedv::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "DESC"),
    "filter" => array("UF_USER_ID" => $ID_user,'ID'=>$_REQUEST['id'])
));
while($nedv = $rsNedv->fetch()){
    $arNedv = $nedv;
};

    foreach ($arNedv['UF_PHOTOS']as $key=> $photo) {
        $arNedv['UF_PHOTOS'][$photo] = CFile::GetPath($photo);
        unset($arNedv['UF_PHOTOS'][$key]);

    }


echo json_encode($arNedv);
