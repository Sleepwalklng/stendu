<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use lib\GetUserData;



function userFieldEnum($id, $val): int
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        if ($val == $ob['VALUE']) {
            $itemId = $ob['ID'];
        }
    };

    return $itemId;
}

if (!empty($_REQUEST['UF_DEAL_TYPE'])) {
    if ($_REQUEST['UF_DEAL_TYPE'] == 'Купить') {
        $_REQUEST['UF_DEAL_TYPE'] = 'Продать';
    } elseif (!empty($_REQUEST['UF_DEAL_TYPE']) == 'Снять') {
        $_REQUEST['UF_DEAL_TYPE'] = 'Сдать';
    } elseif (!empty($_REQUEST['UF_DEAL_TYPE']) == 'Посуточно') {
        $_REQUEST['UF_DEAL_TYPE'] = 'Сдать посуточно';
    }
    $UF_DEAL_TYPE = userFieldEnum(199, $_REQUEST['UF_DEAL_TYPE']);
}
if (!empty($_REQUEST['UF_TYPE_OF_RS'])) {
    $UF_TYPE_OF_RS = userFieldEnum(277, $_REQUEST['UF_TYPE_OF_RS']);
}
if (!empty($_REQUEST['UF_TYPE'])) {
    $UF_TYPE = userFieldEnum(273, $_REQUEST['UF_TYPE']);
}
if (!empty($_REQUEST['UF_REQUEST_FOR_PROPERTY'])) {
    $UF_REQUEST_FOR_PROPERTY = userFieldEnum(453, $_REQUEST['UF_REQUEST_FOR_PROPERTY']);
}

const MY_HL_BLOCK_ID = 2;
$entity_data_class_real_estate = GetEntityDataClass(MY_HL_BLOCK_ID);
$list_array = array("select" => array("*"), "order" => array("ID" => "DESC"));

if (!empty($_POST['selectPrice']) || !empty($_POST['selectDate'])) {
    if (empty($_POST['selectDate'])) {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
    } elseif (empty($_POST['selectPrice'])){
        $list_array['order'] = array("UF_DATA" => $_POST['selectDate']);
    }else{
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice'],"UF_DATA" => $_POST['selectDate']);
    }
}
$list_array['filter']['UF_STATUS'] = 84;
if ($UF_DEAL_TYPE) {
    $list_array['filter']['UF_DEAL_TYPE'] = $UF_DEAL_TYPE;
}
if ($UF_TYPE_OF_RS) {
    $list_array['filter']['UF_TYPE_OF_RS'] = $UF_TYPE_OF_RS;
}
if ($UF_TYPE) {
    $list_array['filter']['UF_TYPE'] = $UF_TYPE;
}
if ($UF_REQUEST_FOR_PROPERTY) {
    $list_array['filter']['UF_REQUEST_FOR_PROPERTY'] = $UF_REQUEST_FOR_PROPERTY;
}


if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}


if (!empty($_REQUEST['UF_OCCUPIED'])) {
    $list_array['filter']['UF_OCCUPIED'] = $_REQUEST['UF_OCCUPIED'];
}

if (!empty($_REQUEST['UF_TYPE_OF_HS'])) {
    $list_array['filter']['UF_TYPE_OF_HS'] = $_REQUEST['UF_TYPE_OF_HS'];
}
if (!empty($_REQUEST['UF_BUSINESS_TYPE'])) {
    $list_array['filter']['UF_BUSINESS_TYPE'] = $_REQUEST['UF_BUSINESS_TYPE'];
}
if (!empty($_REQUEST['UF_GARAGE_TYPE'])) {
    $list_array['filter']['?UF_GARAGE_TYPE'] = str_replace(',', ' ||', $_REQUEST['UF_GARAGE_TYPE']);
}
if (!empty($_REQUEST['UF_ROOM_TYPE'])) {
    $list_array['filter']['?UF_ROOM_TYPE'] = str_replace(',', ' ||', $_REQUEST['UF_ROOM_TYPE']);
}
if (!empty($_REQUEST['UF_POSPURPOSE'])) {
    $list_array['filter']['?UF_POSPURPOSE'] = str_replace(',', ' ||', $_REQUEST['UF_POSPURPOSE']);
}
if (!empty($_REQUEST['UF_LAND_CATEGORY'])) {
    $list_array['filter']['?UF_LAND_CATEGORY'] = str_replace(',', ' ||', $_REQUEST['UF_LAND_CATEGORY']);
}
if (!empty($_REQUEST['UF_CHOICE_APART'])) {
    $list_array['filter']['UF_CHOICE_APART'] = $_REQUEST['UF_CHOICE_APART'];
}

