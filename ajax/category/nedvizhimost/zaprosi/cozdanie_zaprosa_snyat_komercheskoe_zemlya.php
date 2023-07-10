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
                                            <a href="#">Снять</a>
                                        </li>
                                        <li>
                                            <a href="#">Коммерческая</a>
                                        </li>
                                    </ul>
                                    <div class="announcement-content__category-description">Коммерческая земля</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Категория земли
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Поселений</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Сельскохозяйственное назначение</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Промышленности</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Энергетики</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Транспорта</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Связи</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Иного не сельхоз. назначения</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_CATEGORY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Можно изменить</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?
                        $str = 'Сельскохозяйственное использование, Индивидуальное жилищное строительство (ИЖС), Малоэтажное жилищное строительство (МЖС), Высотная застройка, Общественное использование объектов капитального строительства, Деловое управление, Торговые центры, Гостиничное обслуживание, Обслуживание автотранспорта, Отдых (рекреация), Промышленность, Склады, Общее пользование территории';
                        $arr = explode(', ', $str);
                        ?>
                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Вид разрешенного
                                использования
                            </div>
                            <div class="grid">
                                <? foreach ($arr as $item): ?>
                                    <div class="col_25">
                                        <label class="label-checkbox label-checkbox--boxy">
                                            <input name="UF_TYPE_PERM_USE" type="checkbox" class="visually-hidden">
                                            <span></span>
                                            <div><?= $item ?></div>
                                        </label>
                                    </div>

                                <? endforeach; ?>


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
                                    <input name="UF_PLOT_SQUARE_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_PLOT_SQUARE_DO" type="number" placeholder="до">
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_50">

                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Инвестпроект
                                    </div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_INVEST_PROJECT" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Есть</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_INVEST_PROJECT" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Нет</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">

                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Наличие
                                        обременения
                                    </div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_PRESENCE_ENCUMBRANCE" type="checkbox"
                                                       class="visually-hidden">
                                                <span></span>
                                                <div>Есть</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_PRESENCE_ENCUMBRANCE" type="checkbox"
                                                       class="visually-hidden">
                                                <span></span>
                                                <div>Нет</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Электричество
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_ELECTRICITY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>На участке</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_ELECTRICITY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>По границе участка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_LAND_ELECTRICITY" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
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
                                        <div>На участке</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>По границе участка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_GAS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
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
                                        <div>На участке</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>По границе участка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_SEWERAGE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
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
                                        <div>На участке</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>По границе участка</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WATER_SUP" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Нет</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Подъездные пути
                            </div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DRIVEWAYS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Грунтовая дорога</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DRIVEWAYS" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Асфальтированная дорога</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_DRIVEWAYS" type="checkbox" class="visually-hidden">
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Стоимость</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_RENT_PRICE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В месяц за м²</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_RENT_PRICE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В год за м²</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_RENT_PRICE_TYPE" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>В месяц</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Цена, €</div>
                            <div class="range">
                                <label>
                                    <input name="UF_PRICE_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_PRICE_DO" type="number" placeholder="до">
                                </label>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Налог</div>
                            <div class="grid">
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TAX_Y" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>С НДС</div>
                                    </label>
                                </div>
                                <div class="col_25">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_TAX_N" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Без НДС</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Коммунальные платежи</div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_UTILITY_PAY_INCLUDED_Y" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Включены</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_UTILITY_PAY_INCLUDED_N" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Не предусмотрены</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Эксплутационные расходы</div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_OPERATION_COSTS_Y" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Включены</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_OPERATION_COSTS_N" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Не предусмотрены</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Срок аренды</div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_RENT_PERIOD" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Длительно</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_RENT_PERIOD" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Несколько месяцев</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Тип аренды</div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_COMMERC_TYPE_RENT" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Прямая</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_COMMERC_TYPE_RENT" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Субаренда</div>
                                            </label>
                                        </div>
                                    </div>
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

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Минимальный срок аренды, месяц</div>
                                    <div class="announcement-switch announcement-switch--separate">
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_MIN_RENT_PERIOD" checked value="1">
                                                <span>1</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_MIN_RENT_PERIOD">
                                                <span>2</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_MIN_RENT_PERIOD">
                                                <span>3</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_MIN_RENT_PERIOD">
                                                <span>4+</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="UF_MIN_RENT_PERIOD">
                                                <span>Год</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Арендные каникулы</div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_HOLIDAYS_RENT_Y" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Предоставляются</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_HOLIDAYS_RENT_N" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Не предоставляются</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Обеспечительный платеж, €</div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_SECURITY_DEPOSIT_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_SECURITY_DEPOSIT_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="announcement-chapter__title announcement-chapter__title--bold">Предоплата, месяц</div>
                            <div class="announcement-switch announcement-switch--separate">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY" checked value="1">
                                        <span>1</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>2</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>3</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>4</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>5</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>6</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>7</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>8</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>9</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>10</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>11</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_PREPAY">
                                        <span>Год</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Комиссия от арендатора -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Комиссия от арендатора</div>
                        <div class="announcement-content__subtitle bold">Процент стоимости, который вы хотите получить от арендатора</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Размер комиссии, %</div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_COMMISSIONS_RENT_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_COMMISSIONS_RENT_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                                <div class="col_33">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input type="checkbox" class="visually-hidden" name="UF_WITHOUT_COMMISSIONS">
                                        <span></span>
                                        <div>Без комиссии</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Комиссия от другого агента -->
                    <div class="announcement-content__block announcement-content__deal">
                        <div class="announcement-content__title">Комиссия от другого агента</div>
                        <div class="announcement-content__subtitle bold">Процент стоимости, который вы хотите получить от другого агента</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_33">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Размер комиссии, %</div>
                                    <div class="range">
                                        <label>
                                            <input name="UF_COMMISSIONS_AGENT_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_COMMISSIONS_AGENT_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                                <div class="col_33">
                                    <label class="label-checkbox label-checkbox--boxy">
                                        <input name="UF_WITHOUT_COMMISSIONS_AGENT" type="checkbox" class="visually-hidden">
                                        <span></span>
                                        <div>Без комиссии</div>
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