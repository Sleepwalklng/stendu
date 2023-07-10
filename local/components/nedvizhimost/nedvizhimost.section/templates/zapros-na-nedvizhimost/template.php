<?php
use RealEstate\Components\RealEstateSection;
use lib\GetUserData;

$arRealEstate = $arResult;

$type_deal = 69;
//$arRegion = userFieldEnum(196);
//$arCategory = userFieldEnum(201);
//$arNumRooms = userFieldEnum(198);
//$arTypeObj = userFieldEnum(197);
//$arTypeHouse = userFieldEnum(202);
//$arSellers = userFieldEnum(203);
//$arTypeRent = userFieldEnum(200);
$arSellers = RealEstateSection::getFieldEnum(203);
$UF_TYPE_OF_RS = RealEstateSection::getFieldEnum(277);
$UF_TYPE = RealEstateSection::getFieldEnum(273);
$UF_DEAL_TYPE = RealEstateSection::getFieldEnum(199);
$UF_REQUEST_FOR_PROPERTY = RealEstateSection::getFieldEnum(453);


$UF_DEAL_TYPE[0]['VALUE'] = 'Купить';
$UF_DEAL_TYPE[1]['VALUE'] = 'Снять';
$UF_DEAL_TYPE[2]['VALUE'] = 'Посуточно';

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
<div class="inner inner--property"></div>