if (!empty($_POST['UF_SHARE_SIZE_OT'])) {
    $list_array['filter']['>=UF_SHARE_SIZE'] = $_POST['UF_SHARE_SIZE_OT'];
}
if (!empty($_POST['UF_SHARE_SIZE_DO'])) {
    $list_array['filter']['<=UF_SHARE_SIZE'] = $_POST['UF_SHARE_SIZE_DO'];
}

if (!empty($_POST['UF_MONTH_PROFIT_OT'])) {
    $list_array['filter']['>=UF_MONTH_PROFIT'] = $_POST['UF_MONTH_PROFIT_OT'];
}
if (!empty($_POST['UF_MONTH_PROFIT_DO'])) {
    $list_array['filter']['<=UF_MONTH_PROFIT'] = $_POST['UF_MONTH_PROFIT_DO'];
}

if (!empty($_POST['UF_NUM_OF_BED_OT'])) {
    $list_array['filter']['>=UF_NUM_OF_BED'] = $_POST['UF_NUM_OF_BED_OT'];
}
if (!empty($_POST['UF_NUM_OF_BED_DO'])) {
    $list_array['filter']['<=UF_NUM_OF_BED'] = $_POST['UF_NUM_OF_BED_DO'];
}

if (!empty($_REQUEST['UF_NUMBER_OF_ROOMS'])) {
    $list_array['filter']['?UF_NUMBER_OF_ROOMS'] = str_replace(',', ' ||', $_REQUEST['UF_NUMBER_OF_ROOMS']);
}
if (!empty($_REQUEST['UF_ROOMS_FOR_SALE'])) {
    $list_array['filter']['?UF_ROOMS_FOR_SALE'] = str_replace(',', ' ||', $_REQUEST['UF_ROOMS_FOR_SALE']);
}
if (!empty($_REQUEST['UF_TYPE_OF_ROOM'])) {
    $list_array['filter']['?UF_TYPE_OF_ROOM'] = str_replace(',', ' ||', $_REQUEST['UF_TYPE_OF_ROOM']);
}

if (!empty($_POST['UF_FLOOR_LEVEL_OT'])) {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_POST['UF_FLOOR_LEVEL_OT'];
}
if (!empty($_POST['UF_FLOOR_LEVEL_DO'])) {
    $list_array['filter']['<=UF_FLOOR_LEVEL'] = $_POST['UF_FLOOR_LEVEL_DO'];
}

if (!empty($_POST['UF_FLOOR_LEVEL_OT']) && empty($_POST['UF_FLOOR_LEVEL_NOT_FIRST'])) {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_POST['UF_FLOOR_LEVEL_OT'];

} elseif (empty($_POST['UF_FLOOR_LEVEL_OT']) && $_POST['UF_FLOOR_LEVEL_NOT_FIRST'] == 'on') {
    $list_array['filter']['>UF_FLOOR_LEVEL'] = 1;
} elseif ($_POST['UF_FLOOR_LEVEL_NOT_LAST'] == 'on' && $_POST['UF_FLOOR_LEVEL_OT'] > 1) {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_POST['UF_FLOOR_LEVEL_OT'];
}

if (!empty($_POST['UF_FLOOR_LEVEL_MAX_OT'])) {
    $list_array['filter']['>=UF_FLOOR_LEVEL_MAX'] = $_POST['UF_FLOOR_LEVEL_MAX_OT'];
}
if (!empty($_POST['UF_FLOOR_LEVEL_MAX_DO'])) {
    $list_array['filter']['<=UF_FLOOR_LEVEL_MAX'] = $_POST['UF_FLOOR_LEVEL_MAX_DO'];
}

if (!empty($_REQUEST['UF_PLOT_STATUS'])) {
    $list_array['filter']['?UF_PLOT_STATUS'] = str_replace(',', ' ||', $_REQUEST['UF_PLOT_STATUS']);
}

