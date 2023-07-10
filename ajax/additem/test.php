<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';


global $USER;

$ID_user = $USER->GetID() ?? '1';
// Недвижимость
$MY_HL_BLOCK_ID = 2;
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

//$name = $_REQUEST['NAME'] . '-' . $_REQUEST['MESTO'];
//$arParams = array("replace_space" => "-", "replace_other" => "-");
//$transURL = Cutil::translit($name, "ru", $arParams);

if (!empty($_REQUEST['UF_RCHUTE'])) {
    $UF_RCHUTE = $_REQUEST['UF_RCHUTE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_MORTGAGE'])) {
    $UF_MORTGAGE = $_REQUEST['UF_MORTGAGE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PENTHOUSE'])) {
    $UF_PENTHOUSE = $_REQUEST['UF_PENTHOUSE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_HAVE_PHONE'])) {
    $UF_HAVE_PHONE = $_REQUEST['UF_HAVE_PHONE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ELECTRICITY'])) {
    $UF_ELECTRICITY = $_REQUEST['UF_ELECTRICITY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_SECURITY'])) {
    $UF_SECURITY = $_REQUEST['UF_SECURITY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BATHH'])) {
    $UF_BATHH = $_REQUEST['UF_BATHH'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_GARAGE'])) {
    $UF_GARAGE = $_REQUEST['UF_GARAGE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_POOL'])) {
    $UF_POOL = $_REQUEST['UF_POOL'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WITH_CHILDREN'])) {
    $UF_WITH_CHILDREN = $_REQUEST['UF_WITH_CHILDREN'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PETS'])) {
    $UF_PETS = $_REQUEST['UF_PETS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_KITCHEN'])) {
    $UF_KITCHEN = $_REQUEST['UF_KITCHEN'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ROOMS_FURNITURE'])) {
    $UF_ROOMS_FURNITURE = $_REQUEST['UF_ROOMS_FURNITURE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FRIDGE'])) {
    $UF_FRIDGE = $_REQUEST['UF_FRIDGE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WASH'])) {
    $UF_WASH = $_REQUEST['UF_WASH'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_INTERNET'])) {
    $UF_INTERNET = $_REQUEST['UF_INTERNET'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CONDITIONER'])) {
    $UF_CONDITIONER = $_REQUEST['UF_CONDITIONER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_TV'])) {
    $UF_TV = $_REQUEST['UF_TV'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_DISHWASHER'])) {
    $UF_DISHWASHER = $_REQUEST['UF_DISHWASHER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BATH'])) {
    $UF_BATH = $_REQUEST['UF_BATH'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_SHOWER_ROOM'])) {
    $UF_SHOWER_ROOM = $_REQUEST['UF_SHOWER_ROOM'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PART_HOUSE'])) {
    $UF_PART_HOUSE = $_REQUEST['UF_PART_HOUSE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_OCCUPIED'])) {
    $UF_OCCUPIED = $_REQUEST['UF_OCCUPIED'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_SELL_IN_PARTS'])) {
    $UF_SELL_IN_PARTS = $_REQUEST['UF_SELL_IN_PARTS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FREE_PARKING'])) {
    $UF_FREE_PARKING = $_REQUEST['UF_FREE_PARKING'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FURNITURE'])) {
    $UF_FURNITURE = $_REQUEST['UF_FURNITURE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CARWASH'])) {
    $UF_CARWASH = $_REQUEST['UF_CARWASH'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CARSERVICE'])) {
    $UF_CARSERVICE = $_REQUEST['UF_CARSERVICE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PHARMACY'])) {
    $UF_PHARMACY = $_REQUEST['UF_PHARMACY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ATELIER'])) {
    $UF_ATELIER = $_REQUEST['UF_ATELIER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ATM'])) {
    $UF_ATM = $_REQUEST['UF_ATM'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BUFFET'])) {
    $UF_BUFFET = $_REQUEST['UF_BUFFET'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_COMPLEX'])) {
    $UF_COMPLEX = $_REQUEST['UF_COMPLEX'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_HOTEL'])) {
    $UF_HOTEL = $_REQUEST['UF_HOTEL'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CAFE'])) {
    $UF_CAFE = $_REQUEST['UF_CAFE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_MOVIE_THEATER'])) {
    $UF_MOVIE_THEATER = $_REQUEST['UF_MOVIE_THEATER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CONFERENCE_HALL'])) {
    $UF_CONFERENCE_HALL = $_REQUEST['UF_CONFERENCE_HALL'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_MED_CENTER'])) {
    $UF_MED_CENTER = $_REQUEST['UF_MED_CENTER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_MINIMARKET'])) {
    $UF_MINIMARKET = $_REQUEST['UF_MINIMARKET'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WAREHOUSES'])) {
    $UF_WAREHOUSES = $_REQUEST['UF_WAREHOUSES'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_NOTARIAL'])) {
    $UF_NOTARIAL = $_REQUEST['UF_NOTARIAL'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BANK'])) {
    $UF_BANK = $_REQUEST['UF_BANK'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PARK'])) {
    $UF_PARK = $_REQUEST['UF_PARK'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_RESTAURANT'])) {
    $UF_RESTAURANT = $_REQUEST['UF_RESTAURANT'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BEAUTY_SALOON'])) {
    $UF_BEAUTY_SALOON = $_REQUEST['UF_BEAUTY_SALOON'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_DINING'])) {
    $UF_DINING = $_REQUEST['UF_DINING'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_SUPERMARKET'])) {
    $UF_SUPERMARKET = $_REQUEST['UF_SUPERMARKET'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_TRADING_ZONE'])) {
    $UF_TRADING_ZONE = $_REQUEST['UF_TRADING_ZONE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FITNESS'])) {
    $UF_FITNESS = $_REQUEST['UF_FITNESS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FOTO_SALOON'])) {
    $UF_FOTO_SALOON = $_REQUEST['UF_FOTO_SALOON'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_RECEPTION'])) {
    $UF_RECEPTION = $_REQUEST['UF_RECEPTION'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_RENT_RIGHTS'])) {
    $UF_RENT_RIGHTS = $_REQUEST['UF_RENT_RIGHTS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FREE_ENTRY'])) {
    $UF_FREE_ENTRY = $_REQUEST['UF_FREE_ENTRY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_RESPONSIBLE_STORAGE'])) {
    $UF_RESPONSIBLE_STORAGE = $_REQUEST['UF_RESPONSIBLE_STORAGE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CUSTOMS'])) {
    $UF_CUSTOMS = $_REQUEST['UF_CUSTOMS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_TRANSPORT_SERV'])) {
    $UF_TRANSPORT_SERV = $_REQUEST['UF_TRANSPORT_SERV'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_OFFICE_ROOMS'])) {
    $UF_OFFICE_ROOMS = $_REQUEST['UF_OFFICE_ROOMS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WATER'])) {
    $UF_WATER = $_REQUEST['UF_WATER'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_AUTO_GATES'])) {
    $UF_AUTO_GATES = $_REQUEST['UF_AUTO_GATES'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_LIGHT'])) {
    $UF_LIGHT = $_REQUEST['UF_LIGHT'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CCTV'])) {
    $UF_CCTV = $_REQUEST['UF_CCTV'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ENTRY_PASSES'])) {
    $UF_ENTRY_PASSES = $_REQUEST['UF_ENTRY_PASSES'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ALL_DAY_SECURITY'])) {
    $UF_ALL_DAY_SECURITY = $_REQUEST['UF_ALL_DAY_SECURITY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BESEMENT_SELLAR'])) {
    $UF_BESEMENT_SELLAR = $_REQUEST['UF_BESEMENT_SELLAR'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_VIE_HOLE'])) {
    $UF_VIE_HOLE = $_REQUEST['UF_VIE_HOLE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_TIRE_FITTING'])) {
    $UF_TIRE_FITTING = $_REQUEST['UF_TIRE_FITTING'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_HIDE_ADDRESS'])) {
    $UF_HIDE_ADDRESS = $_REQUEST['UF_HIDE_ADDRESS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_DISPLAY_WINDOWS'])) {
    $UF_DISPLAY_WINDOWS = $_REQUEST['UF_DISPLAY_WINDOWS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ALLDAY'])) {
    $UF_ALLDAY = $_REQUEST['UF_ALLDAY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_AQUAPARK'])) {
    $UF_AQUAPARK = $_REQUEST['UF_AQUAPARK'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BABY_CITY'])) {
    $UF_BABY_CITY = $_REQUEST['UF_BABY_CITY'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_PLAY_ROOM'])) {
    $UF_PLAY_ROOM = $_REQUEST['UF_PLAY_ROOM'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_BOWLING'])) {
    $UF_BOWLING = $_REQUEST['UF_BOWLING'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_ICE_RINK'])) {
    $UF_ICE_RINK = $_REQUEST['UF_ICE_RINK'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_FOOD_COURT'])) {
    $UF_FOOD_COURT = $_REQUEST['UF_FOOD_COURT'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_SLOT_MACHINES'])) {
    $UF_SLOT_MACHINES = $_REQUEST['UF_SLOT_MACHINES'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_CAN_CHANGE'])) {
    $UF_CAN_CHANGE = $_REQUEST['UF_CAN_CHANGE'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_COM_PART_RENT'])) {
    $UF_COM_PART_RENT = $_REQUEST['UF_COM_PART_RENT'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_UTILITY_PAY_INCLUDED'])) {
    $UF_UTILITY_PAY_INCLUDED = $_REQUEST['UF_UTILITY_PAY_INCLUDED'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_HOLIDAYS_RENT'])) {
    $UF_HOLIDAYS_RENT = $_REQUEST['UF_HOLIDAYS_RENT'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WITHOUT_COMMISSIONS'])) {
    $UF_WITHOUT_COMMISSIONS = $_REQUEST['UF_WITHOUT_COMMISSIONS'] == 'on' ? '1' : '0';
}
if (!empty($_REQUEST['UF_WITHOUT_COMMISSIONS_AGENT'])) {
    $UF_WITHOUT_COMMISSIONS_AGENT = $_REQUEST['UF_WITHOUT_COMMISSIONS_AGENT'] == 'on' ? '1' : '0';
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

if (is_array($_FILES['file']['name']) || $_REQUEST['files']) {
    $files = [];
    foreach ($_FILES['file']['name'] as $key => $name1) {
        $files[$key]['name'] = $name1;
        $files[$key]['type'] = $_FILES['file']['type'][$key];
        $files[$key]['tmp_name'] = $_FILES['file']['tmp_name'][$key];
        $files[$key]['error'] = $_FILES['file']['error'][$key];
        $files[$key]['size'] = $_FILES['file']['size'][$key];
    }
    foreach ($files as $filee) {
        $FileID = CFile::SaveFile($filee, "highloadblock");
        $Files[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($FileID));
    }
    foreach ($_REQUEST['files'] as $fileId) {
        if ($fileId != 'undefined') {
            $Files[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($fileId));
        }

    }
}


preg_match('/\((.+)\)/', $_REQUEST['UF_GEO'], $geo);

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
$name = '';
if (!empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
    $name .= $_REQUEST['UF_NUMBER_OF_ROOMS'] . '-к. ';
}
$name .= $ufType;
if (!empty($_REQUEST['UF_TOTAL_AREA'])) {
    $name .= ', ' . $_REQUEST['UF_TOTAL_AREA'] . ' м²';
}
if (!empty($_REQUEST['UF_COM_SQUARE'])) {
    $name .= ', ' . $_REQUEST['UF_COM_SQUARE'] . ' м²';
}
if (!empty($_REQUEST['UF_FLOOR_LEVEL'])) {
    $name .= ', ' . $_REQUEST['UF_FLOOR_LEVEL'];
}
if (!empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
    $name .= '/' . $_REQUEST['UF_FLOOR_LEVEL_MAX'] . ' эт.';
}


$arParams = array("replace_space" => "-", "replace_other" => "-");
$transURL = Cutil::translit($name, "ru", $arParams);
if ($_REQUEST['UF_BONUS'] != 'Нет') {
    $UF_AGENT_BONUS_VALUE = $_REQUEST['UF_AGENT_BONUS_VALUE'] . $_REQUEST['UF_BONUS'] == 'Фиксированная цена' ? '€' : '%';
}
$date = new \Bitrix\Main\Type\DateTime();
$arr = array(
    'UF_STATUS' => $_REQUEST['UF_STATUS'],
    'UF_DATA' => $date,
    'UF_REGION' => $_REQUEST['UF_REGION'],
    'UF_SELLERS' => $_REQUEST['UF_SELLERS'],
    'UF_DEAL_TYPE' => $_REQUEST['UF_DEAL_TYPE'],
    'UF_TYPE_OF_RS' => $_REQUEST['UF_TYPE_OF_RS'],
    'UF_TYPE' => $_REQUEST['UF_TYPE'],

    'UF_USER_ID' => $ID_user,
    'UF_PHOTOS' => $Files,

    'UF_TITLE' => $_REQUEST['UF_TITLE'], // Заголовок
    'UF_NAME' => $name, // Название
    'UF_SESSION_CODE' => $transURL, // код

    'UF_HOUSE_NAME' => $_REQUEST['UF_HOUSE_NAME'], // навзание

    'UF_ADDRESS' => $_REQUEST['UF_ADDRESS'], // адрес
    'UF_GEO' => $geo[1], // адрес

    'UF_CADASTRAL' => $_REQUEST['UF_CADASTRAL'],

    'UF_NUMBER_OF_ROOMS' => $_REQUEST['UF_NUMBER_OF_ROOMS'],
    'UF_FLOOR_LEVEL' => $_REQUEST['UF_FLOOR_LEVEL'],
    'UF_FLOOR_LEVEL_MAX' => $_REQUEST['UF_FLOOR_LEVEL_MAX'],
    'UF_MATERIAL_OF_HOUSE' => $_REQUEST['UF_MATERIAL_OF_HOUSE'],
    'UF_LIVING_AREA' => $_REQUEST['UF_LIVING_AREA'],
    'UF_TOTAL_AREA' => $_REQUEST['UF_TOTAL_AREA'],
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
    'UF_PRICE' => $_REQUEST['UF_PRICE'],
    'UF_SALES_TYPE' => $_REQUEST['UF_SALES_TYPE'],
    'UF_MORTGAGE' => $UF_MORTGAGE,
    'UF_OWNER_PHONE' => $_REQUEST['UF_OWNER_PHONE'],
    'UF_PHONE_TWO' => $_REQUEST['UF_PHONE_TWO'],
    'UF_BUILDING_YEAR' => $_REQUEST['UF_BUILDING_YEAR'],
    'UF_BONUS' => $_REQUEST['UF_BONUS'],
    'UF_AGENT_BONUS_VALUE' => $UF_AGENT_BONUS_VALUE,


    //Комната
    'UF_ROOM_FOR_SALE' => $_REQUEST['UF_ROOM_FOR_SALE'],
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
    'UF_OCCUPIED' => $UF_OCCUPIED,
    'UF_FREE_PARKING' => $UF_FREE_PARKING,
    'UF_SELL_IN_PARTS' => $UF_SELL_IN_PARTS,
    'UF_FURNITURE' => $UF_FURNITURE,

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
    'UF_DISPLAY_WINDOWS' => $UF_DISPLAY_WINDOWS,
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
    'UF_UTILITY_PAY_INCLUDED' => $UF_UTILITY_PAY_INCLUDED,
    'UF_HOLIDAYS_RENT' => $UF_HOLIDAYS_RENT,
    'UF_WITHOUT_COMMISSIONS' => $UF_WITHOUT_COMMISSIONS,
    'UF_WITHOUT_COMMISSIONS_AGENT' => $UF_WITHOUT_COMMISSIONS_AGENT,
);
$arrErrors = [
    'UF_ADDRESS' => 'Заполните адрес',
    'UF_NUMBER_OF_ROOMS' => 'Укажите количество комнат',
    'UF_FLOOR_LEVEL' => 'Укажите этаж',
    'UF_FLOOR_LEVEL_MAX' => 'Укажите количество этажей',
    'UF_TOTAL_AREA' => 'Укажите площадь',
    'UF_DEPOSIT' => 'Укажите залог',
    'UF_PRICE' => 'Укажите цену',
    'UF_OWNER_PHONE' => 'Заполните телефон',
    'UF_ROOMS_FOR_SALE' => 'Укажите количество комнат для продажи',
    'UF_ROOM_AREA' => 'Укажите площадь комнаты',
    'UF_HOUSE_SQUARE' => 'Укажите площадь дома',
    'UF_PLOT_SQUARE' => 'Укажите площадь',
    'UF_SALES_TYPE' => 'Укажите тип продажи',
    'UF_SHARE_SIZE' => 'Укажите размер доли',
    'UF_TYPE_OF_HS' => 'Укажите тип дома',
    'UF_PLOT_STATUS' => 'Укажите статус участка',
    'UF_GAS' => 'Заполните поле',
    'UF_COM_SQUARE' => 'Укажите площадь',
    'UF_TAX' => 'Укажите налог',
    'UF_GARAGE_TYPE' => 'Укажите тип гаража',
    'UF_BUSINESS_TYPE' => 'Укажите тип бизнеса',
    'UF_BUSINESS_CATEGORY' => 'Укажите категорию бизнеса',
    'UF_MONTH_PROFIT' => 'Укажите месячную прибыль',
    'UF_POSPURPOSE' => 'Укажите возможное назначение',
    'UF_RENT_PERIOD' => 'Укажите срок аренды',
    'UF_PREPAY' => 'Укажите предоплату',
    'UF_PART_RENT' => 'Укажите часть в аренду',
    'UF_COMMISSIONS_RENT' => 'Укажите размер комиссии',
    'UF_COMMISSIONS_AGENT' => 'Укажите размер комиссии',
    'UF_COM_PAY' => 'Укажите коммунальные платежи',
];
function getErrors($arr, $arrErrors): array
{
    $res_json = [];
    foreach ($arr as $item) {
        $res_json[$item] = $arrErrors[$item];
    }
    return $res_json;
}
function addProperty($oper,$id,$arr):object
{
    $entity_data_class = GetEntityDataClass(2);
    if ($oper == 'add') {
        $result = $entity_data_class::add($arr);
    } else {
        $result = $entity_data_class::update($id, $arr);
    }
    return $result;
}
function property(){

}
if ($_REQUEST['UF_DEAL_TYPE'] == 68) { //Сдать посуточно
    if ($_REQUEST['UF_TYPE'] == 126) {//квартира
        $arrFields = ['UF_ADDRESS', 'UF_NUMBER_OF_ROOMS', 'UF_FLOOR_LEVEL', 'UF_FLOOR_LEVEL_MAX', 'UF_TOTAL_AREA', 'UF_PRICE', 'UF_DEPOSIT', 'UF_OWNER_PHONE'];
        $array = [];
        $arrEmpty = [];
        foreach ($arrFields as $field) {
            $array[] = $_REQUEST[$field];
            if (empty($_REQUEST[$field])) {
                $arrEmpty[] = $field;
            }
        }
//        $arr = [$_REQUEST['UF_ADDRESS'], $_REQUEST['UF_NUMBER_OF_ROOMS'], $_REQUEST['UF_FLOOR_LEVEL'], $_REQUEST['UF_FLOOR_LEVEL_MAX'], $_REQUEST['UF_TOTAL_AREA'], $_REQUEST['UF_PRICE'], $_REQUEST['UF_DEPOSIT'], $_REQUEST['UF_OWNER_PHONE']];
        $res = array_filter($array, 'strlen');
        $allElementsNotEmpty = count($res) === count($array);
        if ($allElementsNotEmpty) {
            $result = addProperty($_REQUEST['oper'],$_REQUEST['id'],$arr);
            if ($result->isSuccess()) {
                echo json_encode(1);
            }
        } else {
            $res_json = getErrors($arrEmpty, $arrErrors);
            echo json_encode($res_json);
        }
//        if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_DEPOSIT']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
//            if ($_REQUEST['oper'] == 'add') {
//                $result = $entity_data_class::add($arr);
//            } else {
//                $result = $entity_data_class::update($_REQUEST['id'], $arr);
//            }
//            if ($result->isSuccess()) {
//                echo json_encode(1);
//            }
//        } else {
//            $res_json = [];
//            if (empty($_REQUEST['UF_ADDRESS'])) {
//                $res_json['UF_ADDRESS'] = 'Заполните адрес';
//            }
//            if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
//                $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
//            }
//            if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
//                $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
//            }
//            if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
//                $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
//            }
//            if (empty($_REQUEST['UF_TOTAL_AREA'])) {
//                $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
//            }
//
//            if (empty($_REQUEST['UF_DEPOSIT'])) {
//                $res_json['UF_DEPOSIT'] = 'Укажите залог';
//            }
//            if (empty($_REQUEST['UF_PRICE'])) {
//                $res_json['UF_PRICE'] = 'Укажите цену';
//            }
//            if (empty($_REQUEST['UF_OWNER_PHONE'])) {
//                $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
//            }
//
//
//            echo json_encode($res_json);
//        }

    } else if ($_REQUEST['UF_TYPE'] == 127 || $_REQUEST['UF_TYPE'] == 134) {//комната
        if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_ROOMS_FOR_SALE']) && !empty($_REQUEST['UF_ROOM_AREA']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_DEPOSIT']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
            if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
            }
            if (empty($_REQUEST['UF_ROOMS_FOR_SALE'])) {
                $res_json['UF_ROOMS_FOR_SALE'] = 'Укажите количество комнат для продажи';
            }
            if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
            }
            if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
            }
            if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
            }
            if (empty($_REQUEST['UF_ROOM_AREA'])) {
                $res_json['UF_ROOM_AREA'] = 'Укажите площадь комнаты';
            }

            if (empty($_REQUEST['UF_DEPOSIT'])) {
                $res_json['UF_DEPOSIT'] = 'Укажите залог';
            }
            if (empty($_REQUEST['UF_PRICE'])) {
                $res_json['UF_PRICE'] = 'Укажите цену';
            }
            if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
            }


            echo json_encode($res_json);
        }
    } else if ($_REQUEST['UF_TYPE'] == 129) {//дом
        if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_HOUSE_SQUARE']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_DEPOSIT']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
            if (empty($_REQUEST['UF_HOUSE_SQUARE'])) {
                $res_json['UF_HOUSE_SQUARE'] = 'Укажите площадь дома';
            }
            if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
            }

            if (empty($_REQUEST['UF_PRICE'])) {
                $res_json['UF_PRICE'] = 'Укажите цену';
            }
            if (empty($_REQUEST['UF_DEPOSIT'])) {
                $res_json['UF_DEPOSIT'] = 'Укажите залог';
            }
            if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
            }


            echo json_encode($res_json);
        }
    }
} else if ($_REQUEST['UF_DEAL_TYPE'] == 66) {//Продать
    if ($_REQUEST['UF_TYPE_OF_RS'] == 144) {//жилая
        if ($_REQUEST['UF_TYPE'] == 126) {//квартира

            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_SALES_TYPE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                    $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                    $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_SALES_TYPE'])) {
                    $res_json['UF_SALES_TYPE'] = 'Укажите тип продажи';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }


        } else if ($_REQUEST['UF_TYPE'] == 127) {//комната
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_ROOMS_FOR_SALE']) && !empty($_REQUEST['UF_ROOM_AREA']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_SALES_TYPE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                    $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
                }
                if (empty($_REQUEST['UF_ROOMS_FOR_SALE'])) {
                    $res_json['UF_ROOMS_FOR_SALE'] = 'Укажите количество комнат для продажи';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                    $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
                }
                if (empty($_REQUEST['UF_ROOM_AREA'])) {
                    $res_json['UF_ROOM_AREA'] = 'Укажите площадь комнаты';
                }

                if (empty($_REQUEST['UF_SALES_TYPE'])) {
                    $res_json['UF_SALES_TYPE'] = 'Укажите тип продажи';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 128) {//доля в квартире
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_SHARE_SIZE']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_SALES_TYPE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                    $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
                }
                if (empty($_REQUEST['UF_SHARE_SIZE'])) {
                    $res_json['UF_SHARE_SIZE'] = 'Укажите размер доли';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                    $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_SALES_TYPE'])) {
                    $res_json['UF_SALES_TYPE'] = 'Укажите тип продажи';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 129 || $_REQUEST['UF_TYPE'] == 131) {//дом,таунхаус
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_TYPE_OF_HS']) && !empty($_REQUEST['UF_PLOT_STATUS']) && !empty($_REQUEST['UF_HOUSE_SQUARE']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_GAS']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_TYPE_OF_HS'])) {
                    $res_json['UF_TYPE_OF_HS'] = 'Укажите тип дома';
                }
                if (empty($_REQUEST['UF_PLOT_STATUS'])) {
                    $res_json['UF_PLOT_STATUS'] = 'Укажите статус участка';
                }
                if (empty($_REQUEST['UF_HOUSE_SQUARE'])) {
                    $res_json['UF_HOUSE_SQUARE'] = 'Укажите площадь дома';
                }
                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
                }
                if (empty($_REQUEST['UF_GAS'])) {
                    $res_json['UF_GAS'] = 'Заполните поле';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 132) {//часть дома

            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_SHARE_SIZE']) && !empty($_REQUEST['UF_PLOT_STATUS']) && !empty($_REQUEST['UF_HOUSE_SQUARE']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_GAS']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_SHARE_SIZE'])) {
                    $res_json['UF_SHARE_SIZE'] = 'Укажите размер доли';
                }
                if (empty($_REQUEST['UF_PLOT_STATUS'])) {
                    $res_json['UF_PLOT_STATUS'] = 'Укажите статус участка';
                }
                if (empty($_REQUEST['UF_HOUSE_SQUARE'])) {
                    $res_json['UF_HOUSE_SQUARE'] = 'Укажите площадь дома';
                }
                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
                }
                if (empty($_REQUEST['UF_GAS'])) {
                    $res_json['UF_GAS'] = 'Заполните поле';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }

        } else if ($_REQUEST['UF_TYPE'] == 133) {//участок
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_PLOT_STATUS']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_GAS']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_PLOT_STATUS'])) {
                    $res_json['UF_PLOT_STATUS'] = 'Укажите статус участка';
                }
                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
                }
                if (empty($_REQUEST['UF_GAS'])) {
                    $res_json['UF_GAS'] = 'Заполните поле';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        }
    } else if ($_REQUEST['UF_TYPE_OF_RS'] == 145) {//Коммерческая

        if ($_REQUEST['UF_TYPE'] == 135 || $_REQUEST['UF_TYPE'] == 137 || $_REQUEST['UF_TYPE'] == 138) {//офис,производство,склад
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_TAX']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_TAX'])) {
                    $res_json['UF_TAX'] = 'Укажите налог';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 136) {//здание
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_TAX']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_TAX'])) {
                    $res_json['UF_TAX'] = 'Укажите налог';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 139) {//гараж
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_GARAGE_TYPE']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }
                if (empty($_REQUEST['UF_GARAGE_TYPE'])) {
                    $res_json['UF_GARAGE_TYPE'] = 'Укажите тип гаража';
                }

//                if (empty($_REQUEST['UF_TAX'])) {
//                    $res_json['UF_TAX'] = 'Укажите налог';
//                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 140) {//готовый бизнес
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_BUSINESS_TYPE']) && !empty($_REQUEST['UF_BUSINESS_CATEGORY']) && !empty($_REQUEST['UF_MONTH_PROFIT']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_TAX']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_BUSINESS_TYPE'])) {
                    $res_json['UF_BUSINESS_TYPE'] = 'Укажите тип бизнеса';
                }
                if (empty($_REQUEST['UF_BUSINESS_CATEGORY'])) {
                    $res_json['UF_BUSINESS_CATEGORY'] = 'Укажите категорию бизнеса';
                }
                if (empty($_REQUEST['UF_MONTH_PROFIT'])) {
                    $res_json['UF_MONTH_PROFIT'] = 'Укажите месячную прибыль';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_TAX'])) {
                    $res_json['UF_TAX'] = 'Укажите налог';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 141 || $_REQUEST['UF_TYPE'] == 142) {//помещение свободного назначения|торговая площадка
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_POSPURPOSE']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_TAX']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_POSPURPOSE'])) {
                    $res_json['UF_POSPURPOSE'] = 'Укажите возможное назначение';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_TAX'])) {
                    $res_json['UF_TAX'] = 'Укажите налог';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 143) {//коммерческая земля
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        }
    }
} else if ($_REQUEST['UF_DEAL_TYPE'] == 67) {//Сдать
    if ($_REQUEST['UF_TYPE_OF_RS'] == 144) {//Жилая
        if ($_REQUEST['UF_TYPE'] == 126) {//квартира
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && (!empty($_REQUEST['UF_COM_PAY']) || $_REQUEST['UF_COM_PAY'] == '0') && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                    $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                    $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_COM_PAY']) && $_REQUEST['UF_COM_PAY'] != '0') {
                    $res_json['UF_COM_PAY'] = 'Укажите коммунальные платежи';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }

        } else if ($_REQUEST['UF_TYPE'] == 127 || $_REQUEST['UF_TYPE'] == 134) {//комната/койко-место
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_RENT_PERIOD']) && (!empty($_REQUEST['UF_COM_PAY']) || $_REQUEST['UF_COM_PAY'] == '0') && !empty($_REQUEST['UF_NUMBER_OF_ROOMS']) && !empty($_REQUEST['UF_ROOMS_FOR_SALE']) && !empty($_REQUEST['UF_ROOM_AREA']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_TOTAL_AREA']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_SALES_TYPE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
                    $res_json['UF_NUMBER_OF_ROOMS'] = 'Укажите количество комнат';
                }
                if (empty($_REQUEST['UF_ROOMS_FOR_SALE'])) {
                    $res_json['UF_ROOMS_FOR_SALE'] = 'Укажите количество комнат для продажи';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_TOTAL_AREA'])) {
                    $res_json['UF_TOTAL_AREA'] = 'Укажите площадь';
                }
                if (empty($_REQUEST['UF_ROOM_AREA'])) {
                    $res_json['UF_ROOM_AREA'] = 'Укажите площадь комнаты';
                }

                if (empty($_REQUEST['UF_COM_PAY']) && $_REQUEST['UF_COM_PAY'] != '0') {
                    $res_json['UF_COM_PAY'] = 'Укажите коммунальные платежи';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 129 || $_REQUEST['UF_TYPE'] == 131) {//дом,таунхаус
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_TYPE_OF_HS']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_RENT_PERIOD']) && (!empty($_REQUEST['UF_COM_PAY']) || $_REQUEST['UF_COM_PAY'] == '0') && !empty($_REQUEST['UF_HOUSE_SQUARE']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_TYPE_OF_HS'])) {
                    $res_json['UF_TYPE_OF_HS'] = 'Укажите тип дома';
                }
                if (empty($_REQUEST['UF_HOUSE_SQUARE'])) {
                    $res_json['UF_HOUSE_SQUARE'] = 'Укажите площадь дома';
                }
                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
                }

                if (empty($_REQUEST['UF_COM_PAY']) && $_REQUEST['UF_COM_PAY'] != '0') {
                    $res_json['UF_COM_PAY'] = 'Укажите коммунальные платежи';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 132) {//часть дома
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_PART_RENT']) && !empty($_REQUEST['UF_TYPE_OF_HS']) && !empty($_REQUEST['UF_PREPAY']) && (!empty($_REQUEST['UF_COM_PAY']) || $_REQUEST['UF_COM_PAY'] == '0') && !empty($_REQUEST['UF_HOUSE_SQUARE']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_PART_RENT'])) {
                    $res_json['UF_PART_RENT'] = 'Укажите часть в аренду';
                }
                if (empty($_REQUEST['UF_HOUSE_SQUARE'])) {
                    $res_json['UF_HOUSE_SQUARE'] = 'Укажите площадь дома';
                }
                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь участка';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_COM_PAY']) && $_REQUEST['UF_COM_PAY'] != '0') {
                    $res_json['UF_COM_PAY'] = 'Укажите коммунальные платежи';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        }
    } else if ($_REQUEST['UF_TYPE_OF_RS'] == 145) {//Коммерческая
        if ($_REQUEST['UF_TYPE'] == 135 || $_REQUEST['UF_TYPE'] == 137 || $_REQUEST['UF_TYPE'] == 138) {//офис,производство,склад
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_COMMISSIONS_RENT']) && !empty($_REQUEST['UF_COMMISSIONS_AGENT']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_TAX'])) {
                    $res_json['UF_TAX'] = 'Укажите налог';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }

                if (empty($_REQUEST['UF_COMMISSIONS_RENT'])) {
                    $res_json['UF_COMMISSIONS_RENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_AGENT'])) {
                    $res_json['UF_COMMISSIONS_AGENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }

                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 136) {//здание
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_COMMISSIONS_RENT']) && !empty($_REQUEST['UF_COMMISSIONS_AGENT']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_RENT'])) {
                    $res_json['UF_COMMISSIONS_RENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_AGENT'])) {
                    $res_json['UF_COMMISSIONS_AGENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 139) {//гараж
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_GARAGE_TYPE']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_COMMISSIONS_RENT']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }
                if (empty($_REQUEST['UF_GARAGE_TYPE'])) {
                    $res_json['UF_GARAGE_TYPE'] = 'Укажите тип гаража';
                }

                if (empty($_REQUEST['UF_COMMISSIONS_RENT'])) {
                    $res_json['UF_COMMISSIONS_RENT'] = 'Укажите размер комиссии';
                }
