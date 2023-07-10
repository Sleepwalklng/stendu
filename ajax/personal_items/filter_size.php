<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

const MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER = 16;
$array = [];
$entity_data_class_personal_items_types_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER);
$rsDataTypeFilter = $entity_data_class_personal_items_types_filter::getList(array());
while ($el = $rsDataTypeFilter->fetch()) {
if ($_POST['category'] == $el['ID']) {
    foreach ($el['UF_DOP_FILTER'] AS $value){
        if ($value == 173){$array['color'] = true;}
        if ($value == 174){$array['footSizeChild'] = true;}
        if ($value == 175){$array['footSize'] = true;}
        if ($value == 176){$array['clothesSize'] = true;}
        if ($value == 177){$array['clothesSizeChild'] = true;}
        if ($value == 178){$array['footSizeMan'] = true;}
        if ($value == 179){$array['clothesSizeMan'] = true;}
    }

}
}
$json_array = json_encode($array);
echo $json_array;