if (!empty($_POST['UF_BUILDING_YEAR_OT'])) {
    $list_array['filter']['>=UF_BUILDING_YEAR'] = $_POST['UF_BUILDING_YEAR_OT'];
}
if (!empty($_POST['UF_BUILDING_YEAR_DO'])) {
    $list_array['filter']['<=UF_BUILDING_YEAR'] = $_POST['UF_BUILDING_YEAR_DO'];
}
if (!empty($_POST['UF_PENTHOUSE'])) {
    $list_array['filter']['UF_PENTHOUSE'] = $_POST['UF_PENTHOUSE'];
}
if (!empty($_POST['UF_MATERIAL_OF_HOUSE'])) {
    $list_array['filter']['<=UF_MATERIAL_OF_HOUSE'] = $_POST['UF_MATERIAL_OF_HOUSE'];
}

if (!empty($_POST['UF_ROOM_AREA_OT'])) {
    $list_array['filter']['>=UF_ROOM_AREA'] = $_POST['UF_ROOM_AREA_OT'];
}
if (!empty($_POST['UF_ROOM_AREA_DO'])) {
    $list_array['filter']['<=UF_ROOM_AREA'] = $_POST['UF_ROOM_AREA_DO'];
}

if (!empty($_POST['UF_COM_SQUARE_OT'])) {
    $list_array['filter']['>=UF_COM_SQUARE'] = $_POST['UF_COM_SQUARE_OT'];
}
if (!empty($_POST['UF_COM_SQUARE_DO'])) {
    $list_array['filter']['<=UF_COM_SQUARE'] = $_POST['UF_COM_SQUARE_DO'];
}

if (!empty($_POST['UF_SELL_IN_PARTS'])) {
    $list_array['filter']['UF_SELL_IN_PARTS'] = $_POST['UF_SELL_IN_PARTS'];
}

if (!empty($_POST['UF_HOUSE_SQUARE_OT'])) {
    $list_array['filter']['>=UF_HOUSE_SQUARE'] = $_POST['UF_HOUSE_SQUARE_OT'];
}
if (!empty($_POST['UF_HOUSE_SQUARE_DO'])) {
    $list_array['filter']['<=UF_HOUSE_SQUARE'] = $_POST['UF_HOUSE_SQUARE_DO'];
}

if (!empty($_POST['UF_PLOT_SQUARE_OT'])) {
    $list_array['filter']['>=UF_PLOT_SQUARE'] = $_POST['UF_PLOT_SQUARE_OT'];
}
if (!empty($_POST['UF_PLOT_SQUARE_DO'])) {
    $list_array['filter']['<=UF_PLOT_SQUARE'] = $_POST['UF_PLOT_SQUARE_DO'];
}

if (!empty($_POST['UF_TOTAL_AREA_OT'])) {
    $list_array['filter']['>=UF_TOTAL_AREA'] = $_POST['UF_TOTAL_AREA_OT'];
}
if (!empty($_POST['UF_TOTAL_AREA_DO'])) {
    $list_array['filter']['<=UF_TOTAL_AREA'] = $_POST['UF_TOTAL_AREA_DO'];
}

if (!empty($_POST['UF_LIVING_AREA_OT'])) {
    $list_array['filter']['>=UF_LIVING_AREA'] = $_POST['UF_LIVING_AREA_OT'];
}
if (!empty($_POST['UF_LIVING_AREA_DO'])) {
    $list_array['filter']['<=UF_LIVING_AREA'] = $_POST['UF_LIVING_AREA_DO'];
}

if (!empty($_POST['UF_KITCHEN_AREA_OT'])) {
    $list_array['filter']['>=UF_KITCHEN_AREA'] = $_POST['UF_KITCHEN_AREA_OT'];
}
if (!empty($_POST['UF_KITCHEN_AREA_DO'])) {
    $list_array['filter']['<=UF_KITCHEN_AREA'] = $_POST['UF_KITCHEN_AREA_DO'];
}

if (!empty($_POST['UF_ROOMS_AREA_OT'])) {
    $list_array['filter']['>=UF_ROOMS_AREA'] = $_POST['UF_ROOMS_AREA_OT'];
}
if (!empty($_POST['UF_ROOMS_AREA_DO'])) {
    $list_array['filter']['<=UF_ROOMS_AREA'] = $_POST['UF_ROOMS_AREA_DO'];
}