//                if (empty($_REQUEST['UF_COMMISSIONS_AGENT'])) {
//                    $res_json['UF_COMMISSIONS_AGENT'] = 'Укажите размер комиссии';
//                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 141 || $_REQUEST['UF_TYPE'] == 142) {//помещение свободного назначения|торговая площадка
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_POSPURPOSE']) && !empty($_REQUEST['UF_FLOOR_LEVEL']) && !empty($_REQUEST['UF_FLOOR_LEVEL_MAX']) && !empty($_REQUEST['UF_COM_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_COMMISSIONS_RENT']) && !empty($_REQUEST['UF_COMMISSIONS_AGENT']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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
                if (empty($_REQUEST['UF_POSPURPOSE'])) {
                    $res_json['UF_POSPURPOSE'] = 'Укажите возможное назначение';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL'])) {
                    $res_json['UF_FLOOR_LEVEL'] = 'Укажите этаж';
                }
                if (empty($_REQUEST['UF_FLOOR_LEVEL_MAX'])) {
                    $res_json['UF_FLOOR_LEVEL_MAX'] = 'Укажите количество этажей';
                }
                if (empty($_REQUEST['UF_COM_SQUARE'])) {
                    $res_json['UF_COM_SQUARE'] = 'Укажите площадь';
                }


                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_RENT'])) {
                    $res_json['UF_COMMISSIONS_RENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_AGENT'])) {
                    $res_json['UF_COMMISSIONS_AGENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        } else if ($_REQUEST['UF_TYPE'] == 143) {//коммерческая земля
            if (!empty($_REQUEST['UF_ADDRESS']) && !empty($_REQUEST['UF_PLOT_SQUARE']) && !empty($_REQUEST['UF_PRICE']) && !empty($_REQUEST['UF_COMMISSIONS_RENT']) && !empty($_REQUEST['UF_COMMISSIONS_AGENT']) && !empty($_REQUEST['UF_RENT_PERIOD']) && !empty($_REQUEST['UF_PREPAY']) && !empty($_REQUEST['UF_OWNER_PHONE'])) {
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

                if (empty($_REQUEST['UF_PLOT_SQUARE'])) {
                    $res_json['UF_PLOT_SQUARE'] = 'Укажите площадь';
                }

                if (empty($_REQUEST['UF_PRICE'])) {
                    $res_json['UF_PRICE'] = 'Укажите цену';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_RENT'])) {
                    $res_json['UF_COMMISSIONS_RENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_COMMISSIONS_AGENT'])) {
                    $res_json['UF_COMMISSIONS_AGENT'] = 'Укажите размер комиссии';
                }
                if (empty($_REQUEST['UF_RENT_PERIOD'])) {
                    $res_json['UF_RENT_PERIOD'] = 'Укажите срок аренды';
                }
                if (empty($_REQUEST['UF_PREPAY'])) {
                    $res_json['UF_PREPAY'] = 'Укажите предоплату';
                }
                if (empty($_REQUEST['UF_OWNER_PHONE'])) {
                    $res_json['UF_OWNER_PHONE'] = 'Заполните телефон';
                }


                echo json_encode($res_json);
            }
        }
    }
}








