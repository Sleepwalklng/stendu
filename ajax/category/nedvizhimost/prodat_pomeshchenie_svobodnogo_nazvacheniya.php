<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if ($_REQUEST['region'] == 54) {
    $latLng = '56.97306259784141, 24.1009260120028';
} else if ($_REQUEST['region'] == 55) {
    $latLng = '54.752091655781335, 25.3141734869178';
} else if ($_REQUEST['region'] == 56) {
    $latLng = '59.43724772225245, 24.742763279376838';
}
$str = 'Магазин, Банк, Выпечка, Клиника, Сервис, Фотостудия, Цех, Шаурма, Шиномонтаж, Коммерция, Сауна, Шоурум, Гостиница, Кальянная, Кафе, Аптека, Салон красоты, Бытовые услуги, Ателье одежды, Бар, Медицинский центр, Клуб, Кондитерская, Мастерская, Парикмахерская, Пекарня, Продукты, Ресторан, Спортзал, Фитнес, Студия, Фрукты, Хостел, Автомойка, Цветы, Школа, Стоматология, Зал, Офис, Общепит, Ломбард, Выставка, Spa-салон, Косметология, Маникюр, Автосервис, Авиакассы, Автозапчасти, Автосалон, АЗС, Алкомаркет, Антикафе, Арендный бизнес, База, база отдыха, Банный комплекс, Белье, Бижутерия, Бильярдная, Больничный комплекс, Боулинг, букмекерская контора, Бутик, Буфет, Бытовая техника, Галерея, Гипермаркет, Гостевой дом, Готовый бизнес, Детские товары, Детский клуб, Детский магазин, Детский сад, Детский центр, Доходный дом, Завод, Займы, Зоомагазин, Зоотовары, Зубная поликлиника, Интернет-магазин, Йога, Квест, Клиентский офис, Косметика, Кофейня, Кулинария, Малое производство, Массажный салон, Мебель, Мини-отель, Мясо, Нотариальная контора, Ночной клуб, Обмен Валюты, Обувь, Одежда, Оптика, Пансионат, Парфюмерия, Пиццерия, Посуда, Представительство, Производство, Пункт выдачи, Рабочее место, Рабочий кабинет, Рыба, Салон, Салон связи, Санаторий, Свободное назначение, Склад, Спортивный зал, СТО, Столовая, Стрит-ретейл, Стройматериалы, Студия танцев, Сувениры, Сумки, Супермаркет, Суши, Тату салон, Типография, ТНП, Товары для дома, Торговая площадь, Торговля, Торговое, Торговый комплекс, Торговый центр, Турагенство, Услуги, Учебный центр, Фастфуд, Ферма, Химчистка, Хлебокомбинат, Частная практика, Швейный цех, Электронные сигареты, Ювелирный, Другое';
$arr = explode(', ', $str);
?>
<form class="add-new-item_form" method="post" enctype="multipart/form-data">
    <section class="announcement">
        <div class="container">
            <div class="announcement-title">Создание объявления</div>
            <div class="announcement-wrap">
                <div class="announcement-content">

                    <!-- Категория -->
                    <div class="announcement-content__block announcement-content__category">
                        <div class="announcement-content__title">Категория</div>
                        <div class="announcement-content__category-block">
                            <div class="announcement-content__category-name">
                                <div class="announcement-content__category-img">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-3.svg" alt="">
                                </div>
                                <div class="announcement-content__category-text">
                                    <ul class="announcement-content__category-list">
                                        <li>
                                            <a href="#">Недвижимость</a>
                                        </li>
                                        <li>
                                            <a href="#">Продам</a>
                                        </li>
                                        <li>
                                            <a href="#">Коммерческая</a>
                                        </li>
                                    </ul>
                                    <div class="announcement-content__category-description">Помещение свободного
                                        назначения
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="announcement-content__category-more other-category">
                                <span>Другая категория</span>
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/edit-icon.svg" alt="">
                            </a>
                        </div>
                    </div>

                    <!-- Адрес -->
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "stendu",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/includes/property_map-block.php"
                        )
                    );?>
                    <!-- Об объекте -->
                    <div class="announcement-content__block announcement-content__apartment">
                        <div class="announcement-content__title">Об объекте</div>
                        <div class="announcement-content__block-wrap grid">



                            <div class="col_33">
                                <div class="label">
                                    <div class="announcement-label__title">Возможное назначение</div>
                                    <select name="UF_POSPURPOSE" id="">
                                        <? foreach ($arr as $item): ?>
                                            <option value="<?=$item?>"><?=$item?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Кадастровый номер</div>
                                    <input type="text" name="UF_CADASTRAL">
                                </label>
                            </div>

                            <div class="col_33">
                                <div class="label">
                                    <div class="announcement-label__title">Юридический адрес</div>
                                    <select name="UF_LEGAL_ADDRESS" id="">
                                        <option value="Предоставляется">Предоставляется</option>
                                        <option value="Не предоставляется">Не предоставляется</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Этаж</div>
                                    <input type="text" name="UF_FLOOR_LEVEL">
                                </label>
                            </div>

                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Этажей в здании*</div>
                                    <input type="text" name="UF_FLOOR_LEVEL_MAX">
                                </label>
                            </div>

                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Год постройки</div>
                                    <input type="text" name="UF_BUILDING_YEAR">
                                </label>
                            </div>

                            <div class="col_33">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden"  name="UF_OCCUPIED">
                                    <span></span>
                                    <div>Помещение занято?</div>
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Площадь -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Площадь</div>
                        <div class="announcement-content__block-wrap grid">
                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Площадь</div>
                                    <input type="text" name="UF_COM_SQUARE">
                                </label>
                            </div>

                            <div class="col_33">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_SELL_IN_PARTS">
                                    <span></span>
                                    <div>Возможна продажа частями</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter">
                            <div class="grid">
                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Высота потолков</div>
                                        <input type="text" name="UF_CEILING_HEIGHT">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Состояние</div>
                                        <select name="UF_CONDITION" id="">
                                            <option value="Типовой ремонт">Типовой ремонт</option>
                                            <option value="Дизайнерский ремонт">Дизайнерский ремонт</option>
                                            <option value="Под чистовую отделку">Под чистовую отделку</option>
                                            <option value="Требуется капитальный ремонт">Требуется капитальный ремонт</option>
                                            <option value="Требуется косметический ремонт">Требуется косметический ремонт</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество мокрых точек</div>
                                        <select name="UF_WET_SPOTS" id="">
                                            <option value="Нет">Нет</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Электрическая мощность</div>
                                        <input type="text" name="UF_ELECTRIC_POWER">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Вход</div>
                                        <select name="UF_ENTRY" id="">
                                            <option value="Отдельный со двора">Отдельный со двора</option>
                                            <option value="Отдельный с улицы">Отдельный с улицы</option>
                                            <option value="Общий со двора">Общий со двора</option>
                                            <option value="Общий с улицы">Общий с улицы</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_DISPLAY_WINDOWS">
                                        <span></span>
                                        <div>Витринные окна</div>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- О здании -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">О здании</div>
                        <div class="announcement-chapter">
                            <div class="grid">

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Название</div>
                                        <input type="text" name="UF_HOUSE_NAME">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Тип здания</div>
                                        <select name="UF_BUILDING_TYPE" id="">
                                            <option value="Административное здание">Административное здание</option>
                                            <option value="Свободное">Свободное</option>
                                            <option value="Многофункциональный комплекс">Многофункциональный комплекс</option>
                                            <option value="Торгово-развлекательный центр">Торгово-развлекательный центр</option>
                                            <option value="Жилой комплекс">Жилой комплекс</option>
                                            <option value="Жилой дом">Жилой дом</option>
                                            <option value="Отдельно стоящее здание">Отдельно стоящее здание</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Общая площадь</div>
                                        <input type="text" name="UF_TOTAL_AREA">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Площадь участка</div>
                                        <div class="label__inner">
                                            <input type="text" name="UF_PLOT_SQUARE">
                                            <select name="GA" id="">
                                                <option value="Га">Га</option>
                                                <option value="Сот." selected>Сот.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Тип участка</div>
                                        <select name="UF_PLOT_TYPE" id="">
                                            <option value="В собственности">В собственности</option>
                                            <option value="В аренде">В аренде</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Категория здания</div>
                                        <select name="UF_BUILDING_CATEGORY" id="">
                                            <option value="Действующее">Действующее</option>
                                            <option value="Проект">Проект</option>
                                            <option value="Строящееся">Строящееся</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Девелопер</div>
                                        <input type="text" name="UF_DEVELOPER">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Управляющая компания</div>
                                        <input type="text" name="UF_MANAG_COMPANY">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Вентиляция</div>
                                        <select name="UF_VENTILATION" id="">
                                            <option value="Нет">Нет</option>
                                            <option value="Естественная">Естественная</option>
                                            <option value="Приточная">Приточная</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Кондиционирование</div>
                                        <select name="UF_CONDITIONING" id="">
                                            <option value="Нет">Нет</option>
                                            <option value="Местное">Местное</option>
                                            <option value="Центральное">Центральное</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Система пожаротушения</div>
                                        <select name="UF_FIRE_SYSTEM" id="">
                                            <option value="Нет">Нет</option>
                                            <option value="Гидрантная">Гидрантная</option>
                                            <option value="Спринклерная">Спринклерная</option>
                                            <option value="Порошковая">Порошковая</option>
                                            <option value="Газовая">Газовая</option>
                                            <option value="Сигнализация">Сигнализация</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- О собственнике -->
                    <div class="announcement-content__block announcement-content__appearance appearance-apartment">
                        <div class="announcement-content__title">Внешний вид</div>
                        <div class="announcement-content__appearance-block">
                            <div class="announcement-label__title">Фотографии</div>
                            <div class="announcement-content__appearance-photos-wrap">
                                <div class="announcement-content__appearance-photos">

                                </div>
                                <label>
                                    <input type="file" multiple id="upload-file" hidden
                                           class="announcement-content__appearance-photo-input"
                                           name="file[]">
                                </label>
                            </div>
                        </div>
                        <div class="get_adv">
                            <div class="get_adv__title">Получите дополнительные преимущества для своего объявления
                                бесплатно:
                            </div>
                            <div class="get_adv__item">
                                <div class="icon">
                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 5.48222L5.49036 9L13 2" stroke="#5071E6" stroke-width="3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span>Просто укажите кадастровый номер и ФИО владельца (эти данные не будут видны в объявлении)</span>
                            </div>
                            <div class="get_adv__item">
                                <div class="icon">
                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 5.48222L5.49036 9L13 2" stroke="#5071E6" stroke-width="3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span>Мы бесплатно проведем проверку в Росреесте</span>
                            </div>
                            <div class="get_adv__item">
                                <div class="icon">
                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 5.48222L5.49036 9L13 2" stroke="#5071E6" stroke-width="3"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span>Вашему объявлению будет добавлен яркий значок “Проверено Росреестром”, вызывающий больше доверия</span>
                            </div>
                            <button type="button" class="get_adv__btn btn-blue">Получить</button>
                        </div>
                    </div>

                    <!-- Видео -->
                    <div class="announcement-content__block announcement-content__video">
                        <div class="announcement-content__title">Видео</div>
                        <div class="grid">
                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Добавьте ссылку на видеоролик об объекте
                                        <span>?</span></div>
                                    <input type="search" name="UF_VIDEO">
                                </label>
                            </div>
                        </div>
                    </div>


                    <!-- Заголовок объявления для ТОП и Премиум объявлений -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Заголовок объявления для ТОП и Премиум объявлений</div>
                        <div class="announcement-content__subtitle">Для ТОП и Премиум объявлений</div>
                        <label class="wide">
                            <textarea name="UF_TITLE" placeholder="Заголовок объявления 33 символа"></textarea>
                        </label>
                    </div>

                    <!-- Описание -->
                    <div class="announcement-content__block announcement-content__description">
                        <div class="announcement-content__title">Описание</div>
                        <div class="announcement-content__block-wrap">
                            <label class="wide">
									<textarea name="UF_DESCRIPTION"
                                              placeholder="Пожалуйста, не пишите требования, которые ограничивают арендаторов.
