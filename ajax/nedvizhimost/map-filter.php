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


if (!empty($_POST['category']) && $_POST['category'] !== 'Все') {
    $categoryId = userFieldEnum(201, $_POST['category']);
}
if (!empty($_POST['region']) && $_POST['region'] !== 'Все') {
    $regionId = userFieldEnum(196, $_POST['region']);
}
if (!empty($_POST['sellers'])&& $_POST['sellers'] !== 'Все') {
    $sellerId = userFieldEnum(203, $_POST['sellers']);
}
//if (!empty($_POST['number_of_rooms'])) {
//    $number_of_roomsId = userFieldEnum(198, $_POST['number_of_rooms']);
//}
if (!empty($_POST['type_of_obj'])&& $_POST['type_of_obj'] !== 'Все') {
    $type_of_objId = userFieldEnum(197, $_POST['type_of_obj']);
}
//if (!empty($_POST['type_of_house'])&& $_POST['type_of_house'] !== 'Все') {
//    $type_of_housejId = userFieldEnum(202, $_POST['type_of_house']);
//}

if (!empty($_POST['type_rent'])&& $_POST['type_rent'] !== 'Все') {
    $type_rentId = userFieldEnum(200, $_POST['type_rent']);
}


const MY_HL_BLOCK_ID = 2;
$entity_data_class_real_estate = GetEntityDataClass(MY_HL_BLOCK_ID);
$list_array = array("select" => array("*"), "order" => array("ID" => "ASC"));

if ($categoryId) {
    $list_array['filter']['UF_CATEGORY'] = $categoryId;
}
if ($regionId) {
    $list_array['filter']['UF_REGION'] = $regionId;
}

//if ($number_of_roomsId) {
//    $list_array['filter']['UF_NUMBER_OF_ROOMS'] = $number_of_roomsId;
//}
if ($type_of_objId) {
    $list_array['filter']['UF_TYPE_OBJECT'] = $type_of_objId;
}
//if ($type_of_housejId) {
//    $list_array['filter']['UF_TYPE_OF_HOUSE'] = $type_of_housejId;
//}
if ($sellerId) {
    $list_array['filter']['UF_SELLERS'] = $sellerId;
}
if ($type_rentId) {
    $list_array['filter']['UF_RENT_TYPE'] = $type_rentId;
}

if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}

if (!empty($_POST['squareOT'])) {
    $list_array['filter']['>=UF_TOTAL_AREA'] = (int)$_POST['squareOT'];
}
if (!empty($_POST['squareDO'])) {
    $list_array['filter']['<=UF_TOTAL_AREA'] = $_POST['squareDO'];
}

if (!empty($_POST['floorOT']) && $_POST['nefirst'] == 'undefined') {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_POST['floorOT'];

} elseif (empty($_POST['floorOT']) && $_POST['nefirst'] == 'on') {
    $list_array['filter']['>UF_FLOOR_LEVEL'] = 1;
} elseif ($_POST['nefirst'] == 'on' && $_POST['floorOT'] > 1) {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_POST['floorOT'];
}

if (!empty($_POST['floorDO'])) {
    $list_array['filter']['<=UF_FLOOR_LEVEL'] = $_POST['floorDO'];

}
if (!empty($_POST['selectPrice'])) {
    $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
}
if (!empty($_POST['selectDate'])) {
    $list_array['order'] = array("UF_DATA" => $_POST['selectDate']);
}


if (!empty($_POST['number_of_rooms'])) {
    $number_of_rooms = explode(",", $_POST['number_of_rooms']);
}
if (!empty($_POST['type_of_house'])) {
    $type_of_house = explode(",", $_POST['type_of_house']);
}


