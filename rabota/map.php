<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Услуги"); ?>

    <main class="main main--hidden">
        <section class="property-map">
            <div class="property-map__top">
                <!--                <div class="dropdown property-map__link">-->
                <!--                    <span class="dropdown-btn">Купить</span>-->
                <!--                    <ul class="dropdown-list">-->
                <!--                        <li class="dropdown-item">Купить</li>-->
                <!--                        <li class="dropdown-item">Снять</li>-->
                <!--                        <li class="dropdown-item">Арендаторы</li>-->
                <!--                    </ul>-->
                <!--                </div>-->

                <!--                <div class="dropdown property-map__link">-->
                <!--                    <span class="dropdown-btn">Квартиру</span>-->
                <!--                    <ul class="dropdown-list">-->
                <!--                        <li class="dropdown-item">Квартиру</li>-->
                <!--                        <li class="dropdown-item">Машину</li>-->
                <!--                        <li class="dropdown-item">Дом</li>-->
                <!--                    </ul>-->
                <!--                </div>-->

                <div class="dropdown property-map__link">
                    <span class="dropdown-btn">1 комнатную</span>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">Студия</li>
                        <li class="dropdown-item">Свободная планировка</li>
                        <li class="dropdown-item">1 комнатную</li>
                        <li class="dropdown-item">2 комнатную</li>
                        <li class="dropdown-item">3 комнатную</li>
                        <li class="dropdown-item">4 комнатную</li>
                        <li class="dropdown-item">5 и более комнат</li>
                    </ul>
                </div>

                <div class="dropdown property-map__link">
                    <span class="dropdown-btn">Цена</span>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <input type="text" placeholder="От"/>
                        </li>
                        <li class="dropdown-item">
                            <input type="text" placeholder="До"/>
                        </li>
                    </ul>
                </div>

                <div class="dropdown property-map__link property-map__link--short">
                    <span class="dropdown-btn">Площадь</span>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <input type="text" placeholder="От"/>
                        </li>
                        <li class="dropdown-item">
                            <input type="text" placeholder="До"/>
                        </li>
                    </ul>
                </div>

                <a id="moreFiltersLink" class="property-map__link property-map__link--more">
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
                    <input class="property-map__input" type="text" placeholder="Город, адрес, район, ж/д, шоссе или ЖК">

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

                <!--            <a class="property-map__save" href="#">-->
                <!--                <div class="property-map__save-img">-->
                <!--                    <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--                        <path-->
                <!--                            d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"-->
                <!--                            stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />-->
                <!--                    </svg>-->
                <!--                </div>-->
                <!---->
                <!--                Сохранить поиск-->
                <!--            </a>-->
            </div>

            <div class="property-map__inner">
                <div class="property-map__left">
                    <div class="property-map__amount">
                        <span class="property-map__num">4</span> объявления
                    </div>

                    <ul class="property-map__list">
                        <li class="property-map__cart cart">
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
                                            2-к. квартира, 55,8 м², 20/33 эт.
                                        </div>

                                        <div class="cart__cost">
                                            11 824 020
                                        </div>
                                    </div>

                                    <div class="cart__right">
                                        <div class="cart__location">
                                            <img class="cart__location-img" src="images/location.svg"
                                                 alt="местоположение">

                                            Рига, Ижорская ул., вл. 6
                                        </div>
                                    </div>

                                    <a class="cart__favorite" href="#">
                                        <img class="cart__favorite-img" src="images/favorite.svg"
                                             alt="добавить в избранное">
                                        <img class="cart__favorite-img cart__favorite-img--active"
                                             src="images/favorite-fill.svg  "
                                             alt="добавить в избранное">
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="property-map__cart cart">
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
                                            2-к. квартира, 55,8 м², 20/33 эт.
                                        </div>

                                        <div class="cart__cost">
                                            11 824 020
                                        </div>
                                    </div>

                                    <div class="cart__right">
                                        <div class="cart__location">
                                            <img class="cart__location-img" src="images/location.svg"
                                                 alt="местоположение">

                                            Рига, Ижорская ул., вл. 6
                                        </div>
                                    </div>

                                    <a class="cart__favorite" href="#">
                                        <img class="cart__favorite-img" src="images/favorite.svg"
                                             alt="добавить в избранное">
                                        <img class="cart__favorite-img cart__favorite-img--active"
                                             src="images/favorite-fill.svg  "
                                             alt="добавить в избранное">
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="property-map__cart cart">
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
                                            2-к. квартира, 55,8 м², 20/33 эт.
                                        </div>

                                        <div class="cart__cost">
                                            11 824 020
                                        </div>
                                    </div>

                                    <div class="cart__right">
                                        <div class="cart__location">
                                            <img class="cart__location-img" src="images/location.svg"
                                                 alt="местоположение">

                                            Рига, Ижорская ул., вл. 6
                                        </div>
                                    </div>

                                    <a class="cart__favorite" href="#">
                                        <img class="cart__favorite-img" src="images/favorite.svg"
                                             alt="добавить в избранное">
                                        <img class="cart__favorite-img cart__favorite-img--active"
                                             src="images/favorite-fill.svg  "
                                             alt="добавить в избранное">
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="property-map__cart cart">
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
                                            2-к. квартира, 55,8 м², 20/33 эт.
                                        </div>

                                        <div class="cart__cost">
                                            11 824 020
                                        </div>
                                    </div>

                                    <div class="cart__right">
                                        <div class="cart__location">
                                            <img class="cart__location-img" src="images/location.svg"
                                                 alt="местоположение">

                                            Рига, Ижорская ул., вл. 6
                                        </div>
                                    </div>

                                    <a class="cart__favorite" href="#">
                                        <img class="cart__favorite-img" src="images/favorite.svg"
                                             alt="добавить в избранное">
                                        <img class="cart__favorite-img cart__favorite-img--active"
                                             src="images/favorite-fill.svg  "
                                             alt="добавить в избранное">
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="property-map__cart cart">
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
                                            2-к. квартира, 55,8 м², 20/33 эт.
                                        </div>

                                        <div class="cart__cost">
                                            11 824 020
                                        </div>
                                    </div>

                                    <div class="cart__right">
                                        <div class="cart__location">
                                            <img class="cart__location-img" src="images/location.svg"
                                                 alt="местоположение">

                                            Рига, Ижорская ул., вл. 6
                                        </div>
                                    </div>

                                    <a class="cart__favorite" href="#">
                                        <img class="cart__favorite-img" src="images/favorite.svg"
                                             alt="добавить в избранное">
                                        <img class="cart__favorite-img cart__favorite-img--active"
                                             src="images/favorite-fill.svg  "
                                             alt="добавить в избранное">
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div id="map"></div>
            </div>
        </section>
    </main>
    <div class="announcement-modal">
        <div class="announcement-modal__inner">
            <div class="announcement-modal__left">
                <img class="announcement-modal__img" src="images/announcement/appearance-photo.png" alt="">
            </div>

            <div class="announcement-modal__boundary"></div>

            <div class="announcement-modal__right">
                <div class="announcement-modal__title">
                    Пользователь увдит объявление <span>Часы Tangente Sport Neomatik Automatic</span> сразу после
                    проверки.
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
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?
$APPLICATION->IncludeComponent(
    "unikal:uslugi.map",
    "map",
    false
); ?>
    <!--<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU" type="text/javascript"></script>-->
    <!--<script>-->
    <!--    let map;-->
    <!---->
    <!--    ymaps.ready(initMap);-->
    <!---->
    <!--    function initMap() {-->
    <!--        map = new ymaps.Map(document.getElementById("map"), {-->
    <!--            center: [55.882409, 37.575702],-->
    <!--            zoom: 12,-->
    <!--        });-->
    <!---->
    <!--        let placemark = new ymaps.Placemark([55.882409, 37.575702], {}, {-->
    <!--            iconLayout: 'default#image',-->
    <!--            iconImageHref: 'images/map-marker.svg',-->
    <!--            iconImageSize: [53, 53],-->
    <!--            iconImageOffset: [-45, -77]-->
    <!--        });-->
    <!--        map.controls.remove('geolocationControl');-->
    <!--        map.controls.remove('searchControl');-->
    <!--        map.controls.remove('trafficControl');-->
    <!--        map.controls.remove('typeSelector');-->
    <!--        map.controls.remove('fullscreenControl');-->
    <!--        map.controls.remove('zoomControl');-->
    <!--        map.controls.remove('rulerControl');-->
    <!---->
    <!--        map.geoObjects.add(placemark);-->
    <!--    }-->
    <!--</script>-->

    <form class="map-filter">
        <div class="map-filter__inner">
            <a href="#" class="map-filter__close">

            </a>

            <div class="map-filter__title">
                Еще фильтры
            </div>

            <ul class="map-filter__items">
                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Тип сделки
                    </div>

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              От собственника
            </span>
                    </label>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Вид объекта
                    </div>

                    <ul class="map-filter__list">
                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio">

                                <span class="map-filter__radio-text">
                  Все
                </span>
                            </label>
                        </li>

                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio" checked>

                                <span class="map-filter__radio-text">
                  Вторичка
                </span>
                            </label>
                        </li>

                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio">

                                <span class="map-filter__radio-text">
                  Новостройка
                </span>
                            </label>
                        </li>
                    </ul>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Этаж
                    </div>

                    <input class="map-filter__number map-filter__number-min" placeholder="от" type="number">

                    <input class="map-filter__number map-filter__number--max" placeholder="до" type="number">

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              не первый
            </span>
                    </label>

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              не последний
            </span>
                    </label>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Тип дома
                    </div>

                    <div class="map-filter__wrapper">
                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Кирпичный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Панельный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Блочный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Монолитный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Блочный
              </span>
                        </label>
                    </div>
                </li>
            </ul>

            <div class="map-filter__bottom">
                <input class="map-filter__submit" value="Показать объекты" type="submit">

                <input class="map-filter__reset" value="Сбросить фильтры" type="reset">
            </div>
        </div>
    </form>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>