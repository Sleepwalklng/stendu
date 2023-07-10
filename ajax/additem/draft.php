<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
global $USER;
$ID_user = $USER-> GetID();


$entity_data_class = GetEntityDataClass($_REQUEST['hl_id']);
$rsNedv = $entity_data_class::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "DESC"),
    "filter" => array("UF_USER_ID" => $ID_user,'ID'=>$_REQUEST['id'])
));
while($nedv = $rsNedv->fetch()){
    $arNedv = $nedv;
}

echo json_encode($arNedv);
