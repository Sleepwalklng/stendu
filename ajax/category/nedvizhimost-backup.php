<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

?>

			<div class="map-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Место сделки</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-full">
                                <p class="new-ad__label-name">
                                    <span>Адрес</span>
                                    <span class="new-ad__label-name-icon">?</span>
                                </p>
                                <label class="map-ad__search-label new-ad__input-box">
                                    <input placeholder="Начните вводить адрес, а потом выберите из списка" type="text" name="MESTO" value="">
                                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.725 18.7424C15.6473 18.7424 19.6376 14.7707 19.6376 9.87121C19.6376 4.97178 15.6473 1 10.725 1C5.80278 1 1.8125 4.97178 1.8125 9.87121C1.8125 14.7707 5.80278 18.7424 10.725 18.7424Z" stroke="#4067F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.5167 20.6098L19.6406 18.7422" stroke="#4067F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </label>
                            </div>
                            <div class="map-ad__map">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/map.webp" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="contacts-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Контакты</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">
                                    <span>Размещает объявление</span>
                                </p>
                                <div class="new-ad__radio-box">
                                    <label class="new-ad__radio">
                                        <input type="radio" name="WHO" value="Собственник">
                                        <span>Собственник</span>
                                    </label>
                                    <label class="new-ad__radio">
                                        <input type="radio" name="WHO" value="Посредник">
                                        <span>Посредник</span>
                                    </label>
                                </div>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">
                                    <span>Введите e-mail</span>
                                </p>
                                <label class="new-ad__input-box">
                                    <input type="email" name="EMAIL" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">
                                    <span>Введите телефон</span>
                                </p>
                                <label class="new-ad__input-box">
                                    <input type="tel" name="TEL" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-full">
                                <div class="contacts-ad__radio-box">
                                    <p class="contacts-ad__radio-box-title">Способ связи</p>
                                    <label class="contacts-ad__radio-label active">
                                        <input type="radio" name="CONTACTS" checked value="По телефону и в сообщениях">
                                        <span class="contacts-ad__radio-icon"></span>
                                        <span class="contacts-ad__radio-name">По телефону и в сообщениях</span>
                                    </label>
                                    <label class="contacts-ad__radio-label">
                                        <input type="radio" name="CONTACTS" value="По телефону">
                                        <span class="contacts-ad__radio-icon"></span>
                                        <span class="contacts-ad__radio-name">По телефону </span>
                                    </label>
                                    <label class="contacts-ad__radio-label">
                                        <input type="radio" name="CONTACTS" value="В сообщениях">
                                        <span class="contacts-ad__radio-icon"></span>
                                        <span class="contacts-ad__radio-name">В сообщениях</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parameters-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Параметры</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Тип дома</p>
                                <label class="new-ad__input-box">
                                    <select name="TIP_DOMA">
                                        <option value="Кирпичный">Кирпичный</option>
                                        <option value="Картонный">Картонный</option>
                                    </select>
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Этаж</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="ETAZH" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Этажей в доме</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="ETAZH_VDOME" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Количество комнат</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="KOL_KOMNAT" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Общая площадь</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="FULL_PLOSHCHAD" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Площадь кухни</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="PLOSHCHAD_KUHNI" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Жилая площадь</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="PLOSHCHAD_ZHILAYA" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Количество кроватей</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="KOL_KROVATEY" value="">
                                </label>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Спальных мест</p>
                                <label class="new-ad__input-box">
                                    <input type="text" name="SPALNYH_MEST" value="">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="options-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Дополнительные параметры</h2>
                        <div class="options-ad__content">
                            <h3 class="options-ad__title">Техника</h3>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="PLITKA" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Плитка</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="MICROVOLNOVKA" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Микроволновка</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="UTUG" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Утюг</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="HOLODILNIK" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Холодильник</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="STIRALKA" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Стиральная машина</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="FEN" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Фен</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="options-ad__content">
                            <h3 class="options-ad__title">Коммуникации</h3>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="WIFI" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Wi-Fi</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="TELEVIZOR" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Телевизор</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="KABELNOE" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Кабельное или цифровое ТВ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="options-ad__content">
                            <h3 class="options-ad__title">Комфорт</h3>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="KONDEY" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Кондиционер</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="KAMIN" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Камин</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="PARKOVKA" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Парковочное место</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="BALKON" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Лоджия или балкон</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="options-ad__content">
                            <h3 class="options-ad__title">Дополнительно</h3>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="PITOMEC" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Можно с питомцами</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="DETI" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Можно с детьми</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="KURIT" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Можно курить</span>
                                    </label>
                                </div>
                                <div class="new-ad__flex-25 new-ad__checkbox-box">
                                    <label class="new-ad__checkbox-label">
                                        <input type="checkbox" name="MEROPRIYATIE" value="">
                                        <span class="new-ad__checkbox-icon">
                                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8.875L6.09091 13L17 2" stroke="#292D32" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        <span>Можно для мероприятий</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="photo-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Внешний вид</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-full">
                                <p class="new-ad__label-name">
                                    <span>Фотографии</span>
                                </p>
                                <ul class="photo-ad__photo-list">
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img1.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img2.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img3.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-new-photo.webp" alt="">
                                        <label class="photo-ad__label">
                                            <input type="file" name="FILE">
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="new-ad__flex-33">
                                <p class="new-ad__label-name">Цвет</p>
                                <label class="new-ad__input-box">
                                    <select name="COLOR">
                                        <option value="Белый">Белый</option>
                                        <option value="Черный">Черный</option>
                                    </select>
                                </label>
                            </div>
                            <div class="new-ad__flex-66">
                                <p class="new-ad__label-name">Видео c YouTube</p>
                                <label class="new-ad__input-box">
                                    <input placeholder="Например: https://www.youtube.com/watch?v=dQw4w9WgXcQ" type="text" name="VIDEO" value="">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="desc-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Описание</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-full">
                                <label class="new-ad__textarea-box">
                                    <textarea name="DESC" placeholder="Честно опишите достоинства и недостатки своего автомобиля. Не указывайте в описании телефон и e-mail — для этого есть отдельные поля."></textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="price-ad new-ad__form-item update-block">
                        <h2 class="new-ad__item-title">Цена и условия сделки</h2>
                        <div class="new-ad__item-content">
                            <div class="new-ad__flex-50">
                                <p class="new-ad__label-name">Арендная плата</p>
                                <label class="price-ad__label new-ad__input-box">
                                    <input type="number" name="PRICE" value="">
                                    <span class="price-ad__price">₽ / месяц</span>
                                </label>
                            </div>
                            <div class="new-ad__flex-50">
                                <p class="new-ad__label-name">Залог</p>
                                <label class="new-ad__input-box">
                                    <select name="ZALOG">
                                        <option value="Без залога">Без залога</option>
                                        <option value="С залогом">С залогом</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="new-ad__form-footer update-block">
                        <div class="new-ad__footer-box">
                            <div class="new-ad__footer-icon desktop">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-ad-footer-icon.svg" alt="">
                            </div>
                            <button type="submit" class="new-ad__footer-link">Сохранить и выйти</button>
                        </div>
                        <button class="new-ad__footer-btn">Продолжить</button>
                    </div>


