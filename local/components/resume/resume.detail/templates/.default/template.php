

<?php
$APPLICATION->SetTitle($arResult['UF_NAME']);
use lib\GetUserData;
use Resume\Components\ResumeDetail;

if ($arResult['UF_BUSINESS_TRIP']) {
    $arResult['UF_BUSINESS_TRIP'] = ResumeDetail::getFieldEnum(182, $arResult['UF_BUSINESS_TRIP']);
}
if ($arResult['UF_MOVING']) {
    $arResult['UF_MOVING'] = ResumeDetail::getFieldEnum(183, $arResult['UF_MOVING']);
}
if ($arResult['UF_GRAFIC']) {
    $arResult['UF_GRAFIC'] = ResumeDetail::getFieldEnum(185, $arResult['UF_GRAFIC']);
}

$arResult['SIMILAR'] = ResumeDetail::getSimilarFromDB($arResult['UF_TYPE']);

$user = GetUserData::getUser((int)$arResult['UF_USER_ID']);

?>
<div class="inner inner--hidden inner--services-card"></div>

<main class="main main--hidden">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__list breadcrumbs__list--card">
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Рига
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Работа
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Туризм, рестораны
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Полный день
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
                        <?= $arResult['UF_NAME'] ?? '' ?>
                    </div>

                    <div class="card__title-cost">
                        <?= $arResult['UF_PRICE'] ?? '' ?>
                    </div>

                    <div class="card__description card__description--foto card__description--work">
                        <div class="card__description-title">О вакансии</div>

                        <div class="card__description-inner">
                            <? if (!empty($arResult['UF_PHOTO'])): ?>
                                <img class="card__description-img"
                                     src="<?= CFile::GetPath($arResult['UF_PHOTO']) ?>"
                                     alt="<?= $arResult['UF_NAME'] ?? '' ?>">

                            <? else: ?>

                                <img class="card__description-img"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/zaglushka_foto.svg"
                                     alt="">

                            <? endif; ?>
                        </div>

                        <div class="card__description-boundary"></div>

                        <ul class="card__characteristics">
                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Сфера деятельности
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_WORK_AREA'] ?? '' ?>
                                </div>
                            </li>

                            <!--                            <li class="card__characteristic">-->
                            <!--                                <div class="card__characteristic-key">-->
                            <!--                                    Место работы-->
                            <!--                                </div>-->
                            <!---->
                            <!--                                <div class="card__characteristic-value">-->
                            <!--                                    --><?//= $arResult['UF_PLACE_OF_WORK'] ?? '' ?>
                            <!--                                </div>-->
                            <!--                            </li>-->

                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    График работы
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_GRAFIC'] ?? '' ?>
                                </div>
                            </li>

                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Опыт работы
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_EXPERIENCE'] ?? '' ?>
                                </div>
                            </li>

                            <!--                            <li class="card__characteristic">-->
                            <!--                                <div class="card__characteristic-key">-->
                            <!--                                    Частота выплат-->
                            <!--                                </div>-->
                            <!---->
                            <!--                                <div class="card__characteristic-value">-->
                            <!--                                    Ежемесячно-->
                            <!--                                </div>-->
                            <!--                            </li>-->

                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Готовность к командировкам
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_BUSINESS_TRIP'] ?? '' ?>
                                </div>
                            </li>

                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Переезд
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_MOVING'] ?? '' ?>
                                </div>
                            </li>
                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Пол
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_GENDER'] ?? '' ?>
                                </div>
                            </li>
                            <li class="card__characteristic">
                                <div class="card__characteristic-key">
                                    Возраст
                                </div>

                                <div class="card__characteristic-value">
                                    <?= $arResult['UF_AGE'] ?? '' ?>
                                </div>
                            </li>
                        </ul>
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
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M22.0002 6.8V2H17.2002" stroke="#20242C" stroke-width="2.3"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
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
                        <div class="resume__desc-text">
                            <?= $arResult['UF_COMMENT'] ?? '' ?>
                        </div>
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

            
                    <div class="card__wrapper">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "stendu",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/includes/socials.php"
                            )
                        );?>

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
                                № 1105709473
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card__seller">
                    <div class="card__top">
                        <div class="card__service">
                            <?=$arResult['UF_NAME']?>
                        </div>

                        <div class="card__cost">
                            <?=$arResult['UF_PRICE']?>
                        </div>

                        <div class="card__favorite card__favorite--favorite">
                            <div class="card__favorite-text">
                                В избранном
                            </div>

                            <a class="card__favorite-btn">
                                <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                                            stroke="white" stroke-width="2.3" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="card__info">
                        <img class="card__info-img" src="<?=CFile::GetPath($user['PERSONAL_PHOTO']??'')?>"
                             alt="<?=$user['NAME']?>">

                        <div class="card__info-wrapper">
                            <div class="card__name">
                                <?=$user['NAME']?>
                            </div>

                            <div class="card__time">
                                На Авито с 16 декабря 2020 года
                            </div>

                            <div class="card__about">
                                <div class="card__rating">
                                    <img class="card__rating-img" src="<?= SITE_TEMPLATE_PATH ?>/images/star.svg" 5.0">

                                    <span class="card__rating-text">5.0</span>
                                </div>

                                <div class="card__review">
                                    <span class="card__review-count">26</span> отзывов
                                </div>

                                <div class="card__announcement">
                                    <span class="card__announcement-count">14</span> Объявлений
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card__boundary"></div>

                    <div class="card__bottom">
                        <div class="card__contacts">
                            <a class="card__message btn-blue" href="#">
                                <img class="card__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>

                            <div class="card__tel">
                                <img class="card__tel-img" src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg"
                                     alt="Позвонить">

                                <div class="card__tel-wrapper">
                                    <a class="card__tel-show" href="#">
                                        Показать телефон
                                    </a>

                                    <a class="card__num" href="#">
                                        <?=$user['PERSONAL_PHONE']?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a class="card__subscribe link" href="#">
                            <div class="link__text">
                                Подписаться на продавца
                            </div>

                            <div class="link__btn"></div>
                        </a>

                        <ul class="card__statistics">
                            <li class="card__statistic">
                                29 октября, вчера
                            </li>

                            <li class="card__statistic card__statistic--img">
                                60 (33 сегодня)
                            </li>

                            <li class="card__statistic">
                                № 1105709473
                            </li>
                        </ul>
                    </div>
                </div>
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
                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>

                                <div class="cart__pagination"></div>
                            </div>
                        </div>

                        <div class="cart__line"></div>

                        <div class="cart__bottom">
                            <div class="cart__wrapper">
                                <div class="cart__left">
                                    <div class="cart__subtitle">
                                        Mercedes-Benz GLC-класс, 2021
                                    </div>

                                    <div class="cart__cost">
                                        10 000
                                    </div>
                                </div>

                                <div class="cart__right">
                                    <div class="cart__location">
                                        <img class="cart__location-img" src="images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс
                                    оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="images/favorite.svg"
                                         alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active"
                                         src="images/favorite-fill.svg  "
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
                                <img class="cart__tel-img" src="images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart cart--active">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>

                                <div class="cart__pagination"></div>
                            </div>
                        </div>

                        <div class="cart__line"></div>

                        <div class="cart__bottom">
                            <div class="cart__wrapper">
                                <div class="cart__left">
                                    <div class="cart__subtitle">
                                        Mercedes-Benz GLC-класс, 2021
                                    </div>

                                    <div class="cart__cost">
                                        10 000
                                    </div>
                                </div>

                                <div class="cart__right">
                                    <div class="cart__location">
                                        <img class="cart__location-img" src="images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс
                                    оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="images/favorite.svg"
                                         alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active"
                                         src="images/favorite-fill.svg  "
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
                                <img class="cart__tel-img" src="images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/avito1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/avito2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/avito3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/avito1.jpg" alt="">
                                    </li>
                                </ul>

                                <div class="cart__pagination"></div>
                            </div>
                        </div>

                        <div class="cart__line"></div>

                        <div class="cart__bottom">
                            <div class="cart__wrapper">
                                <div class="cart__left">
                                    <div class="cart__subtitle">
                                        Mercedes-Benz GLC-класс, 2021
                                    </div>

                                    <div class="cart__cost">
                                        10 000
                                    </div>
                                </div>

                                <div class="cart__right">
                                    <div class="cart__location">
                                        <img class="cart__location-img" src="images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс
                                    оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов. Своевременное
                                    обслуживание. Пройдено
                                    ТО. Весь
                                    комплект
                                    ключей и документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="images/favorite.svg"
                                         alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active"
                                         src="images/favorite-fill.svg  "
                                         alt="добавить в избранное">
                                </a>
                            </div>
                        </div>

                        <div class="cart__author">
                            <img class="cart__author-img" src="images/user-1.jpg" alt="Александр Соколов">

                            <div class="cart__name">
                                Александр Соколов
                            </div>

                            <div class="cart__reg-date">
                                На Stendū с 12 ноября 2021
                            </div>

                            <div class="cart__tel">
                                <img class="cart__tel-img" src="images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>

                                <div class="cart__pagination"></div>
                            </div>
                        </div>

                        <div class="cart__line"></div>

                        <div class="cart__bottom">
                            <div class="cart__wrapper">
                                <div class="cart__left">
                                    <div class="cart__subtitle">
                                        Mercedes-Benz GLC-класс, 2021
                                    </div>

                                    <div class="cart__cost">
                                        10 000
                                    </div>
                                </div>

                                <div class="cart__right">
                                    <div class="cart__location">
                                        <img class="cart__location-img" src="images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс
                                    оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="images/favorite.svg"
                                         alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active"
                                         src="images/favorite-fill.svg  "
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
                                <img class="cart__tel-img" src="images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</main>

