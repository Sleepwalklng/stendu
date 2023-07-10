<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
CModule::IncludeModule('highloadblock');

function GetEntityDataClass($HlBlockId) 
{
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

const MY_HL_BLOCK_ID = 1;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);

$avg = ($_REQUEST['KACHESTVO']+$_REQUEST['VEZH']+$_REQUEST['STOIMOST']+$_REQUEST['PUNKTUA'])/4;
if($avg < 2) {
  $polozhtelnyi = 0;
} else {
  $polozhtelnyi = 1;
}

$result = $entity_data_class::add(array(
      'UF_ID_OT'         		=> $_REQUEST['NAMEot'],
      'UF_ID_KOMU'     			=> $_REQUEST['NAMEto'],
      'UF_ID_TASK'					=> $_REQUEST['ZAKAZ'],
      'UF_KACHESTVO'				=> $_REQUEST['KACHESTVO'],
      'UF_VEZH'							=> $_REQUEST['VEZH'],
      'UF_STOIMOST'        	=> $_REQUEST['STOIMOST'],
      'UF_PUNKTUA'      		=> $_REQUEST['PUNKTUA'],
      'UF_OTZYV'         		=> $_REQUEST['text-otzyv'],
      'UF_AVG'              => $avg,
      'UF_POLOZHITEL'       => $polozhtelnyi,
      'UF_DATE'							=> date("d.m.Y")
));

?>