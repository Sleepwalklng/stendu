<?php
$APPLICATION->SetTitle($arResult['UF_NAME']);

use lib\GetUserData;
use Uslugi\Components\UslugiDetail;

// Получение услуги
$arUslugi =$arResult;

$APPLICATION->SetTitle($arUslugi['UF_NAME']);

// Получение типов услуг
$Count = UslugiDetail::getUslugisTypeFromDB();

$arResult['SIMILAR'] = UslugiDetail::getSimilarFromDB($arUslugi['UF_TYPE_USLUGI']);

$user = GetUserData::getUser((int)$arUslugi['UF_USER_ID']);

?>

<div class="inner inner--hidden inner--services-card"></div>

<main class="main main--hidden">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__list breadcrumbs__list--card">
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        <?= $arUslugi['UF_ADRES']; ?>
                    </a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Услуги
                    </a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        <?= $Count['UF_NAME']; ?>
                    </a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        <?= $arUslugi['UF_NAME']; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <section class="card">
        <div class="container">
            <div class="card__inner">
                <div class="card__left">
                    <div class="card__title">
                        <?= $arUslugi['UF_NAME']; ?>
                    </div>

                    <div class="card__title-cost">
                        <?= $arUslugi['UF_PRICE']; ?>
                    </div>

                    <div class="card-slider">
                        <div class="card-slider__slider swiper">
                            <div class="swiper-wrapper">
                                <? foreach ($arUslugi['UF_PHOTO'] as $arPhoto): ?>
                                    <? $img_usluga = CFile::GetPath($arPhoto); ?>
                                    <div class="card-slider__slide swiper-slide">
                                        <img src="<? echo $img_usluga; ?>" alt="">
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <button type="button" class="card-slider__arrow prev">
                                <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.32781 2L2 8.8044L9.32781 15.6088" stroke="#20242C" stroke-width="2.2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button type="button" class="card-slider__arrow next">
                                <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.67219 2L9 8.8044L1.67219 15.6088" stroke="#20242C" stroke-width="2.2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div class="card-slider__pagination"></div>
                        </div>
                        <div class="card-slider__thumb-slider swiper">
                            <div class="swiper-wrapper">
                                <? foreach ($arUslugi['UF_PHOTO'] as $arPhoto): ?>
                                    <? $img_usluga = CFile::GetPath($arPhoto); ?>
                                    <div class="card-slider__thumb-slide swiper-slide">
                                        <img src="<? echo $img_usluga; ?>" alt="">
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>


                    <div class="card__data">
                        <div class="card__data-top">
                            <div class="card__data-left">
                                <div class="card__date">
                                    29 октября, вчера
                                </div>

                                <div class="card__check">
                                    <span class="card__check-all">600</span> (<span class="card__check-today">334</span>
                                    сегодня)
                                </div>
                            </div>

                            <div class="card__data-right">
                                <a href="#" class="card__data-favorite">
                                    <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                                                stroke="white" stroke-width="2.3" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                    </svg>
                                </a>

                                <a href="#" class="card__export">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 11L21.2 2.80005" stroke="#20242C" stroke-width="2.3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M22.0002 6.8V2H17.2002" stroke="#20242C" stroke-width="2.3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                              stroke="#20242C" stroke-width="2.3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="card__data-bottom">
                            <a class="card__data-tel" href="#">Позвонить</a>

                            <a class="card__data-message" href="#">
                                <svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M17.25 0.433594H5.75C2.576 0.433594 0 2.88782 0 5.91433V12.4956V13.5962C0 16.6227 2.576 19.0769 5.75 19.0769H7.475C7.7855 19.0769 8.1995 19.275 8.395 19.5171L10.12 21.7072C10.879 22.6757 12.121 22.6757 12.88 21.7072L14.605 19.5171C14.8235 19.242 15.1685 19.0769 15.525 19.0769H17.25C20.424 19.0769 23 16.6227 23 13.5962V5.91433C23 2.88782 20.424 0.433594 17.25 0.433594ZM6.9 11.4391C6.256 11.4391 5.75 10.9438 5.75 10.3385C5.75 9.73324 6.2675 9.238 6.9 9.238C7.5325 9.238 8.05 9.73324 8.05 10.3385C8.05 10.9438 7.544 11.4391 6.9 11.4391ZM11.5 11.4391C10.856 11.4391 10.35 10.9438 10.35 10.3385C10.35 9.73324 10.8675 9.238 11.5 9.238C12.1325 9.238 12.65 9.73324 12.65 10.3385C12.65 10.9438 12.144 11.4391 11.5 11.4391ZM16.1 11.4391C15.456 11.4391 14.95 10.9438 14.95 10.3385C14.95 9.73324 15.4675 9.238 16.1 9.238C16.7325 9.238 17.25 9.73324 17.25 10.3385C17.25 10.9438 16.744 11.4391 16.1 11.4391Z"
                                            fill="#E3E9FF"/>
                                </svg>
                            </a>

                            <ul class="card__facts">
                                <li class="card__fact">
                                    Алина Петрова
                                </li>

                                <li class="card__fact">
                                    Частное лицо
                                </li>

                                <li class="card__fact">
                                    Рига
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="resume__desc-box">
                        <p class="resume__desc-title">Комментарий</p>
                        <p class="resume__desc-text">
                            <?= $arUslugi['UF_DESCRIPTION'] ?? '' ?>
                        </p>
                        <button type="button" class="resume__desc-btn">
                            <span class="open">Показать полностью</span>
                            <span class="close">Скрыть</span>
                            <span class="resume__btn-icon">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </span>
                        </button>
                    </div>

                    <div class="resume__map-box">
                        <button class="resume__map-title-box">
                            <span class="resume__map-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/card-location.png" alt="">
                            </span>
                            <span class="resume__map-title">
                                <?= $arUslugi['UF_ADRES']; ?>
                            </span>
                            <span class="resume__map-btn active">
                                <span class="open">Показать на карте</span>
                                <span class="close">Скрыть карту</span>
                                <span class="resume__btn-icon">
                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </span>
                        </button>
                        <div class="resume__map" id="map"></div>
                    </div>

                    <div class="card__wrapper">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "stendu",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/includes/socials.php"
                            )
                        ); ?>

                        <a class="card__strike" href="#">
                            Пожаловаться
                        </a>

                        <ul class="card__statistics card__statistics--mob">
                            <li class="card__statistic">
                                29 октября, вчера
                            </li>

                            <li class="card__statistic card__statistic--img">
                                60 (33 сегодня)
                            </li>

                            <li class="card__statistic">
                                № <?= $arUslugi['ID']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "stendu",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                        "EDIT_TEMPLATE" => "",
                        "ID" => $arUslugi['ID'],
                        "USER_ID" => $user['ID'],
                        "TITLE" => $arUslugi['UF_NAME'],
                        "PRICE" => $arUslugi['UF_PRICE'],
                        "PATH" => "/includes/card__seller.php"
                    )
                ); ?>

            </div>
        </div>
    </section>


    <section class="announcements announcements--ad">
        <div class="container">
            <div class="announcements__top">
                <div class="announcements__title title">
                    Похожие объявления
                </div>
            </div>

            <div class="announcements__inner">
                <ul class="announcements__items ">
                    <? foreach ($arResult['SIMILAR'] as $item): ?>
                        <? if ($item['ID'] != $arUslugi['ID']): ?>
                            <? foreach ($Count as $arUrl): ?>
                                <? if ($item['UF_TYPE_USLUGI'] == $arUrl['ID']):
                                    $url = $item['UF_SESSION_CODE'];
                                endif; ?>
                            <? endforeach ?>
                            <li class="announcements__item cart">
                                <a href="<?= $url; ?>/<?= $item['UF_SESSION_CODE']; ?>">
                                    <div class="cart__top">
                                        <div class="cart__inner">
                                            <ul class="cart__list swiper-wrapper">
                                                <? foreach ($item['UF_PHOTO'] as $photo): ?>
                                                    <li class="cart__box swiper-slide">
                                                        <img class="cart__img"
                                                             src="<?= CFile::GetPath($photo) ?>" alt="">
                                                    </li>
                                                <? endforeach; ?>
                                            </ul>

                                            <div class="cart__pagination"></div>
                                        </div>
                                    </div>

                                    <div class="cart__line"></div>

                                    <div class="cart__bottom">
                                        <div class="cart__wrapper">
                                            <div class="cart__left">
                                                <div class="cart__subtitle">
                                                    <?= $item['UF_NAME'] ?? '' ?>
                                                </div>

                                                <div class="cart__cost">
                                                    <?= $item['UF_PRICE'] ?? '' ?>
                                                </div>
                                            </div>

                                            <div class="cart__right">
                                                <div class="cart__location">
                                                    <img class="cart__location-img"
                                                         src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                                         alt="местоположение">

                                                    <?= $item['UF_ADRES'] ?? '' ?>
                                                </div>

                                                <div class="cart__date">
                                                    <?= $item['UF_DATA'] ?? '' ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="cart__info">
                                            <div class="cart__text">
                                                <?= $item['UF_COMMENT'] ?? '' ?>
                                            </div>

                                            <a class="cart__message btn-blue" href="#">
                                                <img class="cart__message-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                                     alt="Написать">

                                                Написать
                                            </a>

                                            <a class="cart__favorite" href="#">
                                                <img class="cart__favorite-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                                     alt="добавить в избранное">
                                                <img class="cart__favorite-img cart__favorite-img--active"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                                     alt="добавить в избранное">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="cart__author">
                                        <div class="cart__name">
                                            Александр Соколов
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
                                                    +371 ··· ··· ·· ··
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
                        <? endif; ?>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>