if (!empty($_REQUEST['UF_REPAIR'])) {
    $list_array['filter']['?UF_REPAIR'] = str_replace(',', ' ||', $_REQUEST['UF_REPAIR']);
}

if (!empty($_REQUEST['UF_BATHROOM'])) {
    $list_array['filter']['?UF_BATHROOM'] = str_replace(',', ' ||', $_REQUEST['UF_BATHROOM']);
}

if (!empty($_POST['UF_QUAN_BATHROOM_OT'])) {
    $list_array['filter']['>=UF_QUAN_BATHROOM'] = $_POST['UF_QUAN_BATHROOM_OT'];
}
if (!empty($_POST['UF_QUAN_BATHROOM_DO'])) {
    $list_array['filter']['<=UF_QUAN_BATHROOM'] = $_POST['UF_QUAN_BATHROOM_DO'];
}

if (!empty($_REQUEST['UF_SEWERAGE'])) {
    $list_array['filter']['?UF_SEWERAGE'] = str_replace(',', ' ||', $_REQUEST['UF_SEWERAGE']);
}

if (!empty($_REQUEST['UF_WATER_SUP'])) {
    $list_array['filter']['?UF_WATER_SUP'] = str_replace(',', ' ||', $_REQUEST['UF_WATER_SUP']);
}

if (!empty($_REQUEST['UF_HEATING'])) {
    $list_array['filter']['?UF_HEATING'] = str_replace(',', ' ||', $_REQUEST['UF_HEATING']);
}

if (!empty($_REQUEST['UF_GAS'])) {
    $list_array['filter']['?UF_GAS'] = str_replace(',', ' ||', $_REQUEST['UF_GAS']);
}

if (!empty($_REQUEST['UF_ELECTRICITY'])) {
    $list_array['filter']['UF_ELECTRICITY'] = $_REQUEST['UF_ELECTRICITY'];
}
if (!empty($_REQUEST['UF_SECURITY'])) {
    $list_array['filter']['UF_SECURITY'] = $_REQUEST['UF_SECURITY'];
}
if (!empty($_REQUEST['UF_HAVE_PHONE'])) {
    $list_array['filter']['UF_HAVE_PHONE'] = $_REQUEST['UF_HAVE_PHONE'];
}
if (!empty($_REQUEST['UF_BATHH'])) {
    $list_array['filter']['UF_BATHH'] = $_REQUEST['UF_BATHH'];
}
if (!empty($_REQUEST['UF_GARAGE'])) {
    $list_array['filter']['UF_GARAGE'] = $_REQUEST['UF_GARAGE'];
}
if (!empty($_REQUEST['UF_POOL'])) {
    $list_array['filter']['UF_POOL'] = $_REQUEST['UF_POOL'];
}

if (!empty($_REQUEST['UF_NUM_BALCONY'])) {
    $list_array['filter']['?UF_NUM_BALCONY'] = str_replace(',', ' ||', $_REQUEST['UF_NUM_BALCONY']);
}
if (!empty($_REQUEST['UF_LOGGIA'])) {
    $list_array['filter']['?UF_LOGGIA'] = str_replace(',', ' ||', $_REQUEST['UF_LOGGIA']);
}
if (!empty($_REQUEST['UF_BATHROOM_SEP'])) {
    $list_array['filter']['?UF_BATHROOM_SEP'] = str_replace(',', ' ||', $_REQUEST['UF_BATHROOM_SEP']);
}
if (!empty($_REQUEST['UF_BATHROOM_COMB'])) {
    $list_array['filter']['?UF_BATHROOM_COMB'] = str_replace(',', ' ||', $_REQUEST['UF_BATHROOM_COMB']);
}
if (!empty($_REQUEST['UF_WINDOW_VIEW'])) {
    $list_array['filter']['?UF_WINDOW_VIEW'] = str_replace(',', ' ||', $_REQUEST['UF_WINDOW_VIEW']);
}