$rsData = $entity_data_class_real_estate::getList($list_array);
while ($el = $rsData->fetch()) {
    $el['UF_PRICE'] = format_price($el['UF_PRICE']);
    if ($el['UF_DEAL_TYPE'] == $_POST['type_deal']) {
        if ($number_of_rooms) {
            if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                if ($_POST['nelast'] == 'on') {
                    if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                        if($type_of_house){
                            if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                                $arRealEstate[] = $el;
                            }
                        }else{
                            $arRealEstate[] = $el;
                        }

                    }
                } else {
                    if($type_of_house){
                        if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                            $arRealEstate[] = $el;
                        }
                    }else{
                        $arRealEstate[] = $el;
                    }
                }
            }
        } else {
            if ($_POST['nelast'] == 'on') {
                if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                    if($type_of_house){
                        if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                            $arRealEstate[] = $el;
                        }
                    }else{
                        $arRealEstate[] = $el;
                    }
                }
            } else {

                if($type_of_house){
                    if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                        $arRealEstate[] = $el;
                    }
                }else{
                    $arRealEstate[] = $el;
                }
            }
        }
    } elseif ($el['UF_RENT_TYPE'] == $_POST['type_deal']) {
        if ($number_of_rooms) {
            if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                if ($_POST['nelast'] == 'on') {
                    if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                        if($type_of_house){
                            if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                                $arRealEstate[] = $el;
                            }
                        }else{
                            $arRealEstate[] = $el;
                        }
                    }
                } else {
                    if($type_of_house){
                        if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                            $arRealEstate[] = $el;
                        }
                    }else{
                        $arRealEstate[] = $el;
                    }
                }
            }
        } else {
            if ($_POST['nelast'] == 'on') {
                if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                    if($type_of_house){
                        if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                            $arRealEstate[] = $el;
                        }
                    }else{
                        $arRealEstate[] = $el;
                    }
                }
            } else {
                if($type_of_house){
                    if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                        $arRealEstate[] = $el;
                    }
                }else{
                    $arRealEstate[] = $el;
                }
            }
        }
    } elseif ($_POST['type_deal'] == '68,69') {
        if ($el['UF_DEAL_TYPE'] == 68 || $el['UF_DEAL_TYPE'] == 69) {
            if ($number_of_rooms) {
                if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                    if ($_POST['nelast'] == 'on') {
                        if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                            if($type_of_house){
                                if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                                    $arRealEstate[] = $el;
                                }
                            }else{
                                $arRealEstate[] = $el;
                            }
                        }
                    } else {
                        if($type_of_house){
                            if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                                $arRealEstate[] = $el;
                            }
                        }else{
                            $arRealEstate[] = $el;
                        }
                    }
                }
            } else {
                if($type_of_house){
                    if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                        $arRealEstate[] = $el;
                    }
                }else{
                    $arRealEstate[] = $el;
                }
            }
        }
    } elseif ($_POST['type_deal'] == 'все') {
        if($type_of_house){
            if(in_array($el['UF_TYPE_OF_HOUSE'],$type_of_house)){
                $arRealEstate[] = $el;
            }
        }else{
            $arRealEstate[] = $el;
        }
    }
}
// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];

    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '2') {
            $resultFav[] = $el['1'];
        }
    }
}

?>


