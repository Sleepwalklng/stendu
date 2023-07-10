<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if ($_REQUEST['region'] == 54) {
    $latLng = '56.97306259784141, 24.1009260120028';
} else if ($_REQUEST['region'] == 55) {
    $latLng = '54.752091655781335, 25.3141734869178';
} else if ($_REQUEST['region'] == 56) {
    $latLng = '59.43724772225245, 24.742763279376838';
}
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
                                            <a href="#">Сдам</a>
                                        </li>
                                        <li>
                                            <a href="#">Коммерческая</a>
                                        </li>
                                    </ul>
                                    <div class="announcement-content__category-description">Производство</div>
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
                                <label>
                                    <div class="announcement-label__title">Кадастровый номер</div>
                                    <input type="text" name="UF_CADASTRAL">
                                </label>
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
                                        <div class="announcement-label__title">Сетка колонн</div>
                                        <input type="text" name="UF_COLUMN_GRID">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Состояние</div>
                                        <select name="UF_CONDITION" id="">
                                            <option value="Типовой ремонт">Типовой ремонт</option>
                                            <option value="Требуется капитальный ремонт">Требуется капитальный ремонт
                                            </option>
                                            <option value="Требуется косметический ремонт">Требуется косметический
                                                ремонт
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Материал пола</div>
                                        <select name="UF_FLOOR_MATERIAL" id="">
                                            <option value="Полимерный">Полимерный</option>
                                            <option value="Бетон">Бетон</option>
                                            <option value="Линолеум">Линолеум</option>
                                            <option value="Асфальт">Асфальт</option>
                                            <option value="Плитка">Плитка</option>
                                            <option value="Наливной">Наливной</option>
                                            <option value="Железобетонный">Железобетонный</option>
                                            <option value="Деревянный">Деревянный</option>
                                            <option value="Ламинат">Ламинат</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <select name="UF_WET_SPOTS" id="">
                                        <option value="Нет">Нет</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Электрическая мощность</div>
                                        <input type="text" name="UF_ELECTRIC_POWER">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Ворота</div>
                                        <select name="UF_GATES" id="">
                                            <option value="На пандусе">На пандусе</option>
                                            <option value="Докового типа">Докового типа</option>
                                            <option value="На нулевой отметке">На нулевой отметке</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Парковка</div>
                                        <select name="UF_PARKING" id="">
                                            <option value="На территории объекта">На территории объекта</option>
                                            <option value="За территорией объекта">За территорией объекта</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Тип парковки</div>
                                        <select name="UF_PARKING_TYPE" id="">
                                            <option value="Для грузового транспорта">Для грузового транспорта</option>
                                            <option value="Для легковесного транспорта">Для легковесного транспорта
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество мест</div>
                                        <input type="text" name="UF_NUM_OF_PARKING">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Стоимость въезда</div>
                                        <input type="text" value="100" name="UF_ENTRY_PRICE">
                                        <span class="measure">€</span>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" checked name="UF_FREE_ENTRY">
                                        <span></span>
                                        <div>Бесплатный въезд</div>
                                    </label>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" checked
                                               name="UF_RESPONSIBLE_STORAGE">
                                        <span></span>
                                        <div>Ответственное хранение</div>
                                    </label>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_CUSTOMS">
                                        <span></span>
                                        <div>Таможня</div>
                                    </label>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_TRANSPORT_SERV">
                                        <span></span>
                                        <div>Транспортные услуги</div>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter">
                            <div class="announcement-chapter__title">Лифты</div>
                            <div class="grid">

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество грузовых лифтов</div>
                                        <input type="text" name="UF_ELEVATOR_SERV">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность грузовых лифтов</div>
                                        <input type="text" name="UF_CAPACITY_ELEVATORS">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество тельферов</div>
                                        <input type="text" name="UF_NUM_HOISTS">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность тельферов</div>
                                        <input type="text" name="UF_HOISTS_CAPACITY">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество пассажирских лифтов</div>
                                        <input type="text" name="UF_ELEVATOR_PASS">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность пассажирских лифтов
                                        </div>
                                        <input type="text" name="UF_CAPACITY_PASS_ELEVATORS">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter">
                            <div class="announcement-chapter__title">Краны</div>
                            <div class="grid">

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество мостовых кранов</div>
                                        <input type="text" name="UF_NUM_OVERHEAD_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность пассажирских кранов
                                        </div>
                                        <input type="text" name="UF_CAPACITY_PASS_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество кранов-балок</div>
                                        <input type="text" name="UF_NUM_BEAM_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность кранов-балок</div>
                                        <input type="text" name="UF_CAPACITY_BEAM_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество ж/д кранов</div>
                                        <input type="text" name="UF_NUM_RAIL_CRANES">
                                    </div>
                                </div>
                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность ж/д кранов</div>
                                        <input type="text" name="UF_CAPACITY_RAIL_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Количество козловых кранов</div>
                                        <input type="text" name="UF_NUM_GANTRY_CRANES">
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Грузоподъемность козловых кранов</div>
                                        <input type="text" name="UF_CAPACITY_GANTRY_CRANES">
                                    </div>
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
                                            <option value="Бизнес-парк">Бизнес-парк</option>
                                            <option value="Производственный комплекс">Производственный комплекс</option>
                                            <option value="Индустриальный парк">Индустриальный парк</option>
                                            <option value="Промплощадка">Промплощадка</option>
                                            <option value="Производственно-складской комплекс">Производственно-складской комплекс</option>
                                            <option value="Производственный цех">Производственный цех</option>
                                            <option value="Многофункциональный комплекс">Многофункциональный комплекс</option>
                                            <option value="Офисно-производственный комплекс">Офисно-производственный комплекс</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Класс здания</div>
                                        <select name="UF_BUILDING_CLASS" id="">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
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

                        <div class="announcement-chapter">
                            <div class="announcement-chapter__title">Инфаструктура</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_BUFFET">
                                        <span></span>
                                        <div>Буфет</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_HOTEL">
                                        <span></span>
                                        <div>Гостиница</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_OFFICE_ROOMS">
                                        <span></span>
                                        <div>Офисные помещения</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_DINING">
                                        <span></span>
                                        <div>Столовая</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox narrow">
                                        <input type="checkbox" class="visually-hidden" name="UF_RECEPTION">
                                        <span></span>
                                        <div>Центральная рецепция</div>
                                    </label>
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

                    <!-- Цена и условия сделки -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Цена и условия сделки</div>
                        <div class="announcement-content__block-wrap grid">

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Стоимость</div>
                                    <select name="UF_RENT_PRICE_TYPE" id="">
                                        <option value="В месяц за м2">В месяц за м2</option>
                                        <option value="В год за м2">В год за м2</option>
                                        <option value="В месяц">В месяц</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Цена*</div>
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
                                <div class="label">
                                    <div class="announcement-label__title">Срок аренды</div>
                                    <select name="UF_RENT_PERIOD" id="">
                                        <option value="Длительно">Длительно</option>
                                        <option value="На несколько месяцев">На несколько месяцев</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Юридический адрес</div>
                                    <select name="UF_LEGAL_ADDRESS" id="">
                                        <option value="Предоставляется">Предоставляется</option>
                                        <option value="Не предоставляется">Не предоставляется</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Тип аренды</div>
                                    <select name="UF_COMMERC_TYPE_RENT" id="">
                                        <option value="Прямая">Прямая</option>
                                        <option value="Субаренда">Субаренда</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Минимальный срок аренды</div>
                                    <input type="text" value="" name="UF_MIN_RENT_PERIOD">
                                </div>
                            </div>

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Обеспечительный платеж</div>
                                    <input type="text" value="3000" name="UF_SECURITY_DEPOSIT">
                                    <span class="measure">€ / месяц</span>
                                </label>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Предоплата</div>
                                    <select name="UF_PREPAY" id="">
                                        <option value="1 месяц">1 месяц</option>
                                        <option value="2 месяца">2 месяца</option>
                                        <option value="3 месяца">3 месяца</option>
                                        <option value="4 месяца">4 месяца</option>
                                        <option value="5 месяцев">5 месяцев</option>
                                        <option value="6 месяцев">6 месяцев</option>
                                        <option value="7 месяцев">7 месяцев</option>
                                        <option value="8 месяцев">8 месяцев</option>
                                        <option value="9 месяцев">9 месяцев</option>
                                        <option value="10 месяцев">10 месяцев</option>
                                        <option value="11 месяцев">11 месяцев</option>
                                        <option value="1 год">1 год</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Эксплутационные расходы</div>
                                    <select name="UF_OPERATION_COSTS" id="">
                                        <option value="Включены">Включены</option>
                                        <option value="Не предусмотрены">Не предусмотрены</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col_50">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_UTILITY_PAY_INCLUDED">
                                    <span></span>
                                    <div>Вкл. коммунальные платежи</div>
                                </label>
                            </div>

                            <div class="col_50">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_HOLIDAYS_RENT">
                                    <span></span>
                                    <div>Арендные каникулы</div>
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Комиссия арендатора -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Комиссия арендатора</div>
                        <div class="announcement-content__subtitle bold">Процент стоимости, который вы хотите получить
                            от арендатора
                        </div>
                        <div class="announcement-content__block-wrap grid">

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Размер комиссии</div>
                                    <input type="text" value="300" name="UF_COMMISSIONS_RENT">
                                    <span class="measure">€</span>
                                </label>
                            </div>

                            <div class="col_50">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" checked name="UF_WITHOUT_COMMISSIONS">
                                    <span></span>
                                    <div>Без комиссии</div>
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Комиссия от другого агента -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Комиссия от другого агента</div>
                        <div class="announcement-content__subtitle bold">Процент стоимости, который вы хотите получить
                            от другого агента
                        </div>
                        <div class="announcement-content__block-wrap grid">

                            <div class="col_50">
                                <label>
                                    <div class="announcement-label__title">Размер комиссии</div>
                                    <input type="text" value="300" name="UF_COMMISSIONS_AGENT">
                                    <span class="measure">€</span>
                                </label>
                            </div>

                            <div class="col_50">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" checked name="UF_WITHOUT_COMMISSIONS_AGENT">
                                    <span></span>
                                    <div>Без комиссии</div>
                                </label>
                            </div>

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