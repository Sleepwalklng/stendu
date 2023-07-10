<?php
use PersonalItems\Components\PersonalItemsSection;
use lib\GetUserData;

//$arPersonalItems = $arResult;


const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES = 14;
$entity_data_class_personal_items_categories = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES);
$rsData = $entity_data_class_personal_items_categories::getList(array());
while ($el = $rsData->fetch()) {
    $categories[] = $el;
    if (!empty($_GET['categoryId']) and $_GET['categoryId'] == $el['ID']) {
        $categoriesFilterId = $el['UF_CATEGORIES'];
    }
}

const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER = 15;
$entity_data_class_personal_items_categories_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER);
$rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
while ($el = $rsDataCatFilter->fetch()) {
    if (!empty($categoriesFilterId)) {
        foreach ($categoriesFilterId as $id) {
            if ($id == $el['ID']) {
                $categoriesFilter[] = $el;
            }
        }

    } else {
        $categoriesFilter[] = $el;
    }

}

const MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER = 16;
const MY_HL_BLOCK_ID_COLOR_FILTER = 21;
const MY_HL_BLOCK_ID_CLOTHES_SIZE_FILTER = 22;
const MY_HL_BLOCK_ID_CLOTHES_CHILD_SIZE_FILTER = 25;
const MY_HL_BLOCK_ID_CLOTHES_MAN_SIZE_FILTER = 26;
const MY_HL_BLOCK_ID_MAN_FOOTS_SIZE_FILTER = 27;
const MY_HL_BLOCK_ID_CHILD_FOOTS_SIZE_FILTER = 24;
const MY_HL_BLOCK_ID_FOOTS_SIZE_FILTER = 23;
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR = 20;

function getFiltersHL($HL_BLOCK_ID):array{
    $arr=[];
    $entity_data_class = GetEntityDataClass($HL_BLOCK_ID);
    $rsDataTypeFilter = $entity_data_class::getList(array());
    while ($el = $rsDataTypeFilter->fetch()) {
        $arr[] = $el;
    }
    return $arr;
}
$outerwear = getFiltersHL(MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR);
$foSize = getFiltersHL(MY_HL_BLOCK_ID_FOOTS_SIZE_FILTER);
$foCHSize = getFiltersHL(MY_HL_BLOCK_ID_CHILD_FOOTS_SIZE_FILTER);
$foManSize = getFiltersHL(MY_HL_BLOCK_ID_MAN_FOOTS_SIZE_FILTER);
$clManSize = getFiltersHL(MY_HL_BLOCK_ID_CLOTHES_MAN_SIZE_FILTER);
$clCHSize = getFiltersHL(MY_HL_BLOCK_ID_CLOTHES_CHILD_SIZE_FILTER);
$clSize = getFiltersHL(MY_HL_BLOCK_ID_CLOTHES_SIZE_FILTER);
$color = getFiltersHL(MY_HL_BLOCK_ID_COLOR_FILTER);
$types = getFiltersHL(MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER);

const MY_HL_BLOCK_ID_PERSONAL_ITEMS = 13;
$entity_data_class_personal_items = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS);
$resPersonalItems = $entity_data_class_personal_items::getList(array('order' => array('ID' => 'DESC'), "filter" => array("UF_STATUS" => "24")));
while ($ob = $resPersonalItems->fetch()) {
    $ob['UF_PRICE'] = format_price($ob['UF_PRICE']);
    if (!empty($categoriesFilterId)) {
        foreach ($categoriesFilterId as $id) {
            if ($id == $ob['UF_CATEGORY']) {
                $arPersonalItems[] = $ob;
            }
        }

    } else {
        $arPersonalItems[] = $ob;
    }

}

$arRegion = PersonalItemsSection::getFieldEnum(232);

// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];

    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '5') {
            $resultFav[] = $el['1'];
        }
    }
}
?>

<div class="inner inner--hidden"></div>

