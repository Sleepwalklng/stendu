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
                                    <div class="announcement-content__category-description">Гараж</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Машиноместо</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Гараж</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Бокс</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Площадь -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Площадь</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

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
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип парковки</div>
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

                    </div>

                    <!-- О здании -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">О здании</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Статус</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Кооператив</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Собственность</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GARAGE_STATUS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>По доверенности</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Параметры</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_LIGHT">
                                        <span></span>
                                        <div>Свет</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_ELECTRICITY">
                                        <span></span>
                                        <div>Электричество</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_HEATING">
                                        <span></span>
                                        <div>Отопление</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_WATER">
                                        <span></span>
                                        <div>Вода</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_FIRE_SYSTEM">
                                        <span></span>
                                        <div>Система пожаротушения</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Инфаструктура</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_CARWASH">
                                        <span></span>
                                        <div>Автомойка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_CARSERVICE">
                                        <span></span>
                                        <div>Автосервис</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_AUTO_GATES">
                                        <span></span>
                                        <div>Автоматические ворота</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_CCTV">
                                        <span></span>
                                        <div>Видеонаблюдение</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_ENTRY_PASSES">
                                        <span></span>
                                        <div>Въезд по пропускам</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_ALL_DAY_SECURITY">
                                        <span></span>
                                        <div>Круглосуточная охрана</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_BESEMENT_SELLAR">
                                        <span></span>
                                        <div>Подвал/погреб</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_VIE_HOLE">
                                        <span></span>
                                        <div>Смотровая яма</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden infrastructure" name="UF_TIRE_FITTING">
                                        <span></span>
                                        <div>Шиномонтаж</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Цена за объект, €</div>
                            <div class="range">
                                <label>
                                    <input name="UF_PRICE_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_PRICE_DO" type="number" placeholder="до">
                                </label>
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