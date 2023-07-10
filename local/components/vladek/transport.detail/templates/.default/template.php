<?php

$item = $arResult['ITEM'];
$category = $arResult['ITEM']['CATEGORY'];
$mark = $arResult['ITEM']['MARK'];
$APPLICATION->SetTitle($item['UF_TRANSPORT_NAME']);
//print_r($item);
?>

<main class="main main--hidden">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__list breadcrumbs__list--card">
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">
                        <?=$item['UF_TRANSPORT_ADDRESS']?>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="/transport" class="breadcrumbs__link">
                        Транспорт
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="/transport" class="breadcrumbs__link">
                        <?=$category['UF_TRANSPORT_CATEGORY_NAME']?>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <a href="/transport/<?=$mark['UF_TRANSPORT_MARK_CODE']?>" class="breadcrumbs__link">
                        <?=$mark['UF_TRANSPORT_MARK_NAME']?>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <p  class="breadcrumbs__link">
                        <?=$item['UF_TRANSPORT_NAME']?>
                    </p>
                </li>
            </ul>
        </div>
    </div>

    <section class="card">
        <div class="container">
            <div class="card__inner">
                <div class="card__left">
                    <div class="card__title">
                        <?=$item['UF_TRANSPORT_NAME']?>
                    </div>

                    <div class="card__title-cost">
                        <?=number_format($item['UF_TRANSPORT_PRICE'], 0, '', ' ')?>
                    </div>

                    <div class="card__swiper card__swiper--large">
                        <div class="swiper card_swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($item['UF_TRANSPORT_IMAGES'] as $img):?>
                                    <div class="swiper-slide">
                                        <img src="<?=CFile::GetPath($img)?>">
                                    </div>
                                <?php endforeach;?>

                            </div>
                            <button type="button" class="swiper-button-prev card__swiper-prev"></button>
                            <button type="button" class="swiper-button-prev card__swiper-next"></button>
                            <div class="card__pagination"><span class="swiper-pagination-current"></span> / <span class="swiper-pagination-total"></span></div>
                        </div>
                        <div thumbsSlider class="swiper card_swiper_thumbs">
                            <div class="swiper-wrapper">
                                <?php foreach ($item['UF_TRANSPORT_IMAGES'] as $img):?>
                                    <div class="swiper-slide">
                                        <img src="<?=CFile::GetPath($img)?>">
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>