<main class="main">
    <section class="data data--private">
        <div class="container">
            <div class="data__title title">
                <span class="data__title-categories">Личные вещи</span>

                <img class="data__title-img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-title3.png" alt="Личные вещи">

                <span class="data__title-text">в Риге</span>
            </div>

            <div class="data__offers">
                <? echo($entity_data_class_personal_items::getCount()); ?> предложений
            </div>

            <div class="data__wrapper">
                <ul class="data__categories data__categories--private">
                    <? foreach ($categories as $arIts):
                        $name = str_replace("</br>", "", $arIts["UF_NAME"]); ?>
                        <li class="data__categories-item personal-item <?= $_GET['categoryId'] == $arIts["ID"] ? 'data__categories-item--active' : '' ?>">
                            <a data-id="<?= $arIts["ID"] ?>"
                               data-name="<?= $name ?>"
                               class="data__categories-label personal_items_filter-category ">
                                <img class="data__categories-img"
                                     src="<?= CFile::GetPath($arIts['UF_PICTURE']) ?>"
                                     alt="<?= $arIts['UF_NAME'] ?>">

                                <input class="data__radio" type="radio" name="categories" checked>

                                <div class="data__text">
                                    <?= $arIts['UF_NAME'] ?>
                                </div>
                            </a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="announcements announcements--private">
        <div class="container">
            <div class="announcements__top">
                <div class="announcements__title title">
                    Все объявления
                </div>


                <a class="announcements__btn announcements__btn--filter">
                    <svg class="announcements__btn-img" width="4.8rem" height="4.8rem" viewBox="0 0 24 24" fill="none"
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
                <div class="announcements__filter">
                    <div class="announcements__select">
                        <span>Дата: </span>
                        <span class="select-text">За всё время</span>
                        <input class="select-input" type="text" id="personal_items_select_date">
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
                        <input class="select-input" type="text" id="personal_items_select_price">
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
                <div class="wrapper-filter" id="catalog">
                    <ul class="announcements__items">
                        <? foreach ($arPersonalItems as $arItem): ?>
                            <li class="announcements__item cart <? if (in_array($arItem['ID'], $resultFav)) {
                                echo 'cart--favorite';
                            } ?>">
                                <a href="/<?=LANGUAGE_ID?>/lichnye-veshchi/<?= $arItem['UF_SESSION_CODE'] ?>/">
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
                                                    <?= $arItem['UF_PRICE'] ?? '' ?>
                                                </div>
                                            </div>

                                            <div class="cart__right">
                                                <div class="cart__location">
                                                    <img class="cart__location-img"
                                                         src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                                         alt="местоположение">

                                                    <?= $arItem['UF_ADDRESS'] ?? '' ?>
                                                </div>

                                                <div class="cart__date">
                                                    <?
                                                    if ($stmp = MakeTimeStamp($arItem['UF_DATE'], "DD.MM.YYYY HH:MI:SS")) {
                                                        echo FormatDate("j F Y H:i", $stmp);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="cart__info">
                                            <div class="cart__text">
                                                <?= $arItem['UF_DESCRIPTION'] ?? '' ?>
                                            </div>

                                            <a class="cart__message btn-blue" href="#">
                                                <img class="cart__message-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                                     alt="Написать">

                                                Написать
                                            </a>

                                            <a class="cart__favorite" data-item="<?= $arItem['ID'] ?>" data-razdel="5">
                                                <img class="cart__favorite-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                                     alt="добавить в избранное">
                                                <img class="cart__favorite-img cart__favorite-img--active"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                                     alt="добавить в избранное">
                                            </a>
                                        </div>
                                    </div>
                                    <? $user = GetUserData::getUser((int)$arItem['UF_USER_ID']); ?>
                                    <div class="cart__author">
                                        <div class="cart__name">
                                            <?= $user['NAME'] ?>
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
                                                    <?= $user['PERSONAL_PHONE'] ?>
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

                <form class="filter announcements__filter-properity filter-personal_items">
                    <div class="filter__title">
                        Фильтр
                    </div>
                    <ul class="filter__items">
                        <!--                        <li class="filter__item">-->
                        <!--                            <div class="info__select">-->
                        <!--                                <input class="info__select-input" name="region" readonly placeholder="Регион"-->
                        <!--                                       type="text">-->
                        <!---->
                        <!--                                <ul class="info__list">-->
                        <!--                                    <li class="info__box">-->
                        <!--                                        <button class="info__elem"-->
                        <!--                                                type="button">Все-->
                        <!--                                        </button>-->
                        <!--                                    </li>-->
                        <!--                                    --><? // foreach ($arRegion as $arIts): ?>
                        <!--                                        <li class="info__box">-->
                        <!--                                            <button class="info__elem"-->
                        <!--                                                    type="button">-->
                        <? //= $arIts['VALUE'] ?? '' ?><!--</button>-->
                        <!--                                        </li>-->
                        <!--                                    --><? // endforeach ?>
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <li class="filter__item <?= !empty($_GET['categoryId']) ? 'disable-filter' : '' ?>"
                            id="filter__item_category0">

                            <div class="info__select ">
                                <input class="info__select-input" name="category" readonly
                                       placeholder="Что ищем?"
                                       type="text" id="select_category1">

                                <ul class="info__list" id="categories0">
                                    <? foreach ($categories as $arIts): ?>
                                        <li class="info__box main-categories"
                                            data-name="<?= $arIts['UF_NAME'] ?? '' ?>"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>
                        <li class="filter__item <?= empty($_GET['categoryId']) ? 'disable-filter' : '' ?>"
                            id="filter__item_category1">

                            <div class="info__select">
                                <input class="info__select-input" name="categoria" readonly
                                       placeholder="<?= $categoriesFilter[0]['UF_NAME'] ?>"
                                       type="text" id="select_category1">

                                <ul class="info__list" id="categories1">
                                    <? foreach ($categoriesFilter as $arIts): ?>
                                        <li class="info__box categories-categoria"
                                            data-name="<?= $arIts['UF_NAME'] ?? '' ?>"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter " id="filter__item_category2">
                            <div class="info__select">
                                <input class="info__select-input" name="type" readonly
                                       placeholder="<?= $types[0]['UF_NAME'] ?>" type="text" id="select_category2" data-id="">

                                <ul class="info__list">
                                    <? foreach ($types as $arIts): ?>

                                        <li class="info__box categories-outerwear"
                                            data-name="<?= $arIts['UF_NAME'] ?? '' ?>"
                                            data-id="<?= $arIts['ID'] ?? '' ?>">
                                            <button class="info__elem" data-id="<?= $arIts['ID'] ?? '' ?>"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>
                        <li class="filter__item disable-filter " id="filter__item_category3">

                            <div class="info__select">
                                <input class="info__select-input" name="outerwear" readonly
                                       placeholder="<?= $outerwear[0]['UF_NAME'] ?>" type="text" id="select_category3">

                                <ul class="info__list">
                                    <? foreach ($outerwear as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size">

                            <div class="info__select">
                                <input class="info__select-input" name="category_size" readonly
                                       placeholder="Размер одежды" type="text" id="select_category_size">
                                <ul class="info__list">
                                    <li class="info__box category_size category_size_all">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($clSize as $arIts): ?>

                                        <li class="info__box category_size">
                                            <button class="info__elem" data-id="<?= $arIts['ID'] ?>"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size_foot">

                            <div class="info__select">
                                <input class="info__select-input" name="size_foot" readonly
                                       placeholder="Размер обуви" type="text" id="select_size_foot">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($foSize as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_SIZE'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size_child">

                            <div class="info__select">
                                <input class="info__select-input" name="size_child" readonly
                                       placeholder="Размер одежды" type="text" id="select_size_child">
                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($clCHSize as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size_foot_child">

                            <div class="info__select">
                                <input class="info__select-input" name="size_foot_child" readonly
                                       placeholder="Размер обуви" type="text" id="category_size_foot_child">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($foCHSize as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_SIZE'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size_man">

                            <div class="info__select">
                                <input class="info__select-input" name="select_size_man" readonly
                                       placeholder="Размер одежды" type="text" id="select_size_man">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($clManSize as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_size_foot_man">

                            <div class="info__select">
                                <input class="info__select-input" name="size_foot_man" readonly
                                       placeholder="Размер обуви" type="text" id="category_size_foot_man">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($foManSize as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_SIZE'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item disable-filter dop_filter" id="filter__item_category_color">

                            <div class="info__select">
                                <input class="info__select-input" name="color" readonly
                                       placeholder="Цвет" type="text" id="select_color">

                                <ul class="info__list">
                                    <li class="info__box">
                                        <button class="info__elem" data-id="all" type="button">Все</button>
                                    </li>
                                    <? foreach ($color as $arIts): ?>

                                        <li class="info__box">
                                            <button class="info__elem"
                                                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
                                        </li>

                                    <? endforeach ?>
                                </ul>
                            </div>

                        </li>

                        <li class="filter__item filter__item--status">
                            <div class="filter__subtitle">Состояние</div>

                            <ul class="filter__inner">
                                <li class="filter__case">
                                    <label class="filter__label-radio filter__label-radio--active">
                                        <input class="filter__radio" name="state" type="radio" value="" checked>

                                        Любое
                                    </label>
                                </li>

                                <li class="filter__case">
                                    <label class="filter__label-radio">
                                        <input class="filter__radio" name="state" type="radio" value="5">

                                        Новое
                                    </label>
                                </li>

                                <li class="filter__case">
                                    <label class="filter__label-radio">
                                        <input class="filter__radio" name="state" type="radio" value="6">

                                        Б/у
                                    </label>
                                </li>
                            </ul>
                        </li>

                        <li class="filter__item filter__item--range">
                            <div class="filter__subtitle">Цена</div>

                            <input class="filter__input" name="priceOT" type="number" placeholder="от">

                            <input class="filter__input" name="priceDO" type="number" placeholder="до">
                        </li>

                        <li class="filter__item filter__item--seller">
                            <div class="filter__subtitle">Продавец</div>

                            <ul class="filter__inner" name="arg">
                                <li class="filter__case">
                                    <label class="filter__label-radio filter__label-radio--active">
                                        <input class="filter__radio" name="apartment" type="radio" value="" checked>

                                        Все
                                    </label>
                                </li>

                                <li class="filter__case">
                                    <label class="filter__label-radio">
                                        <input class="filter__radio" name="apartment" type="radio" value="7">

                                        Частные
                                    </label>
                                </li>

                                <li class="filter__case">
                                    <label class="filter__label-radio">
                                        <input class="filter__radio" name="apartment" type="radio" value="8">

                                        Компании
                                    </label>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <button class="filter__submit" type="submit">
                        Показать <span class="filter__submit-count"><? echo(count($arPersonalItems)); ?></span>
                        объявлений
                    </button>


                </form>


            </div>
        </div>
    </section>
</main>
