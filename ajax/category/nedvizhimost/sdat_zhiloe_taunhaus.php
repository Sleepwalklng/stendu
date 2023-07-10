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
                    <div class="announcement-content__block-wrap grid">

                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Кадастровый номер</div>
                                <input type="text" name="UF_CADASTRAL">
                            </label>
                        </div>

                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Количество спален</div>
                                <input type="number" name="UF_NUM_OF_BED">
                            </label>
                        </div>

                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Этажей в доме*</div>
                                <input type="number" name="UF_FLOOR_LEVEL_MAX">
                            </label>
                        </div>

                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Год постройки</div>
                                <input type="number" name="UF_BUILDING_YEAR">
                            </label>
                        </div>

                        <div class="col_33">
                            <div class="label">
                                <div class="announcement-label__title">Материал дома</div>
                                <select name="UF_MATERIAL_OF_HOUSE">
                                    <option value="Кирпичный">Кирпичный</option>
                                    <option value="Монолитный">Монолитный</option>
                                    <option value="Деревянный">Деревянный</option>
                                    <option value="Щитовой">Щитовой</option>
                                    <option value="Каркасный">Каркасный</option>
                                    <option value="Газобетонный блок">Газобетонный блок</option>
                                    <option value="Газосиликатный блок">Газосиликатный блок</option>
                                    <option value="Пенобетонный блок">Пенобетонный блок</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Площадь -->
                <div class="announcement-content__block">
                    <div class="announcement-content__title">Площадь</div>
                    <div class="announcement-content__block-wrap grid">
                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Площадь дома*</div>
                                <input type="text" name="UF_HOUSE_SQUARE">
                            </label>
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
                    </div>
                </div>

                <!-- Коммуникации и удобства -->
                <div class="announcement-content__block">
                    <div class="announcement-content__title">Коммуникации и удобства</div>
                    <div class="announcement-chapter">
                        <div class="announcement-chapter__title">Коммуникации</div>
                        <div class="grid">

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" checked name="UF_PETS">
                                    <span></span>
                                    <div>Можно с питомцами</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_WITH_CHILDREN">
                                    <span></span>
                                    <div>Можно с детьми</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="announcement-chapter">
                        <div class="announcement-chapter__title">Удобства</div>
                        <div class="grid">
                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" checked name="UF_KITCHEN">
                                    <span></span>
                                    <div>Кухонная мебель</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_ROOMS_FURNITURE">
                                    <span></span>
                                    <div>Мебель в комнатах</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_FRIDGE">
                                    <span></span>
                                    <div>Холодильник</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_WASH">
                                    <span></span>
                                    <div>Стиральная машина</div>
                                </label>
                            </div>

                            <div class="col_33">
                                <label>
                                    <div class="announcement-label__title">Количество санузлов</div>
                                    <input type="text" name="UF_QUAN_BATHROOM">
                                </label>
                            </div>
                            <div class="col_33">
                                <div class="label">
                                    <div class="announcement-label__title">Расположение санузлов</div>
                                    <select name="UF_BATHROOM" id="">
                                        <option value="В доме">В доме</option>
                                        <option value="На улице">На улице</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col_33">
                                <div class="label">
                                    <div class="announcement-label__title">Отопление</div>
                                    <select name="UF_HEATING" id="">
                                        <option value="Центральное газовое">Центральное газовое</option>
                                        <option value="Центральное угольное">Центральное угольное</option>
                                        <option value="Печь">Печь</option>
                                        <option value="Камин">Камин</option>
                                        <option value="Электрическое">Электрическое</option>
                                        <option value="Автономное газовое">Автономное газовое</option>
                                        <option value="Твердотопливный котел">Твердотопливный котел</option>
                                        <option value="Без отопления">Без отопления</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="announcement-chapter">
                        <div class="announcement-chapter__title">Дополнительные параметры</div>
                        <div class="grid">
                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" checked name="UF_INTERNET">
                                    <span></span>
                                    <div>Интернет</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_TV">
                                    <span></span>
                                    <div>Телевизор</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_CONDITIONER">
                                    <span></span>
                                    <div>Кондиционер</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_DISHWASHER">
                                    <span></span>
                                    <div>Посудомоечная машина</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <div class="label">
                                    <div class="announcement-label__title">Телефон</div>
                                    <select name="UF_HAVE_PHONE" id="">
                                        <option value="0">Нет</option>
                                        <option value="1">Есть</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_BATH">
                                    <span></span>
                                    <div>Ванна</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input type="checkbox" class="visually-hidden" name="UF_SHOWER_ROOM">
                                    <span></span>
                                    <div>Душевая кабина</div>
                                </label>
                            </div>
                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input name="UF_BATHH" type="checkbox" class="visually-hidden">
                                    <span></span>
                                    <div>Баня</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input name="UF_GARAGE" type="checkbox" class="visually-hidden">
                                    <span></span>
                                    <div>Гараж</div>
                                </label>
                            </div>

                            <div class="col_25">
                                <label class="label-checkbox narrow">
                                    <input name="UF_POOL" type="checkbox" class="visually-hidden" checked>
                                    <span></span>
                                    <div>Бассейн</div>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Внешний вид -->
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
                            <label>
                                <div class="announcement-label__title">Арендная плата*</div>
                                <input type="text" value="" name="UF_PRICE">
                                <span class="measure">€ / месяц</span>
                            </label>
                        </div>

                        <!--                        <div class="col_50">-->
                        <!--                            <div class="label">-->
                        <!--                                <div class="announcement-label__title">Коммунальные платежи</div>-->
                        <!--                                <select name="" id="">-->
                        <!--                                    <option value="3">Забронированное значение</option>-->
                        <!--                                    <option value="2">Забронированное значение 2</option>-->
                        <!--                                    <option value="1">Забронированное значение 1</option>-->
                        <!--                                    <option value="4">Забронированное значение 4</option>-->
                        <!--                                </select>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <div class="col_50">
                            <label>
                                <div class="announcement-label__title">Коммунальные платежи*</div>
                                <input type="text" value="0" name="UF_COM_PAY">
                                <span class="measure">€ / месяц</span>
                            </label>
                        </div>

                        <div class="col_50">
                            <div class="label">
                                <div class="announcement-label__title">Срок аренды*</div>
                                <select name="UF_RENT_PERIOD" id="">
                                    <option value="От 1 года">От 1 года</option>
                                    <option value="Несколько месяцев">Несколько месяцев</option>
                                </select>
                            </div>
                        </div>

                        <div class="col_50">
                            <div class="label">
                                <div class="announcement-label__title">Предоплата*</div>
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
                                <div class="announcement-label__title">Залог</div>
                                <input type="text" value="3000" name="UF_DEPOSIT">
                                <span class="measure">€</span>
                            </div>
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