<!-- Карта -->


<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initMap">
</script>
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

    let map;

    function initMap() {
        var myLatlng = new google.maps.LatLng(<?= $arUslugi['UF_ADRES_CODE'] ?>);
        map = new google.maps.Map(document.getElementById("map"), {
            center: myLatlng,
            zoom: 8,
            disableDefaultUI: true,
        });
        const infoWindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            position: myLatlng,
            map,
            title: '<div class="map-block-item">' +
                '<a href="#"><div class="map-block-item-cont">' +
                '<div class="map-block-item-cont-text">' +
                '<ul><li><?=$arUslugi["UF_NAME"]?></li>' +
                '<li><?= $arUslugi['UF_PRICE'] . ' ₽'?></li>' +
                '</ul></div></div> </a>' +
                '</div>',
            optimized: false,
            icon: {
                url: '../../../local/templates/stendu/images/placemark.png',
                scaledSize: new google.maps.Size(rem(4.2), rem(4.2)) // Размер маркера
            },
        });


        marker.addListener("click", () => {
            infoWindow.close();
            infoWindow.setContent(marker.getTitle());
            infoWindow.open(marker.getMap(), marker);
        });

        // To add the marker to the map, call setMap();
        // marker.setMap(map);
    }

    window.initMap = initMap;


</script>

<!-- Карта -->
