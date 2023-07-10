<?php
$APPLICATION->SetTitle($arResult['UF_TITLE']);

use RealEstate\Components\RealEstateDetail;
use lib\GetUserData;

if ($arResult['UF_CATEGORY']) {
    $arResult['UF_CATEGORY'] = RealEstateDetail::getFieldEnum(201, $arResult['UF_CATEGORY']);
}
if ($arResult['UF_TYPE_OF_HOUSE']) {
    $arResult['UF_TYPE_OF_HOUSE'] = RealEstateDetail::getFieldEnum(202, $arResult['UF_TYPE_OF_HOUSE']);
}

$arResult['SIMILAR'] = RealEstateDetail::getSimilarFromDB($arResult['UF_DEAL_TYPE']);


$user = GetUserData::getUser((int)$arResult['UF_USER_ID']);

$idUser = $USER->GetID();
$rsUser = CUser::GetByID($idUser);
$arUser = $rsUser->Fetch();
$arElements = $arUser['UF_SUBSCRIPTION'];
?>

<div class="inner inner--hidden inner--private-card"></div>

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
                        Недвижимость
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Купить
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        Квартиры
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        2-комнатные
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

                    <ul class="card__statistics">
                        <li class="card__statistic">
                            <? if ($stmp = MakeTimeStamp($arResult['UF_DATA'], "DD.MM.YYYY HH:MI:SS")) {
                                echo FormatDate("j F Y H:i", $stmp);
                            } ?>
                        </li>

                        <li class="card__statistic card__statistic--img">
                            60 (33 сегодня)
                        </li>

                        <li class="card__statistic">
                            № <?= $arResult['ID'] ?>
                        </li>
                    </ul>

                    <div class="card__title-cost card__title-cost--visible">
                        <a class="card__cost-index card__cost-index--rise"></a>

                        <?= $arResult['UF_PRICE'] ?? '' ?>

                        <span><?= $arResult['UF_PRICE'] ?? '' ?><span>₽</span> <span>/ м2</span></span>

                        <div class="card__history card__history--rise">
                            <div class="card__history-inner">
                                <a href="#" class="card__history-close"></a>

                                <div class="card__history-left">
                                    <div class="card__history-title">
                                        История цены
                                    </div>
                                    <? foreach ($arResult['UF_HISTORY_PRICES'] as $HISTORY_PRICE):
                                        $arHistory = explode('/', $HISTORY_PRICE);
                                        $price = $arHistory[0];
                                        $data = $arHistory[1];
                                        ?>
                                        <div class="card__history-cost">
                                            <?= $data ?>
                                            <div class="card__history-value">
                                                <?= $price ?>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                                <div class="card__history-right">
                                    <div class="card__history-changes">
                                        <div class="card__history-date">
                                            20.02.2021
                                        </div>
                                        <div class="card__history-price">
                                            61 564 264 <span class="card__history-currency">₽</span>
                                        </div>
                                    </div>
                                    <div class="card__history-profit">
                                        <?= $arResult['UF_PRICE'] ?? '' ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <? if ($arResult['UF_PHOTOS']): ?>
                        <div class="card-slider">
                            <div class="card-slider__slider swiper">
                                <div class="swiper-wrapper">

                                    <? foreach ($arResult['UF_PHOTOS'] as $photo): ?>
                                        <div class="card-slider__slide swiper-slide">
                                            <img src="<?= CFile::GetPath($photo) ?>" alt="">
                                        </div>
                                    <? endforeach; ?>

                                </div>
                                <button type="button" class="card-slider__arrow prev">
                                    <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.32781 2L2 8.8044L9.32781 15.6088" stroke="#20242C"
                                              stroke-width="2.2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <button type="button" class="card-slider__arrow next">
                                    <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.67219 2L9 8.8044L1.67219 15.6088" stroke="#20242C"
                                              stroke-width="2.2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div class="card-slider__pagination"></div>
                            </div>
                            <div class="card-slider__thumb-slider swiper">
                                <div class="swiper-wrapper">
                                    <? if ($arResult['UF_IMAGES']): ?>
                                        <? foreach ($arResult['UF_IMAGES'] as $photo): ?>
                                            <div class="card-slider__thumb-slide swiper-slide">
                                                <img src="<?= CFile::GetPath($photo) ?>" alt="">
                                            </div>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="card__information">
                        <ul class="card__information-list">
                            <? if ($arResult['UF_COM_SQUARE']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Площадь
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                              stroke="#BDC4DC"
                                              stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 2V22" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M2 12H22" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_COM_SQUARE'] ?> м²</span>
                                </li>
                            <? } ?>
                            <? if ($arResult['UF_TOTAL_AREA']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Общая
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                              stroke="#BDC4DC"
                                              stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 2V22" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M2 12H22" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_TOTAL_AREA'] ?> м²</span>
                                </li>
                            <? } ?>
                            <? if ($arResult['UF_LIVING_AREA']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Жилая
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M22 8.52V3.98C22 2.57 21.36 2 19.77 2H15.73C14.14 2 13.5 2.57 13.5 3.98V8.51C13.5 9.93 14.14 10.49 15.73 10.49H19.77C21.36 10.5 22 9.93 22 8.52Z"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        <path
                                                d="M22 19.77V15.73C22 14.14 21.36 13.5 19.77 13.5H15.73C14.14 13.5 13.5 14.14 13.5 15.73V19.77C13.5 21.36 14.14 22 15.73 22H19.77C21.36 22 22 21.36 22 19.77Z"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        <path
                                                d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        <path
                                                d="M10.5 19.77V15.73C10.5 14.14 9.86 13.5 8.27 13.5H4.23C2.64 13.5 2 14.14 2 15.73V19.77C2 21.36 2.64 22 4.23 22H8.27C9.86 22 10.5 21.36 10.5 19.77Z"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_LIVING_AREA'] ?> м²</span>
                                </li>
                            <? } ?>
                            <? if ($arResult['UF_KITCHEN_AREA']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Кухня
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M17.79 10.47V17.79C17.79 20.12 15.9 22 13.58 22H6.21C3.89 22 2 20.11 2 17.79V10.47C2 8.14001 3.89 6.26001 6.21 6.26001H13.58C15.9 6.26001 17.79 8.15001 17.79 10.47Z"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        <path d="M5.5 4V2.25" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M9.5 4V2.25" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M13.5 4V2.25" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M22 13.16C22 15.48 20.11 17.37 17.79 17.37V8.94995C20.11 8.94995 22 10.83 22 13.16Z"
                                              stroke="#BDC4DC"
                                              stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 12H17.51" stroke="#BDC4DC" stroke-width="2.2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_KITCHEN_AREA'] ?> м²</span>
                                </li>
                            <? } ?>
                            <? if ($arResult['UF_FLOOR_LEVEL'] && $arResult['UF_FLOOR_LEVEL_MAX']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Этаж
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                              stroke="#BDC4DC"
                                              stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.18 17.1501L7.14001 14.1101" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.18 6.8501V17.1501" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M13.82 6.8501L16.86 9.8901" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M13.82 17.1501V6.8501" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_FLOOR_LEVEL'] ?> из <?= $arResult['UF_FLOOR_LEVEL_MAX'] ?></span>
                                </li>
                            <? } ?>
                            <? if ($arResult['UF_BUILDING_YEAR']) { ?>
                                <li class="card__information-item">
                                    <div class="card__information-title">
                                        Построен
                                    </div>

                                    <svg class="card__information-svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 22H22" stroke="#BDC4DC" stroke-width="2.2" stroke-miterlimit="10"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path
                                                d="M2.95 22L3 9.96999C3 9.35999 3.29 8.78004 3.77 8.40004L10.77 2.95003C11.49 2.39003 12.5 2.39003 13.23 2.95003L20.23 8.39003C20.72 8.77003 21 9.34999 21 9.96999V22"
                                                stroke="#BDC4DC" stroke-width="2.2" stroke-miterlimit="10"
                                                stroke-linejoin="round"/>
                                        <path d="M15.5 11H8.5C7.67 11 7 11.67 7 12.5V22H17V12.5C17 11.67 16.33 11 15.5 11Z"
                                              stroke="#BDC4DC"
                                              stroke-width="2.2" stroke-miterlimit="10" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M10 16.25V17.75" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M10.5 7.5H13.5" stroke="#BDC4DC" stroke-width="2.2"
                                              stroke-miterlimit="10"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <span class="card__information-text"><?= $arResult['UF_BUILDING_YEAR'] ?></span>
                                </li>
                            <? } ?>
                        </ul>
                    </div>

                    <div class="card__data">
                        <div class="card__data-top">
                            <div class="card__data-left">
                                <div class="card__date">
                                    <? if ($stmp = MakeTimeStamp($arResult['UF_DATA'], "DD.MM.YYYY HH:MI:SS")) {
                                        echo FormatDate("j F Y H:i", $stmp);
                                    } ?>
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
                                    <?= $user['NAME'] ?>
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

                    <div class="card__description card__description--property">
                        <div class="card__description-title">О квартире</div>
                        <?
                        $str = 'UF_ROOM_TYPE,UF_BUSINESS_TYPE,UF_BUSINESS_CATEGORY,UF_MONTH_PROFIT,UF_TYPE_OF_HS,UF_NUM_OF_BED,UF_CHOICE_APART,UF_CADASTRAL,UF_POSPURPOSE,UF_LEGAL_ADDRESS,UF_SHARE_SIZE,UF_NUMBER_OF_ROOMS,UF_ROOMS_FOR_SALE,UF_FLOOR_LEVEL,UF_FLOOR_LEVEL_MAX,UF_PLOT_STATUS,UF_BUILDING_YEAR,UF_MATERIAL_OF_HOUSE,UF_PENTHOUSE,UF_PART_HOUSE,UF_OCCUPIED,UF_GARAGE_TYPE,UF_LAND_CATEGORY,UF_TYPE_PERM_USE,UF_CAN_CHANGE';
                        $arr = explode(',', $str);
                        ?>
                        <ul class="card__characteristics">
                            <? foreach ($arr as $fieldName) {
                                if ($arResult[$fieldName]) { ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?
                                            $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                                'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                                'select' => array('ID')
                                            ));
                                            if ($arUserField = $dbUserFields->fetch()) {
                                                $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                                echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                            }

                                            ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $arResult[$fieldName] ?? '' ?>
                                        </div>
                                    </li>
                                <? }
                            } ?>
                        </ul>
                    </div>
                    <!-- <div class="card__description card__description--property">
                        <div class="card__description-title">Площадь</div>
                        <?
                    $str = 'UF_COM_SQUARE,UF_LIVING_AREA,UF_TOTAL_AREA,UF_KITCHEN_AREA,UF_ROOM_AREA,UF_PLOT_SQUARE,UF_ROOMS_AREA,UF_SELL_IN_PARTS';
                    $arr = explode(',', $str);
                    ?>
                        <ul class="card__characteristics">
                            <? foreach ($arr as $fieldName) {
                        if ($arResult[$fieldName]) { ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?
                            $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                'select' => array('ID')
                            ));
                            if ($arUserField = $dbUserFields->fetch()) {
                                $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                echo $arUserField['EDIT_FORM_LABEL']['ru'];
                            }

                            ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $arResult[$fieldName] ?? '' ?>
                                        </div>
                                    </li>
                                <? }
                    } ?>
                        </ul>
                    </div> -->
                    <!-- <div class="card__description card__description--property">
                        <div class="card__description-title">Параметры</div>
                        <?
                    if ($arResult['UF_TYPE_OF_RS'] == 145) {
                        $str = 'UF_INVEST_PROJECT,UF_LAND_ELECTRICITY,UF_PRESENCE_ENCUMBRANCE,UF_GAS,UF_SEWERAGE,UF_WATER_SUP,UF_DRIVEWAYS,UF_CEILING_HEIGHT,UF_COLUMN_GRID,UF_LAYOUT,UF_CONDITION,UF_FLOOR_MATERIAL,UF_WET_SPOTS,UF_ELECTRIC_POWER,UF_GATES,UF_FURNITURE,UF_EQUIPMENT,UF_ENTRY,UF_ACCESS,UF_PARKING,UF_PARKING_TYPE,UF_NUM_OF_PARKING,UF_PLACE_PRICE,UF_FREE_PARKING,UF_ENTRY_PRICE,UF_FREE_ENTRY,UF_RESPONSIBLE_STORAGE,UF_CUSTOMS,UF_TRANSPORT_SERV,UF_DISPLAY_WINDOWS';
                        $liftStr = 'UF_ELEVATOR_SERV,UF_CAPACITY_ELEVATORS,UF_NUM_HOISTS,UF_HOISTS_CAPACITY,UF_ELEVATOR_PASS,UF_CAPACITY_PASS_ELEVATORS';
                        $kranStr = 'UF_NUM_OVERHEAD_CRANES,UF_CAPACITY_PASS_CRANES,UF_NUM_BEAM_CRANES,UF_CAPACITY_BEAM_CRANES,UF_NUM_RAIL_CRANES,UF_CAPACITY_RAIL_CRANES,UF_NUM_GANTRY_CRANES,UF_CAPACITY_GANTRY_CRANES';
                        $arr = explode(',', $str);
                        ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <div class="card__description-title">Лифты</div>
                            <? $arr = explode(',', $liftStr); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <div class="card__description-title">Краны</div>
                            <? $arr = explode(',', $kranStr); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <?
                    } else {
                        $str = 'UF_NUM_BALCONY,UF_LOGGIA,UF_WINDOW_VIEW,UF_BATHROOM_SEP,UF_BATHROOM_COMB,UF_REPAIR,UF_HAVE_PHONE';
                        $arr = explode(',', $str); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <?
                    } ?>
                    </div> -->
                    <!-- <div class="card__description card__description--property">
                        <div class="card__description-title">О Здании</div>
                        <?
                    if ($arResult['UF_TYPE_OF_RS'] == 145) {
                        $str = 'UF_HOUSE_NAME,UF_GARAGE_STATUS,UF_LIGHT,UF_ELECTRICITY,UF_WATER,UF_HEATING,UF_BUILDING_TYPE,UF_BUILDING_CLASS,UF_HOUSE_LINE,UF_TOTAL_AREA,UF_PLOT_SQUARE,UF_PLOT_TYPE,UF_BUILDING_CATEGORY,UF_DEVELOPER,UF_MANAG_COMPANY,UF_VENTILATION,UF_CONDITIONING,UF_FIRE_SYSTEM,UF_NUM_ELEVATORS,UF_NUM_TRAVELATORS,UF_NUM_ESCALATOR,UF_HOURS,UF_ALLDAY,UF_WEEK_DAYS';
                        $infStr = 'UF_CARWASH,UF_CARSERVICE,UF_AUTO_GATES,UF_CCTV,UF_ENTRY_PASSES,UF_ALL_DAY_SECURITY,UF_BESEMENT_SELLAR,UF_VIE_HOLE,UF_TIRE_FITTING,UF_PHARMACY,UF_AQUAPARK,UF_ATELIER';
                        $dopStr = 'UF_ATM,UF_POOL,UF_BUFFET,UF_COMPLEX,UF_HOTEL,UF_OFFICE_ROOMS,UF_CAFE,UF_MOVIE_THEATER,UF_CONFERENCE_HALL,UF_MED_CENTER,UF_MINIMARKET,UF_WAREHOUSES,UF_NOTARIAL,UF_BANK,UF_PARK,UF_RESTAURANT,UF_BEAUTY_SALOON,UF_DINING,UF_SUPERMARKET,UF_TRADING_ZONE,UF_BABY_CITY,UF_FITNESS,UF_FOTO_SALOON,UF_RECEPTION,UF_PLAY_ROOM,UF_ICE_RINK,UF_FOOD_COURT,UF_SLOT_MACHINES';
                        $arr = explode(',', $str);
                        ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <div class="card__description-title">Инфраструктура</div>
                            <? $arr = explode(',', $infStr); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <div class="card__description-title">Дополнительные параметры</div>
                            <? $arr = explode(',', $dopStr); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                            <?
                    } else {
                        $str = 'UF_HOUSE_NAME,UF_SERIES_HOUSE,UF_ELEVATOR_PASS,UF_ELEVATOR_SERV,UF_CEILING_HEIGHT,UF_PARKING,UF_RCHUTE';
                        $arr = explode(',', $str); ?>
                            <ul class="card__characteristics">
                                <? foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) { ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                }

                                ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $arResult[$fieldName] ?? '' ?>
                                            </div>
                                        </li>
                                    <? }
                        } ?>
                            </ul>
                        <? }

                    ?>
                    </div> -->
                    <?
                    function getFieldsValues($arr, $arResult): array
                    {
                        $ar = [];
                        foreach ($arr as $fieldName) {
                            if ($arResult[$fieldName]) {
                                $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                    'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                    'select' => array('ID')
                                ));
                                if ($arUserField = $dbUserFields->fetch()) {
                                    $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                    $ar[$fieldName]['name'] = $arUserField['EDIT_FORM_LABEL']['ru'];
                                    if ($arResult[$fieldName] == 1) {
                                        $ar[$fieldName]['value'] = 'Да';
                                    } else {
                                        $ar[$fieldName]['value'] = $arResult[$fieldName];
                                    }

                                }

                            }
                        }
                        return $ar;
                    }

                    if ($arResult['UF_TYPE_OF_RS'] == 144) {
                        $str = 'UF_PETS,UF_WITH_CHILDREN';
                        $infStr = 'UF_KITCHEN,UF_ROOMS_FURNITURE,UF_FRIDGE,UF_WASH,UF_QUAN_BATHROOM,UF_BATHROOM,UF_SEWERAGE,UF_WATER_SUP,UF_HEATING,UF_GAS,UF_ELECTRICITY';
                        $dopStr = 'UF_INTERNET,UF_TV,UF_CONDITIONER,UF_DISHWASHER,UF_BATH,UF_SHOWER_ROOM,UF_SECURITY,UF_HAVE_PHONE,UF_BATHH,UF_GARAGE,UF_POOL';
                        $arr = explode(',', $str);
                        $arComm = getFieldsValues($arr, $arResult);
                        $arr = explode(',', $infStr);
                        $arFac = getFieldsValues($arr, $arResult);
                        $arr = explode(',', $dopStr);
                        $arAdd = getFieldsValues($arr, $arResult);
                    }
                    if (!empty($arComm) || !empty($arFac) || !empty($arAdd)) {
                        ?>
                        <!-- <div class="card__description card__description--property">
                            <div class="card__description-title">Коммуникации</div>

                            <ul class="card__characteristics">
                                <? foreach ($arComm as $li): ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?= $li['name'] ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $li['value'] ?>
                                        </div>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                            <? if (!empty($arFac)) { ?>
                                <div class="card__description-title">Удобства</div>
                                <ul class="card__characteristics">
                                    <? foreach ($arFac as $li): ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?= $li['name'] ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $li['value'] ?>
                                            </div>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            <? } ?>
                            <? if (!empty($arAdd)) { ?>
                                <div class="card__description-title">Дополнительные параметры</div>
                                <ul class="card__characteristics">
                                    <? foreach ($arAdd as $li): ?>
                                        <li class="card__characteristic">
                                            <div class="card__characteristic-key">
                                                <?= $li['name'] ?>
                                            </div>

                                            <div class="card__characteristic-value">
                                                <?= $li['value'] ?>
                                            </div>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            <? } ?>
                        </div> -->
                    <? } ?>
                    <? if ($arResult['UF_DESCRIPTION']) { ?>
                        <div class="resume__desc-box">
                            <p class="resume__desc-title">Комментарий продавца</p>
                            <p class="resume__desc-text">
                                <?= $arResult['UF_DESCRIPTION'] ?>
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
                    <? } ?>
                    <div class="card__calc">
                        <ul class="card__banks">
                            <li class="card__bank">
                                <img class="card__bank-img" src="<?= SITE_TEMPLATE_PATH ?>/images/bank4.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?= SITE_TEMPLATE_PATH ?>/images/bank3.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?= SITE_TEMPLATE_PATH ?>/images/bank2.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?= SITE_TEMPLATE_PATH ?>/images/bank1.png" alt="">
                            </li>
                        </ul>

                        <div class="card__calc-title">
                            Ипотечный калькулятор
                        </div>

                        <div class="card__calc-text">
                            Укажите первый взнос и срок кредита, чтобы посмотреть предложения, после этого вы сможете
                            отправить заявку сразу в
                            несколько банков
                        </div>

                        <form class="card__calc-form" action="#">

                            <div class="card__calc-top">
                                <div class="card__cost-polzunok card__cost-polzunok--money">
                                    <div class="cost-polzunok__inner right">
                                        Стоимость жилья:
                                        <span class="cost-polzunok__input-right" contenteditable></span>
                                        <span>₽</span>
                                    </div>

                                    <div class="cost-polzunok"></div>
                                </div>

                                <div class="card__cost-polzunok card__cost-polzunok--first">
                                    <div class="cost-polzunok__inner right">
                                        Первый взнос:
                                        <span class="cost-polzunok__input-right" contenteditable></span>
                                        <span>₽</span>
                                    </div>

                                    <div class="cost-polzunok"></div>
                                </div>

                                <div class="card__cost-polzunok card__cost-polzunok--long">
                                    <div class="cost-polzunok__inner right">
                                        Срок кредита:
                                        <span class="cost-polzunok__input-right" contenteditable></span>
                                    </div>

                                    <div class="cost-polzunok"></div>
                                </div>
                            </div>

                            <ul class="card__calc-info">
                                <li class="card__calc-elem">
                                    <div class="card__calc-key">
                                        Сумма кредита
                                    </div>

                                    <div class="card__calc-value">
                                        16 524 000 <span>₽</span>
                                    </div>
                                </li>

                                <li class="card__calc-elem">
                                    <div class="card__calc-key">
                                        Ставка от
                                    </div>

                                    <div class="card__calc-value">
                                        8,69%
                                    </div>
                                </li>

                                <li class="card__calc-elem">
                                    <div class="card__calc-key">
                                        Платёж от
                                    </div>

                                    <div class="card__calc-value">
                                        145 390 <span>₽</span>
                                    </div>
                                </li>

                                <li class="card__bank-link">
                                    <a href="" class="link">
                                        <div class="link__text">
                                            Банки
                                        </div>

                                        <div class="link__btn"></div>
                                    </a>

                                    <div class="card__bank-inner">

                                        <ul class="card__bank-list">
                                            <li>
                                                <a href="#" class="card__bank-close"></a>
                                            </li>

                                            <li class="card__bank-item">
                                                <img class="card__bank-item-img"
                                                     src=" <?= SITE_TEMPLATE_PATH ?>/images/bank1.png" alt="">

                                                <div class="card__bank-position">
                                                    Банк
                                                    <span class="card__bank-name">
                                                   Зенит 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Ставка от
                                                    <span class="card__bank-value">
                                                   8,69% 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Платеж от
                                                    <span class="card__bank-value">
                                                   145 390<span>₽</span> 
                                                 </span>
                                                </div>
                                            </li>

                                            <li class="card__bank-item">
                                                <img class="card__bank-item-img"
                                                     src=" <?= SITE_TEMPLATE_PATH ?>/images/bank2.png" alt="">

                                                <div class="card__bank-position">
                                                    Банк
                                                    <span class="card__bank-name">
                                                   Газпромбанк 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Ставка от
                                                    <span class="card__bank-value">
                                                   8,69% 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Платеж от
                                                    <span class="card__bank-value">
                                                   145 390<span>₽</span> 
                                                 </span>
                                                </div>
                                            </li>

                                            <li class="card__bank-item">
                                                <img class="card__bank-item-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/bank3.png" alt="">

                                                <div class="card__bank-position">
                                                    Банк
                                                    <span class="card__bank-name">
                                                   Альфа-Банк 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Ставка от
                                                    <span class="card__bank-value">
                                                   8,69% 
                                                 </span>
                                                </div>

                                                <div class="card__bank-position">
                                                    Платеж от
                                                    <span class="card__bank-value">
                                                   145 390<span>₽</span> 
                                                 </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                            <div class="card__subtitle">
                                Ваши данные
                            </div>

                            <div class="card__calc-bottom">
                                <input class="card__calc-input" type="text" placeholder="ФИО">
                                <input class="card__calc-input" type="text" placeholder="E-mail">
                                <input class="card__calc-input" type="text" placeholder="+7 (___) ___ - __ - __">
                                <input class="card__calc-submit" type="submit" value="Отправить заявку">

                                <div class="card__calc-description">
                                    Отправляя форму, я даю согласие на обработку данных в целях оформления заявки и
                                    осуществления обратной связи
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="resume__map-box">
                        <button class="resume__map-title-box">
                            <span class="resume__map-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/card-location.png" alt="">
                            </span>
                            <span class="resume__map-title">
                                <?= $arResult['UF_ADDRESS']; ?>
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

                    <div class="card__description card__description--property card__description--last">
                        <div class="card__description-title">О доме</div>
                        <?
                        $str = 'UF_ROOM_TYPE,UF_BUSINESS_TYPE,UF_BUSINESS_CATEGORY,UF_MONTH_PROFIT,UF_TYPE_OF_HS,UF_NUM_OF_BED,UF_CHOICE_APART,UF_CADASTRAL,UF_POSPURPOSE,UF_LEGAL_ADDRESS,UF_SHARE_SIZE,UF_NUMBER_OF_ROOMS,UF_ROOMS_FOR_SALE,UF_FLOOR_LEVEL,UF_FLOOR_LEVEL_MAX,UF_PLOT_STATUS,UF_BUILDING_YEAR,UF_MATERIAL_OF_HOUSE,UF_PENTHOUSE,UF_PART_HOUSE,UF_OCCUPIED,UF_GARAGE_TYPE,UF_LAND_CATEGORY,UF_TYPE_PERM_USE,UF_CAN_CHANGE';
                        $arr = explode(',', $str);
                        ?>
                        <ul class="card__characteristics">
                            <? foreach ($arr as $fieldName) {
                                if ($arResult[$fieldName]) { ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?
                                            $dbUserFields = \Bitrix\Main\UserFieldTable::getList(array(
                                                'filter' => array('ENTITY_ID' => 'HLBLOCK_2', 'FIELD_NAME' => $fieldName),
                                                'select' => array('ID')
                                            ));
                                            if ($arUserField = $dbUserFields->fetch()) {
                                                $arUserField = CUserTypeEntity::GetByID($arUserField['ID']); // В этом методе есть запрос lang файлов
                                                echo $arUserField['EDIT_FORM_LABEL']['ru'];
                                            }

                                            ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $arResult[$fieldName] ?? '' ?>
                                        </div>
                                    </li>
                                <? }
                            } ?>
                        </ul>
                    </div>
                    <?
                    $str = 'UF_RENT_PRICE_TYPE,UF_PRICE,UF_SALES_TYPE,UF_MORTGAGE,UF_BONUS,UF_AGENT_BONUS_VALUE,UF_COM_PAY,UF_RENT_PERIOD,UF_PREPAY,UF_DEPOSIT,UF_TAX,UF_LEGAL_ADDRESS,UF_RENT_RIGHTS,UF_BONUS,UF_COMMERC_TYPE_RENT,UF_MIN_RENT_PERIOD,UF_SECURITY_DEPOSIT,UF_OPERATION_COSTS,UF_UTILITY_PAY_INCLUDED,UF_HOLIDAYS_RENT';
                    $arr = explode(',', $str);
                    $arPrice = getFieldsValues($arr, $arResult);
                    if (!empty($arPrice)) {
                        ?>
                        <!-- <div class="card__description card__description--property-house">
                            <div class="card__description-title">Цена и условия сделки</div>

                            <ul class="card__characteristics">
                                <? foreach ($arPrice as $li): ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?= $li['name'] ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $li['value'] ?>
                                        </div>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div> -->
                        <?
                    }
                    $str = 'UF_COMMISSIONS_RENT,UF_WITHOUT_COMMISSIONS';
                    $arr = explode(',', $str);
                    $arCommis = getFieldsValues($arr, $arResult);
                    if (!empty($arCommis)) {
                        ?>
                        <!-- <div class="card__description card__description--property-house">
                            <div class="card__description-title">Комиссия арендатора</div>
                            <ul class="card__characteristics">
                                <? foreach ($arCommis as $li): ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?= $li['name'] ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $li['value'] ?>
                                        </div>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div> -->
                        <?
                    }
                    $str = 'UF_COMMISSIONS_AGENT,UF_WITHOUT_COMMISSIONS_AGENT';
                    $arr = explode(',', $str);
                    $arCommis2 = getFieldsValues($arr, $arResult);
                    if (!empty($arCommis2)) {
                        ?>
                        <!-- <div class="card__description card__description--property-house">
                            <div class="card__description-title">Комиссия от другого агента</div>

                            <ul class="card__characteristics">
                                <? foreach ($arCommis2 as $li): ?>
                                    <li class="card__characteristic">
                                        <div class="card__characteristic-key">
                                            <?= $li['name'] ?>
                                        </div>

                                        <div class="card__characteristic-value">
                                            <?= $li['value'] ?>
                                        </div>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div> -->
                    <? } ?>

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
                                № 1105709473
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card__seller">
                    <div class="card__top">
                        <div class="card__service">
                            <?= $arResult['UF_TITLE'] ?>
                        </div>

                        <div class="card__cost">
                            <!-- Саша попросил на время закомментить этот элемент -->
                            <!-- <a class="card__cost-index card__cost-index--rise"></a> -->

                            <?= $arResult['UF_PRICE'] ?? '' ?>

                            <div class="card__subcost">
                                <?= $arResult['UF_PRICE'] ?? '' ?>
                                <span>₽</span>
                                <span>/ м<span>2</span></span>
                            </div>

                            <div class="card__history">
                                <div class="card__history-inner">
                                    <a href="#" class="card__history-close"></a>

                                    <div class="card__history-left">
                                        <div class="card__history-title">
                                            История цены
                                        </div>

                                        <? foreach ($arResult['UF_HISTORY_PRICES'] as $HISTORY_PRICE):
                                            $arHistory = explode('/', $HISTORY_PRICE);
                                            $price = $arHistory[0];
                                            $data = $arHistory[1];
                                            ?>
                                            <div class="card__history-cost">
                                                <?= $data ?>
                                                <div class="card__history-value">
                                                    <?= $price ?>
                                                </div>
                                            </div>
                                        <? endforeach; ?>

                                    </div>

                                    <div class="card__history-right">
                                        <div class="card__history-changes">
                                            <div class="card__history-date">
                                                20.02.2021
                                            </div>
                                            <div class="card__history-price">
                                                61 564 264 <span class="card__history-currency">₽</span>
                                            </div>
                                        </div>
                                        <div class="card__history-profit">
                                            <?= $arResult['UF_PRICE'] ?? '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <img class="card__info-img" src="<?= CFile::GetPath($user['PERSONAL_PHOTO'] ?? '') ?>"
                             alt="<?= $user['NAME'] ?>">

                        <div class="card__info-wrapper">
                            <div class="card__name">
                                <?= $user['NAME'] ?>
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

                                    <a class="card__num" href="tel:<?= $user['PERSONAL_PHONE'] ?>">
                                        <?= $user['PERSONAL_PHONE'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <? if ($user['ID'] == $idUser) {
                            ?>
                            <a class="card__subscribe link" href="/profile">
                                <div class="link__text">
                                    Перейти в личный кабинет
                                </div>

                                <div class="link__btn"></div>
                            </a>
                        <? } else {
                            ?>
                            <a class="card__subscribe link" id="subscribe" href="#" data-id="<?= $user['ID'] ?? '' ?>"
                               data-oper="<?= !in_array($user['ID'], $arElements) ? 'subscribe' : 'unsubscribe' ?>">
                                <div class="link__text">
                                    <?= !in_array($user['ID'], $arElements) ? 'Подписаться на продавца' : 'Отписаться' ?>
                                </div>

                                <div class="link__btn"></div>
                            </a>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="announcements announcements--ad">
        <div class="container">
            <div class="announcements__top">
                <div class="announcements__title title">
                    Новостройки поблизости
                </div>
                <div class="announcements__top-show">
                    <span class="announcements__top-show_text">
                        Смотреть все
                    </span>
                    <button class="announcements__top-show_btn">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.999999 1L7 7L1 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="announcements__inner">
                <ul class="announcements__items ">
                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>
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
                                        <img class="cart__location-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
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
                                <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart cart--active">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>
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
                                        <img class="cart__location-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
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
                                <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/avito1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/avito2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/avito3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/avito1.jpg" alt="">
                                    </li>
                                </ul>
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
                                        <img class="cart__location-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart__author">
                            <img class="cart__author-img" src="<?= SITE_TEMPLATE_PATH ?>/images/user-1.jpg"
                                 alt="Александр Соколов">

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
                                <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                                    </li>
                                </ul>
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
                                        <img class="cart__location-img"
                                             src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
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
                                <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="more-ads">
        <div class="container">
            <h2 class="more-ads__title">Похожие объявления</h2>
            <ul class="more-ads__list">
                <? foreach ($arResult['SIMILAR'] as $item): ?>
                    <? if ($item['ID'] != $arResult['ID']): ?>
                        <li class="recomendation__item cart">
                            <div class="cart__top swiper-container">
                                <div class="cart__inner">
                                    <ul class="cart__list swiper-wrapper">
                                        <? if ($arResult['UF_IMAGES']): ?>
                                            <? foreach ($arResult['UF_IMAGES'] as $photo): ?>
                                                <li class="cart__box swiper-slide">
                                                    <img class="cart__img" src="<?= CFile::GetPath($photo) ?>">
                                                </li>
                                            <? endforeach; ?>
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
                                            <?= $item['UF_TITLE'] ?? '' ?>
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
                                            <?= $item['UF_ADDRESS'] ?? '' ?>
                                        </div>
                                        <div class="cart__date">
                                            <? if ($stmp = MakeTimeStamp($item['UF_DATA'], "DD.MM.YYYY HH:MI:SS")) {
                                                echo FormatDate("j F Y H:i", $stmp);
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart__info">
                                    <div class="cart__text">
                                        <?= $item['UF_DESCRIPTION'] ?? '' ?>
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
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        </div>
    </section>
</main>

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
        var myLatlng = new google.maps.LatLng(<?= $arResult['UF_GEO'] ?>);
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
                '<ul><li><?=$arResult["UF_TITLE"]?></li>' +
                '<li><?= $arResult['UF_PRICE'] . ' ₽'?></li>' +
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