if (!empty($_REQUEST['UF_KITCHEN'])) {
    $list_array['filter']['UF_KITCHEN'] = $_REQUEST['UF_KITCHEN'];
}
if (!empty($_REQUEST['UF_ROOMS_FURNITURE'])) {
    $list_array['filter']['UF_ROOMS_FURNITURE'] = $_REQUEST['UF_ROOMS_FURNITURE'];
}
if (!empty($_REQUEST['UF_FRIDGE'])) {
    $list_array['filter']['UF_FRIDGE'] = $_REQUEST['UF_FRIDGE'];
}
if (!empty($_REQUEST['UF_WASH'])) {
    $list_array['filter']['UF_WASH'] = $_REQUEST['UF_WASH'];
}
if (!empty($_REQUEST['UF_INTERNET'])) {
    $list_array['filter']['UF_INTERNET'] = $_REQUEST['UF_INTERNET'];
}
if (!empty($_REQUEST['UF_TV'])) {
    $list_array['filter']['UF_TV'] = $_REQUEST['UF_TV'];
}
if (!empty($_REQUEST['UF_CONDITIONER'])) {
    $list_array['filter']['UF_CONDITIONER'] = $_REQUEST['UF_CONDITIONER'];
}
if (!empty($_REQUEST['UF_DISHWASHER'])) {
    $list_array['filter']['UF_DISHWASHER'] = $_REQUEST['UF_DISHWASHER'];
}
if (!empty($_REQUEST['UF_BATH'])) {
    $list_array['filter']['UF_BATH'] = $_REQUEST['UF_BATH'];
}
if (!empty($_REQUEST['UF_SHOWER_ROOM'])) {
    $list_array['filter']['UF_SHOWER_ROOM'] = $_REQUEST['UF_SHOWER_ROOM'];
}
if (!empty($_REQUEST['UF_PETS'])) {
    $list_array['filter']['UF_PETS'] = $_REQUEST['UF_PETS'];
}
if (!empty($_REQUEST['UF_WITH_CHILDREN'])) {
    $list_array['filter']['UF_WITH_CHILDREN'] = $_REQUEST['UF_WITH_CHILDREN'];
}
if (!empty($_REQUEST['UF_RCHUTE'])) {
    $list_array['filter']['UF_RCHUTE'] = $_REQUEST['UF_RCHUTE'];
}

if (!empty($_REQUEST['UF_BATHROOM'])) {
    $list_array['filter']['?UF_BATHROOM'] = str_replace(',', ' ||', $_REQUEST['UF_BATHROOM']);
}
if (!empty($_REQUEST['UF_ELEVATOR_PASS'])) {
    $list_array['filter']['?UF_ELEVATOR_PASS'] = str_replace(',', ' ||', $_REQUEST['UF_ELEVATOR_PASS']);
}
if (!empty($_REQUEST['UF_ELEVATOR_SERV'])) {
    $list_array['filter']['?UF_ELEVATOR_SERV'] = str_replace(',', ' ||', $_REQUEST['UF_ELEVATOR_SERV']);
}
if (!empty($_REQUEST['UF_PARKING'])) {
    $list_array['filter']['?UF_PARKING'] = str_replace(',', ' ||', $_REQUEST['UF_PARKING']);
}
if (!empty($_REQUEST['UF_PHOTOS']) == 'on') {
    $list_array['filter']['!UF_PHOTOS'] = false;
}
if (!empty($_REQUEST['UF_VIDEO']) == 'on') {
    $list_array['filter']['!UF_VIDEO'] = false;
}
if (!empty($_REQUEST['UF_MORTGAGE'])) {
    $list_array['filter']['UF_MORTGAGE'] = $_REQUEST['UF_MORTGAGE'];
}
if (!empty($_REQUEST['UF_SALES_TYPE'])) {
    $list_array['filter']['UF_SALES_TYPE'] = $_REQUEST['UF_SALES_TYPE'];
}
if (!empty($_REQUEST['UF_BONUS'])) {
    $list_array['filter']['UF_BONUS'] = $_REQUEST['UF_BONUS'];
}

if (!empty($_POST['UF_COM_PAY_OT'])) {
    $list_array['filter']['>=UF_COM_PAY'] = $_POST['UF_COM_PAY_OT'];
}
if (!empty($_POST['UF_COM_PAY_DO'])) {
    $list_array['filter']['<=UF_COM_PAY'] = $_POST['UF_COM_PAY_DO'];
}