<script>
    // Отправление форм
    $(document).ready(function () {
        $('.new-ad__form').submit(function () {
            var data = $(this).serialize();

            $.ajax({
                type: 'post',
                url: '/ajax/additem/nedvizhimost.php',
                data: data,
                dataType: 'html',
                success: function (e) {
                    //$('.category-select').empty().append(e);
                    $('body').append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });

        $(document).ready(function () {

        $('.new-ad__form').submit(function (e) {
            //var data = $(this).serialize();
            e.preventDefault();
            var formData = new FormData($(this)[0]);


            $.ajax({
                type: 'POST',
                url: '/ajax/additem/nedvizhimost.php',
                data: formData,
                //dataType: 'html',

                cache: false,
                processData : false,
                contentType : false,

                success: function (e) {
                    //$('.category-select').empty().append(e);
                    $('body').append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });



    // 14.12.2022
 $(document).ready(function () {

    // Resume
    $('.resume__desc-btn').click(function () {
        $('.resume__desc-text').toggleClass('active')
        $(this).toggleClass('active');
    });
    $('.resume__map-title-box').click(function () {
        $('.resume__map-btn').toggleClass('active');
        $('.resume__map').slideToggle();
    });

    // New ads
    $('.mask-gosnomer').length ? $('.mask-gosnomer').mask('a  999  a a') : false;
    $('.mask-vin').length ? $('.mask-vin').mask('999') : false;
    $('.new-ad__radio input').change(function () {
        $(this).parents('.new-ad__radio-box').find('.new-ad__radio').removeClass('active');
        $(this).parent().addClass('active');
    });
    $('.new-ad__checkbox-label input').change(function () {
        $(this).parent().toggleClass('active');
    });
    $('.brand-ad__label input').change(function () {
        $(this).parents('.brand-ad__list').find('.brand-ad__label.active').removeClass('active');
        $(this).parent().addClass('active');
    });
    $('.contacts-ad__radio-label input').change(function () {
        $('.contacts-ad__radio-label.active').removeClass('active');
        $(this).parent().addClass('active');
    });
    $('.photo-ad__del').click(function () {
        $(this).parents('.photo-ad__photo-item').remove();
    });
    $('.photo-ad__photo-list').sortable({
        items: '.photo-ad__photo-item:not(:last-child)'
    });

});
</script>