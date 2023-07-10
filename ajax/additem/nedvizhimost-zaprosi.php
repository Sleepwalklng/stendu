<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
global $USER;

$ID_user = $USER->GetID()??'1';
// Недвижимость
$MY_HL_BLOCK_ID = 2;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

if (!empty($_REQUEST['UF_RCHUTE'])) {
    $UF_RCHUTE = $_REQUEST['UF_RCHUTE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_MORTGAGE'])) {
    $UF_MORTGAGE = $_REQUEST['UF_MORTGAGE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PENTHOUSE'])) {
    $UF_PENTHOUSE = $_REQUEST['UF_PENTHOUSE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_HAVE_PHONE'])) {
    $UF_HAVE_PHONE = $_REQUEST['UF_HAVE_PHONE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ELECTRICITY'])) {
    $UF_ELECTRICITY = $_REQUEST['UF_ELECTRICITY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_SECURITY'])) {
    $UF_SECURITY = $_REQUEST['UF_SECURITY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BATHH'])) {
    $UF_BATHH = $_REQUEST['UF_BATHH'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_GARAGE'])) {
    $UF_GARAGE = $_REQUEST['UF_GARAGE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_POOL'])) {
    $UF_POOL = $_REQUEST['UF_POOL'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_WITH_CHILDREN'])) {
    $UF_WITH_CHILDREN = $_REQUEST['UF_WITH_CHILDREN'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PETS'])) {
    $UF_PETS = $_REQUEST['UF_PETS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_KITCHEN'])) {
    $UF_KITCHEN = $_REQUEST['UF_KITCHEN'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ROOMS_FURNITURE'])) {
    $UF_ROOMS_FURNITURE = $_REQUEST['UF_ROOMS_FURNITURE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FRIDGE'])) {
    $UF_FRIDGE = $_REQUEST['UF_FRIDGE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_WASH'])) {
    $UF_WASH = $_REQUEST['UF_WASH'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_INTERNET'])) {
    $UF_INTERNET = $_REQUEST['UF_INTERNET'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CONDITIONER'])) {
    $UF_CONDITIONER = $_REQUEST['UF_CONDITIONER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_TV'])) {
    $UF_TV = $_REQUEST['UF_TV'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_DISHWASHER'])) {
    $UF_DISHWASHER = $_REQUEST['UF_DISHWASHER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BATH'])) {
    $UF_BATH = $_REQUEST['UF_BATH'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_SHOWER_ROOM'])) {
    $UF_SHOWER_ROOM = $_REQUEST['UF_SHOWER_ROOM'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PART_HOUSE'])) {
    $UF_PART_HOUSE = $_REQUEST['UF_PART_HOUSE'] == 'off' ? '0' : '1';
}

$UF_OCCUPIED = $_REQUEST['UF_OCCUPIED_Y'] . ',' . $_REQUEST['UF_OCCUPIED_N'];

if (!empty($_REQUEST['UF_SELL_IN_PARTS'])) {
    $UF_SELL_IN_PARTS = $_REQUEST['UF_SELL_IN_PARTS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FREE_PARKING'])) {
    $UF_FREE_PARKING = $_REQUEST['UF_FREE_PARKING'] == 'off' ? '0' : '1';
}

if (!empty($_REQUEST['UF_CARWASH'])) {
    $UF_CARWASH = $_REQUEST['UF_CARWASH'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CARSERVICE'])) {
    $UF_CARSERVICE = $_REQUEST['UF_CARSERVICE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PHARMACY'])) {
    $UF_PHARMACY = $_REQUEST['UF_PHARMACY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ATELIER'])) {
    $UF_ATELIER = $_REQUEST['UF_ATELIER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ATM'])) {
    $UF_ATM = $_REQUEST['UF_ATM'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BUFFET'])) {
    $UF_BUFFET = $_REQUEST['UF_BUFFET'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_COMPLEX'])) {
    $UF_COMPLEX = $_REQUEST['UF_COMPLEX'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_HOTEL'])) {
    $UF_HOTEL = $_REQUEST['UF_HOTEL'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CAFE'])) {
    $UF_CAFE = $_REQUEST['UF_CAFE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_MOVIE_THEATER'])) {
    $UF_MOVIE_THEATER = $_REQUEST['UF_MOVIE_THEATER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CONFERENCE_HALL'])) {
    $UF_CONFERENCE_HALL = $_REQUEST['UF_CONFERENCE_HALL'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_MED_CENTER'])) {
    $UF_MED_CENTER = $_REQUEST['UF_MED_CENTER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_MINIMARKET'])) {
    $UF_MINIMARKET = $_REQUEST['UF_MINIMARKET'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_WAREHOUSES'])) {
    $UF_WAREHOUSES = $_REQUEST['UF_WAREHOUSES'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_NOTARIAL'])) {
    $UF_NOTARIAL = $_REQUEST['UF_NOTARIAL'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BANK'])) {
    $UF_BANK = $_REQUEST['UF_BANK'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PARK'])) {
    $UF_PARK = $_REQUEST['UF_PARK'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_RESTAURANT'])) {
    $UF_RESTAURANT = $_REQUEST['UF_RESTAURANT'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BEAUTY_SALOON'])) {
    $UF_BEAUTY_SALOON = $_REQUEST['UF_BEAUTY_SALOON'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_DINING'])) {
    $UF_DINING = $_REQUEST['UF_DINING'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_SUPERMARKET'])) {
    $UF_SUPERMARKET = $_REQUEST['UF_SUPERMARKET'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_TRADING_ZONE'])) {
    $UF_TRADING_ZONE = $_REQUEST['UF_TRADING_ZONE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FITNESS'])) {
    $UF_FITNESS = $_REQUEST['UF_FITNESS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FOTO_SALOON'])) {
    $UF_FOTO_SALOON = $_REQUEST['UF_FOTO_SALOON'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_RECEPTION'])) {
    $UF_RECEPTION = $_REQUEST['UF_RECEPTION'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_RENT_RIGHTS'])) {
    $UF_RENT_RIGHTS = $_REQUEST['UF_RENT_RIGHTS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FREE_ENTRY'])) {
    $UF_FREE_ENTRY = $_REQUEST['UF_FREE_ENTRY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_RESPONSIBLE_STORAGE'])) {
    $UF_RESPONSIBLE_STORAGE = $_REQUEST['UF_RESPONSIBLE_STORAGE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CUSTOMS'])) {
    $UF_CUSTOMS = $_REQUEST['UF_CUSTOMS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_TRANSPORT_SERV'])) {
    $UF_TRANSPORT_SERV = $_REQUEST['UF_TRANSPORT_SERV'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_OFFICE_ROOMS'])) {
    $UF_OFFICE_ROOMS = $_REQUEST['UF_OFFICE_ROOMS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_WATER'])) {
    $UF_WATER = $_REQUEST['UF_WATER'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_AUTO_GATES'])) {
    $UF_AUTO_GATES = $_REQUEST['UF_AUTO_GATES'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_LIGHT'])) {
    $UF_LIGHT = $_REQUEST['UF_LIGHT'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CCTV'])) {
    $UF_CCTV = $_REQUEST['UF_CCTV'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ENTRY_PASSES'])) {
    $UF_ENTRY_PASSES = $_REQUEST['UF_ENTRY_PASSES'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ALL_DAY_SECURITY'])) {
    $UF_ALL_DAY_SECURITY = $_REQUEST['UF_ALL_DAY_SECURITY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BESEMENT_SELLAR'])) {
    $UF_BESEMENT_SELLAR = $_REQUEST['UF_BESEMENT_SELLAR'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_VIE_HOLE'])) {
    $UF_VIE_HOLE = $_REQUEST['UF_VIE_HOLE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_TIRE_FITTING'])) {
    $UF_TIRE_FITTING = $_REQUEST['UF_TIRE_FITTING'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_HIDE_ADDRESS'])) {
    $UF_HIDE_ADDRESS = $_REQUEST['UF_HIDE_ADDRESS'] == 'off' ? '0' : '1';
}

if (!empty($_REQUEST['UF_ALLDAY'])) {
    $UF_ALLDAY = $_REQUEST['UF_ALLDAY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_AQUAPARK'])) {
    $UF_AQUAPARK = $_REQUEST['UF_AQUAPARK'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BABY_CITY'])) {
    $UF_BABY_CITY = $_REQUEST['UF_BABY_CITY'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_PLAY_ROOM'])) {
    $UF_PLAY_ROOM = $_REQUEST['UF_PLAY_ROOM'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_BOWLING'])) {
    $UF_BOWLING = $_REQUEST['UF_BOWLING'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_ICE_RINK'])) {
    $UF_ICE_RINK = $_REQUEST['UF_ICE_RINK'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_FOOD_COURT'])) {
    $UF_FOOD_COURT = $_REQUEST['UF_FOOD_COURT'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_SLOT_MACHINES'])) {
    $UF_SLOT_MACHINES = $_REQUEST['UF_SLOT_MACHINES'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_CAN_CHANGE'])) {
    $UF_CAN_CHANGE = $_REQUEST['UF_CAN_CHANGE'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_COM_PART_RENT'])) {
    $UF_COM_PART_RENT = $_REQUEST['UF_COM_PART_RENT'] == 'off' ? '0' : '1';
}


if (!empty($_REQUEST['UF_WITHOUT_COMMISSIONS'])) {
    $UF_WITHOUT_COMMISSIONS = $_REQUEST['UF_WITHOUT_COMMISSIONS'] == 'off' ? '0' : '1';
}
if (!empty($_REQUEST['UF_WITHOUT_COMMISSIONS_AGENT'])) {
    $UF_WITHOUT_COMMISSIONS_AGENT = $_REQUEST['UF_WITHOUT_COMMISSIONS_AGENT'] == 'off' ? '0' : '1';
}
if ($_REQUEST['UF_PLOT_STATUS2']) {
    $UF_PLOT_STATUS = $_REQUEST['UF_PLOT_STATUS2'];
} else {
    $UF_PLOT_STATUS = $_REQUEST['UF_PLOT_STATUS'];
}

if (!empty($_REQUEST['UF_HEATING'])) {
    if ($_REQUEST['UF_HEATING'] == 'on') {
        $UF_HEATING = 'Есть';
    } else if ($_REQUEST['UF_HEATING'] == 'off') {
        $UF_HEATING = 'Нет';
    } else {
        $UF_HEATING = $_REQUEST['UF_HEATING'];
    }
}
if (!empty($_REQUEST['UF_FIRE_SYSTEM'])) {
    if ($_REQUEST['UF_FIRE_SYSTEM'] == 'on') {
        $UF_FIRE_SYSTEM = 'Есть';
    } else if ($_REQUEST['UF_FIRE_SYSTEM'] == 'off') {
        $UF_FIRE_SYSTEM = 'Нет';
    } else {
        $UF_FIRE_SYSTEM = $_REQUEST['UF_FIRE_SYSTEM'];
    }
}


preg_match('/\((.+)\)/', $_REQUEST['UF_GEO'], $geo);




//if ($_REQUEST['UF_BONUS'] != 'Нет') {
//    $UF_AGENT_BONUS_VALUE = $_REQUEST['UF_AGENT_BONUS_VALUE'] . $_REQUEST['UF_BONUS'] == 'Фиксированная цена' ? '€' : '%';
//}

$_REQUEST['UF_FLOOR_LEVEL'] = $_REQUEST['UF_FLOOR_LEVEL_OT'] . ',' . $_REQUEST['UF_FLOOR_LEVEL_DO'] . ',' . $_REQUEST['UF_FLOOR_LEVEL_NOT_FIRST'] . ',' . $_REQUEST['UF_FLOOR_LEVEL_NOT_LAST'];
$_REQUEST['UF_FLOOR_LEVEL_MAX'] = $_REQUEST['UF_FLOOR_LEVEL_MAX_OT'] . ',' . $_REQUEST['UF_FLOOR_LEVEL_MAX_DO'];
$_REQUEST['UF_TOTAL_AREA'] = $_REQUEST['UF_TOTAL_AREA_OT'] . ',' . $_REQUEST['UF_TOTAL_AREA_DO'];
$_REQUEST['UF_LIVING_AREA'] = $_REQUEST['UF_LIVING_AREA_OT'] . ',' . $_REQUEST['UF_LIVING_AREA_DO'];
$_REQUEST['UF_KITCHEN_AREA'] = $_REQUEST['UF_KITCHEN_AREA_OT'] . ',' . $_REQUEST['UF_KITCHEN_AREA_DO'];
$_REQUEST['UF_ROOM_AREA'] = $_REQUEST['UF_ROOM_AREA_OT'] . ',' . $_REQUEST['UF_ROOM_AREA_DO'];
$_REQUEST['UF_CEILING_HEIGHT'] = $_REQUEST['UF_CEILING_HEIGHT_OT'] . ',' . $_REQUEST['UF_CEILING_HEIGHT_DO'];
$_REQUEST['UF_PRICE_REQ'] = $_REQUEST['UF_PRICE_OT'] . ',' . $_REQUEST['UF_PRICE_DO'];
$_REQUEST['UF_BUILDING_YEAR'] = $_REQUEST['UF_BUILDING_YEAR_OT'] . ',' . $_REQUEST['UF_BUILDING_YEAR_DO'];
$UF_AGENT_BONUS_VALUE = $_REQUEST['UF_AGENT_BONUS_VALUE_OT'] . ',' . $_REQUEST['UF_AGENT_BONUS_VALUE_DO'];
$_REQUEST['UF_SHARE_SIZE'] = $_REQUEST['UF_SHARE_SIZE_OT'] . ',' . $_REQUEST['UF_SHARE_SIZE_DO'];
$_REQUEST['UF_PLOT_SQUARE'] = $_REQUEST['UF_PLOT_SQUARE_OT'] . ',' . $_REQUEST['UF_PLOT_SQUARE_DO'];
$_REQUEST['UF_SHARE_SIZE'] = $_REQUEST['UF_SHARE_SIZE_OT'] . ',' . $_REQUEST['UF_SHARE_SIZE_DO'];
$_REQUEST['UF_PLOT_STATUS'] = $_REQUEST['UF_PLOT_STATUS'] . '|' . $_REQUEST['UF_PLOT_STATUS_OTHER'];
$_REQUEST['UF_DEPOSIT'] = $_REQUEST['UF_DEPOSIT_OT'] . ',' . $_REQUEST['UF_DEPOSIT_DO'];
$_REQUEST['UF_COM_PAY'] = $_REQUEST['UF_COM_PAY_OT'] . ',' . $_REQUEST['UF_COM_PAY_DO'];
$_REQUEST['UF_ELECTRIC_POWER'] = $_REQUEST['UF_ELECTRIC_POWER_OT'] . ',' . $_REQUEST['UF_ELECTRIC_POWER_DO'];
$UF_FURNITURE = $_REQUEST['UF_FURNITURE_Y'] . ',' . $_REQUEST['UF_FURNITURE_N'];
$_REQUEST['UF_PLACE_PRICE'] = $_REQUEST['UF_PLACE_PRICE_OT'] . ',' . $_REQUEST['UF_PLACE_PRICE_DO'];
$_REQUEST['UF_TAX'] = $_REQUEST['UF_TAX_Y'] . ',' . $_REQUEST['UF_TAX_N'];
$_REQUEST['UF_BONUS'] = $_REQUEST['UF_BONUS_OT'] . ',' . $_REQUEST['UF_BONUS_DO'];
$_REQUEST['UF_COM_SQUARE'] = $_REQUEST['UF_COM_SQUARE_OT'] . ',' . $_REQUEST['UF_COM_SQUARE_DO'];
$_REQUEST['UF_CAPACITY_PASS_ELEVATORS'] = $_REQUEST['UF_CAPACITY_PASS_ELEVATORS_OT'] . ',' . $_REQUEST['UF_CAPACITY_PASS_ELEVATORS_DO'];
$_REQUEST['UF_HOISTS_CAPACITY'] = $_REQUEST['UF_HOISTS_CAPACITY_OT'] . ',' . $_REQUEST['UF_HOISTS_CAPACITY_DO'];
$_REQUEST['UF_CAPACITY_ELEVATORS'] = $_REQUEST['UF_CAPACITY_ELEVATORS_OT'] . ',' . $_REQUEST['UF_CAPACITY_ELEVATORS_DO'];
$_REQUEST['UF_ENTRY_PRICE'] = $_REQUEST['UF_ENTRY_PRICE_OT'] . ',' . $_REQUEST['UF_ENTRY_PRICE_DO'];
$_REQUEST['UF_COLUMN_GRID'] = $_REQUEST['UF_COLUMN_GRID_OT'] . ',' . $_REQUEST['UF_COLUMN_GRID_DO'];
$_REQUEST['UF_MONTH_PROFIT'] = $_REQUEST['UF_MONTH_PROFIT_OT'] . ',' . $_REQUEST['UF_MONTH_PROFIT_DO'];
$UF_DISPLAY_WINDOWS = $_REQUEST['UF_DISPLAY_WINDOWS_Y'] . ',' . $_REQUEST['UF_DISPLAY_WINDOWS_N'];
$_REQUEST['UF_LEGAL_ADDRESS'] = $_REQUEST['UF_LEGAL_ADDRESS_Y'] . ',' . $_REQUEST['UF_LEGAL_ADDRESS_N'];
$_REQUEST['UF_COMMISSIONS_AGENT'] = $_REQUEST['UF_COMMISSIONS_AGENT_OT'] . ',' . $_REQUEST['UF_COMMISSIONS_AGENT_DO'];
$_REQUEST['UF_COMMISSIONS_RENT'] = $_REQUEST['UF_COMMISSIONS_RENT_OT'] . ',' . $_REQUEST['UF_COMMISSIONS_RENT_DO'];
$_REQUEST['UF_SECURITY_DEPOSIT'] = $_REQUEST['UF_SECURITY_DEPOSIT_OT'] . ',' . $_REQUEST['UF_SECURITY_DEPOSIT_DO'];
$UF_HOLIDAYS_RENT = $_REQUEST['UF_HOLIDAYS_RENT_Y'] . ',' . $_REQUEST['UF_HOLIDAYS_RENT_N'];
$_REQUEST['UF_OPERATION_COSTS'] = $_REQUEST['UF_OPERATION_COSTS_Y'] . ',' . $_REQUEST['UF_OPERATION_COSTS_N'];
$UF_UTILITY_PAY_INCLUDED = $_REQUEST['UF_UTILITY_PAY_INCLUDED_Y'] . ',' . $_REQUEST['UF_UTILITY_PAY_INCLUDED_N'];


function userFieldEnum($id, $num): string
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        if ($num) {
            if ($num == $ob['ID']) {
                $type = $ob['VALUE'];
            }

        }

    };
    return $type;
}

$ufType = userFieldEnum(273, $_REQUEST['UF_TYPE']);
$name='';
if (!empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
    $name .= $_REQUEST['UF_NUMBER_OF_ROOMS'] . '-к. ';
}
$name .= $ufType;
if (!empty($_REQUEST['UF_TOTAL_AREA_OT']) ) {
    $name .= ', от ' . $_REQUEST['UF_TOTAL_AREA_OT'];
    if(empty($_REQUEST['UF_TOTAL_AREA_DO'])){
        $name .=  ' м²';
    }
}
if (!empty($_REQUEST['UF_TOTAL_AREA_DO'])) {
    $name .= ' до ' . $_REQUEST['UF_TOTAL_AREA_OT']. ' м²';
}
if (!empty($_REQUEST['UF_COM_SQUARE_OT']) ) {
    $name .= ', от ' . $_REQUEST['UF_COM_SQUARE_OT'];
    if(empty($_REQUEST['UF_COM_SQUARE_DO'])){
        $name .=  ' м²';
    }
}
if (!empty($_REQUEST['UF_COM_SQUARE_DO'])) {
    $name .= ' до ' . $_REQUEST['UF_COM_SQUARE_OT']. ' м²';
}


if (!empty($_REQUEST['UF_FLOOR_LEVEL_OT']) ) {
    $name .= ', от ' . $_REQUEST['UF_FLOOR_LEVEL_OT'];
    if(empty($_REQUEST['UF_FLOOR_LEVEL_DO'])){
        $name .=  ' эт.';
    }
}
if (!empty($_REQUEST['UF_FLOOR_LEVEL_DO'])) {
    $name .= ' до ' . $_REQUEST['UF_FLOOR_LEVEL_OT']. ' эт.';
}
$arParams = array("replace_space" => "-", "replace_other" => "-");
$transURL = Cutil::translit($name, "ru", $arParams);
if (!empty($_REQUEST['UF_OWNER_PHONE']) && !empty($_REQUEST['UF_ADDRESS'])) {
    $arr = array(
        'UF_REGION' => $_REQUEST['UF_REGION'],
        'UF_DATA' => date('d.m.Y'),
        'UF_STATUS' => $_REQUEST['UF_STATUS'],
        'UF_SELLERS' => $_REQUEST['UF_SELLERS'],
        'UF_DEAL_TYPE' => $_REQUEST['UF_DEAL_TYPE'],
        'UF_TYPE_OF_RS' => $_REQUEST['UF_TYPE_OF_RS'],
        'UF_TYPE' => $_REQUEST['UF_TYPE'],

        'UF_USER_ID' => $ID_user,

        'UF_REQUEST_FOR_PROPERTY' => $_REQUEST['UF_REQUEST_FOR_PROPERTY'],
        'UF_TITLE' => $_REQUEST['UF_TITLE'], // Заголовок
        'UF_NAME' => $name, // Название
        'UF_SESSION_CODE' => $transURL, // код

        'UF_HOUSE_NAME' => $_REQUEST['UF_HOUSE_NAME'], // навзание

        'UF_ADDRESS' => $_REQUEST['UF_ADDRESS'], // адрес
        'UF_GEO' => $geo[1], // адрес

        'UF_CADASTRAL' => $_REQUEST['UF_CADASTRAL'],

        'UF_NUMBER_OF_ROOMS' => $_REQUEST['UF_NUMBER_OF_ROOMS'],
        'UF_FLOOR_LEVEL_REQ' => $_REQUEST['UF_FLOOR_LEVEL'],
        'UF_FLOOR_LEVEL_MAX' => $_REQUEST['UF_FLOOR_LEVEL_MAX'],
        'UF_MATERIAL_OF_HOUSE' => $_REQUEST['UF_MATERIAL_OF_HOUSE'],
        'UF_LIVING_AREA' => $_REQUEST['UF_LIVING_AREA'],
        'UF_TOTAL_AREA_REQ' => $_REQUEST['UF_TOTAL_AREA'],
        'UF_KITCHEN_AREA' => $_REQUEST['UF_KITCHEN_AREA'],
        'UF_NUM_BALCONY' => $_REQUEST['UF_NUM_BALCONY'],
        'UF_LOGGIA' => $_REQUEST['UF_LOGGIA'],
        'UF_WINDOW_VIEW' => $_REQUEST['UF_WINDOW_VIEW'],
        'UF_BATHROOM_SEP' => $_REQUEST['UF_BATHROOM_SEP'],
        'UF_BATHROOM_COMB' => $_REQUEST['UF_BATHROOM_COMB'],
        'UF_REPAIR' => $_REQUEST['UF_REPAIR'],
        'UF_SERIES_HOUSE' => $_REQUEST['UF_SERIES_HOUSE'],
        'UF_ELEVATOR_PASS' => $_REQUEST['UF_ELEVATOR_PASS'],
        'UF_ELEVATOR_SERV' => $_REQUEST['UF_ELEVATOR_SERV'],
        'UF_CEILING_HEIGHT' => $_REQUEST['UF_CEILING_HEIGHT'],
        'UF_PARKING' => $_REQUEST['UF_PARKING'],
        'UF_RCHUTE' => $UF_RCHUTE,
        'UF_HAVE_PHONE' => $UF_HAVE_PHONE,
        'UF_VIDEO' => $_REQUEST['UF_VIDEO'],
        'UF_DESCRIPTION' => $_REQUEST['UF_DESCRIPTION'],
        'UF_PRICE_REQ' => $_REQUEST['UF_PRICE_REQ'],
        'UF_PRICE' => '1000',
        'UF_SALES_TYPE' => $_REQUEST['UF_SALES_TYPE'],
        'UF_MORTGAGE' => $UF_MORTGAGE,
        'UF_OWNER_PHONE' => $_REQUEST['UF_OWNER_PHONE'],
        'UF_PHONE_TWO' => $_REQUEST['UF_PHONE_TWO'],
        'UF_BUILDING_YEAR_REQ' => $_REQUEST['UF_BUILDING_YEAR'],
        'UF_BONUS' => $_REQUEST['UF_BONUS'],
        'UF_AGENT_BONUS_VALUE' => $UF_AGENT_BONUS_VALUE,


        //Комната
        'UF_ROOMS_FOR_SALE' => $_REQUEST['UF_ROOMS_FOR_SALE'],
        'UF_TYPE_OF_ROOM' => $_REQUEST['UF_TYPE_OF_ROOM'],
        'UF_ROOM_AREA' => $_REQUEST['UF_ROOM_AREA'],

        'UF_ROOMS_AREA' => $_REQUEST['UF_ROOMS_AREA'],


        //доля
        'UF_PENTHOUSE' => $UF_PENTHOUSE,
        'UF_SHARE_SIZE' => $_REQUEST['UF_SHARE_SIZE'],
        'UF_CHOICE_APART' => $_REQUEST['UF_CHOICE_APART'],

        //дома
        'UF_CADASTRAL_HOUSE' => $_REQUEST['UF_CADASTRAL_HOUSE'],
        'UF_VILLAGE_NAME' => $_REQUEST['UF_VILLAGE_NAME'],
        'UF_NUM_OF_BED' => $_REQUEST['UF_NUM_OF_BED'],
        'UF_TYPE_OF_HS' => $_REQUEST['UF_TYPE_OF_HS'],
        'UF_PLOT_STATUS' => $UF_PLOT_STATUS,
        'UF_PLOT_SQUARE' => $_REQUEST['UF_PLOT_SQUARE'] . ' ' . $_REQUEST['GA'],
        'UF_HOUSE_SQUARE' => $_REQUEST['UF_HOUSE_SQUARE'],
        'UF_BATHROOM' => $_REQUEST['UF_BATHROOM'],
        'UF_QUAN_BATHROOM' => $_REQUEST['UF_QUAN_BATHROOM'],
        'UF_SEWERAGE' => $_REQUEST['UF_SEWERAGE'],
        'UF_WATER_SUP' => $_REQUEST['UF_WATER_SUP'],
        'UF_HEATING' => $UF_HEATING,
        'UF_GAS' => $_REQUEST['UF_GAS'],
        'UF_ELECTRICITY' => $UF_ELECTRICITY,
        'UF_SECURITY' => $UF_SECURITY,
        'UF_BATHH' => $UF_BATHH,
        'UF_GARAGE' => $UF_GARAGE,
        'UF_POOL' => $UF_POOL,


        //Аренда
        'UF_WITH_CHILDREN' => $UF_WITH_CHILDREN,
        'UF_PETS' => $UF_PETS,
        'UF_KITCHEN' => $UF_KITCHEN,
        'UF_ROOMS_FURNITURE' => $UF_ROOMS_FURNITURE,
        'UF_FRIDGE' => $UF_FRIDGE,
        'UF_WASH' => $UF_WASH,
        'UF_INTERNET' => $UF_INTERNET,
        'UF_CONDITIONER' => $UF_CONDITIONER,
        'UF_TV' => $UF_TV,
        'UF_DISHWASHER' => $UF_DISHWASHER,
        'UF_BATH' => $UF_BATH,
        'UF_SHOWER_ROOM' => $UF_SHOWER_ROOM,

        'UF_SLEEPING_NUM' => $_REQUEST['UF_SLEEPING_NUM'],
        'UF_COM_PAY' => $_REQUEST['UF_COM_PAY'],
        'UF_RENT_PERIOD' => $_REQUEST['UF_RENT_PERIOD'],
        'UF_PREPAY' => $_REQUEST['UF_PREPAY'],
        'UF_DEPOSIT' => $_REQUEST['UF_DEPOSIT'],


        'UF_PART_RENT' => $_REQUEST['UF_PART_RENT'],
        'UF_PART_HOUSE' => $UF_PART_HOUSE,

        //Коммерческое

        'UF_ELECTRIC_POWER' => $_REQUEST['UF_ELECTRIC_POWER'],
        'UF_WET_SPOTS' => $_REQUEST['UF_WET_SPOTS'],
        'UF_CONDITION' => $_REQUEST['UF_CONDITION'],
        'UF_LAYOUT' => $_REQUEST['UF_LAYOUT'],
        'UF_ACCESS' => $_REQUEST['UF_ACCESS'],
        'UF_NUM_OF_PARKING' => $_REQUEST['UF_NUM_OF_PARKING'],
        'UF_BUILDING_TYPE' => $_REQUEST['UF_BUILDING_TYPE'],
        'UF_BUILDING_CLASS' => $_REQUEST['UF_BUILDING_CLASS'],
        'UF_COM_SQUARE' => $_REQUEST['UF_COM_SQUARE'],
        'UF_BUILDING_CATEGORY' => $_REQUEST['UF_BUILDING_CATEGORY'],
        'UF_PLOT_TYPE' => $_REQUEST['UF_PLOT_TYPE'],
        'UF_DEVELOPER' => $_REQUEST['UF_DEVELOPER'],
        'UF_MANAG_COMPANY' => $_REQUEST['UF_MANAG_COMPANY'],
        'UF_VENTILATION' => $_REQUEST['UF_VENTILATION'],
        'UF_CONDITIONING' => $_REQUEST['UF_CONDITIONING'],
        'UF_FIRE_SYSTEM' => $UF_FIRE_SYSTEM,
        'UF_OCCUPIED_REQ' => $UF_OCCUPIED,
        'UF_FREE_PARKING' => $UF_FREE_PARKING,
        'UF_SELL_IN_PARTS' => $UF_SELL_IN_PARTS,
        'UF_FURNITURE_REQ' => $UF_FURNITURE,

        'UF_CARWASH' => $UF_CARWASH,
        'UF_CARSERVICE' => $UF_CARSERVICE,
        'UF_PHARMACY' => $UF_PHARMACY,
        'UF_ATELIER' => $UF_ATELIER,
        'UF_ATM' => $UF_ATM,
        'UF_BUFFET' => $UF_BUFFET,
        'UF_COMPLEX' => $UF_COMPLEX,
        'UF_HOTEL' => $UF_HOTEL,
        'UF_CAFE' => $UF_CAFE,
        'UF_MOVIE_THEATER' => $UF_MOVIE_THEATER,
        'UF_CONFERENCE_HALL' => $UF_CONFERENCE_HALL,
        'UF_MED_CENTER' => $UF_MED_CENTER,
        'UF_MINIMARKET' => $UF_MINIMARKET,
        'UF_WAREHOUSES' => $UF_WAREHOUSES,
        'UF_NOTARIAL' => $UF_NOTARIAL,
        'UF_BANK' => $UF_BANK,
        'UF_PARK' => $UF_PARK,
        'UF_RESTAURANT' => $UF_RESTAURANT,
        'UF_BEAUTY_SALOON' => $UF_BEAUTY_SALOON,
        'UF_DINING' => $UF_DINING,
        'UF_SUPERMARKET' => $UF_SUPERMARKET,
        'UF_TRADING_ZONE' => $UF_TRADING_ZONE,
        'UF_FITNESS' => $UF_FITNESS,
        'UF_FOTO_SALOON' => $UF_FOTO_SALOON,
        'UF_RECEPTION' => $UF_RECEPTION,

        'UF_RENT_RIGHTS' => $UF_RENT_RIGHTS,

        'UF_TAX' => $_REQUEST['UF_TAX'],
        'UF_LEGAL_ADDRESS' => $_REQUEST['UF_LEGAL_ADDRESS'],

        //здание
        'UF_POSPURPOSE' => $_REQUEST['UF_POSPURPOSE'],
        'UF_ENTRY' => $_REQUEST['UF_ENTRY'],
        'UF_HOUSE_LINE' => $_REQUEST['UF_HOUSE_LINE'],
        'UF_NUM_TRAVELATORS' => $_REQUEST['UF_NUM_TRAVELATORS'],
        'UF_NUM_ELEVATORS' => $_REQUEST['UF_NUM_ELEVATORS'],
        'UF_NUM_ESCALATOR' => $_REQUEST['UF_NUM_ESCALATOR'],

        //производство
        'UF_COLUMN_GRID' => $_REQUEST['UF_COLUMN_GRID'],
        'UF_FLOOR_MATERIAL' => $_REQUEST['UF_FLOOR_MATERIAL'],
        'UF_GATES' => $_REQUEST['UF_GATES'],
        'UF_PARKING_TYPE' => $_REQUEST['UF_PARKING_TYPE'],
        'UF_CAPACITY_ELEVATORS' => $_REQUEST['UF_CAPACITY_ELEVATORS'],
        'UF_NUM_HOISTS' => $_REQUEST['UF_NUM_HOISTS'],
        'UF_HOISTS_CAPACITY' => $_REQUEST['UF_HOISTS_CAPACITY'],
        'UF_CAPACITY_PASS_ELEVATORS' => $_REQUEST['UF_CAPACITY_PASS_ELEVATORS'],
        'UF_NUM_OVERHEAD_CRANES' => $_REQUEST['UF_NUM_OVERHEAD_CRANES'],
        'UF_CAPACITY_PASS_CRANES' => $_REQUEST['UF_CAPACITY_PASS_CRANES'],
        'UF_NUM_BEAM_CRANES' => $_REQUEST['UF_NUM_BEAM_CRANES'],
        'UF_CAPACITY_BEAM_CRANES' => $_REQUEST['UF_CAPACITY_BEAM_CRANES'],
        'UF_NUM_RAIL_CRANES' => $_REQUEST['UF_NUM_RAIL_CRANES'],
        'UF_CAPACITY_RAIL_CRANES' => $_REQUEST['UF_CAPACITY_RAIL_CRANES'],
        'UF_NUM_GANTRY_CRANES' => $_REQUEST['UF_NUM_GANTRY_CRANES'],
        'UF_CAPACITY_GANTRY_CRANES' => $_REQUEST['UF_CAPACITY_GANTRY_CRANES'],

        'UF_FREE_ENTRY' => $UF_FREE_ENTRY,
        'UF_OFFICE_ROOMS' => $UF_OFFICE_ROOMS,
        'UF_RESPONSIBLE_STORAGE' => $UF_RESPONSIBLE_STORAGE,
        'UF_CUSTOMS' => $UF_CUSTOMS,
        'UF_TRANSPORT_SERV' => $UF_TRANSPORT_SERV,

        //гараж
        'UF_GARAGE_TYPE' => $_REQUEST['UF_GARAGE_TYPE'],
        'UF_GARAGE_STATUS' => $_REQUEST['UF_GARAGE_STATUS'],
        'UF_WATER' => $UF_WATER,
        'UF_AUTO_GATES' => $UF_AUTO_GATES,
        'UF_LIGHT' => $UF_LIGHT,
        'UF_CCTV' => $UF_CCTV,
        'UF_ENTRY_PASSES' => $UF_ENTRY_PASSES,
        'UF_ALL_DAY_SECURITY' => $UF_ALL_DAY_SECURITY,
        'UF_BESEMENT_SELLAR' => $UF_BESEMENT_SELLAR,
        'UF_VIE_HOLE' => $UF_VIE_HOLE,
        'UF_TIRE_FITTING' => $UF_TIRE_FITTING,

        //Бизнес
        'UF_HIDE_ADDRESS' => $UF_HIDE_ADDRESS,
        'UF_BUSINESS_TYPE' => $_REQUEST['UF_BUSINESS_TYPE'],
        'UF_BUSINESS_CATEGORY' => $_REQUEST['UF_BUSINESS_CATEGORY'],
        'UF_MONTH_PROFIT' => $_REQUEST['UF_MONTH_PROFIT'],
        'UF_REAL_ESTATE' => $_REQUEST['UF_REAL_ESTATE'],
//Помещение
        'UF_DISPLAY_WINDOWS_REQ' => $UF_DISPLAY_WINDOWS,
//торговая площадка

        'UF_ROOM_TYPE' => $_REQUEST['UF_ROOM_TYPE'],
        'UF_HOURS' => $_REQUEST['UF_HOURS'],
        'UF_WEEK_DAYS' => $_REQUEST['UF_WEEK_DAYS'],
        'UF_ALLDAY' => $UF_ALLDAY,
        'UF_AQUAPARK' => $UF_AQUAPARK,
        'UF_BABY_CITY' => $UF_BABY_CITY,
        'UF_PLAY_ROOM' => $UF_PLAY_ROOM,
        'UF_BOWLING' => $UF_BOWLING,
        'UF_ICE_RINK' => $UF_ICE_RINK,
        'UF_FOOD_COURT' => $UF_FOOD_COURT,
        'UF_SLOT_MACHINES' => $UF_SLOT_MACHINES,

        //Ком земля
        'UF_CAN_CHANGE' => $UF_CAN_CHANGE,
        'UF_TYPE_PERM_USE' => $_REQUEST['UF_TYPE_PERM_USE'],
        'UF_INVEST_PROJECT' => $_REQUEST['UF_INVEST_PROJECT'],
        'UF_LAND_CATEGORY' => $_REQUEST['UF_LAND_CATEGORY'],
        'UF_PRESENCE_ENCUMBRANCE' => $_REQUEST['UF_PRESENCE_ENCUMBRANCE'],
        'UF_LAND_ELECTRICITY' => $_REQUEST['UF_LAND_ELECTRICITY'],
        'UF_DRIVEWAYS' => $_REQUEST['UF_DRIVEWAYS'],
        'UF_COM_PART_RENT' => $UF_COM_PART_RENT,

        //Ком аренда

        'UF_RENT_PRICE_TYPE' => $_REQUEST['UF_RENT_PRICE_TYPE'],
        'UF_COMMERC_TYPE_RENT' => $_REQUEST['UF_COMMERC_TYPE_RENT'],
        'UF_MIN_RENT_PERIOD' => $_REQUEST['UF_MIN_RENT_PERIOD'],
        'UF_OPERATION_COSTS' => $_REQUEST['UF_OPERATION_COSTS'],
        'UF_COMMISSIONS_RENT' => $_REQUEST['UF_COMMISSIONS_RENT'],
        'UF_COMMISSIONS_AGENT' => $_REQUEST['UF_COMMISSIONS_AGENT'],
        'UF_PAY_PERIOD' => $_REQUEST['UF_PAY_PERIOD'],
        'UF_RATE_PER_M2' => $_REQUEST['UF_RATE_PER_M2'],
        'UF_RATE_GA' => $_REQUEST['UF_RATE_GA'],
        'UF_UTILITY_PAY_INCLUDED_REQ' => $UF_UTILITY_PAY_INCLUDED,
        'UF_HOLIDAYS_RENT_REQ' => $UF_HOLIDAYS_RENT,
        'UF_WITHOUT_COMMISSIONS' => $UF_WITHOUT_COMMISSIONS,
        'UF_WITHOUT_COMMISSIONS_AGENT' => $UF_WITHOUT_COMMISSIONS_AGENT,
    );
    if ($_REQUEST['oper'] == 'add') {
        $result = $entity_data_class::add($arr);
    } else {
        $result = $entity_data_class::update($_REQUEST['id'], $arr);
    }
    if ($result->isSuccess()) {
        echo json_encode(1);
    }
} else {
    $res_json = [];
    if (empty($_REQUEST['UF_ADDRESS'])) {
        $res_json['UF_ADDRESS'] = 'Заполните адрес';
    }

    if (empty($_REQUEST['UF_OWNER_PHONE'])) {
        $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
    }


    echo json_encode($res_json);
}


?>

