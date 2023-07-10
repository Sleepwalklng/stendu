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
                                    <div class="announcement-content__category-description">Таунхаус</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип дома</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TYPE_OF_HS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Постоянного проживания</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TYPE_OF_HS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Дача</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="announcement-chapter__title announcement-chapter__title--bold">Количество
                                спален
                            </div>

                            <div class="announcement-switch announcement-switch--separate">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED" checked value="1">
                                        <span>1</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED">
                                        <span>2</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED">
                                        <span>3</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED">
                                        <span>4</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED">
                                        <span>5</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_NUM_OF_BED">
                                        <span>6+</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Этажей в доме
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

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Статус участка
                            </div>
                            <div class="grid">

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Фермерское хозяйство</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Садоводство</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Личное подсобное хозяйство</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>ИЖС</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Земля промназначения</div>
                                    </label>
                                </div>

                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_PLOT_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>ДПН</div>
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

                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Площадь
                                        дома, м²
                                    </div>

                                    <div class="range">
                                        <label>
                                            <input name="UF_HOUSE_SQUARE_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_HOUSE_SQUARE_DO" type="number" placeholder="до">
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
                    </div>

                    <!-- Коммуникации и удобства -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Коммуникации и удобства</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Санузлы</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BATHROOM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В доме</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_BATHROOM" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>На улице</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="announcement-chapter__title announcement-chapter__title--bold">Количество
                                санузлов
                            </div>
                            <div class="announcement-switch announcement-switch--separate">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_QUAN_BATHROOM" checked value="1">
                                        <span>1</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_QUAN_BATHROOM">
                                        <span>2</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_QUAN_BATHROOM">
                                        <span>3</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_QUAN_BATHROOM">
                                        <span>4</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_QUAN_BATHROOM">
                                        <span>Нет</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Канализация</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Центральная</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Септик</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Выгребная яма</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Водоснабжение
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Центральное</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Скважина</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Колодец</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Газ</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Магистральный в доме или на участке</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Магистральный по границе участка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Газгольдер</div>
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
                                        <input type="checkbox" class="visually-hidden infrastructure"
                                               name="UF_ELECTRICITY">
                                        <span></span>
                                        <div>Электричество</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure"
                                               name="UF_SECURITY">
                                        <span></span>
                                        <div>Охрана</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure"
                                               name="UF_HAVE_PHONE">
                                        <span></span>
                                        <div>Телефон</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_BATHH">
                                        <span></span>
                                        <div>Баня</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_GARAGE">
                                        <span></span>
                                        <div>Гараж</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_POOL">
                                        <span></span>
                                        <div>Бассейн</div>
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

                        <? if ($_REQUEST['agent'] == 82): ?>
                            <div class="announcement-chapter announcement-chapter--without-divider">
                                <div class="announcement-chapter__title announcement-chapter__title--bold">Бонус к
                                    агенту
                                </div>
                                <div class="grid">
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BONUS" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Нет</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BONUS" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Фиксированная цена</div>
                                        </label>
                                    </div>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_BONUS" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div>Процент от сделки</div>
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