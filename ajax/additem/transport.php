<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


// Транспорт
$MY_HL_BLOCK_ID = 3;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

$name = $_REQUEST['NAME'].'-'.$_REQUEST['brand'].'-'.$_REQUEST['MODEL'];
$arParams = array("replace_space"=>"-","replace_other"=>"-");
$transURL = Cutil::translit($name,"ru",$arParams);

//$result = $entity_data_class::add(array(
$arr = array(
      'UF_TELEFON' => $_REQUEST['UF_OWNER_PHONE'],
      'UF_STATUS' => 1,
      'UF_TRANSPORT_ADDRESS' => $_REQUEST['UF_ADDRESS'],
      'UF_TRANSPORT_DESC' => $_REQUEST['DESC'],
      'UF_TRANSPORT_CODE' => $transURL,
      'UF_TRANSPORT_USER_ID' => 1,
      'UF_TRANSPORT_CREATED_DATE' => date('d.m.Y'),
      'UF_TRANSPORT_NAME' => $_REQUEST['NAME'],
      'UF_TRANSPORT_PRICE' => 1,
      'UF_TRANSPORT_MILEAGE' => $_REQUEST['PROBEG'], // пробег
      'UF_TRANSPORT_YEAR' => $_REQUEST['YEAR'],
      'UF_TRANSPORT_DRIVING' => $_REQUEST['PRIVOD'],
      'UF_TRANSPORT_ENGINE' => $_REQUEST['DVIGATEL'],
      'UF_TRANSPORT_TRANSMISSION' => $_REQUEST['KOROBKA'],
      'UF_TRANSPORT_BODY' => $_REQUEST['KUZOV'],
      'UF_TRANSPORT_CATEGORY' => 1,
      //'UF_TRANSPORT_GENERATION' => $_REQUEST[''], // поколение
      'UF_TRANSPORT_MODEL' => $_REQUEST['MODEL'],
      'UF_TRANSPORT_MARK' => $_REQUEST['brand'],


      'UF_TRANSPORT_IMAGES' => $_FILES['FILE']
      
      
);

if (!empty($_REQUEST['UF_OWNER_PHONE']) && !empty($_REQUEST['PROBEG']) && !empty($_REQUEST['PRICE']) && !empty($_REQUEST['VLADELCEV']) && !empty($_REQUEST['DESC']) ) {
            $result = $entity_data_class::add($arr);
            if ($result->isSuccess()) {
                echo json_encode(1);
            }
        } else {
            $res_json = [];
            if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
            }
            if (empty($_REQUEST['PROBEG'])) {
                $res_json['PROBEG'] = 'Заполните пробег';
            }
            if (empty($_REQUEST['PRICE'])) {
                $res_json['PRICE'] = 'Заполните цену';
            }
            if (empty($_REQUEST['VLADELCEV'])) {
                $res_json['VLADELCEV'] = 'Заполните владельцев';
            }
            if (empty($_REQUEST['DESC'])) {
                $res_json['DESC'] = 'Заполните описание';
            }

            echo json_encode($res_json);
        }

/*
transport -----------------------------

GOSNOMER
VIN
VINNOMER
STS
PTS
YEAR_POKUPKI
MONHT_POKUPKI

SOSTOYANIE
GARANTIYA

PODUSHKI
KREPLENIE
VSPOMOG
ABS
PROTIVOTUMAN
KORRFAR
HOD_OGNI
OMYVATEL
OBOGREV
KONDEY
PARKOVKA
REGUL_RUL
ELECTROPODEM
USILITEL
REZHIM_DVIZH
MULTIFUNC
COMPUTER
BEZ_KEY
ELECTROSKLAD_ZERKALO
ELECTROPRIVOD_ZERKALO
CONTACT


*/
?>

