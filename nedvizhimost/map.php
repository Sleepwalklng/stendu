 <?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Недвижимость");
if(empty($_GET['type_deal'])){
    LocalRedirect('/nedvizhimost/map.php?type_deal=66');
}
use lib\GetUserData;

CModule::includeModule("highloadblock");


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


if (!empty($_GET['category']) && $_GET['category'] !== 'Все') {
    $categoryId = userFieldEnum(201, $_GET['category']);
}
if (!empty($_GET['region']) && $_GET['region'] !== 'Все') {
    $regionId = userFieldEnum(196, $_GET['region']);
}
if (!empty($_GET['sellers']) && $_GET['sellers'] !== 'Все') {
    $sellerId = userFieldEnum(203, $_GET['sellers']);
}
//if (!empty($_GET['number_of_rooms'])) {
//    $number_of_roomsId = userFieldEnum(198, $_GET['number_of_rooms']);
//}
if (!empty($_GET['type_of_obj']) && $_GET['type_of_obj'] !== 'Все') {
    $type_of_objId = $_GET['type_of_obj'];
}
if (!empty($_GET['type_of_house']) && $_GET['type_of_house'] !== 'Все') {
    $type_of_housejId = userFieldEnum(202, $_GET['type_of_house']);
}

if (!empty($_GET['type_rent']) && $_GET['type_rent'] !== 'Все') {
    $type_rentId = userFieldEnum(200, $_GET['type_rent']);
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
if ($type_of_housejId) {
    $list_array['filter']['UF_TYPE_OF_HOUSE'] = $type_of_housejId;
}
if ($sellerId) {
    $list_array['filter']['UF_SELLERS'] = $sellerId;
}
if ($type_rentId) {
    $list_array['filter']['UF_RENT_TYPE'] = $type_rentId;
}

if (!empty($_GET['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_GET['priceDO'];
}
if (!empty($_GET['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_GET['priceOT'];
}

if (!empty($_GET['squareOT'])) {
    $list_array['filter']['>=UF_TOTAL_AREA'] = (int)$_GET['squareOT'];
}
if (!empty($_GET['squareDO'])) {
    $list_array['filter']['<=UF_TOTAL_AREA'] = $_GET['squareDO'];
}

if (!empty($_GET['floorOT']) && $_GET['nefirst'] == 'undefined') {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_GET['floorOT'];

} elseif (empty($_GET['floorOT']) && $_GET['nefirst'] == 'on') {
    $list_array['filter']['>UF_FLOOR_LEVEL'] = 1;
} elseif ($_GET['nefirst'] == 'on' && $_GET['floorOT'] > 1) {
    $list_array['filter']['>=UF_FLOOR_LEVEL'] = $_GET['floorOT'];
}

if (!empty($_GET['floorDO'])) {
    $list_array['filter']['<=UF_FLOOR_LEVEL'] = $_GET['floorDO'];

}
if (!empty($_GET['selectPrice'])) {
    $list_array['order'] = array("UF_PRICE" => $_GET['selectPrice']);
}
if (!empty($_GET['selectDate'])) {
    $list_array['order'] = array("UF_DATA" => $_GET['selectDate']);
}


if (!empty($_GET['number_of_rooms'])) {
    $number_of_rooms = explode(",", $_GET['number_of_rooms']);
}


$rsData = $entity_data_class_real_estate::getList($list_array);
while ($el = $rsData->fetch()) {
    if ($el['UF_DEAL_TYPE'] == $_GET['type_deal']) {
        if ($number_of_rooms) {
            if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                if ($_GET['nelast'] == 'on') {
                    if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                        $arRealEstate[] = $el;
                    }
                } else {
                    $arRealEstate[] = $el;
                }
            }
        } else {
            if ($_GET['nelast'] == 'on') {
                if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                    $arRealEstate[] = $el;
                }
            } else {

                $arRealEstate[] = $el;
            }
        }
    } elseif ($el['UF_RENT_TYPE'] == $_GET['type_deal']) {
        if ($number_of_rooms) {
            if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                if ($_GET['nelast'] == 'on') {
                    if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                        $arRealEstate[] = $el;
                    }
                } else {
                    $arRealEstate[] = $el;
                }
            }
        } else {
            if ($_GET['nelast'] == 'on') {
                if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                    $arRealEstate[] = $el;
                }
            } else {
                $arRealEstate[] = $el;
            }
        }
    } elseif ($_GET['type_deal'] == '68,69') {
        if ($el['UF_DEAL_TYPE'] == 68 || $el['UF_DEAL_TYPE'] == 69) {
            if ($number_of_rooms) {
                if (in_array($el['UF_NUMBER_OF_ROOMS'], $number_of_rooms)) {
                    if ($_GET['nelast'] == 'on') {
                        if ($el['UF_FLOOR_LEVEL_MAX'] != $el['UF_FLOOR_LEVEL']) {
                            $arRealEstate[] = $el;
                        }
                    } else {
                        $arRealEstate[] = $el;
                    }
                }
            } else {
                $arRealEstate[] = $el;
            }
        }
    } elseif ($_GET['type_deal'] == 'все') {
        $arRealEstate[] = $el;
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


function userFieldEnum1($id): array
{
    $arr = [];
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        $arr[] = $ob;
    };
    return $arr;
}

