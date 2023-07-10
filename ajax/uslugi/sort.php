<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");


?>
<?php
    // Получение услуг 
    const MY_HL_BLOCK_ID_USLUGIS = 1;
    CModule::IncludeModule('highloadblock');
    $entity_data_class_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_USLUGIS);
    $rsUslugi = $entity_data_class_uslugi::getList(array());
    while($usl = $rsUslugi->fetch()){
        $arUslugi[] = $usl;
        $arUslugiSort[] = $usl['UF_PRICE'];
    };
?>
<? 
function cmp_function($a, $b){
	return ($a['UF_PRICE'] > $b['UF_PRICE']);
}
 
uasort($arUslugi, 'cmp_function');
print_r($arUslugi);
print_r($_POST['vsl']);
?>
