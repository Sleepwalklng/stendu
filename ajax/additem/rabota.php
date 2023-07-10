<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';



$MY_HL_BLOCK_ID = 11;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

$name = $_REQUEST['name'].'-'.$_REQUEST['GDE'].'-'.$_REQUEST['MESTO'];
$arParams = array("replace_space"=>"-","replace_other"=>"-");
$transURL = Cutil::translit($name,"ru",$arParams);
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
$candidat = explode(',',$_REQUEST['UF_CANDIDAT']);
$arr = array(
      'UF_NAME' => $_REQUEST['UF_NAME'],
      'UF_PHOTO' => array(CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($FileID))),
      'UF_STATUS' => $_REQUEST['UF_STATUS'],
      'UF_EMAIL' => $_REQUEST['UF_EMAIL'],
      'UF_PHONE' => $_REQUEST['UF_PHONE'],
      'UF_CANDIDAT' => $candidat,
      'UF_EXPERIENCE' => $_REQUEST['UF_EXPERIENCE'],
      'UF_GRAFIC' => $_REQUEST['UF_GRAFIC'],
      'UF_FREQUENCY' => $_REQUEST['UF_FREQUENCY'],
      'UF_SALARY_PERIOD' => $_REQUEST['UF_SALARY_PERIOD'],
      'UF_SALARY_OT' => $_REQUEST['UF_SALARY_OT'],
      'UF_SALARY_DO' => $_REQUEST['UF_SALARY_DO'],
      'UF_SESSION_CODE' => $transURL,
      'UF_USER_ID' => $ID_user,
      'UF_DATA' => $date,
      'UF_ADRES' => $_REQUEST['UF_ADRES'],
      'UF_ADRES_CODE' => $_REQUEST['UF_ADRES_CODE'],
      'UF_COMMENT' => $_REQUEST['UF_COMMENT'],
      'UF_COMMUNICATION' => $_REQUEST['UF_COMMUNICATION'],
      'UF_FIELDACTIVITY' => $_REQUEST['UF_FIELDACTIVITY'], // сфера деятельности
      'UF_TYPE_WORK' => $_REQUEST['UF_TYPE_WORK'], // тип работы
      
      
);
if (!empty($_REQUEST['UF_NAME']) && !empty($_REQUEST['UF_SALARY_OT']) && !empty($_REQUEST['UF_PHONE'])&& !empty($_REQUEST['UF_TYPE_WORK'])) {
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
    if (empty($_REQUEST['UF_SALARY_OT'])) {
        $res_json['UF_SALARY_OT'] = 'Укажите цену от';
    }
    if (empty($_REQUEST['UF_PHONE'])) {
        $res_json['UF_PHONE'] = 'Укажите телефон';
    }
    if (empty($_REQUEST['UF_TYPE_WORK'])) {
        $res_json['UF_TYPE_WORK'] = 'Укажите профессию';
    }
    echo json_encode($res_json);
}

?>