if ($_REQUEST['UF_DEAL_TYPE'] == 68) { //Сдать посуточно
    if ($_REQUEST['UF_TYPE'] == 126) {//квартира
        $arFields = ['UF_ADDRESS', 'UF_NUMBER_OF_ROOMS', 'UF_FLOOR_LEVEL', 'UF_FLOOR_LEVEL_MAX', 'UF_TOTAL_AREA', 'UF_PRICE', 'UF_DEPOSIT', 'UF_OWNER_PHONE'];
        $json = property($arFields, $arrErrors, $arr);
        echo json_encode($json);

    } else if ($_REQUEST['UF_TYPE'] == 127 || $_REQUEST['UF_TYPE'] == 134) {//комната
        $arFields =['UF_ADDRESS','UF_NUMBER_OF_ROOMS','UF_ROOMS_FOR_SALE','UF_ROOM_AREA','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_DEPOSIT','UF_OWNER_PHONE'];
        $json = property($arFields, $arrErrors, $arr);
        echo json_encode($json);

    } else if ($_REQUEST['UF_TYPE'] == 129) {//дом
        $arFields =['UF_ADDRESS','UF_HOUSE_SQUARE','UF_PLOT_SQUARE','UF_PRICE','UF_DEPOSIT','UF_OWNER_PHONE'];
        $json = property($arFields, $arrErrors, $arr);
        echo json_encode($json);
    }
} else if ($_REQUEST['UF_DEAL_TYPE'] == 66) {//Продать
    if ($_REQUEST['UF_TYPE_OF_RS'] == 144) {//жилая
        if ($_REQUEST['UF_TYPE'] == 126) {//квартира
            $arFields =['UF_ADDRESS','UF_NUMBER_OF_ROOMS','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_SALES_TYPE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);

        } else if ($_REQUEST['UF_TYPE'] == 127) {//комната
            $arFields =['UF_ADDRESS','UF_NUMBER_OF_ROOMS','UF_ROOMS_FOR_SALE','UF_ROOM_AREA','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_SALES_TYPE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);

        } else if ($_REQUEST['UF_TYPE'] == 128) {//доля в квартире
            $arFields =['UF_ADDRESS','UF_NUMBER_OF_ROOMS','UF_SHARE_SIZE','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_SALES_TYPE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 129 || $_REQUEST['UF_TYPE'] == 131) {//дом,таунхаус
            $arFields =['UF_ADDRESS','UF_TYPE_OF_HS','UF_PLOT_STATUS','UF_HOUSE_SQUARE','UF_PLOT_SQUARE','UF_GAS','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 132) {//часть дома
            $arFields =['UF_ADDRESS','UF_SHARE_SIZE','UF_PLOT_STATUS','UF_HOUSE_SQUARE','UF_PLOT_SQUARE','UF_GAS','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 133) {//участок
            $arFields =['UF_ADDRESS','UF_PLOT_STATUS','UF_PLOT_SQUARE','UF_GAS','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        }
    } else if ($_REQUEST['UF_TYPE_OF_RS'] == 145) {//Коммерческая

        if ($_REQUEST['UF_TYPE'] == 135 || $_REQUEST['UF_TYPE'] == 137 || $_REQUEST['UF_TYPE'] == 138) {//офис,производство,склад
            $arFields =['UF_ADDRESS','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_TAX','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 136) {//здание
            $arFields =['UF_ADDRESS','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_TAX','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 139) {//гараж
            $arFields =['UF_ADDRESS','UF_GARAGE_TYPE','UF_COM_SQUARE','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 140) {//готовый бизнес
            $arFields =['UF_ADDRESS','UF_BUSINESS_TYPE','UF_BUSINESS_CATEGORY','UF_MONTH_PROFIT','UF_COM_SQUARE','UF_PRICE','UF_TAX','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 141 || $_REQUEST['UF_TYPE'] == 142) {//помещение свободного назначения|торговая площадка
            $arFields =['UF_ADDRESS','UF_POSPURPOSE','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_TAX','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 143) {//коммерческая земля
            $arFields =['UF_ADDRESS','UF_PLOT_SQUARE','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        }
    }
} else if ($_REQUEST['UF_DEAL_TYPE'] == 67) {//Сдать
    if ($_REQUEST['UF_TYPE_OF_RS'] == 144) {//Жилая
        if ($_REQUEST['UF_TYPE'] == 126) {//квартира
            $arFields =['UF_ADDRESS','UF_NUMBER_OF_ROOMS','UF_RENT_PERIOD','UF_PREPAY','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_COM_PAY','UF_COM_PAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);

        } else if ($_REQUEST['UF_TYPE'] == 127 || $_REQUEST['UF_TYPE'] == 134) {//комната/койко-место
            $arFields =['UF_ADDRESS','UF_PREPAY','UF_RENT_PERIOD','UF_COM_PAY','UF_COM_PAY','UF_NUMBER_OF_ROOMS','UF_ROOMS_FOR_SALE','UF_ROOM_AREA','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_TOTAL_AREA','UF_PRICE','UF_SALES_TYPE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 129 || $_REQUEST['UF_TYPE'] == 131) {//дом,таунхаус
            $arFields =['UF_ADDRESS','UF_TYPE_OF_HS','UF_PREPAY','UF_RENT_PERIOD','UF_COM_PAY','UF_COM_PAY','UF_HOUSE_SQUARE','UF_PLOT_SQUARE','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 132) {//часть дома
            $arFields =['UF_ADDRESS','UF_PART_RENT','UF_TYPE_OF_HS','UF_PREPAY','UF_COM_PAY','UF_COM_PAY','UF_HOUSE_SQUARE','UF_PLOT_SQUARE','UF_PRICE','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        }
    } else if ($_REQUEST['UF_TYPE_OF_RS'] == 145) {//Коммерческая
        if ($_REQUEST['UF_TYPE'] == 135 || $_REQUEST['UF_TYPE'] == 137 || $_REQUEST['UF_TYPE'] == 138) {//офис,производство,склад
            $arFields =['UF_ADDRESS','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_COMMISSIONS_RENT','UF_COMMISSIONS_AGENT','UF_RENT_PERIOD','UF_PREPAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 136) {//здание
            $arFields =['UF_ADDRESS','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_COMMISSIONS_RENT','UF_COMMISSIONS_AGENT','UF_RENT_PERIOD','UF_PREPAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 139) {//гараж
            $arFields =['UF_ADDRESS','UF_GARAGE_TYPE','UF_COM_SQUARE','UF_PRICE','UF_COMMISSIONS_RENT','UF_RENT_PERIOD','UF_PREPAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 141 || $_REQUEST['UF_TYPE'] == 142) {//помещение свободного назначения|торговая площадка
            $arFields =['UF_ADDRESS','UF_POSPURPOSE','UF_FLOOR_LEVEL','UF_FLOOR_LEVEL_MAX','UF_COM_SQUARE','UF_PRICE','UF_COMMISSIONS_RENT','UF_COMMISSIONS_AGENT','UF_RENT_PERIOD','UF_PREPAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        } else if ($_REQUEST['UF_TYPE'] == 143) {//коммерческая земля
            $arFields =['UF_ADDRESS','UF_PLOT_SQUARE','UF_PRICE','UF_COMMISSIONS_RENT','UF_COMMISSIONS_AGENT','UF_RENT_PERIOD','UF_PREPAY','UF_OWNER_PHONE'];
            $json = property($arFields, $arrErrors, $arr);
            echo json_encode($json);
        }
    }
}
?>