Например, по их национальности или полу."></textarea>
                            </label>
                        </div>
                    </div>

                    <!-- Цена -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Цена</div>
                        <div class="announcement-content__block-wrap grid">

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Цена</div>
                                    <input type="text" value="" name="UF_PRICE">
                                    <span class="measure">€</span>
                                </label>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Налог</div>
                                    <select name="UF_TAX" id="">
                                        <option value="НДС включен">НДС включен</option>
                                        <option value="НДС не облагается">НДС не облагается</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col_50">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden"  name="UF_RENT_RIGHTS">
                                    <span></span>
                                    <div>Переуступка прав аренды</div>
                                </label>
                            </div>
                            <? if ($_REQUEST['agent'] == 82): ?>
                                <div class="col_50">
                                    <div class="label">
                                        <div class="announcement-label__title">Бонус к агенту</div>
                                        <select name="UF_BONUS" id="bonus">
                                            <option value="Нет">Нет</option>
                                            <option value="Фиксированная цена">Фиксированная цена</option>
                                            <option value="Процент">Процент</option>
                                        </select>
                                    </div>
                                </div>
                                                            <div class="col_50"></div>
                                <div class="col_50 agent-bonus"></div>
                                <script>
                                    $('#bonus').on('change', function () {
                                        var bonus = $(this).val();
                                        console.log(bonus)
                                        if (bonus != 'Нет') {
                                            $.ajax({
                                                type: 'post',
                                                url: '/ajax/agent_bonus.php',
                                                data: {bonus: bonus},
                                                dataType: 'html',
                                                success: function (e) {
                                                    $('.agent-bonus').empty().append(e);
                                                },
                                                error: function (e) {
                                                    console.log(e)
                                                    console.log(false);
                                                }
                                            });
                                        } else {
                                            $('.agent-bonus').empty()
                                        }
                                    })
                                </script>
                            <? endif; ?>

                        </div>
                    </div>

                    <!-- Контакты -->
                    <div class="announcement-content__block announcement-content__contacts">
                        <div class="announcement-content__title">Контакты</div>
                        <div class="announcement-content__contacts-wrap announcement-contacts__wrap grid">
                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Основной (мобильный)*</div>
                                    <input type="tel" name="UF_OWNER_PHONE">
                                </label>
                            </div>

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Номер телефона 2</div>
                                    <input type="tel" name="UF_PHONE_TWO">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="announcement-content__block announcement-content__save">
                        <a href="#" class="announcement-content__save-btn announcement-save__btn">
                            <div class="announcement-content__save-btn-img">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/save-icon.svg" alt="">
                            </div>
                            <div class="announcement-content__save-btn-text">Сохранить и выйти</div>
                        </a>
                        <input class="region" type="hidden" name="region" value="<?= $_REQUEST['region'] ?>">
                        <input class="agent" type="hidden" name="agent" value="<?= $_REQUEST['agent'] ?>">
                        <input class="deal" type="hidden" name="deal" value="<?= $_REQUEST['deal'] ?>">
                        <input class="type_of_rs" type="hidden" name="type_of_rs"
                               value="<?= $_REQUEST['type_of_rs'] ?>">
                        <input class="type" type="hidden" name="type" value="<?= $_REQUEST['subcategory'] ?>">
                        <button type="submit" class="announcement-content__save-next">Продолжить</button>
                    </div>
                </div>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "stendu",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/includes/ads_status.php"
                    )
                );?>
            </div>
        </div>
    </section>

</form>
<!--    <script src="--><?//= SITE_TEMPLATE_PATH ?><!--/js/additem-property.js"></script>-->
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/additem-property.js?<?=filemtime( $_SERVER['DOCUMENT_ROOT'] .SITE_TEMPLATE_PATH.'/js/additem-property.js' )?>" ></script>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "stendu",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/includes/announcement-modal.php"
    )
);?>