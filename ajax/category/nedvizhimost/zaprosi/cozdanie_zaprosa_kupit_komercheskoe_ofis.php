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
                                                <a href="#">Коммерческая</a>
                                            </li>
                                        </ul>
                                        <div class="announcement-content__category-description">Офис</div>
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
                                        <div class="announcement-chapter__title announcement-chapter__title--bold">
                                            Этажей в
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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">О помещении
                                </div>

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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Год постройки
                                </div>
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

                                        <div class="announcement-chapter__title announcement-chapter__title--bold">
                                            Площадь,
                                            м²
                                        </div>

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
                                            <div>Продажа частями</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Параметры -->
                        <div class="announcement-content__block">
                            <div class="announcement-content__title">Параметры</div>

                            <div class="announcement-chapter announcement-chapter--without-divider">

                                <div class="announcement-chapter__title announcement-chapter__title--bold">Высота
                                    потолков
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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Планировка
                                </div>
                                <div class="grid">
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_LAYOUT" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Кабинетная</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_LAYOUT" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Открытая</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_LAYOUT" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Смешанная</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_LAYOUT" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Коридорная</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Состояние
                                </div>
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
                                            <div>Под чистовую отделку</div>
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
                                </div>
                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Количество
                                    мокрых
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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Мебель</div>

                                <div class="grid">
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_FURNITURE_Y" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Есть</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_FURNITURE_N" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Нет</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Доступ</div>

                                <div class="grid">
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_ACCESS" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Свободный</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_ACCESS" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Пропускная система</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Парковка
                                </div>

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

                                <div class="announcement-chapter__title announcement-chapter__title--bold">Количество
                                    мест
                                </div>
                                <div class="announcement-switch announcement-switch--separate">
                                    <div class="announcement-switch__wrap">
                                        <label class="announcement-switch__item">
                                            <input name="UF_NUM_OF_PARKING" type="radio" checked value="1">
                                            <span>1</span>
                                        </label>
                                        <label class="announcement-switch__item">
                                            <input name="UF_NUM_OF_PARKING" type="radio">
                                            <span>2</span>
                                        </label>
                                        <label class="announcement-switch__item">
                                            <input name="UF_NUM_OF_PARKING" type="radio">
                                            <span>3</span>
                                        </label>
                                        <label class="announcement-switch__item">
                                            <input name="UF_NUM_OF_PARKING" type="radio">
                                            <span>4</span>
                                        </label>
                                        <label class="announcement-switch__item">
                                            <input name="UF_NUM_OF_PARKING" type="radio">
                                            <span>Нет</span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="grid">
                                    <div class="col_33">

                                        <div class="announcement-chapter__title announcement-chapter__title--bold">
                                            Стоимость
                                            места, €/мес
                                        </div>

                                        <div class="range">
                                            <label>
                                                <input name="UF_PLACE_PRICE_OT" type="number" placeholder="от">
                                            </label>
                                            <label>
                                                <input name="UF_PLACE_PRICE_DO" type="number" placeholder="до">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col_33">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_FREE_PARKING" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Бесплатная парковка</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- О здании -->
                        <div class="announcement-content__block">
                            <div class="announcement-content__title">О здании</div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Тип здания
                                </div>
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
                                            <div>Бизнес-парк</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Деловой центр</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Бизнес-центр</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Бизнес-квартал</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Особняк</div>
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
                                            <div>Офисно-гостиничный комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Офисно-жилой комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Офисно-складской комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Офисное здание</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Офисно-производственный комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Старый фонд</div>
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
                                            <div>Торгово-деловой комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Отдельно стоящее здание</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Технопарк</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BUILDING_TYPE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Торгово-офисный комплекс</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="grid">

                                    <div class="col_50">
                                        <div class="announcement-chapter__title announcement-chapter__title--bold">Класс
                                            здания
                                        </div>
                                        <div class="announcement-switch announcement-switch--separate">
                                            <div class="announcement-switch__wrap">
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS" checked value="A">
                                                    <span>A</span>
                                                </label>
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS">
                                                    <span>A+</span>
                                                </label>
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS">
                                                    <span>B</span>
                                                </label>
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS">
                                                    <span>B+</span>
                                                </label>
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS">
                                                    <span>B-</span>
                                                </label>
                                                <label class="announcement-switch__item">
                                                    <input type="radio" name="UF_BUILDING_CLASS">
                                                    <span>C</span>
                                                </label>
                                            </div>
                                        </div>
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
                                        <div class="announcement-chapter__title announcement-chapter__title--bold">
                                            Площадь
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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Тип участка
                                </div>
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
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Вентиляция
                                </div>
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

                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Инфаструктура
                                </div>
                                <div class="grid">
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_CARWASH">
                                            <span></span>
                                            <div>Автомойка</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden  infrastructure"
                                                   name="UF_CARSERVICE">
                                            <span></span>
                                            <div>Автосервис</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_PHARMACY">
                                            <span></span>
                                            <div>Аптека</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_ATELIER">
                                            <span></span>
                                            <div>Ателье одежды</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure" name="UF_ATM">
                                            <span></span>
                                            <div>Банкомат</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_POOL">
                                            <span></span>
                                            <div>Бассейн</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_BUFFET">
                                            <span></span>
                                            <div>Буфет</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_COMPLEX">
                                            <span></span>
                                            <div>Выставочно-складской комплекс</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_HOTEL">
                                            <span></span>
                                            <div>Гостиница</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_CAFE">
                                            <span></span>
                                            <div>Кафе</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_MOVIE_THEATER">
                                            <span></span>
                                            <div>Кинотеатр</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_CONFERENCE_HALL">
                                            <span></span>
                                            <div>Конференц-зал</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_MED_CENTER">
                                            <span></span>
                                            <div>Медицинский центр</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_MINIMARKET">
                                            <span></span>
                                            <div>Минимаркет</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_WAREHOUSES">
                                            <span></span>
                                            <div>Складские помещения</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_NOTARIAL">
                                            <span></span>
                                            <div>Нотариальная контора</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_BANK">
                                            <span></span>
                                            <div>Отделение банка</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_PARK">
                                            <span></span>
                                            <div>Парк</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_RESTAURANT">
                                            <span></span>
                                            <div>Ресторан</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_BEAUTY_SALOON">
                                            <span></span>
                                            <div>Салон красоты</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_DINING">
                                            <span></span>
                                            <div>Столовая</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_SUPERMARKET">
                                            <span></span>
                                            <div>Супермаркет</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_TRADING_ZONE">
                                            <span></span>
                                            <div>Торговая зона</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_FITNESS">
                                            <span></span>
                                            <div>Фитнес-центр</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_FOTO_SALOON">
                                            <span></span>
                                            <div>Фотосалон</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input type="checkbox" class="visually-hidden infrastructure"
                                                   name="UF_RECEPTION">
                                            <span></span>
                                            <div>Центральная рецепция</div>
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
                            <div class="announcement-content__title">Заголовок объявления для ТОП и Премиум объявлений
                            </div>
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
                                        <div class="announcement-chapter__title announcement-chapter__title--bold">Цена,
                                            €
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

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "stendu",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/includes/ads_status.php"
                        )
                    ); ?>
                </div>
            </div>
        </section>
    </form>

    <script src="<?= SITE_TEMPLATE_PATH ?>/js/additem-prop_request.js?<?=filemtime( $_SERVER['DOCUMENT_ROOT'] .SITE_TEMPLATE_PATH.'/js/additem-prop_request.js' )?>" />
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "stendu",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/includes/announcement-modal.php"
    )
); ?>