<main class="main main--hidden  ">
    <section class="data">
        <div class="container">
            <div class="data__title data__title--property title">
                <span class="data__title-categories">Недвижимость</span>

                <img class="data__title-img" src="<?= SITE_TEMPLATE_PATH ?>/images/date-title2.png"
                     alt="Недвижимость">

                <span class="data__title-text">в Риге</span>
            </div>

            <div class="data__subtitle">
                Продажа 1-комнатных квартир в Риге
            </div>

            <div class="data__offers">
                <? echo(count($arRealEstate)); ?> предложений
            </div>

            <ul class="data__categories data__categories_estate data__categories--property">
                <li class="data__categories-item ">
                    <a href="/<?=LANGUAGE_ID?>/nedvizhimost/kupit" class="data__categories-label">
                        <img class="data__categories-img" src="<?= SITE_TEMPLATE_PATH ?>/images/property-data1.png"
                             alt="Купить">

                        <input class="data__radio" type="radio" name="categories" checked>

                        <div class="data__text">Купить</div>
                    </a>
                </li>

                <li class="data__categories-item">
                    <a href="/<?=LANGUAGE_ID?>/nedvizhimost/snyat" class="data__categories-label">
                        <img class="data__categories-img" src="<?= SITE_TEMPLATE_PATH ?>/images/property-data2.png"
                             alt="Снять">

                        <input class="data__radio" type="radio" name="categories">

                        <div class="data__text">Снять</div>
                    </a>
                </li>

                <li class="data__categories-item">
                    <a href="/<?=LANGUAGE_ID?>/nedvizhimost/posutochno" class="data__categories-label">
                        <img class="data__categories-img data__categories-img--fit"
                             src="<?= SITE_TEMPLATE_PATH ?>/images/property-data3.png" alt="Посуточно">

                        <input class="data__radio" type="radio" name="categories">

                        <div class="data__text">Посуточно</div>
                    </a>
                </li>

                <li class="data__categories-item  data__categories-item--short data__categories-item--active">
                    <a href="/<?=LANGUAGE_ID?>/nedvizhimost/zapros-na-nedvizhimost" class="data__categories-label">
                        <img class="data__categories-img data__categories-img--fit"
                             src="<?= SITE_TEMPLATE_PATH ?>/images/property-data4.png" alt="Запрос на недвижимость">

                        <input class="data__radio" type="radio" name="categories">

                        <div class="data__text">Запрос на недвижимость</div>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="map" style="margin-bottom: 4rem;">

        <!--            <div class="container">-->
        <!---->
        <!--                <div id="map"></div>-->
        <!---->
        <!--                <a class="map__btn" href="#">Объявления на карте</a>-->
        <!--            </div>-->
    </section>

    <section class="announcements announcements--property">
        <div class="container">
            <div class="announcements__top">
                <div class="announcements__title title">
                    Все объявления
                </div>

                <a class="announcements__btn announcements__btn--filter">
                    <svg class="announcements__btn-img" width="4.8rem" height="4.8rem" viewBox="0 0 24 24"
                         fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M22.75 17.5C22.75 17.91 22.41 18.25 22 18.25H15V18.5C15 20 14.1 20.5 13 20.5H7C5.9 20.5 5 20 5 18.5V18.25H2C1.59 18.25 1.25 17.91 1.25 17.5C1.25 17.09 1.59 16.75 2 16.75H5V16.5C5 15 5.9 14.5 7 14.5H13C14.1 14.5 15 15 15 16.5V16.75H22C22.41 16.75 22.75 17.09 22.75 17.5Z"
                                fill="#4067F0"/>
                        <path
                                d="M22.75 6.5C22.75 6.91 22.41 7.25 22 7.25H19V7.5C19 9 18.1 9.5 17 9.5H11C9.9 9.5 9 9 9 7.5V7.25H2C1.59 7.25 1.25 6.91 1.25 6.5C1.25 6.09 1.59 5.75 2 5.75H9V5.5C9 4 9.9 3.5 11 3.5H17C18.1 3.5 19 4 19 5.5V5.75H22C22.41 5.75 22.75 6.09 22.75 6.5Z"
                                fill="#4067F0"/>
                    </svg>

                    Фильтры
                </a>

                <a class="announcements__btn announcements__btn--save">
                    <svg class="announcements__btn-img" width="4rem" height="4rem" viewBox="0 0 20 20" fill="none"
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

                <a class="announcements__btn announcements__btn--map">
                    <svg class="announcements__btn-img" width="4rem" height="4rem" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_406_15482)">
                            <path
                                    d="M7.50781 6.05371C7.01781 6.05371 6.63281 6.44746 6.63281 6.92871C6.63281 7.40996 7.02656 7.80371 7.50781 7.80371C7.98906 7.80371 8.38281 7.40996 8.38281 6.92871C8.38281 6.44746 7.98906 6.05371 7.50781 6.05371Z"
                                    fill="#4067F0"/>
                            <path
                                    d="M18.2775 3.91C17.5425 2.20375 15.9238 1.25 13.6663 1.25H6.33375C3.525 1.25 1.25 3.525 1.25 6.33375V13.6662C1.25 15.9237 2.20375 17.5425 3.91 18.2775C4.07625 18.3475 4.26875 18.3037 4.39125 18.1812L18.1813 4.39125C18.3125 4.26 18.3562 4.0675 18.2775 3.91ZM8.71375 10.21C8.3725 10.5425 7.92625 10.7 7.48 10.7C7.03375 10.7 6.5875 10.5337 6.24625 10.21C5.35375 9.37 4.37375 8.03125 4.75 6.43875C5.0825 4.995 6.36 4.3475 7.48 4.3475C8.6 4.3475 9.8775 4.995 10.21 6.4475C10.5775 8.03125 9.5975 9.37 8.71375 10.21Z"
                                    fill="#4067F0"/>
                            <path
                                    d="M16.5353 17.4638C16.7278 17.6563 16.7016 17.9713 16.4653 18.1026C15.6953 18.5313 14.7591 18.7501 13.6653 18.7501H6.3328C6.07905 18.7501 5.97405 18.4526 6.14905 18.2776L11.4341 12.9926C11.6091 12.8176 11.8803 12.8176 12.0553 12.9926L16.5353 17.4638Z"
                                    fill="#4067F0"/>
                            <path
                                    d="M18.75 6.33378V13.6663C18.75 14.76 18.5313 15.705 18.1025 16.4663C17.9713 16.7025 17.6563 16.72 17.4638 16.5363L12.9838 12.0563C12.8088 11.8813 12.8088 11.61 12.9838 11.435L18.2688 6.15003C18.4525 5.97503 18.75 6.08003 18.75 6.33378Z"
                                    fill="#4067F0"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_406_15482">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>

                    На карте
                </a>

                <a class="announcements__btn announcements__btn--sort">
                    <svg class="announcements__btn-img" width="3rem" height="3rem" viewBox="0 0 15 15" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M11.8819 5.92C13.5166 5.92 14.8419 4.59476 14.8419 2.96C14.8419 1.32524 13.5166 0 11.8819 0C10.2471 0 8.92188 1.32524 8.92188 2.96C8.92188 4.59476 10.2471 5.92 11.8819 5.92Z"
                                fill="#4067F0"/>
                        <path
                                d="M2.96 5.92C4.59476 5.92 5.92 4.59476 5.92 2.96C5.92 1.32524 4.59476 0 2.96 0C1.32524 0 0 1.32524 0 2.96C0 4.59476 1.32524 5.92 2.96 5.92Z"
                                fill="#4067F0"/>
                        <path
                                d="M11.8819 14.8399C13.5166 14.8399 14.8419 13.5147 14.8419 11.8799C14.8419 10.2452 13.5166 8.91992 11.8819 8.91992C10.2471 8.91992 8.92188 10.2452 8.92188 11.8799C8.92188 13.5147 10.2471 14.8399 11.8819 14.8399Z"
                                fill="#4067F0"/>
                        <path
                                d="M2.96 14.8399C4.59476 14.8399 5.92 13.5147 5.92 11.8799C5.92 10.2452 4.59476 8.91992 2.96 8.91992C1.32524 8.91992 0 10.2452 0 11.8799C0 13.5147 1.32524 14.8399 2.96 14.8399Z"
                                fill="#4067F0"/>
                    </svg>

                    Сортировка
                </a>

                <div class="form form-filter">
                    <div class="form__top">
                        <span class="form__text">Уточнить поиск</span>

                        <button class="form__close" type="button"></button>
                    </div>

                    <ul class="form__items">
                        <li class="form__wrapper">
                            <div class="form__group">
                                <div class="form__group-select">
                                    <input class="form__group-input" readonly value="Купить" type="text">
                                </div>

                                <ul class="form__list">
                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 1</button>
                                    </li>

                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 2</button>
                                    </li>

                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 3</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="form__group">
                                <div class="form__group-select">
                                    <input class="form__group-input" readonly value="Квартиры" type="text">
                                </div>

                                <ul class="form__list">
                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 1</button>
                                    </li>

                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 2</button>
                                    </li>

                                    <li class="form__box">
                                        <button class="form__elem" type="button">категория 3</button>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="form__item form__item--large">
                            <div class="form__subtitle">Количество комнат</div>

                            <div class="form__wrapper form__wrapper--wrap">
                                <label class="form__seller categories-btn">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">1</div>
                                </label>

                                <label class="form__seller categories-btn">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">2</div>
                                </label>

                                <label class="form__seller categories-btn">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">3</div>
                                </label>

                                <label class="form__seller categories-btn">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">4</div>
                                </label>

                                <label class="form__seller categories-btn categories-btn--last">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">5+</div>
                                </label>

                                <label class="form__seller categories-btn categories-btn--common">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">Студия</div>
                                </label>

                                <label class="form__seller categories-btn categories-btn--long">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">Свобод. планировка</div>
                                </label>
                            </div>
                        </li>

                        <li class="form__item">
                            <div class="form__subtitle">Вид объекта</div>

                            <div class="form__wrapper">
                                <label class="form__seller categories-btn">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">Все</div>
                                </label>

                                <label class="form__seller categories-btn categories-btn--common">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">Вторичка</div>
                                </label>

                                <label class="form__seller categories-btn categories-btn--common">
                                    <input class="form__seller-checkbox" type="checkbox">

                                    <div class="form__seller-text">Новострой</div>
                                </label>
                            </div>
                        </li>

                        <li class="form__item">
                            <div class="form__subtitle">Цена</div>

                            <div class="form__wrapper">
                                <label class="form__cost categories-btn">
                                    от

                                    <input class="form__cost-value" type="number">
                                </label>

                                <label class="form__cost categories-btn">
                                    до

                                    <input class="form__cost-value" type="number">
                                </label>
                            </div>
                        </li>

                        <li class="form__item">
                            <div class="form__subtitle">Общая площадь</div>

                            <div class="form__wrapper">
                                <label class="form__cost categories-btn">
                                    от

                                    <input class="form__cost-value" type="number">
                                </label>

                                <label class="form__cost categories-btn">
                                    до

                                    <input class="form__cost-value" type="number">
                                </label>
                            </div>
                        </li>

                        <li class="form__item">
                            <div class="form__subtitle">Где</div>

                            <div class="form__select">
                                <input class="form__select-input" readonly placeholder="Выбрать категорию"
                                       type="text">
                            </div>

                            <ul class="form__list">
                                <li class="form__box">
                                    <button class="form__elem" type="button">категория 1</button>
                                </li>

                                <li class="form__box">
                                    <button class="form__elem" type="button">категория 2</button>
                                </li>

                                <li class="form__box">
                                    <button class="form__elem" type="button">категория 3</button>
                                </li>
                            </ul>
                        </li>

                        <li class="form__item">
                            <div class="form__subtitle">Поиск по ключевым словам</div>

                            <input class="form__input" placeholder="Например, магазин" type="text">

                            <ul class="form__wrapper form__wrapper--space">
                                <li class="form__wrapper-box">
                                    <button class="form__btn" type="button">С животными</button>
                                </li>

                                <li class="form__wrapper-box">
                                    <button class="form__btn" type="button">С животными</button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a class="form__all">Показать 230 объявлений</a>

                    <a class="form__map">
                        <img class="form__map-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                             alt="Показать на карте">

                        Показать на карте
                    </a>

                </div>

                <div class="announcements__select">
                    <span>Дата: </span>
                    <span class="select-text">За всё время</span>
                    <input class="select-input" type="text" id="real_estate_select_date">
                    <ul class="announcements__select-list">
                        <li data-value="" class="announcements__select-list-item active">
                            За всё время
                        </li>
                        <li data-value="desc" class="announcements__select-list-item">
                            Сначала новые
                        </li>
                        <li data-value="asc" class="announcements__select-list-item">
                            Сначала старые
                        </li>
                    </ul>
                </div>
                <div class="announcements__select">
                    <span>Цена: </span>
                    <span class="select-text">По умолчанию</span>
                    <input class="select-input" type="text" id="real_estate_select_price">
                    <ul class="announcements__select-list">
                        <li data-value="" class="announcements__select-list-item active">
                            По умолчанию
                        </li>
                        <li data-value="asc" class="announcements__select-list-item">
                            По возрастанию
                        </li>
                        <li data-value="desc" class="announcements__select-list-item">
                            По убыванию
                        </li>
                    </ul>
                </div>

                <label class="announcements__format announcements__format--active">
                    <input class="announcements__radio" name="format" type="radio" checked>

                    <svg class="announcements__svg" width="26" height="26" viewBox="0 0 26 26" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M24 8.52V3.98C24 2.57 23.36 2 21.77 2H17.73C16.14 2 15.5 2.57 15.5 3.98V8.51C15.5 9.93 16.14 10.49 17.73 10.49H21.77C23.36 10.5 24 9.93 24 8.52Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M24 21.7602V17.7202C24 16.1302 23.36 15.4902 21.77 15.4902H17.73C16.14 15.4902 15.5 16.1302 15.5 17.7202V21.7602C15.5 23.3502 16.14 23.9902 17.73 23.9902H21.77C23.36 23.9902 24 23.3502 24 21.7602Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M10.5 21.7602V17.7202C10.5 16.1302 9.86 15.4902 8.27 15.4902H4.23C2.64 15.4902 2 16.1302 2 17.7202V21.7602C2 23.3502 2.64 23.9902 4.23 23.9902H8.27C9.86 23.9902 10.5 23.3502 10.5 21.7602Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </label>

                <label class="announcements__format announcements__format--justify" id="format-carts">
                    <input class="announcements__radio" name="format" type="radio">

                    <svg class="announcements__svg" width="24" height="25" viewBox="0 0 24 25" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M19.9 14.5H4.1C2.6 14.5 2 15.14 2 16.73V20.77C2 22.36 2.6 23 4.1 23H19.9C21.4 23 22 22.36 22 20.77V16.73C22 15.14 21.4 14.5 19.9 14.5Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M19.9 2H4.1C2.6 2 2 2.64 2 4.23V8.27C2 9.86 2.6 10.5 4.1 10.5H19.9C21.4 10.5 22 9.86 22 8.27V4.23C22 2.64 21.4 2 19.9 2Z"
                                stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </label>
            </div>

            <div class="announcements__inner">
                <div class="wrapper-filter">
                    <ul class="announcements__items">
                        <? foreach ($arRealEstate as $arItem): ?>
                            <li class="announcements__item cart <? if (in_array($arItem['ID'], $resultFav)) {
                                echo 'cart--favorite';
                            } ?>">
                                <a href="/<?=LANGUAGE_ID?>/nedvizhimost/zapros-na-nedvizhimost/<?= $arItem['UF_SESSION_CODE'] ?>/">
                                    <div class="cart__top">
                                        <div class="cart__inner">
                                            <ul class="cart__list swiper-wrapper">
                                                <? if (!empty($arItem['UF_PHOTOS'])): ?>
                                                    <? foreach ($arItem['UF_PHOTOS'] as $photo): ?>
                                                        <li class="cart__box swiper-slide">
                                                            <img class="cart__img"
                                                                 src="<?= CFile::GetPath($photo) ?>"
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
                                                    <?= $arItem['UF_NAME'] ?? ''; ?>
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

                                                <div class="cart__date">
                                                    <?
                                                    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY HH:MI:SS")) {
                                                        echo FormatDate("j F Y H:i", $stmp);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="cart__info">
                                            <div class="cart__text">
                                                <?= $arItem['UF_DESCRIPTION'] ?? ''; ?>
                                            </div>

                                            <a class="cart__message btn-blue" href="#">
                                                <img class="cart__message-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                                     alt="Написать">

                                                Написать
                                            </a>

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

                                    <? $user = GetUserData::getUser((int)$arItem['UF_USER_ID']);?>
                                    <div class="cart__author">
                                        <div class="cart__name">
                                            <?=$user['NAME']?>
                                        </div>

                                        <div class="cart__reg-date">
                                            На Stendū с 12 ноября 2021
                                        </div>

                                        <div class="cart__tel">
                                            <img class="cart__tel-img" src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg"
                                                 alt="Позвонить">

                                            <div class="cart__tel-wrapper">
                                                <a class="cart__tel-show" href="#">
                                                    Показать телефон
                                                </a>

                                                <a class="cart__num" href="#">
                                                    <?=$user['PERSONAL_PHONE']?>
                                                </a>
                                            </div>
                                        </div>

                                        <a class="cart__message btn-blue" href="#">
                                            <img class="cart__message-img"
                                                 src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                                 alt="Написать">

                                            Написать
                                        </a>
                                    </div>
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <form class="filter announcements__filter-properity filter-real_estate">
                    <div class="filter__title">
                        Фильтр
                    </div>

                    <ul class="filter__items">
                        <li class="filter__item">
                            <div class="info__select">
                                <input class="info__select-input" name="UF_DEAL_TYPE" readonly id="deal-type"
                                       placeholder="Тип объявления"
                                       type="text"
                                       value="Запрос на недвижимость">

                                <ul class="info__list">
                                    <? foreach ($UF_DEAL_TYPE as $arIts):?>
                                        <li class="info__box deal-type"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </li>
                        <li class="filter__item " id="filter__item_request">
                            <div class="info__select">
                                <input class="info__select-input" name="UF_REQUEST_FOR_PROPERTY" readonly id="request-property"
                                       placeholder="Тип запроса на недвижимость"
                                       type="text">

                                <ul class="info__list">
                                    <? foreach ($UF_REQUEST_FOR_PROPERTY as $arIts):?>
                                        <li class="info__box request-prop"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </li>
                        <li class="filter__item disable-filter" id="filter__item_type_of_rs">
                            <div class="info__select">
                                <input class="info__select-input" name="UF_TYPE_OF_RS" readonly id="type_of_rs"
                                       placeholder="Вид недвижимости"
                                       type="text">

                                <ul class="info__list">
                                    <? foreach ($UF_TYPE_OF_RS as $arIts):?>
                                        <li class="info__box type_of_rs"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </li>

                        <li class="filter__item disable-filter" id="filter__item_type">
                            <div class="info__select">
                                <input class="info__select-input" name="UF_TYPE" readonly
                                       placeholder="Тип недвижимости"
                                       type="text">

                                <ul class="info__list">
                                    <? foreach ($UF_TYPE as $arIts): ?>
                                        <li class="info__box property-type"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </li>


                        <!--                            <li class="filter__item filter__item--range filter-price">-->
                        <!--                                <div class="filter__subtitle">Цена</div>-->
                        <!---->
                        <!--                                <input class="filter__input" name="priceOT" type="number" placeholder="от">-->
                        <!---->
                        <!--                                <input class="filter__input" name="priceDO" type="number" placeholder="до">-->
                        <!--                            </li>-->


                        <li class="filter__item filter-sellers">
                            <div class="info__select">
                                <input class="info__select-input" name="sellers" readonly placeholder="Продавцы"
                                       type="text">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem"
                                                type="button">Все
                                        </button>
                                    </li>
                                    <? foreach ($arSellers as $arIts): ?>
                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['VALUE'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <button class="filter__submit" type="submit" value="<?=$type_deal?>">
                        Показать <span class="filter__submit-count"><? echo(count($arRealEstate)); ?></span> объявлений
                    </button>

                    <a class="filter__link" href="#">
                        <img class="filter__link-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                             alt="Показать на карте">

                        Показать на карте
                    </a>
                </form>
            </div>
        </div>
    </section>
</main>
