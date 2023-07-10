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
                                            <a href="#">Жилая</a>
                                        </li>
                                    </ul>
                                    <div class="announcement-content__category-description">Квартира</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Количество комнат
                            </div>
                            <div class="announcement-switch announcement-switch--separate">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS" checked value="1">
                                        <span>1</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>2</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>3</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>4</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>5</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>6+</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>Свободная планировка</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUMBER_OF_ROOMS">
                                        <span>Студия</span>
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
                                                           class="visually-hidden" checked>
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
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Этажей в
                                        доме
                                    </div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Материал дома
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Кирпичный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Блочный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Панельный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Монолитный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Деревянный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Монолитно-кирпичный</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MATERIAL_OF_HOUSE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Сталинский</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Площадь -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Площадь</div>
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
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Жилая
                                        площаль,м²
                                    </div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_LIVING_AREA_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_LIVING_AREA_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Площадь
                                        кухни,
                                        м²
                                    </div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_KITCHEN_AREA_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_KITCHEN_AREA_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Ремонт</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_REPAIR" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Косметический</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_REPAIR" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Евро</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_REPAIR" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Дизайнерский</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_REPAIR" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Без ремонта</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество балконов
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_NUM_BALCONY" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_NUM_BALCONY">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_NUM_BALCONY">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_NUM_BALCONY">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_NUM_BALCONY">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество лоджий
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_LOGGIA" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_LOGGIA">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_LOGGIA">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_LOGGIA">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_LOGGIA">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество разделенных санузлов
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_SEP" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_SEP">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_SEP">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_SEP">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_SEP">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество совмещенных санузлов
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_COMB" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_COMB">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_COMB">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_COMB">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_BATHROOM_COMB">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Окна</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WINDOW_VIEW" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Во двор</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WINDOW_VIEW" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>На улицу</div>
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- О здании -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">О здании</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество пассажирских лифтов
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_PASS" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_PASS">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_PASS">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_PASS">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_PASS">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Количество грузовых лифтов
                                    </div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_SERV" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_SERV">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_SERV">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_SERV">
                                                <span>4</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_ELEVATOR_SERV">
                                                <span>Нет</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Высота потолков
                            </div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Парковка</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PARKING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Наземная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PARKING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Многоуровневая</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PARKING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>На крыше</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PARKING" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Подземная</div>
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
                                        <input name="UF_RCHUTE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Мусовопровод</div>
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
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Ипотека
                                    </div>
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_MORTGAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Возможна ипотека</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип продажи</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SALES_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Свободная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SALES_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Альтернативная</div>
                                    </label>
                                </div>
                            </div>
                        </div>
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

<script src="<?= SITE_TEMPLATE_PATH ?>/js/additem-prop_request.js?<?=filemtime( $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH.'/js/additem-prop_request.js' )?>" ></script>

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