<!--                        <a class="card__swiper-link" href="#">-->
<!--                            <span>+ 11</span> фото-->
<!--                        </a>-->

                        <div class="card__pagination">
                            <span class="card__pagination-current"></span>/<span class="card__pagination-total"></span>
                        </div>

                    </div>

                    <div class="card__data">
                        <div class="card__data-top">
                            <div class="card__data-left">
                                <div class="card__date">
                                    29 октября, вчера
                                </div>

                                <div class="card__check">
                                    <span class="card__check-all">600</span> (<span class="card__check-today">334</span> сегодня)
                                </div>
                            </div>

                            <div class="card__data-right">
                                <a href="#" class="card__data-favorite">
                                    <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                                                stroke="white" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>

                                <a href="#" class="card__export">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 11L21.2 2.80005" stroke="#20242C" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22.0002 6.8V2H17.2002" stroke="#20242C" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#20242C" stroke-width="2.3"
                                              stroke-linecap="round" stroke-linejoin="round" />
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
                                            fill="#E3E9FF" />
                                </svg>
                            </a>

                            <ul class="card__facts">
                                <li class="card__fact">
                                    Алина Петрова
                                </li>

                                <li class="card__fact">
                                    Частное лицо
                                </li>
                            </ul>
                        </div>

                        <div class="card__data-credit">
                            <img class="card__seller-img" src="<?=SITE_TEMPLATE_PATH?>/images/seller-bank.png" alt="Тинькофф банк">

                            <div class="card__seller-wrapper">
                                <div class="card__seller-text">
                                    В кредит
                                </div>

                                <div class="card__seller-title">
                                    Тинькофф Банк
                                </div>
                            </div>

                            <div class="card__seller-right">
                                <div class="card__seller-cost">
                                    от <span>8 950</span> ₽/мес.
                                </div>

                                <a class="card__seller-calc" href="#">
                                    Рассчитать
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card__description card__description--transport">
                        <div class="card__description-title">Характеристики</div>

                        <ul class="card__characteristics">
                            <li class="card__characteristic">
                                <ul class="card__characteristic-list">
                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Год выпуска
                                        </div>

                                        <div class="card__value">
                                            2017
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Пробег
                                        </div>

                                        <div class="card__value">
                                            107 000 км
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Кузов
                                        </div>

                                        <div class="card__value">
                                            Минивэн
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Цвет
                                        </div>

                                        <div class="card__value">
                                            Белый
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="card__characteristic">
                                <ul class="card__characteristic-list">
                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Двигатель
                                        </div>

                                        <div class="card__value">
                                            1.6 л / 140 л.с. / Дизель
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Комплектация
                                        </div>

                                        <div class="card__value card__value--blue">
                                            18 опций
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Налог
                                        </div>

                                        <div class="card__value">
                                            4 900 ₽ / год
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Коробка
                                        </div>

                                        <div class="card__value">
                                            Механика
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="card__characteristic">
                                <ul class="card__characteristic-list">
                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Привод
                                        </div>

                                        <div class="card__value">
                                            Передний
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Руль
                                        </div>

                                        <div class="card__value">
                                            Левый
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Состояние
                                        </div>

                                        <div class="card__value">
                                            Не требует ремонта
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Владельцы
                                        </div>

                                        <div class="card__value">
                                            1 владелец
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="card__characteristic">
                                <ul class="card__characteristic-list">
                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            ПТС
                                        </div>

                                        <div class="card__value">
                                            Оригинал
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Таможня
                                        </div>

                                        <div class="card__value">
                                            Растаможен
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            VIN
                                        </div>

                                        <div class="card__value">
                                            W0V**************
                                        </div>
                                    </li>

                                    <li class="card__characteristic-item">
                                        <div class="card__key">
                                            Госномер
                                        </div>

                                        <div class="card__value">
                                            ******|797
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <a class="card__all-characteristic" href="#">
                            Все характеристики модели
                        </a>
                    </div>

                    <div class="card__examination">
                        <div class="card__examination-inner">
                            <div class="card__examination-title">
                                <img class="card__examination-img" src="<?=SITE_TEMPLATE_PATH?>/images/examination.png" alt="">

                                Отчет о проверке по VIN
                            </div>

                            <ul class="card__examination-items">
                                <li class="card__examination-item">
                                    Даные о ДТП не найдены
                                </li>

                                <li class="card__examination-item">
                                    Характеристики совпадают с ПТС
                                </li>

                                <li class="card__examination-item">
                                    4 вледельца в ПТС
                                </li>

                                <li class="card__examination-item">
                                    Данные о розыске и запрете на регистрацию не найдены
                                </li>
                            </ul>

                            <div class="card__examination-date">
                                Обновлен: <span>21 октября 2021</span>
                            </div>
                        </div>

                        <img class="card__examination-boundary" src="<?=SITE_TEMPLATE_PATH?>/images/examination-boundary.svg" alt="">

                        <ul class="card__examination-list">
                            <li class="card__examination-elem">
                                1 запись в истории пробегов
                            </li>

                            <li class="card__examination-elem">
                                Поиск оценок стоимости ремонта
                            </li>

                            <li class="card__examination-elem">
                                1 запись в истории эксплуатации
                            </li>

                            <li class="card__examination-elem">
                                Проверка на работу в такси
                            </li>

                            <li class="card__examination-elem">
                                Поиск данных о залоге
                            </li>

                            <li class="card__examination-elem">
                                Еще +15 пунктов проверки
                            </li>
                        </ul>

                        <div class="card__examination-reports">
                            <a class="card__examination-report card__examination-report--full" href="#">
                                Купить полный отчет
                            </a>

                            <a class="card__examination-report card__examination-report--free" href="#">
                                Бесплатный отчет
                            </a>
                        </div>
                    </div>

                    <div class="card__comment">
                        <div class="card__comment-title">
                            Комментарий продавца
                        </div>

                        <div class="card__text">
                            <p>
                                Маникю́р — косметическая процедура по обработке ногтей на пальцах рук и самих кистей рук, а то и всей руки.
                            </p>

                            <p>
                                Экспресс-маникюр: длится значительно меньшее количество времени, чем полноценный, за счёт отсутствия в процедуре
                                ванночек и удаления кутикулы.
                            </p>
                        </div>

                        <a class="card__more link" href="#">
                            <div class="link__text">
                                Показать полностью
                            </div>

                            <div class="link__btn"></div>
                        </a>
                    </div>

                    <div class="card__complectation">
                        <div class="card__complectation-title">
                            Комплектация
                        </div>

                        <div class="card__complectation-inner">
                            <div class="card__complectation-save">
                                <div class="card__complectation-subtitle">
                                    Безопасность
                                </div>

                                <div class="card__complectation-text">
                                    <p>
                                        Подушка безопасности пассажира
                                    </p>

                                    <p>
                                        Подушки безопасности оконные (шторки)
                                    </p>

                                    <p>
                                        Антиблокировочная система (ABS)
                                    </p>

                                    <p>
                                        Система стабилизации (ESP)
                                    </p>
                                </div>
                            </div>

                            <div class="card__complectation-survey">
                                <div class="card__complectation-subtitle">
                                    Обзор
                                </div>

                                <div class="card__complectation-text">
                                    <p>
                                        Противотуманные фары
                                    </p>

                                    <p>
                                        Автоматический корректор фар
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a class="card__all-complectation" href="#">
                            Все опции
                        </a>
                    </div>

                    <div class="card__credit">
                        <img class="card__credit-logo" src="<?=SITE_TEMPLATE_PATH?>/images/credit-logo.svg" alt="лого">

                        <ul class="card__banks">
                            <li class="card__bank">
                                <img class="card__bank-img" src="<?=SITE_TEMPLATE_PATH?>/images/bank4.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?=SITE_TEMPLATE_PATH?>/images/bank3.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?=SITE_TEMPLATE_PATH?>/images/bank2.png" alt="">
                            </li>

                            <li class="card__bank">
                                <img class="card__bank-img" src="<?=SITE_TEMPLATE_PATH?>/images/bank1.png" alt="">
                            </li>
                        </ul>

                        <div class="card__credit-title">
                            Подбор кредита на спецусловиях от<span>6.5%</span>
                        </div>

                        <div class="card__credit-text">
                            Заполните заявку, которую сможете отправить в несколько банков и узнать решение онлайн.
                        </div>

                        <form class="card__form" action="#">
                            <div class="card__form-left">
                                <div class="card__cost-polzunok card__cost-polzunok--sum">
                                    <div class="cost-polzunok__inner right">
                                        Сумма кредита:
                                        <input type="text" class="cost-polzunok__input-right" />
                                        <span>₽</span>
                                    </div>

                                    <div class="cost-polzunok"></div>
                                </div>

                                <div class="card__cost-polzunok card__cost-polzunok--time">
                                    <div class="cost-polzunok__inner right">
                                        Срок кредита:
                                        <input type="text" class="cost-polzunok__input-right" />
                                    </div>

                                    <div class="cost-polzunok"></div>
                                </div>

                                <ul class="card__form-info">
                                    <li class="card__form-elem">
                                        <div class="card__form-key">
                                            Первый взнос
                                        </div>

                                        <div class="card__form-value">
                                            230 000 <span>₽</span>
                                        </div>
                                    </li>

                                    <li class="card__form-elem">
                                        <div class="card__form-key">
                                            Платеж
                                        </div>

                                        <div class="card__form-value">
                                            2 100 <span>₽</span><span>/ мес.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="card__form-right">
                                <input class="card__form-input" type="text" placeholder="ФИО">
                                <input class="card__form-input" type="text" placeholder="E-mail">
                                <input class="card__form-input" type="text" placeholder="+7 (___) ___ - __ - __">
                                <input class="card__form-submit" type="submit" value="Подтвердить">

                                <div class="card__form-description">
                                    Отправляя форму, я даю согласие на обработку данных в целях оформления заявки и осуществления обратной связи
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
                               Латвия, Рига, ул. Артиллерияс, 65
                            </span>
                            <span class="resume__map-btn active">
                                <span class="open">Показать на карте</span>
                                <span class="close">Скрыть карту</span>
                                <span class="resume__btn-icon">
                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </span>
                        </button>
                        <div class="resume__map" id="map"></div>
                    </div>

                    <div class="card__wrapper">
                        <ul class="card__social">
                            <li class="card__social-item">
                                <a href="#" class="card__social-link">
                                    <svg class="card__social-img" width="2.8rem" height="2.8rem" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M25.6663 18.8883C25.6663 23.1349 23.1347 25.6666 18.888 25.6666H17.4997C16.858 25.6666 16.333 25.1416 16.333 24.4999V17.7683C16.333 17.4533 16.5897 17.1849 16.9047 17.1849L18.958 17.1499C19.1213 17.1383 19.2614 17.0216 19.2964 16.8583L19.7047 14.6299C19.7397 14.4199 19.5763 14.2216 19.3547 14.2216L16.8697 14.2566C16.543 14.2566 16.2864 13.9999 16.2747 13.6849L16.228 10.8266C16.228 10.6399 16.3797 10.4766 16.578 10.4766L19.378 10.4299C19.5763 10.4299 19.728 10.2783 19.728 10.0799L19.6813 7.27991C19.6813 7.08157 19.5297 6.92992 19.3314 6.92992L16.1813 6.9766C14.2447 7.0116 12.7047 8.59825 12.7397 10.5349L12.798 13.7433C12.8097 14.0699 12.553 14.3266 12.2264 14.3383L10.8263 14.3616C10.628 14.3616 10.4764 14.5132 10.4764 14.7116L10.5114 16.9283C10.5114 17.1266 10.663 17.2782 10.8613 17.2782L12.2614 17.2549C12.588 17.2549 12.8447 17.5116 12.8563 17.8266L12.9613 24.4766C12.973 25.1299 12.448 25.6666 11.7947 25.6666H9.11134C4.86467 25.6666 2.33301 23.1349 2.33301 18.8766V9.11158C2.33301 4.86492 4.86467 2.33325 9.11134 2.33325H18.888C23.1347 2.33325 25.6663 4.86492 25.6663 9.11158V18.8883Z"
                                                fill="#4067F0" />
                                    </svg>
                                </a>
                            </li>

                            <li class="card__social-item">
                                <a href="#" class="card__social-link">
                                    <svg class="card__social-img" width="2.8rem" height="2.8rem" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M14.0003 1.16675C6.91633 1.16675 1.16699 6.91608 1.16699 14.0001C1.16699 21.0841 6.91633 26.8334 14.0003 26.8334C21.0843 26.8334 26.8337 21.0841 26.8337 14.0001C26.8337 6.91608 21.0843 1.16675 14.0003 1.16675ZM14.0003 7.73741C15.6815 7.73741 17.0547 9.11058 17.0547 10.7917C17.0547 12.4729 15.6815 13.8461 14.0003 13.8461C12.3192 13.8461 10.946 12.4729 10.946 10.7917C10.946 9.11058 12.3192 7.73741 14.0003 7.73741ZM17.1701 20.5322C16.9905 20.6734 16.7852 20.7376 16.5798 20.7376C16.2975 20.7376 16.0151 20.6092 15.8226 20.3782L14.0132 18.0939L12.2036 20.3782C11.8828 20.7889 11.2668 20.8659 10.8561 20.5322C10.4455 20.1986 10.3685 19.5954 10.7021 19.1848L12.2293 17.2469C11.8187 17.1314 11.408 16.9902 11.023 16.7977C10.5481 16.5539 10.3556 15.9764 10.5995 15.5016C10.8305 15.0268 11.408 14.8342 11.8956 15.0781C13.2303 15.7454 14.8216 15.7454 16.1563 15.0781C16.6183 14.8471 17.2086 15.0268 17.4396 15.4888C17.6835 15.9508 17.5167 16.5283 17.0547 16.7721C16.6568 16.9774 16.2333 17.1186 15.8098 17.2341L17.3498 19.1719C17.645 19.5954 17.5808 20.1986 17.1701 20.5322Z"
                                                fill="#FF7A00" />
                                    </svg>
                                </a>
                            </li>

                            <li class="card__social-item">
                                <a href="#" class="card__social-link">
                                    <svg class="card__social-img" width="3rem" height="3rem" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M27.4749 14.2626C27.0499 7.01256 20.4624 1.42507 12.8749 2.67507C7.64987 3.53757 3.46238 7.77505 2.64988 13C2.17488 16.025 2.79991 18.8876 4.16241 21.2501L3.04989 25.3876C2.79989 26.3251 3.66236 27.1751 4.58736 26.9126L8.66237 25.7876C10.5124 26.8751 12.6749 27.5001 14.9874 27.5001C22.0374 27.5001 27.8874 21.2876 27.4749 14.2626ZM21.0999 19.6501C20.9874 19.8751 20.8499 20.0876 20.6749 20.2876C20.3624 20.6251 20.0248 20.8751 19.6498 21.0251C19.2748 21.1876 18.8624 21.2626 18.4249 21.2626C17.7874 21.2626 17.0999 21.1126 16.3874 20.8001C15.6624 20.4876 14.9499 20.075 14.2374 19.5625C13.5124 19.0375 12.8374 18.4501 12.1874 17.8126C11.5374 17.1626 10.9624 16.475 10.4374 15.7625C9.92485 15.05 9.51238 14.3375 9.21238 13.625C8.91238 12.9125 8.7624 12.2251 8.7624 11.5751C8.7624 11.1501 8.83739 10.7376 8.98739 10.3626C9.13739 9.97507 9.37491 9.62507 9.71241 9.31257C10.1124 8.91257 10.5499 8.72507 11.0124 8.72507C11.1874 8.72507 11.3623 8.76257 11.5248 8.83756C11.6873 8.91257 11.8374 9.02506 11.9499 9.18756L13.3998 11.2375C13.5123 11.4 13.5999 11.5376 13.6499 11.6751C13.7124 11.8126 13.7374 11.9375 13.7374 12.0625C13.7374 12.2125 13.6874 12.3626 13.5999 12.5126C13.5124 12.6626 13.3999 12.8126 13.2499 12.9626L12.7748 13.4625C12.6998 13.5375 12.6749 13.6126 12.6749 13.7126C12.6749 13.7626 12.6874 13.8126 12.6999 13.8626C12.7249 13.9126 12.7374 13.9501 12.7499 13.9876C12.8624 14.2001 13.0624 14.4625 13.3374 14.7875C13.6249 15.1125 13.9249 15.4501 14.2499 15.7751C14.5874 16.1126 14.9124 16.4125 15.2499 16.7C15.5749 16.975 15.8499 17.1626 16.0624 17.2751C16.0999 17.2876 16.1374 17.3125 16.1749 17.325C16.2249 17.35 16.2749 17.3501 16.3374 17.3501C16.4499 17.3501 16.5249 17.3126 16.5999 17.2376L17.0749 16.7626C17.2374 16.6001 17.3874 16.4876 17.5249 16.4126C17.6749 16.3251 17.8124 16.275 17.9749 16.275C18.0999 16.275 18.2249 16.3001 18.3624 16.3626C18.4999 16.4251 18.6499 16.5001 18.7999 16.6126L20.8749 18.0876C21.0374 18.2001 21.1499 18.3376 21.2249 18.4876C21.2874 18.6501 21.3249 18.8 21.3249 18.975C21.2499 19.1875 21.1999 19.4251 21.0999 19.6501Z"
                                                fill="#34CE69" />
                                    </svg>
                                </a>
                            </li>

                            <li class="card__social-item">
                                <a href="#" class="card__social-link">
                                    <svg class="card__social-img" width="2.6rem" height="2.6rem" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 0C5.824 0 0 5.824 0 13C0 20.176 5.824 26 13 26C20.176 26 26 20.176 26 13C26 5.824 20.176 0 13 0Z"
                                              fill="#00A3FF" />
                                        <path
                                                d="M18.0898 8.69615L16.2413 17.4133C16.1018 18.0285 15.7382 18.1816 15.2215 17.892L12.4049 15.8165L11.046 17.1237C10.8955 17.2742 10.77 17.3998 10.4799 17.3998L10.6825 14.5315L15.9023 9.81484C16.1293 9.61271 15.8528 9.50028 15.5496 9.70284L9.09652 13.7663L6.31839 12.8966C5.71421 12.708 5.70327 12.2924 6.44439 12.0023L17.3106 7.8159C17.8137 7.62734 18.2538 7.9279 18.0898 8.69659V8.69615Z"
                                                fill="white" />
                                    </svg>
                                </a>
                            </li>

                            <li class="card__social-item">
                                <a href="#" class="card__social-link card__social-link--vk">
                                    <svg width="2.4rem" height="2.4rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="2.4rem" height="2.4rem" rx="0.8rem" fill="#4071F0" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M19.633 9.54171C19.7437 9.22971 19.633 9 19.103 9H17.3531C16.9077 9 16.7024 9.19829 16.5911 9.41714C16.5911 9.41714 15.7011 11.2434 14.4404 12.4297C14.0325 12.7737 13.8471 12.8829 13.6245 12.8829C13.5131 12.8829 13.3458 12.7737 13.3458 12.4611V9.54171C13.3458 9.16686 13.2231 9 12.8525 9H10.1005C9.82254 9 9.65521 9.17371 9.65521 9.33886C9.65521 9.69371 10.2859 9.776 10.3505 10.7749V12.9451C10.3505 13.4211 10.2485 13.5074 10.0259 13.5074C9.43255 13.5074 7.98925 11.6726 7.1326 9.57314C6.9666 9.16457 6.79861 9 6.35128 9H4.59999C4.1 9 4 9.19829 4 9.41714C4 9.80686 4.59332 11.7429 6.76328 14.3034C8.20991 16.052 10.2465 17 12.1018 17C13.2145 17 13.3518 16.7897 13.3518 16.4269V15.1051C13.3518 14.684 13.4571 14.6 13.8098 14.6C14.0698 14.6 14.5144 14.7097 15.5531 15.5526C16.7397 16.552 16.9351 17 17.603 17H19.353C19.853 17 20.1037 16.7897 19.9597 16.3737C19.801 15.96 19.2343 15.3594 18.483 14.6469C18.075 14.2411 17.4631 13.804 17.2771 13.5851C17.0177 13.3046 17.0917 13.1794 17.2771 12.9297C17.2771 12.9297 19.4103 10.4006 19.6323 9.54171H19.633Z"
                                              fill="white" />
                                    </svg>
                                </a>
                            </li>
                        </ul>

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

                <div class="card__seller card__seller--credit">
                    <div class="card__top">
                        <div class="card__service">
                            Маникюр
                        </div>

                        <div class="card__cost">
                            <?=number_format($item['UF_TRANSPORT_PRICE'], 0, '', ' ')?>
                        </div>

                        <div class="card__favorite card__favorite--favorite">
                            <div class="card__favorite-text">
                                В избранном
                            </div>

                            <a class="card__favorite-btn">
                                <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                                            stroke="white" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="card__info">
                        <img class="card__info-img" src="<?=SITE_TEMPLATE_PATH?>/images/user1.jpg" alt="Алина Петрова">

                        <div class="card__info-wrapper">
                            <div class="card__name">
                                Алина Петрова
                            </div>

                            <div class="card__time">
                                На Авито с 16 декабря 2020 года
                            </div>

                            <div class="card__about">
                                <div class="card__rating">
                                    <img class="card__rating-img" src="<?=SITE_TEMPLATE_PATH?>/images/star.svg"5.0">

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
                                <img class="card__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                Написать
                            </a>

                            <div class="card__tel">
                                <img class="card__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

                                <div class="card__tel-wrapper">
                                    <a class="card__tel-show" href="#">
                                        Показать телефон
                                    </a>

                                    <a class="card__num" href="#">
                                        +371 ··· ··· ·· ··
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

                    <div class="card__seller-credit">
                        <img class="card__seller-img" src="<?=SITE_TEMPLATE_PATH?>/images/seller-bank.png" alt="Тинькофф банк">

                        <div class="card__seller-wrapper">
                            <div class="card__seller-text">
                                В кредит
                            </div>

                            <div class="card__seller-title">
                                Тинькофф Банк
                            </div>
                        </div>

                        <div class="card__seller-right">
                            <div class="card__seller-cost">
                                от <span>8 950</span> ₽/мес.
                            </div>

                            <a class="card__seller-calc" href="#">
                                Рассчитать
                            </a>
                        </div>
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
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper4.jpg" alt="">
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
                                        <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
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
                                <img class="cart__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart cart--active">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper4.jpg" alt="">
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
                                        <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
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
                                <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/avito1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/avito2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/avito3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/avito1.jpg" alt="">
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
                                        <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов. Своевременное обслуживание. Пройдено
                                    ТО. Весь
                                    комплект
                                    ключей и документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
                                         alt="добавить в избранное">
                                </a>
                            </div>
                        </div>

                        <div class="cart__author">
                            <img class="cart__author-img" src="<?=SITE_TEMPLATE_PATH?>/images/user-1.jpg" alt="Александр Соколов">

                            <div class="cart__name">
                                Александр Соколов
                            </div>

                            <div class="cart__reg-date">
                                На Stendū с 12 ноября 2021
                            </div>

                            <div class="cart__tel">
                                <img class="cart__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>

                    <li class="announcements__item cart">
                        <div class="cart__top">
                            <div class="cart__inner">
                                <ul class="cart__list swiper-wrapper">
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper2.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper1.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper3.jpg" alt="">
                                    </li>

                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img" src="<?=SITE_TEMPLATE_PATH?>/images/recomendation-swiper4.jpg" alt="">
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
                                        <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt="местоположение">

                                        Рига
                                    </div>

                                    <div class="cart__date">
                                        14 сентября 10:29
                                    </div>
                                </div>
                            </div>


                            <div class="cart__info">
                                <div class="cart__text">
                                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал. Весь
                                    комплект ключей и
                                    документов. Птс оригинал. Весь комплект ключей и документов.
                                </div>

                                <a class="cart__message btn-blue" href="#">
                                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                    Написать
                                </a>

                                <a class="cart__favorite" href="#">
                                    <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                                    <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
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
                                <img class="cart__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

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
                                <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                                Написать
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</main>

<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU" type="text/javascript"></script>
<script>
    let map;

    ymaps.ready(initMap);

    function initMap() {
        map = new ymaps.Map(document.getElementById("map"), {
            center: [55.882409, 37.575702],
            zoom: 12,
        });

        let placemark = new ymaps.Placemark([55.882409, 37.575702], {}, {
            iconLayout: 'default#image',
            iconImageHref: 'images/map-marker.svg',
            iconImageSize: [27, 27],
            iconImageOffset: [-25, -77]
        });
        map.controls.remove('geolocationControl');
        map.controls.remove('searchControl');
        map.controls.remove('trafficControl');
        map.controls.remove('typeSelector');
        map.controls.remove('fullscreenControl');
        map.controls.remove('zoomControl');
        map.controls.remove('rulerControl');

        map.geoObjects.add(placemark);
    }
</script>

