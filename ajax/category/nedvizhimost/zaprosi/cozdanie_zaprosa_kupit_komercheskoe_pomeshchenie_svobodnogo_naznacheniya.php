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
            <div class="announcement-title">Создание запроса на недвижимость</div>
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
                                            <a href="#">Купить</a>
                                        </li>
                                        <li>
                                            <a href="#">Коммерческая</a>
                                        </li>
                                    </ul>
                                    <div class="announcement-content__category-description">Помещение свободного назначения</div>
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

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Возможное назначение</div>
                            <div class="grid">

                                <? foreach ($arr as $item): ?>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_POSPURPOSE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div><?=$item?></div>
                                        </label>
                                    </div>

                                <? endforeach; ?>
                            </div>

                            <button type="button" class="announcement-chapter__title dropdown_btn view_more">
                                <span>Показать еще</span>
                                <svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 2L8.5 7L15 2" stroke="#B1B6C8" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">О помещении</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_OCCUPIED_Y" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Помещение занято</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_OCCUPIED_N" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Помещение не занято</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Юридический адрес</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LEGAL_ADDRESS_Y" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Предоставляется</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LEGAL_ADDRESS_N" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Не предоставляется</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_66">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Этаж
                                    </div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <div class="range ">
                                                <label>
                                                    <input name="UF_FLOOR_LEVEL_OT" type="number" placeholder="от">
                                                </label>
                                                <label>
                                                    <input name="UF_FLOOR_LEVEL_DO" type="number" placeholder="до">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col_50">
                                            <div class="checkbox_group">
                                                <label class="label-checkbox label-checkbox--boxy">
                                                    <input name="UF_FLOOR_LEVEL_NOT_FIRST" type="checkbox"
                                                           class="visually-hidden">
                                                    <span></span>
                                                    <div>не первый</div>
                                                </label>
                                                <label class="label-checkbox label-checkbox--boxy">
                                                    <input name="UF_FLOOR_LEVEL_NOT_LAST" type="checkbox"
                                                           class="visually-hidden">
                                                    <span></span>
                                                    <div>не последний</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Этажей в здании</div>

                                    <div class="range">
                                        <label>
                                            <input name="UF_FLOOR_LEVEL_MAX_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_FLOOR_LEVEL_MAX_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Год постройки</div>
                            <div class="range ">
                                <label>
                                    <input name="UF_BUILDING_YEAR_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_BUILDING_YEAR_DO" type="number" placeholder="до">
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- Площадь -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Площадь</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_33">

                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Площадь, м²</div>

                                    <div class="range">
                                        <label>
                                            <input name="UF_COM_SQUARE_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_COM_SQUARE_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SELL_IN_PARTS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Возможна продажа частями</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Высота потолков</div>

                            <div class="range">
                                <label>
                                    <input name="UF_CEILING_HEIGHT_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_CEILING_HEIGHT_DO" type="number" placeholder="до">
                                </label>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Витринные окна</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DISPLAY_WINDOWS_Y" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Есть</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DISPLAY_WINDOWS_N" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Состояние</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Офисная отделка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Дизайнерский ремонт</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Требуется капитальный ремонт</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Требуется косметический ремонт</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Под чистовую отделку</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Количество мокрых
                                точек
                            </div>
                            <div class="announcement-switch announcement-switch--separate">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input name="UF_WET_SPOTS" type="radio" checked value="1">
                                        <span>1</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input name="UF_WET_SPOTS" type="radio">
                                        <span>2</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input name="UF_WET_SPOTS" type="radio">
                                        <span>3</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input name="UF_WET_SPOTS" type="radio">
                                        <span>4</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input name="UF_WET_SPOTS" type="radio">
                                        <span>Нет</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_33">

                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Электрическая мощность, кВт
                                    </div>

                                    <div class="range">
                                        <label>
                                            <input name="UF_ELECTRIC_POWER_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_ELECTRIC_POWER_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Вход</div>

                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_ENTRY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Отдельный с улицы</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_ENTRY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Отдельный со двора</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_ENTRY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Общий со двора</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_ENTRY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Общий с улицы</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- О здании -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">О здании</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип здания</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Администр.здание</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Свободное</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Многофункц. комплекс</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Торгово-развлекательный центр</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Жилой комплекс</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Жилой дом</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Отдельно стоящее здание</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="grid">

                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Общая
                                        площадь, м²
                                    </div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_TOTAL_AREA_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_TOTAL_AREA_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Площадь
                                        участка, Га
                                    </div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_PLOT_SQUARE_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_PLOT_SQUARE_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип участка</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В собственности</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В аренде</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Категория
                                здания
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Действующее</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Проект</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BUILDING_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Строящееся</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Другие
                                параметры
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DEVELOPER" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Девелопер</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DEVELOPER" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Управляющая компания</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Вентиляция</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_VENTILATION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Естественная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_VENTILATION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Приточная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_VENTILATION" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">
                                Кондиционирование
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITIONING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Местное</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITIONING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Центральное</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITIONING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_CONDITIONING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В+</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Система
                                пожаротушения
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Гидрантная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Спринклерная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Порошковая</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Газовая</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Сигнализация</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_FIRE_SYSTEM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Описание -->
                    <div class="announcement-content__block announcement-content__description">
                        <div class="announcement-content__title">Описание</div>
                        <div class="announcement-content__block-wrap">
                            <label class="wide">
									<textarea name="UF_DESCRIPTION" placeholder="Пожалуйста, не пишите требования, которые ограничивают арендаторов.
Например, по их национальности или полу."></textarea>
                            </label>
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

                    <!-- Условия сделки -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Условия сделки</div>
                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Цена, €
                                    </div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_PRICE_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_PRICE_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                                <div class="col_33">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_RENT_RIGHTS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Переуступка прав аренды</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Налог</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TAX_Y" type="checkbox" class=" visually-hidden">
                                        <span></span>
                                        <div>С НДС</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TAX_N" type="checkbox" class="  visually-hidden">
                                        <span></span>
                                        <div>Без НДС</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <? if ($_REQUEST['agent'] == 82): ?>
                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Бонус к
                                    агенту, %
                                </div>
                                <div class="grid">
                                    <div class="col_33">
                                        <div class="range">
                                            <label>
                                                <input name="UF_BONUS_OT" type="number" placeholder="от">
                                            </label>
                                            <label>
                                                <input name="UF_BONUS_DO" type="number" placeholder="до">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col_33">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BONUS_N" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Нет</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <? endif; ?>

                    </div>

                    <!-- Контакты -->
                    <div class="announcement-content__block announcement-content__contacts">
                        <div class="announcement-content__title">Контакты</div>
                        <div class="announcement-content__contacts-wrap announcement-contacts__wrap grid">
                            <div class="col_50">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Основной
                                    (мобильный)
                                </div>
                                <label>
                                    <input type="tel" name="UF_OWNER_PHONE">
                                </label>
                            </div>

                            <div class="col_50">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Номер
                                    телефона 2
                                </div>
                                <label>
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



    <script src="<?= SITE_TEMPLATE_PATH ?>/js/additem-prop_request.js?<?=filemtime( $_SERVER['DOCUMENT_ROOT'] .SITE_TEMPLATE_PATH.'/js/additem-prop_request.js' )?>" ></script>
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