if (!empty($_REQUEST['UF_RENT_PERIOD'])) {
    $list_array['filter']['?UF_RENT_PERIOD'] = str_replace(',', ' ||', $_REQUEST['UF_RENT_PERIOD']);
}
if (!empty($_REQUEST['UF_PREPAY'])) {
    $list_array['filter']['?UF_PREPAY'] = str_replace(',', ' ||', $_REQUEST['UF_PREPAY']);
}
if (!empty($_REQUEST['UF_GARAGE_STATUS'])) {
    $list_array['filter']['?UF_GARAGE_STATUS'] = str_replace(',', ' ||', $_REQUEST['UF_GARAGE_STATUS']);
}

if (!empty($_POST['UF_DEPOSIT_OT'])) {
    $list_array['filter']['>=UF_DEPOSIT'] = $_POST['UF_DEPOSIT_OT'];
}
if (!empty($_POST['UF_DEPOSIT_DO'])) {
    $list_array['filter']['<=UF_DEPOSIT'] = $_POST['UF_DEPOSIT_DO'];
}

if (!empty($_REQUEST['UF_LIGHT'])) {
    $list_array['filter']['UF_LIGHT'] = $_REQUEST['UF_LIGHT'];
}
if (!empty($_REQUEST['UF_WATER'])) {
    $list_array['filter']['UF_WATER'] = $_REQUEST['UF_WATER'];
}
if (!empty($_REQUEST['UF_HEATING'])) {
    $list_array['filter']['UF_HEATING'] = $_REQUEST['UF_HEATING'];
}
if (!empty($_REQUEST['UF_FIRE_SYSTEM'])) {
    $list_array['filter']['UF_FIRE_SYSTEM'] = $_REQUEST['UF_FIRE_SYSTEM'];
}
if (!empty($_REQUEST['UF_CARWASH'])) {
    $list_array['filter']['UF_CARWASH'] = $_REQUEST['UF_CARWASH'];
}
if (!empty($_REQUEST['UF_CARSERVICE'])) {
    $list_array['filter']['UF_CARSERVICE'] = $_REQUEST['UF_CARSERVICE'];
}
if (!empty($_REQUEST['UF_AUTO_GATES'])) {
    $list_array['filter']['UF_AUTO_GATES'] = $_REQUEST['UF_AUTO_GATES'];
}
if (!empty($_REQUEST['UF_CCTV'])) {
    $list_array['filter']['UF_CCTV'] = $_REQUEST['UF_CCTV'];
}
if (!empty($_REQUEST['UF_ENTRY_PASSES'])) {
    $list_array['filter']['UF_ENTRY_PASSES'] = $_REQUEST['UF_ENTRY_PASSES'];
}
if (!empty($_REQUEST['UF_ALL_DAY_SECURITY'])) {
    $list_array['filter']['UF_ALL_DAY_SECURITY'] = $_REQUEST['UF_ALL_DAY_SECURITY'];
}
if (!empty($_REQUEST['UF_BESEMENT_SELLAR'])) {
    $list_array['filter']['UF_BESEMENT_SELLAR'] = $_REQUEST['UF_BESEMENT_SELLAR'];
}
if (!empty($_REQUEST['UF_VIE_HOLE'])) {
    $list_array['filter']['UF_VIE_HOLE'] = $_REQUEST['UF_VIE_HOLE'];
}
if (!empty($_REQUEST['UF_TIRE_FITTING'])) {
    $list_array['filter']['UF_TIRE_FITTING'] = $_REQUEST['UF_TIRE_FITTING'];
}

if (!empty($_REQUEST['UF_CONDITION'])) {
    $list_array['filter']['?UF_CONDITION'] = str_replace(',', ' ||', $_REQUEST['UF_CONDITION']);
}
if (!empty($_REQUEST['UF_BUILDING_CLASS'])) {
    $list_array['filter']['?UF_BUILDING_CLASS'] = str_replace(',', ' ||', $_REQUEST['UF_BUILDING_CLASS']);
}
if (!empty($_REQUEST['UF_GATES'])) {
    $list_array['filter']['?UF_GATES'] = str_replace(',', ' ||', $_REQUEST['UF_GATES']);
}
if (!empty($_REQUEST['UF_BUILDING_TYPE'])) {
    $list_array['filter']['?UF_BUILDING_TYPE'] = str_replace(',', ' ||', $_REQUEST['UF_BUILDING_TYPE']);
}
if (!empty($_REQUEST['UF_ENTRY'])) {
    $list_array['filter']['?UF_ENTRY'] = str_replace(',', ' ||', $_REQUEST['UF_ENTRY']);
}
if (!empty($_REQUEST['UF_HOUSE_LINE'])) {
    $list_array['filter']['?UF_HOUSE_LINE'] = str_replace(',', ' ||', $_REQUEST['UF_HOUSE_LINE']);
}

