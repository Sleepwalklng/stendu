<?php
define("LANGUAGE_ID", \Bitrix\Main\Context::getCurrent()->GetLanguage());
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
switch (LANGUAGE_ID) {
    case "ru":
        $lang = 'Ru';
        break;
    case "en":
        $lang = 'En';
        break;
    case "lt":
        $lang = 'Lt';
        break;
    default:
        die();
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? $APPLICATION->ShowMeta("keywords") ?>
    <? $APPLICATION->ShowMeta("description") ?>
    <title><?= $APPLICATION->ShowTitle() ?></title>


    <link rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/font/stylesheet.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/map.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/filter.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/dev.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/add.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/add2023.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/main.2949322f.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/resume.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/ion.rangeSlider.min.css">

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <title><?= $APPLICATION->ShowTitle() ?></title>
</head>

<? $APPLICATION->ShowHead(); ?>
<div id="panel"><?= $APPLICATION->ShowPanel() ?></div>

<body>
<header class="header">
    <div class="container">
        <div class="header__top">
            <div class="menu-mob">
                <a class="menu-mob__btn" href="#">
                    <img class="menu-mob__btn-img" src="<?= SITE_TEMPLATE_PATH ?>/images/menu-btn.svg"
                         alt="открыть меню">
                </a>

                <div class="menu-mob__inner">
                    <div class="menu-mob__wrapper">
                        <div class="menu-mob__top menu-mob__top--undefined">
                            <div class="menu-mob__user">
                                <img class="menu-mob__user-img"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/User-undefined.svg" alt="">

                                <img class="menu-mob__user-success"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/user-success.svg" alt="">
                            </div>

                            <a class="menu-mob__login" href="#">Войти</a>

                            <div class="menu-mob__info">
                                <div class="menu-mob__name">
                                    Алина Петрова
                                </div>

                                <div class="menu-mob__about">
                                    <div class="menu-mob__rating">
                                        <img class="menu-mob__rating-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/star.svg" alt="ваш рейтинг">

                                        <span class="menu-mob__rating">
                        5.0
                      </span>
                                    </div>

                                    <div class="menu-mob__review">
                      <span class="menu-mob__review-count">
                        26
                      </span>

                                        отзывов
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu-mob__bottom">
                            <ul class="menu-mob__list">
                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-announcements.svg"
                                             alt="Мои объявления">

                                        Мои объявления
                                    </a>
                                </li>

                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-like.svg" alt="Мои отзывы">

                                        Мои отзывы
                                    </a>
                                </li>

                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-favorite.svg"
                                             alt="Избранное">

                                        Избранное
                                    </a>
                                </li>

                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-notification.svg"
                                             alt="Уведомления">

                                        Уведомления
                                    </a>
                                </li>

                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-message.svg"
                                             alt="Сообщения">

                                        Сообщения
                                    </a>
                                </li>

                                <li class="menu-mob__item">
                                    <a class="menu-mob__link" href="#">
                                        <img class="menu-mob__link-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-setting.svg"
                                             alt="Настройки">

                                        Настройки
                                    </a>
                                </li>
                            </ul>

                            <a class="menu-mob__announcement" href="#">
                                <div class="menu-mob__announcement-btn">
                                    <img class="menu-mob__announcement-img"
                                         src="<?= SITE_TEMPLATE_PATH ?>/images/menu-mob-plus.svg"
                                         alt="Создать объявление">
                                </div>

                                Создать объявление
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="header__location" href="#">
                <img class="header__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                     alt="ваше местоположение">

                <span>Ваш город:</span>

                <span class="header__location-text">Рига</span>
            </a>
            <button class="header__lang">
                <div class="header__lang-text"><?= $lang ?></div>
                <div class="header__lang-icon">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.25 4.66668L7 9.33334L1.75 4.66668" stroke="#000000" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </div>
                <ul class="header__lang_list">
                    <li data-language="ru"
                        class="header__lang_list-item <?= strpos($APPLICATION->sDirPath, 'ru') ? ' active-lang' : '' ?>">
                        Ru
                    </li>
                    <li data-language="en"
                        class="header__lang_list-item <?= strpos($APPLICATION->sDirPath, 'en') ? ' active-lang' : '' ?>">
                        En
                    </li>
                    <li data-language="lt"
                        class="header__lang_list-item <?= strpos($APPLICATION->sDirPath, 'lt') ? ' active-lang' : '' ?>">
                        Lt
                    </li>
                </ul>
            </button>
            <script type="text/javascript">
                $(document).on('click', '[data-language]', function () {
                    let dataLanguage = $(this).attr('data-language');
                    let path = window.location.pathname.replace(/(\/en|\/ru|\/lt)/, "");
                    window.location = window.location.origin + "/" + dataLanguage + path + window.location.search;
                });

            </script>
            <nav class="header__menu menu">
                <ul class="menu__list">

                    <!--                    <li class="menu__item">-->
                    <!--                        <a href="/transport" class="menu__link">Все объявления</a>-->
                    <!--                    </li>-->

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/transport/" class="menu__link">Авто</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/nedvizhimost/" class="menu__link">Недвижимость</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/rabota/" class="menu__link">Работа</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/uslugi/" class="menu__link">Услуги</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/lichnye-veshchi/" class="menu__link">Личные вещи</a>
                    </li>

                    <!--                    <li class="menu__item menu__item-more">-->
                    <!--                        <span>Еще</span>-->
                    <!--                        <ul class="menu__list__more">-->
                    <!--                            <li class="menu__item menu__item-hidden">-->
                    <!--                                <a href="/lichnye-veshchi" class="menu__link">Личные вещи</a></a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/o-kompanii/" class="menu__link">О компании</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/kontakty/" class="menu__link">Контакты</a>
                    </li>

                    <li class="menu__item">
                        <a href="/<?=LANGUAGE_ID?>/pomoshch/" class="menu__link">Помощь</a>
                    </li>
                </ul>
            </nav>

            <ul class="header__social social">


                <? if ($USER->IsAuthorized()) { ?>
                    <li class="social__item social__item--mob">
                        <a class="social__link" href="/<?=LANGUAGE_ID?>/profile/">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-PA-mob.svg"
                                 alt="личный кабинет">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link" href="/<?=LANGUAGE_ID?>/profile/">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-PA.svg"
                                 alt="личный кабинет">
                        </a>
                    </li>
                <? } else { ?>
                    <li class="social__item social__item--mob">
                        <a class="social__link modal-login-open" href="#">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-PA-mob.svg"
                                 alt="личный кабинет">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link modal-login-open" href="#">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-PA.svg"
                                 alt="личный кабинет">
                        </a>
                    </li>
                <? } ?>

                <? if ($USER->IsAuthorized()) { ?>
                    <li class="social__item">
                        <a class="social__link" href="/<?=LANGUAGE_ID?>/profile/chat/">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-message.svg"
                                 alt="сообщения">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link" href="/<?=LANGUAGE_ID?>/profile/uvedomleniya/">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-notification.svg"
                                 alt="уведомления">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link" href="/<?=LANGUAGE_ID?>/profile/izbrannoe/">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-favorite.svg"
                                 alt="избранное">
                        </a>
                    </li>
                <? } else { ?>
                    <li class="social__item">
                        <a class="social__link modal-login-open" href="">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-message.svg"
                                 alt="сообщения">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link modal-login-open" href="">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-notification.svg"
                                 alt="уведомления">
                        </a>
                    </li>

                    <li class="social__item">
                        <a class="social__link modal-login-open" href="">
                            <img class="social__img" src="<?= SITE_TEMPLATE_PATH ?>/images/social-favorite.svg"
                                 alt="избранное">
                        </a>
                    </li>
                <? } ?>


            </ul>
        </div>

        <div class="header__bottom">
            <a href="/<?=LANGUAGE_ID?>/" class="header__logo logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.svg" alt="логотип" class="header__logo-img">
            </a>

            <form class="header__search" action="#">
                <button class="header__categories btn-blue" type="button">
                    <img class="header__categories-img header__categories-img--mob"
                         src="<?= SITE_TEMPLATE_PATH ?>/images/categories-mob.svg"
                         alt="выбрать категории">

                    <img class="header__categories-img" src="<?= SITE_TEMPLATE_PATH ?>/images/categories.svg"
                         alt="выбрать категории">
                    <? $url = $APPLICATION->GetCurPage();
                    $page = explode('/', $url);
                    $code = $page[1];
                    if ($code == 'uslugi') {
                        echo 'Услуги';
                    } elseif ($code == 'nedvizhimost') {
                        echo 'Недвижимость';
                    } elseif ($code == 'rabota') {
                        echo 'Работа';
                    } elseif ($code == 'lichnye-veshchi') {
                        echo 'Личные вещи';
                    } elseif ($code == 'transport') {
                        echo 'Транспорт';
                    } else {
                        echo 'Категории';
                    } ?>

                </button>


                <label class="header__label">
                    <input class="header__input" name="search" type="text" placeholder="Поиск по объявлениям...">
                </label>

                <button class="header__btn btn-blue search" id="search_btn" type="submit">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/search.svg" alt="поиск" class="header__btn-img">

                    Найти
                </button>
            </form>

            <a class="header__application-add btn-blue" href="/additem">Создать объявление</a>
        </div>
    </div>
</header>
  