$arRegion = userFieldEnum1(196);
$arCategory = userFieldEnum1(201);
$arNumRooms = userFieldEnum1(198);
$arTypeObj = userFieldEnum1(197);
$arTypeHouse = userFieldEnum1(202);
$arSellers = userFieldEnum1(203);
$arTypeRent = userFieldEnum1(200);
?>

<main class="main main--hidden">
    <section class="property-map">
        <div class="property-map__top">
            <a class="property-map__link "
               href="?type_deal=66" <?= $_GET['type_deal'] == 66 ? 'style="background-color: #4067f0;color: #fff;"' : '' ?>>
                Купить
            </a>

            <a class="property-map__link"
               href="?type_deal=67&type_rent=На длительный срок"<?= $_GET['type_deal'] == 67 && $_GET['type_rent'] == 'На длительный срок' ? 'style="background-color: #4067f0;color: #fff;"' : '' ?>>
                Снять
            </a>

            <a class="property-map__link"
               href="?type_deal=71" <?= $_GET['type_deal'] == 71 ? 'style="background-color: #4067f0;color: #fff;"' : '' ?>>
                Посуточно
            </a>


            <!--            <a class="property-map__link property-map__link--short" href="#">-->
            <!--                Площадь-->
            <!--            </a>-->

            <a class="property-map__link property-map__link--more" href="#">
                Еще фильтры
            </a>

            <a class="property-map__link-mob property-map__link-mob--filter">
                <svg class="property-map__link-img" width="4rem" height="4rem" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M22.75 17.5C22.75 17.91 22.41 18.25 22 18.25H15V18.5C15 20 14.1 20.5 13 20.5H7C5.9 20.5 5 20 5 18.5V18.25H2C1.59 18.25 1.25 17.91 1.25 17.5C1.25 17.09 1.59 16.75 2 16.75H5V16.5C5 15 5.9 14.5 7 14.5H13C14.1 14.5 15 15 15 16.5V16.75H22C22.41 16.75 22.75 17.09 22.75 17.5Z"
                            fill="#4067F0"/>
                    <path
                            d="M22.75 6.5C22.75 6.91 22.41 7.25 22 7.25H19V7.5C19 9 18.1 9.5 17 9.5H11C9.9 9.5 9 9 9 7.5V7.25H2C1.59 7.25 1.25 6.91 1.25 6.5C1.25 6.09 1.59 5.75 2 5.75H9V5.5C9 4 9.9 3.5 11 3.5H17C18.1 3.5 19 4 19 5.5V5.75H22C22.41 5.75 22.75 6.09 22.75 6.5Z"
                            fill="#4067F0"/>
                </svg>

                Фильтры
            </a>

            <a class="property-map__link-mob property-map__link-mob--save">
                <svg class="property-map__link-img" width="4rem" height="4rem" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_406_15482)">
                        <path
                                d="M18.5273 19.167C18.3623 19.167 18.1973 19.1028 18.0781 18.9837L16.3731 17.2787C16.1256 17.0312 16.1256 16.6278 16.3731 16.3712C16.6206 16.1237 17.024 16.1237 17.2806 16.3712L18.9856 18.0762C19.2331 18.3237 19.2331 18.727 18.9856 18.9837C18.8573 19.1028 18.6923 19.167 18.5273 19.167Z"
                                fill="#4067F0" stroke="#4067F0"/>
                        <path
                                d="M9.4502 1.19995C4.89967 1.19995 1.2002 4.89943 1.2002 9.44995C1.2002 14.0005 4.89967 17.7 9.4502 17.7C14.0007 17.7 17.7002 14.0005 17.7002 9.44995C17.7002 4.89943 14.0007 1.19995 9.4502 1.19995Z"
                                fill="#4067F0"/>
                        <path
                                d="M9.69026 13.2668C9.55936 13.3113 9.34376 13.3113 9.21286 13.2668C8.09636 12.8997 5.60156 11.3684 5.60156 8.77289C5.60156 7.62716 6.56021 6.7002 7.74216 6.7002C8.44286 6.7002 9.06271 7.02649 9.45156 7.53076C9.84041 7.02649 10.4641 6.7002 11.161 6.7002C12.3429 6.7002 13.3016 7.62716 13.3016 8.77289C13.3016 11.3684 10.8068 12.8997 9.69026 13.2668Z"
                                fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_406_15482">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                Сохранить
            </a>

            <a class="property-map__link-mob property-map__link-mob--list">
                <svg class="property-map__link-img" width="3.6rem" height="3.6rem" viewBox="0 0 18 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M14.925 10.125H3.075C1.95 10.125 1.5 10.605 1.5 11.7975V14.8275C1.5 16.02 1.95 16.5 3.075 16.5H14.925C16.05 16.5 16.5 16.02 16.5 14.8275V11.7975C16.5 10.605 16.05 10.125 14.925 10.125Z"
                            fill="#4067F0"/>
                    <path
                            d="M9.675 1.5H3.075C1.95 1.5 1.5 1.98 1.5 3.1725V6.2025C1.5 7.395 1.95 7.875 3.075 7.875H9.675C10.8 7.875 11.25 7.395 11.25 6.2025V3.1725C11.25 1.98 10.8 1.5 9.675 1.5Z"
                            fill="#4067F0"/>
                </svg>

                Список
            </a>

            <form class="property-map__search" action="#">
                <input class="property-map__input controls" id="pac-input" type="text"
                       placeholder="Город, адрес, район, ж/д, шоссе или ЖК">

                <a class="property-map__search-btn" href="#">
                    <svg viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M8.11 14.4856C11.7606 14.4856 14.72 11.5262 14.72 7.87562C14.72 4.22502 11.7606 1.26562 8.11 1.26562C4.4594 1.26562 1.5 4.22502 1.5 7.87562C1.5 11.5262 4.4594 14.4856 8.11 14.4856Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.1103 15.8769L14.7188 14.4854" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
            </form>

            <a class="property-map__save" href="#">
                <div class="property-map__save-img">
                    <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                                stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                Сохранить поиск
            </a>
        </div>

        <div class="property-map__inner">
            <div class="property-map__left">
                <div class="property-map__amount">
                    <span class="property-map__num">4</span> объявления
                </div>
                <div class="wrapper-filter">
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
            </div>

            <div id="map">
                <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

                <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
                        defer
                ></script>
                <script>

                    const rem = function (rem) {
                        if ($(window).width() > 768) {
                            console.log($(window).width());
                            let marg = 0.005208335 * $(window).width() * rem;
                            return marg;
                        } else {
                            let marg = (100 / 375) * (0.1 * $(window).width()) * rem;
                            return marg;
                        }
                    };

                    function createCenterControl(map) {
                        const btnNav = document.createElement("button");

                        // Set CSS for the control.
                        btnNav.innerHTML = `
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10L20 1L11 20L9 12L1 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        `
                        btnNav.className = 'btn-location'
                        btnNav.style.width = "40px";
                        btnNav.style.height = "40px";
                        btnNav.style.marginBottom = "4.5rem";
                        btnNav.style.backgroundColor = "#4067F0";
                        btnNav.style.display = "flex";
                        btnNav.style.alignItems = "center";
                        btnNav.style.justifyContent = "center";
                        btnNav.style.borderRadius = "50%";
                        btnNav.style.cursor = "pointer";
                        btnNav.title = "location";
                        btnNav.type = "button";
                        // Setup the click event listeners: simply set the map to Chicago.
                        btnNav.addEventListener("click", () => {
                            map.setCenter(chicago);
                        });
                        return btnNav;
                    }

                    function createListControl(map) {
                        const btnList = document.createElement("button");
                        const btnContainer = document.createElement("div");
                        const btnText = document.createElement("span");

                        // Set CSS for the control.
                        btnText.textContent = 'Список'
                        btnText.className = 'map--list_text'

                        btnList.innerHTML = `
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.11 13.25H3.89C2.54 13.25 2 13.826 2 15.257V18.893C2 20.324 2.54 20.9 3.89 20.9H18.11C19.46 20.9 20 20.324 20 18.893V15.257C20 13.826 19.46 13.25 18.11 13.25Z" stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.11 2H3.89C2.54 2 2 2.576 2 4.007V7.643C2 9.074 2.54 9.65 3.89 9.65H18.11C19.46 9.65 20 9.074 20 7.643V4.007C20 2.576 19.46 2 18.11 2Z" stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        `
                        btnContainer.className = 'map--list_btn'
                        btnContainer.style.width = "153px";
                        btnContainer.style.height = "50px";
                        btnContainer.style.marginBottom = "4.5rem";
                        btnContainer.style.backgroundColor = "#ffffff";
                        btnContainer.style.display = "flex";
                        btnContainer.style.alignItems = "center";
                        btnContainer.style.justifyContent = "center";
                        btnContainer.style.gap = "11px";
                        btnContainer.style.borderRadius = "3.5rem";
                        btnContainer.style.cursor = "pointer";
                        btnContainer.title = "list";
                        // Setup the click event listeners: simply set the map to Chicago.
                        btnContainer.appendChild(btnList)
                        btnContainer.appendChild(btnText)

                        btnContainer.addEventListener("click", () => {
                            map.setCenter(chicago);
                        });
                        return btnContainer;
                    }


                    function initAutocomplete() {
                        const myLatlng = new google.maps.LatLng(<?= $arRealEstate['0']['UF_GEO'] ?>);
                        const map = new google.maps.Map(document.getElementById("map"), {
                            center: myLatlng,
                            zoom: 10,
                            mapTypeId: "roadmap",
                            disableDefaultUI: true, // Отключаем стандартные элементы управления
                            zoomControl: true, // Включаем только элемент управления масштабом
                            zoomControlOptions: {
                                position: google.maps.ControlPosition.RIGHT_BOTTOM // Позиционируем элемент управления масштабом в правом нижнем углу
                            },
                        });

                        const infoWindow = new google.maps.InfoWindow({
                            content: "",
                            disableAutoPan: true,
                        });
                        const markers = locations.map(([id, position, title], i) => {
                            const marker = new google.maps.Marker({
                                position,
                                title: title,
                                icon: {
                                    url: '../local/templates/stendu/images/placemark.png', 
                                    scaledSize: new google.maps.Size(rem(4.2), rem(4.2)) // Размер маркера
                                },
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

                        /*location btn*/
                        const centerControlDiv = document.createElement("div");
                        // Create the control.
                        const centerControl = createCenterControl(map);

                        // Append the control to the DIV.
                        centerControlDiv.appendChild(centerControl);
                        centerControlDiv.className = 'map--location_container'
                        centerControlDiv.style.margin = '10px'
                        map.controls[google.maps.ControlPosition.BOTTOM_RIGHT].push(centerControlDiv);
                        /*list btn*/ 
                        const listControlDiv = document.createElement("div");
                        // Create the control.
                        const topControl = createListControl(map);

                        // Append the control to the DIV.
                        listControlDiv.appendChild(topControl);
                        listControlDiv.className = 'map--list_container'
                        listControlDiv.style.margin = '10px'
                        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(listControlDiv);
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
                        [<?=$item['ID']?>, {lat: <?=$coor[0]?>, lng: <?=$coor[1]?>}, '<div class="map-block-item">' +
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
        </div>
    </section>
</main>
<div class="announcement-modal">
    <div class="announcement-modal__inner">
        <div class="announcement-modal__left">
            <img class="announcement-modal__img"
                 src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/appearance-photo.png" alt="">
        </div>

        <div class="announcement-modal__boundary"></div>

        <div class="announcement-modal__right">
            <div class="announcement-modal__title">
                Пользователь увдит объявление <span>Часы Tangente Sport Neomatik Automatic</span> сразу после проверки.
            </div>

            <div class="announcement-modal__text">
                Обычно она занимает пару минут, в редких случаях нам нужно больше времени.
            </div>

            <a class="announcement-modal__up href=" #"">
            Поднять просмотры
            </a>

            <a class="announcement-modal__close" href="#"></a>
        </div>
    </div>
</div>

<div class="categories-modal">
    <div class="categories-modal__inner">
        <div class="categories-modal__left">
            <ul class="categories-modal__items">
                <li class="categories-modal__item">
                    <button class="categories-modal__btn categories-modal__btn--active link" type="button">
                        <span class="link__text">Авто</span>

                        <div class="link__btn"></div>
                    </button>
                </li>
                <li class="categories-modal__item">
                    <button class="categories-modal__btn link" type="button">
                        <span class="link__text">Недвижимость</span>

                        <div class="link__btn"></div>
                    </button>
                </li>

                <li class="categories-modal__item">
                    <button class="categories-modal__btn link" type="button">
                        <span class="link__text">Личные вещи</span>

                        <div class="link__btn"></div>
                    </button>
                </li>
                <li class="categories-modal__item">
                    <button class="categories-modal__btn link" type="button">
                        <span class="link__text">Услуги</span>

                        <div class="link__btn"></div>
                    </button>
                </li>
                <li class="categories-modal__item">
                    <button class="categories-modal__btn link" type="button">
                        <span class="link__text">Работа</span>

                        <div class="link__btn"></div>
                    </button>
                </li>
            </ul>
        </div>

        <div class="categories-modal__right">
            <ul class="categories-modal__list categories-modal__list--active">
                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category1.png"
                             alt="">

                        <div class="categories-modal__text">
                            Легковые авто
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                             alt="">

                        <div class="categories-modal__text">
                            Запчасти и аксессуары
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                             alt="">

                        <div class="categories-modal__text">
                            Мото
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                             alt="">

                        <div class="categories-modal__text">
                            Коммерческий транспорт
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                             alt="">

                        <div class="categories-modal__text">
                            Водный транспорт
                        </div>
                    </a>
                </li>
            </ul>

            <ul class="categories-modal__list">
                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                             alt="">

                        <div class="categories-modal__text">
                            Запчасти и аксессуары
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                             alt="">

                        <div class="categories-modal__text">
                            Мото
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                             alt="">

                        <div class="categories-modal__text">
                            Коммерческий транспорт
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                             alt="">

                        <div class="categories-modal__text">
                            Водный транспорт
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="categories-modal__list">
                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category1.png"
                             alt="">

                        <div class="categories-modal__text">
                            Легковые авто
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                             alt="">

                        <div class="categories-modal__text">
                            Запчасти и аксессуары
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                             alt="">

                        <div class="categories-modal__text">
                            Мото
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                             alt="">

                        <div class="categories-modal__text">
                            Коммерческий транспорт
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="categories-modal__list">
                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category1.png"
                             alt="">

                        <div class="categories-modal__text">
                            Легковые авто
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                             alt="">

                        <div class="categories-modal__text">
                            Запчасти и аксессуары
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                             alt="">

                        <div class="categories-modal__text">
                            Коммерческий транспорт
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                             alt="">

                        <div class="categories-modal__text">
                            Водный транспорт
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="categories-modal__list">
                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category1.png"
                             alt="">

                        <div class="categories-modal__text">
                            Легковые авто
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                             alt="">

                        <div class="categories-modal__text">
                            Запчасти и аксессуары
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                             alt="">

                        <div class="categories-modal__text">
                            Мото
                        </div>
                    </a>
                </li>

                <li class="categories-modal__elem">
                    <a href="#" class="categories-modal__link">
                        <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                             alt="">

                        <div class="categories-modal__text">
                            Водный транспорт
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<? //
//$APPLICATION->IncludeComponent(
//    "nedvizhimost:nedvizhimost.map",
//    "map",
//    false
//); ?>



<form class="map-filter">
    <div class="map-filter__inner">
        <a href="#" class="map-filter__close">

        </a>

        <div class="map-filter__title">
            Еще фильтры
        </div>

        <ul class="map-filter__items">
            <li class="filter__item">
                <div class="info__select">
                    <input class="info__select-input" name="region" readonly placeholder="Регион"
                           type="text" value="">

                    <ul class="info__list">
                        <li class="info__box">
                            <button class="info__elem" type="button">Все</button>
                        </li>
                        <? foreach ($arRegion as $arIts): ?>
                            <li class="info__box">
                                <button class="info__elem"
                                        type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                            </li>
                        <? endforeach ?>
                </div>
            </li>
            <? if ($_GET['type_deal'] == 67 && $_GET['type_rent'] == 'На длительный срок'): ?>
                <li class="filter__item">
                    <div class="info__select">
                        <input class="info__select-input" name="type_rent" readonly placeholder="Срок аренды"
                               type="text" value="На длительный срок">

                        <ul class="info__list">
                            <li class="info__box">
                                <button class="info__elem" type="button">Все</button>
                            </li>
                            <? foreach ($arTypeRent as $arIts): ?>
                                <li class="info__box">
                                    <button class="info__elem"
                                            type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                </li>
                            <? endforeach ?>
                    </div>

                </li>
            <? endif; ?>
            <li class="map-filter__item">
                <div class="map-filter__subtitle">
                    Количество комнат
                </div>

                <div class="map-filter__wrapper">
                    <? foreach ($arNumRooms as $arIts): ?>
                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox" name="num_rooms"
                                   value="<?= $arIts['ID'] ?>">

                            <span class="map-filter__checkbox-text">
                            <?= $arIts['VALUE'] ?? '' ?>
                          </span>
                        </label>
                    <? endforeach ?>


                </div>
            </li>
            <li class="filter__item filter__item--range">
                <div class="filter__subtitle">Цена</div>

                <input class="filter__input" name="priceOT" type="number" placeholder="от">

                <input class="filter__input" name="priceDO" type="number" placeholder="до">
            </li>
            <li class="map-filter__item">
                <div class="map-filter__subtitle">
                    Продавцы
                </div>
                <? foreach ($arSellers as $arIts): ?>
                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox" name="sellers">

                        <span class="map-filter__checkbox-text">
                          <?= $arIts['VALUE'] ?? '' ?>
                        </span>


                    </label>
                <? endforeach ?>
            </li>
            <li class="filter__item">
                <div class="info__select">
                    <input class="info__select-input" name="category" readonly placeholder="Тип жилья"
                           type="text" value="">

                    <ul class="info__list">
                        <li class="info__box">
                            <button class="info__elem" type="button">Все</button>
                        </li>
                        <? foreach ($arCategory as $arIts): ?>
                            <li class="info__box">
                                <button class="info__elem"
                                        type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                            </li>
                        <? endforeach ?>
                </div>
            </li>
            <li class="map-filter__item">
                <div class="map-filter__subtitle">
                    Вид объекта
                </div>

                <ul class="map-filter__list">
                    <li class="map-filter__elem">
                        <label class="map-filter__label">
                            <input class="map-filter__radio" name="type_of_obj" type="radio" checked value="">

                            <span class="map-filter__radio-text">Все</span>
                        </label>
                    </li>

                    <li class="map-filter__elem">
                        <label class="map-filter__label">
                            <input class="map-filter__radio" name="type_of_obj" type="radio">

                            <span class="map-filter__radio-text">Вторичка</span>
                        </label>
                    </li>

                    <li class="map-filter__elem">
                        <label class="map-filter__label">
                            <input class="map-filter__radio" name="type_of_obj" type="radio">

                            <span class="map-filter__radio-text">Новостройка</span>
                        </label>
                    </li>
                </ul>
            </li>

            <li class="map-filter__item">
                <div class="map-filter__subtitle">
                    Этаж
                </div>

                <input class="map-filter__number map-filter__number-min" name="floorOT" placeholder="от" type="number">

                <input class="map-filter__number map-filter__number--max" name="floorDO" placeholder="до" type="number">

                <label class="map-filter__label">
                    <input class="map-filter__checkbox" type="checkbox" name="nefirst">

                    <span class="map-filter__checkbox-text">
              не первый
            </span>
                </label>

                <label class="map-filter__label">
                    <input class="map-filter__checkbox" type="checkbox" name="nelast">

                    <span class="map-filter__checkbox-text">
              не последний
            </span>
                </label>
            </li>
            <li class="filter__item filter__item--range">
                <div class="filter__subtitle">Общая площадь</div>

                <input class="filter__input" name="squareOT" type="number" placeholder="от">

                <input class="filter__input" name="squareDO" type="number" placeholder="до">
            </li>
            <li class="map-filter__item">
                <div class="map-filter__subtitle">
                    Тип дома
                </div>

                <div class="map-filter__wrapper">
                    <? foreach ($arTypeHouse as $arIts): ?>
                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" name="type_of_houses" type="checkbox" value="<?= $arIts['ID'] ?>">

                            <span class="map-filter__checkbox-text">
                            <?= $arIts['VALUE'] ?? '' ?>
                          </span>
                        </label>
                    <? endforeach ?>


                </div>
            </li>

        </ul>

        <div class="map-filter__bottom">
            <input class="map-filter__submit" datatype="<?= $_GET['type_deal'] ?>" value="Показать объекты"
                   type="submit">

            <input class="map-filter__reset" value="Сбросить фильтры" type="reset">
        </div>
    </div>
</form>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/swiper-bundle.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.nice-select.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-ui.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/main2.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/chat.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/dev-property.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/vladek.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/main.1c9efcdf.js"></script>