if (!empty($_REQUEST['UF_NUM_OVERHEAD_CRANES'])) {
    $list_array['filter']['!UF_NUM_OVERHEAD_CRANES'] = false;
}
if (!empty($_REQUEST['UF_NUM_BEAM_CRANES'])) {
    $list_array['filter']['!UF_NUM_BEAM_CRANES'] = false;
}
if (!empty($_REQUEST['UF_NUM_GANTRY_CRANES'])) {
    $list_array['filter']['!UF_NUM_GANTRY_CRANES'] = false;
}
if (!empty($_REQUEST['UF_NUM_RAIL_CRANES'])) {
    $list_array['filter']['!UF_NUM_RAIL_CRANES'] = false;
}
if (!empty($_REQUEST['UF_ELEVATOR_PASS'])) {
    $list_array['filter']['!UF_ELEVATOR_PASS'] = false;
}
if (!empty($_REQUEST['UF_ELEVATOR_SERV'])) {
    $list_array['filter']['!UF_ELEVATOR_SERV'] = false;
}
if (!empty($_REQUEST['UF_NUM_HOISTS'])) {
    $list_array['filter']['!UF_NUM_HOISTS'] = false;
}

if (!empty($_REQUEST['UF_BUFFET'])) {
    $list_array['filter']['UF_BUFFET'] = $_REQUEST['UF_BUFFET'];
}
if (!empty($_REQUEST['UF_HOTEL'])) {
    $list_array['filter']['UF_HOTEL'] = $_REQUEST['UF_HOTEL'];
}
if (!empty($_REQUEST['UF_OFFICE_ROOMS'])) {
    $list_array['filter']['UF_OFFICE_ROOMS'] = $_REQUEST['UF_OFFICE_ROOMS'];
}
if (!empty($_REQUEST['UF_DINING'])) {
    $list_array['filter']['UF_DINING'] = $_REQUEST['UF_DINING'];
}
if (!empty($_REQUEST['UF_RECEPTION'])) {
    $list_array['filter']['UF_RECEPTION'] = $_REQUEST['UF_RECEPTION'];
}
if (!empty($_REQUEST['UF_FURNITURE'])) {
    $list_array['filter']['UF_FURNITURE'] = $_REQUEST['UF_FURNITURE'];
}
if (!empty($_REQUEST['UF_EQUIPMENT'])) {
    $list_array['filter']['UF_EQUIPMENT'] = $_REQUEST['UF_EQUIPMENT'];
}
if (!empty($_REQUEST['UF_DISPLAY_WINDOWS'])) {
    $list_array['filter']['UF_DISPLAY_WINDOWS'] = $_REQUEST['UF_DISPLAY_WINDOWS'];
}
if (!empty($_REQUEST['UF_PHARMACY'])) {
    $list_array['filter']['UF_PHARMACY'] = $_REQUEST['UF_PHARMACY'];
}
if (!empty($_REQUEST['UF_AQUAPARK'])) {
    $list_array['filter']['UF_AQUAPARK'] = $_REQUEST['UF_AQUAPARK'];
}
if (!empty($_REQUEST['UF_ATELIER'])) {
    $list_array['filter']['UF_ATELIER'] = $_REQUEST['UF_ATELIER'];
}
if (!empty($_REQUEST['UF_ATM'])) {
    $list_array['filter']['UF_ATM'] = $_REQUEST['UF_ATM'];
}
if (!empty($_REQUEST['UF_BABY_CITY'])) {
    $list_array['filter']['UF_BABY_CITY'] = $_REQUEST['UF_BABY_CITY'];
}
if (!empty($_REQUEST['UF_BOWLING'])) {
    $list_array['filter']['UF_BOWLING'] = $_REQUEST['UF_BOWLING'];
}
if (!empty($_REQUEST['UF_COMPLEX'])) {
    $list_array['filter']['UF_COMPLEX'] = $_REQUEST['UF_COMPLEX'];
}
if (!empty($_REQUEST['UF_PLAY_ROOM'])) {
    $list_array['filter']['UF_PLAY_ROOM'] = $_REQUEST['UF_PLAY_ROOM'];
}
if (!empty($_REQUEST['UF_SLOT_MACHINES'])) {
    $list_array['filter']['UF_SLOT_MACHINES'] = $_REQUEST['UF_SLOT_MACHINES'];
}
if (!empty($_REQUEST['UF_ICE_RINK'])) {
    $list_array['filter']['UF_ICE_RINK'] = $_REQUEST['UF_ICE_RINK'];
}
if (!empty($_REQUEST['UF_CAFE'])) {
    $list_array['filter']['UF_CAFE'] = $_REQUEST['UF_CAFE'];
}
if (!empty($_REQUEST['UF_MOVIE_THEATER'])) {
    $list_array['filter']['UF_MOVIE_THEATER'] = $_REQUEST['UF_MOVIE_THEATER'];
}
if (!empty($_REQUEST['UF_CONFERENCE_HALL'])) {
    $list_array['filter']['UF_CONFERENCE_HALL'] = $_REQUEST['UF_CONFERENCE_HALL'];
}
if (!empty($_REQUEST['UF_MED_CENTER'])) {
    $list_array['filter']['UF_MED_CENTER'] = $_REQUEST['UF_MED_CENTER'];
}
if (!empty($_REQUEST['UF_MINIMARKET'])) {
    $list_array['filter']['UF_MINIMARKET'] = $_REQUEST['UF_MINIMARKET'];
}
if (!empty($_REQUEST['UF_WAREHOUSES'])) {
    $list_array['filter']['UF_WAREHOUSES'] = $_REQUEST['UF_WAREHOUSES'];
}
if (!empty($_REQUEST['UF_NOTARIAL'])) {
    $list_array['filter']['UF_NOTARIAL'] = $_REQUEST['UF_NOTARIAL'];
}
if (!empty($_REQUEST['UF_BANK'])) {
    $list_array['filter']['UF_BANK'] = $_REQUEST['UF_BANK'];
}
if (!empty($_REQUEST['UF_PARK'])) {
    $list_array['filter']['UF_PARK'] = $_REQUEST['UF_PARK'];
}
if (!empty($_REQUEST['UF_RESTAURANT'])) {
    $list_array['filter']['UF_RESTAURANT'] = $_REQUEST['UF_RESTAURANT'];
}
if (!empty($_REQUEST['UF_BEAUTY_SALOON'])) {
    $list_array['filter']['UF_BEAUTY_SALOON'] = $_REQUEST['UF_BEAUTY_SALOON'];
}
if (!empty($_REQUEST['UF_SUPERMARKET'])) {
    $list_array['filter']['UF_SUPERMARKET'] = $_REQUEST['UF_SUPERMARKET'];
}
if (!empty($_REQUEST['UF_TRADING_ZONE'])) {
    $list_array['filter']['UF_TRADING_ZONE'] = $_REQUEST['UF_TRADING_ZONE'];
}
if (!empty($_REQUEST['UF_FITNESS'])) {
    $list_array['filter']['UF_FITNESS'] = $_REQUEST['UF_FITNESS'];
}
if (!empty($_REQUEST['UF_FOTO_SALOON'])) {
    $list_array['filter']['UF_FOTO_SALOON'] = $_REQUEST['UF_FOTO_SALOON'];
}
if (!empty($_REQUEST['UF_FOOD_COURT'])) {
    $list_array['filter']['UF_FOOD_COURT'] = $_REQUEST['UF_FOOD_COURT'];
}
if (!empty($_REQUEST['UF_RENT_RIGHTS'])) {
    $list_array['filter']['UF_RENT_RIGHTS'] = $_REQUEST['UF_RENT_RIGHTS'];
}

if (!empty($_REQUEST['UF_ACCESS'])) {
    $list_array['filter']['?UF_ACCESS'] = str_replace(',', ' ||', $_REQUEST['UF_ACCESS']);
}


$rsData = $entity_data_class_real_estate::getList($list_array);
while ($el = $rsData->fetch()) {
    if ($_POST['UF_FLOOR_LEVEL_NOT_LAST'] == 'on') {
        if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
            $arRealEstate[] = $el;
        }
    } else {
        $arRealEstate[] = $el;
    }
}

$count = count($arRealEstate);


echo $count;

?>