<div class="property-map__left">
    <div class="property-map__amount">
        <span class="property-map__num">4</span> объявления
    </div>

    <ul class="property-map__list">
        <? foreach ($arRealEstate as $arItem): ?>
            <?
            if ($arItem['UF_DEAL_TYPE'] == 67)
                $url = 'snyat';
            elseif ($arItem['UF_RENT_TYPE'] == 71)
                $url = 'posutochno';
            elseif ($arItem['UF_DEAL_TYPE'] == 66)
                $url = 'kupit';
            ?>
            <li class="property-map__cart cart <? if (in_array($arItem['ID'], $resultFav)) {
                echo 'cart--favorite';
            } ?>" id="<?= $arItem['ID'] ?>">
                <a href="/nedvizhimost/<?= $url ?>/<?= $arItem['UF_SESSION_CODE'] ?>/">
                    <div class="cart__top">
                        <div class="cart__inner">
                            <ul class="cart__list swiper-wrapper">
                                <? if (!empty($arItem['UF_IMAGES'])): ?>
                                    <? foreach ($arItem['UF_IMAGES'] as $photo): ?>
                                        <li class="cart__box swiper-slide">
                                            <img class="cart__img" src="<?= CFile::GetPath($photo) ?>"
                                                 alt="">
                                        </li>
                                    <? endforeach; ?>
                                <? else: ?>
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/zaglushka_foto.svg"
                                             alt="">
                                    </li>
                                <? endif; ?>
                            </ul>

                            <div class="cart__pagination"></div>
                        </div>
                    </div>

                    <div class="cart__line"></div>

                    <div class="cart__bottom">
                        <div class="cart__wrapper">
                            <div class="cart__left">
                                <div class="cart__subtitle">
                                    <?= $arItem['UF_TITLE'] ?? ''; ?>
                                </div>

                                <div class="cart__cost">
                                    <?= $arItem['UF_PRICE'] ?? ''; ?>
                                </div>
                            </div>

                            <div class="cart__right">
                                <div class="cart__location">
                                    <img class="cart__location-img"
                                         src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                         alt="местоположение">

                                    <?= $arItem['UF_ADDRESS'] ?? ''; ?>
                                </div>
                            </div>

                            <a class="cart__favorite" data-item="<?= $arItem['ID'] ?>" data-razdel="2">
                                <img class="cart__favorite-img"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                     alt="добавить в избранное">
                                <img class="cart__favorite-img cart__favorite-img--active"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                     alt="добавить в избранное">
                            </a>
                        </div>
                    </div>
                </a>
            </li>

        <? endforeach; ?>

    </ul>

</div>

<div id="map">
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
            defer
    ></script>
    <script>

        function initAutocomplete() {
            const myLatlng = new google.maps.LatLng(<?= $arRealEstate['0']['UF_GEO'] ?>);
            const map = new google.maps.Map(document.getElementById("map"), {
                center: myLatlng,
                zoom: 10,
                mapTypeId: "roadmap",
            });

            const infoWindow = new google.maps.InfoWindow({
                content: "",
                disableAutoPan: true,
            });
            const markers = locations.map(([id, position, title], i) => {
                const marker = new google.maps.Marker({
                    position,
                    title: title,
                });
                const item = document.getElementById(id);
                item.addEventListener("mouseover", () => {
                    map.setCenter(position);
                    infoWindow.setContent(marker.getTitle());
                    infoWindow.open(map, marker);
                });
                // markers can only be keyboard focusable when they have click listeners
                // open info window when marker is clicked
                marker.addListener("click", () => {
                    infoWindow.setContent(marker.getTitle());
                    infoWindow.open(map, marker);
                });
                return marker;


            });
            const markerCluster = new markerClusterer.MarkerClusterer({map, markers});
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);

            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers1 = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers1.forEach((marker) => {
                    marker.setMap(null);
                });
                markers1 = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    // Create a marker for each place.
                    markers1.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        const locations = [
            <?php foreach ($arRealEstate as $item) {
            if($item['UF_GEO']){
            if ($item['UF_DEAL_TYPE'] == 67)
                $url = 'snyat';
            elseif ($item['UF_RENT_TYPE'] == 71)
                $url = 'posutochno';
            elseif ($item['UF_DEAL_TYPE'] == 66)
                $url = 'kupit';
            ?>
            <? $coor = explode(',', $item['UF_GEO'])?>
            [<?=$item['ID']?>, {
                lat: <?=$coor[0]?>,
                lng: <?=$coor[1]?>
            }, '<div class="map-block-item">' +
            '<a href="/nedvizhimost/<?= $url ?>/<?= $item['UF_SESSION_CODE'] ?>/"><div class="map-block-item-cont">' +
            '<div class="map-block-item-cont-text">' +
            '<ul><li><?=$item["UF_TITLE"]?></li>' +
            '<li><?= $item['UF_PRICE'] . ' ₽'?></li>' +
            '</ul></div></div> </a>' +
            '</div>',],
            <?}?>
            <?}?>

        ];

        window.initAutocomplete = initAutocomplete;

    </script>
</div>



