<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
$MY_HL_BLOCK_ID = 6;
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

$ourData = file_get_contents("data.json");
$array = json_decode($ourData, true);

$from_lang = 'ru';

/*foreach ($array['Worksheet'] as $item) { 

	$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
	$result = $entity_data_class::add(array(
      'UF_ID_CAR'         				=> $item['id_car_mark'],
      'UF_TRANSPORT_MARK_CODE'    => Cutil::translit($item['name'], $from_lang),
      'UF_TRANSPORT_MARK_NAME'    => $item['name']
   ));

}*/
?>

<pre>
    <?print_r($array['Worksheet'])?>
</pre>