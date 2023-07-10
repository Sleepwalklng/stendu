<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



global $USER;

$ID_user = $USER->GetID();
// Недвижимость
$MY_HL_BLOCK_ID = 2;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

    $arr = array(
        'UF_STATUS' => 86,
    );
        $result = $entity_data_class::update($_REQUEST['id'], $arr);

    if ($result->isSuccess()) {
        echo json_encode(1);
    }


?>

