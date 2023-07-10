<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';


function userFieldEnum($id, $ar): array
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        if ($ar) {
            if (in_array($ob['ID'], $ar)) {
                $arr[] = $ob;
            }
        } else {
            $arr[] = $ob;
        }

    };
    return $arr;
}

$type = $_REQUEST['type'];
$deal = $_REQUEST['deal'];
$req = $_REQUEST['req'];
$type_of_rs = $_REQUEST['type_of_rs'];

if ($_REQUEST['oper'] == 'category') {

    if ($deal == 68) {
        $UF_TYPE = userFieldEnum(273, [126, 127, 134, 129]);
    }elseif($deal == 69){
        if($req == 150){
            $UF_TYPE = userFieldEnum(273, [126, 127, 134, 129]);
        }else{
            if ($type_of_rs == 144) {
                if ($req == 148) {
                    $UF_TYPE = userFieldEnum(273, [126, 127, 128, 129, 131, 132, 133]);
                } elseif ($req == 149) {
                    $UF_TYPE = userFieldEnum(273, [126, 127, 134, 129, 131, 132]);

                }
            } elseif ($type_of_rs == 145) {
                if ($req == 148) {
                    $UF_TYPE = userFieldEnum(273, [135, 136, 137, 138, 139, 140, 141, 142, 143]);
                } elseif ($req == 149) {
                    $UF_TYPE = userFieldEnum(273, [135, 136, 137, 138, 139, 141, 142, 143]);
                }
            }
        }

    } else {
        if ($type_of_rs == 144) {
            if ($deal == 66) {
                $UF_TYPE = userFieldEnum(273, [126, 127, 128, 129, 131, 132, 133]);
            } elseif ($deal == 67) {
                $UF_TYPE = userFieldEnum(273, [126, 127, 134, 129, 131, 132]);
            }
        } elseif ($type_of_rs == 145) {
            if ($deal == 66) {
                $UF_TYPE = userFieldEnum(273, [135, 136, 137, 138, 139, 140, 141, 142, 143]);
            } elseif ($deal == 67) {
                $UF_TYPE = userFieldEnum(273, [135, 136, 137, 138, 139, 141, 142, 143]);
            }
        }
    }


    foreach ($UF_TYPE as $arIts) { ?>
        <li class="info__box property-type"
            data-id="<?= $arIts['ID'] ?>">
            <button class="info__elem"
                    type="button"><?= $arIts['VALUE'] ?></button>
        </li>
    <? }
} else if ($_REQUEST['oper'] == 'filters') {
    if ($type == 135 || $type == 141 || $type == 142) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Помещение занято?</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_OCCUPIED"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Помещение занято?-->
    <? }
    if ($type == 129) { ?>
        <li class="filter__item filter-ajax filter__item--seller">
            <div class="filter__subtitle">Тип дома</div>
            <ul class="filter__inner">
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_TYPE_OF_HS" type="radio"
                               value="Дом для постоянного проживания">

                        Дом для постоянного проживания
                    </label>
                </li>
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_TYPE_OF_HS" type="radio"
                               value="Дача">

                        Дача
                    </label>
                </li>

            </ul>
        </li><!--            Тип дома-->
    <? }
    if ($type == 140) { ?>
        <li class="filter__item filter-ajax filter__item--seller">
            <div class="filter__subtitle">Тип бизнеса</div>
            <ul class="filter__inner">
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_BUSINESS_TYPE" type="radio"
                               value="Арендный бизнес">

                        Арендный бизнес
                    </label>
                </li>
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_BUSINESS_TYPE" type="radio"
                               value="Готовый бизнес">

                        Готовый бизнес
                    </label>
                </li>

            </ul>
        </li><!--            Тип бизнеса-->
    <? }
    if ($type == 139) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_TYPE"
                           value="Машиноместо">
                    Машиноместо
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_TYPE"
                           value="Гараж">
                    Гараж
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_TYPE"
                           value="Бокс">
                    Бокс
                </label>

            </div>
        </li><!--            Тип гаража-->
    <? }
    if ($type == 142) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип помещения</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOM_TYPE"
                           value="Street retail">
                    Street retail
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOM_TYPE"
                           value="В торговом комплексе">
                    В торговом комплексе
                </label>


            </div>
        </li><!--            Тип помещения-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Возможное назначение</div>
                <? $str = 'Магазин, Банк, Выпечка, Клиника, Сервис, Фотостудия, Цех, Шаурма, Шиномонтаж, Коммерция, Сауна, Шоурум, Гостиница, Кальянная, Кафе, Аптека, Салон красоты, Бытовые услуги, Ателье одежды, Бар, Медицинский центр, Клуб, Кондитерская, Мастерская, Парикмахерская, Пекарня, Продукты, Ресторан, Спортзал, Фитнес, Студия, Фрукты, Хостел, Автомойка, Цветы, Школа, Стоматология, Зал, Офис, Общепит, Ломбард, Выставка, Spa-салон, Косметология, Маникюр, Автосервис, Авиакассы, Автозапчасти, Автосалон, АЗС, Алкомаркет, Антикафе, Арендный бизнес, База, база отдыха, Банный комплекс, Белье, Бижутерия, Бильярдная, Больничный комплекс, Боулинг, букмекерская контора, Бутик, Буфет, Бытовая техника, Галерея, Гипермаркет, Гостевой дом, Готовый бизнес, Детские товары, Детский клуб, Детский магазин, Детский сад, Детский центр, Доходный дом, Завод, Займы, Зоомагазин, Зоотовары, Зубная поликлиника, Интернет-магазин, Йога, Квест, Клиентский офис, Косметика, Кофейня, Кулинария, Малое производство, Массажный салон, Мебель, Мини-отель, Мясо, Нотариальная контора, Ночной клуб, Обмен Валюты, Обувь, Одежда, Оптика, Пансионат, Парфюмерия, Пиццерия, Посуда, Представительство, Производство, Пункт выдачи, Рабочее место, Рабочий кабинет, Рыба, Салон, Салон связи, Санаторий, Свободное назначение, Склад, Спортивный зал, СТО, Столовая, Стрит-ретейл, Стройматериалы, Студия танцев, Сувениры, Сумки, Супермаркет, Суши, Тату салон, Типография, ТНП, Товары для дома, Торговая площадь, Торговля, Торговое, Торговый комплекс, Торговый центр, Турагенство, Услуги, Учебный центр, Фастфуд, Ферма, Химчистка, Хлебокомбинат, Частная практика, Швейный цех, Электронные сигареты, Ювелирный, Другое';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_POSPURPOSE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Возможное назначение-->
    <? }
    if ($type == 143) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Категория земли</div>
                <? $str = 'Поселений, Сельскохозяйственного назначения, Промышленности, Энергетики, Транспорта, Связи, И иного не сельхоз. назначения';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_LAND_CATEGORY"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Категория земли-->
    <? }
    if ($type == 141) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Возможное назначение</div>
                <? $str = 'Магазин, Банк, Выпечка, Клиника, Сервис, Фотостудия, Цех, Шаурма, Шиномонтаж, Коммерция, Сауна, Шоурум, Гостиница, Кальянная, Кафе, Аптека, Салон красоты, Бытовые услуги, Ателье одежды, Бар, Медицинский центр, Клуб, Кондитерская, Мастерская, Парикмахерская, Пекарня, Продукты, Ресторан, Спортзал, Фитнес, Студия, Фрукты, Хостел, Автомойка, Цветы, Школа, Стоматология, Зал, Офис, Общепит, Ломбард, Выставка, Spa-салон, Косметология, Маникюр, Автосервис, Авиакассы, Автозапчасти, Автосалон, АЗС, Алкомаркет, Антикафе, Арендный бизнес, База, база отдыха, Банный комплекс, Белье, Бижутерия, Бильярдная, Больничный комплекс, Боулинг, букмекерская контора, Бутик, Буфет, Бытовая техника, Галерея, Гипермаркет, Гостевой дом, Готовый бизнес, Детские товары, Детский клуб, Детский магазин, Детский сад, Детский центр, Доходный дом, Завод, Займы, Зоомагазин, Зоотовары, Зубная поликлиника, Интернет-магазин, Йога, Квест, Клиентский офис, Косметика, Кофейня, Кулинария, Малое производство, Массажный салон, Мебель, Мини-отель, Мясо, Нотариальная контора, Ночной клуб, Обмен Валюты, Обувь, Одежда, Оптика, Пансионат, Парфюмерия, Пиццерия, Посуда, Представительство, Производство, Пункт выдачи, Рабочее место, Рабочий кабинет, Рыба, Салон, Салон связи, Санаторий, Свободное назначение, Склад, Спортивный зал, СТО, Столовая, Стрит-ретейл, Стройматериалы, Студия танцев, Сувениры, Сумки, Супермаркет, Суши, Тату салон, Типография, ТНП, Товары для дома, Торговая площадь, Торговля, Торговое, Торговый комплекс, Торговый центр, Турагенство, Услуги, Учебный центр, Фастфуд, Ферма, Химчистка, Хлебокомбинат, Частная практика, Швейный цех, Электронные сигареты, Ювелирный, Другое';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_POSPURPOSE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Возможное назначение-->
    <? } ?>
    <? if ($type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--seller">
            <div class="filter__subtitle">Вид</div>
            <ul class="filter__inner">
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_CHOICE_APART" type="radio"
                               value="Квартира">

                        Квартира
                    </label>
                </li>
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_CHOICE_APART" type="radio"
                               value="Апартаменты">

                        Апартаменты
                    </label>
                </li>

            </ul>
        </li><!--            Вид доля-->
    <? } ?>
    <? if ($type == 128 || $type == 132) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Размер доли</div>

            <input class="filter__input" name="UF_SHARE_SIZE_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_SHARE_SIZE_DO" type="number" placeholder="до">
        </li><!--            Размер доли-->
    <? } ?>
    <? if ($type == 140) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Месячная прибыль</div>

            <input class="filter__input" name="UF_MONTH_PROFIT_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_MONTH_PROFIT_DO" type="number" placeholder="до">
        </li><!--            Месячная прибыль-->
    <? } ?>

    <? if ($type == 129 || $type == 131 || $type == 132 || ($type == 126 && $deal == 67 || $deal == 68)) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Количество спален</div>

            <input class="filter__input" name="UF_NUM_OF_BED_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_NUM_OF_BED_DO" type="number" placeholder="до">
        </li><!--            Количество спален-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество комнат</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="4">
                    4
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="5">
                    5
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                           value="6 и более">
                    6 и более
                </label>
                <? if ($type == 126) {
                    ?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                               value="Свободная планировка">
                        Свободная планировка
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_NUMBER_OF_ROOMS"
                               value="Студия">
                        Студия
                    </label>
                <? } ?>
            </div>
        </li><!--            Количество комнат-->
    <? } ?>
    <? if ($type == 134 || $type == 127) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Комнат в продажу</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="4">
                    4
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="5">
                    5
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FOR_SALE"
                           value="6 и более">
                    6 и более
                </label>
            </div>
        </li><!--            Комнат в продажу-->
    <? } ?>

    <? if ($type == 127) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип комнаты</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TYPE_OF_ROOM"
                           value="Смежная и изолированная">
                    Смежная и изолированная
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TYPE_OF_ROOM"
                           value="Смежная">
                    Смежная
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TYPE_OF_ROOM"
                           value="Изолированная">
                    Изолированная
                </label>

            </div>
        </li><!--            Тип комнаты-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 142 || $type == 140 || $type == 141 || $type == 134 || $type == 128 || $type == 135 || $type == 137 || $type == 138) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Этаж</div>

            <input class="filter__input" name="UF_FLOOR_LEVEL_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_FLOOR_LEVEL_DO" type="number" placeholder="до">

            <label class="filter__label">
                <input class="filter__checkbox" type="checkbox" name="UF_FLOOR_LEVEL_NOT_FIRST">

                не первый
            </label>

            <label class="filter__label">
                <input class="filter__checkbox" type="checkbox" name="UF_FLOOR_LEVEL_NOT_LAST">

                не последний
            </label>
        </li><!--            Этаж-->
    <? } ?>

    <? if ($type == 126 || $type == 127 || $type == 142 || $type == 136 || $type == 141 || $type == 128 || $type == 134 || $type == 129 || $type == 131 || $type == 132 || $type == 135 || $type == 137 || $type == 138) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Этажей в доме</div>

            <input class="filter__input" name="UF_FLOOR_LEVEL_MAX_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_FLOOR_LEVEL_MAX_DO" type="number" placeholder="до">
        </li><!--            Этажей в доме-->
    <? } ?>
    <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133 || $type == 142 || $type == 143) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Статус участка</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="Фермерское хозяйство">
                    Фермерское хозяйство
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="Садоводство">
                    Садоводство
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="Личное подсобное хозяйство">
                    Личное подсобное хозяйство
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="ИЖС">
                    ИЖС
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="Земля промназначения">
                    Земля промназначения
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLOT_STATUS"
                           value="Иное">
                    Иное
                </label>

            </div>
        </li><!--            Статус участка-->
    <? } ?>
    <? if ($type == 127 || $type == 128 || $type == 136 || $type == 141 || $type == 134 || $type == 129 || $type == 131 || $type == 132 || $type == 135 || $type == 137 || $type == 138) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Год постройки</div>

            <input class="filter__input" name="UF_BUILDING_YEAR_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_BUILDING_YEAR_DO" type="number" placeholder="до">
        </li><!--            Год постройки-->
    <? } ?>

    <? if ($type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Пентхаус</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PENTHOUSE"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Пентхаус-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128 || $type == 129 || $type == 131 || $type == 132) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Материал дома</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Кирпичный">
                    Кирпичный
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Монолитный">
                    Монолитный
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Панельный">
                    Панельный
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Блочный">
                    Блочный
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Монолитно-кирпичный">
                    Монолитно-кирпичный
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MATERIAL_OF_HOUSE"
                           value="Сталинский">
                    Сталинский
                </label>

            </div>
        </li><!--            Материал дома-->
    <? } ?>
    <? if ($type == 134 || $type == 127) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь комнаты</div>

            <input class="filter__input" name="UF_ROOM_AREA_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_ROOM_AREA_DO" type="number" placeholder="до">
        </li><!--            Площадь комнаты-->
    <? } ?>
    <? if ($type == 135 || $type == 136 || $type == 140 || $type == 142 || $type == 141 || $type == 137 || $type == 138 || $type == 139) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь</div>

            <input class="filter__input" name="UF_COM_SQUARE_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_COM_SQUARE_DO" type="number" placeholder="до">
        </li><!--            Площадь коммерческая-->
    <? } ?>
    <? if ($type == 135 || $type == 137 || $type == 138 || $type == 141 || $type == 142) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Возможна продажа частями</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_SELL_IN_PARTS"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Возможна продажа частями-->
    <? } ?>
    <? if ($type == 129 || $type == 131 || $type == 132) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь Дома</div>

            <input class="filter__input" name="UF_HOUSE_SQUARE_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_HOUSE_SQUARE_DO" type="number" placeholder="до">
        </li><!--            Площадь Дома-->
    <? } ?>

    <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь участка</div>

            <input class="filter__input" name="UF_PLOT_SQUARE_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_PLOT_SQUARE_DO" type="number" placeholder="до">
        </li><!--            Площадь участка-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Общая площадь</div>

            <input class="filter__input" name="UF_TOTAL_AREA_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_TOTAL_AREA_DO" type="number" placeholder="до">
        </li><!--            Общая площадь-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Жилая площадь</div>

            <input class="filter__input" name="UF_LIVING_AREA_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_LIVING_AREA_DO" type="number" placeholder="до">
        </li><!--            Жилая площадь-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь кухни</div>

            <input class="filter__input" name="UF_KITCHEN_AREA_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_KITCHEN_AREA_DO" type="number" placeholder="до">
        </li><!--            Площадь кухни-->
    <? } ?>

    <? if ($type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Площадь комнат</div>

            <input class="filter__input" name="UF_ROOMS_AREA_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_ROOMS_AREA_DO" type="number" placeholder="до">
        </li><!--            Площадь комнат-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Ремонт</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_REPAIR"
                           value="Косметический">
                    Косметический
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_REPAIR"
                           value="Евро">
                    Евро
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_REPAIR"
                           value="Дизайнерский">
                    Дизайнерский
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_REPAIR"
                           value="Без ремонта">
                    Без ремонта
                </label>
            </div>
        </li><!--            Ремонт-->
    <? } ?>

    <? if ($deal == 66) { ?>
        <? if ($type == 129 || $type == 131 || $type == 132) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Расположение санузлов</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM"
                               value="В доме">
                        В доме
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM"
                               value="На улице">
                        На улице
                    </label>
                </div>
            </li><!--            Расположение санузлов-->
        <? } ?>
        <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__subtitle">Количество санузлов</div>

                <input class="filter__input" name="UF_QUAN_BATHROOM_OT" type="number" placeholder="от">

                <input class="filter__input" name="UF_QUAN_BATHROOM_DO" type="number" placeholder="до">
            </li><!--            Количество санузлов-->
        <? } ?>

        <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Канализация</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_SEWERAGE"
                               value="Нет">
                        Нет
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_SEWERAGE"
                               value="Центральная">
                        Центральная
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_SEWERAGE"
                               value="Септик">
                        Септик
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_SEWERAGE"
                               value="Выгребная яма">
                        Выгребная яма
                    </label>
                </div>
            </li><!--            Канализация-->
        <? } ?>
        <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Водоснабжение</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WATER_SUP"
                               value="Нет">
                        Нет
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WATER_SUP"
                               value="Центральное">
                        Центральное
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WATER_SUP"
                               value="Скважина">
                        Скважина
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WATER_SUP"
                               value="Колодец">
                        Колодец
                    </label>
                </div>
            </li><!--            Водоснабжение-->
        <? } ?>
    <? } ?>

    <? if ($type == 129 || $type == 131 || $type == 132) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Отопление</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Центральное газовое">
                    Центральное газовое
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Центральное угольное">
                    Центральное угольное
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Печь">
                    Печь
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Камин">
                    Камин
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Электрическое">
                    Электрическое
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Автономное газовое">
                    Автономное газовое
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Твердотопливный котел">
                    Твердотопливный котел
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="Без отопления">
                    Без отопления
                </label>
            </div>
        </li><!--            Отопление-->
    <? } ?>
    <? if ($deal == 66) { ?>
        <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Газ</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_GAS"
                               value="Нет">
                        Нет
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_GAS"
                               value="Магистральный в доме или на участке">
                        Магистральный в доме или на участке
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_GAS"
                               value="Магистральный по границе участка">
                        Магистральный по границе участка
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_GAS"
                               value="Газгольдер">
                        Газгольдер
                    </label>
                </div>
            </li><!--            Газ-->
        <? } ?>
        <? if ($type == 129 || $type == 131 || $type == 132 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Электричество</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_ELECTRICITY"
                               value="1">
                        Да
                    </label>
                </div>
            </li><!--            Электричество-->
        <? } ?>
    <? } ?>
    <? if ($type == 129 || $type == 131 || $type == 132) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Дополнительные параметры</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_SECURITY"
                           value="1">
                    Охрана
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HAVE_PHONE"
                           value="1">
                    Телефон
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHH"
                           value="1">
                    Баня
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE"
                           value="1">
                    Гараж
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_POOL"
                           value="1">
                    Бассейн
                </label>
            </div>
        </li><!--            Дополнительные параметры-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество балконов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BALCONY"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BALCONY"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BALCONY"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BALCONY"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BALCONY"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество балконов-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество лоджий</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LOGGIA"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LOGGIA"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LOGGIA"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LOGGIA"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LOGGIA"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество лоджий-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество разделенных санузлов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_SEP"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_SEP"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_SEP"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_SEP"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_SEP"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество разделенных санузлов-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество совмещенных санузлов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_COMB"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_COMB"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_COMB"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_COMB"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM_COMB"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество совмещенных санузлов-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Окна</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_WINDOW_VIEW"
                           value="Во двор">
                    Во двор
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_WINDOW_VIEW"
                           value="На улицу">
                    На улицу
                </label>


            </div>
        </li><!--            Окна-->
    <? } ?>

    <? if ($deal == 67 || $deal == 68) { ?>
        <? if ($type == 126 || $type == 127 || $type == 128 || $type == 134 || $type == 129 || $type == 131 || $type == 132) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Коммуникации и удобства</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_KITCHEN"
                               value="1">
                        Кухонная мебель
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_ROOMS_FURNITURE"
                               value="1">
                        Мебель в комнатах
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_FRIDGE"
                               value="1">
                        Холодильник
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WASH"
                               value="1">
                        Стиральная машина
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_INTERNET"
                               value="1">
                        Интернет
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_TV"
                               value="1">
                        Телевизор
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_CONDITIONER"
                               value="1">
                        Кондиционер
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_DISHWASHER"
                               value="1">
                        Посудомоечная машина
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_HAVE_PHONE"
                               value="1">
                        Телефон
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BATH"
                               value="1">
                        Ванна
                    </label><label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_SHOWER_ROOM"
                               value="1">
                        Душевая кабина
                    </label>
                    <? if ($type == 129 || $type == 131 || $type == 132) { ?>
                        <label class="filter__label">
                            <input class="filter__checkbox" type="checkbox" name="UF_BATHH"
                                   value="1">
                            Баня
                        </label><label class="filter__label">
                            <input class="filter__checkbox" type="checkbox" name="UF_GARAGE"
                                   value="1">
                            Гараж
                        </label><label class="filter__label">
                            <input class="filter__checkbox" type="checkbox" name="UF_POOL"
                                   value="1">
                            Бассейн
                        </label>
                    <? } ?>
                </div>
            </li><!--            Коммуникации и удобства-->
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Расположение санузлов</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM"
                               value="В доме">
                        В доме
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BATHROOM"
                               value="На улице">
                        На улице
                    </label>
                </div>
            </li><!--            Расположение санузлов-->
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__subtitle">Количество санузлов</div>

                <input class="filter__input" name="UF_QUAN_BATHROOM_OT" type="number" placeholder="от">

                <input class="filter__input" name="UF_QUAN_BATHROOM_DO" type="number" placeholder="до">
            </li><!--            Количество санузлов-->
        <? } ?>
    <? } ?>
    <? if ($deal == 67 || $deal == 68) { ?>
        <? if ($type == 126 || $type == 127 || $type == 128 || $type == 134 || $type == 129 || $type == 131 || $type == 132) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Состав съемщиков</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_PETS"
                               value="1">
                        Можно с питомцами
                    </label>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_WITH_CHILDREN"
                               value="1">
                        Можно с детьми
                    </label>
                </div>
            </li><!--            Состав съемщиков-->
        <? } ?>
    <? } ?>
    <? if ($deal == 66) { ?>
        <? if ($type == 127 || $type == 128) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Телефон</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_HAVE_PHONE"
                               value="1">
                        Да
                    </label>
                </div>
            </li><!--            Телефон-->
        <? } ?>
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество пассажирских лифтов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество пассажирских лифтов-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Количество грузовых лифтов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="Нет">
                    Нет
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="1">
                    1
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="2">
                    2
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="3">
                    3
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="4">
                    4
                </label>


            </div>
        </li><!--            Количество грузовых лифтов-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 141 || $type == 128 || $type == 135) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Высота потолков</div>

            <input class="filter__input" name="UF_CEILING_HEIGHT_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_CEILING_HEIGHT_DO" type="number" placeholder="до">
        </li><!--            Высота потолков-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Мусоропровод</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RCHUTE"
                           value="1">
                    Есть
                </label>
            </div>
        </li><!--            Мусоропровод-->
    <? } ?>
    <? if ($type == 126 || $type == 127 || $type == 134 || $type == 128 || $type == 135 || $type == 136 || $type == 137 || $type == 138 || $type == 139) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Парковка</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARKING"
                           value="Наземная">
                    Наземная
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARKING"
                           value="Многоуровневая">
                    Многоуровневая
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARKING"
                           value="На крыше">
                    На крыше
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARKING"
                           value="Подземная">
                    Подземная
                </label>
            </div>
        </li><!--            Парковка-->
    <? } ?>
    <li class="filter__item filter-ajax filter__item--range">
        <div class="filter__wrapper">
            <div class="filter__subtitle">Фото</div>

            <label class="filter__label">
                <input class="filter__checkbox" type="checkbox" name="UF_PHOTOS"
                       >
                Есть
            </label>
        </div>
    </li>
    <!--        Фото-->
    <li class="filter__item filter-ajax filter__item--range">
        <div class="filter__wrapper">
            <div class="filter__subtitle">Видео</div>

            <label class="filter__label">
                <input class="filter__checkbox" type="checkbox" name="UF_VIDEO"
                       >
                Есть
            </label>
        </div>
    </li>
    <!--        Видео-->

    <? if ($deal == 66) { ?>
        <? if ($type == 126 || $type == 127 || $type == 128 || $type == 129 || $type == 131 || $type == 132) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Возможна ипотека</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_MORTGAGE"
                               value="1">
                        Да
                    </label>
                </div>
            </li><!--            Возможна ипотека-->
        <? } ?>
        <? if ($type == 126 || $type == 127 || $type == 128) { ?>
            <li class="filter__item filter-ajax filter__item--seller">
                <div class="filter__subtitle">Тип продажи</div>
                <ul class="filter__inner">
                    <li class="filter__case">
                        <label class="filter__label-radio">
                            <input class="filter__radio" name="UF_SALES_TYPE" type="radio"
                                   value="Свободная">

                            Свободная
                        </label>
                    </li>
                    <li class="filter__case">
                        <label class="filter__label-radio">
                            <input class="filter__radio" name="UF_SALES_TYPE" type="radio"
                                   value="Альтернатива">

                            Альтернатива
                        </label>
                    </li>

                </ul>
            </li><!--            Тип продажи-->
        <? }
        if ($type == 127 || $type == 133) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Бонус к агенту</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BONUS"
                               value="1">
                        Да
                    </label>
                </div>
            </li><!--            Бонус к агенту-->
        <? }
    } ?>
    <?php if ($deal == 67) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Коммунальные платежи</div>

            <input class="filter__input" name="UF_COM_PAY_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_COM_PAY_DO" type="number" placeholder="до">
        </li><!--            Коммунальные платежи-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Срок аренды</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RENT_PERIOD"
                           value="От 1 года">
                    От 1 года
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RENT_PERIOD"
                           value="Несколько месяцев">
                    Несколько месяцев
                </label>
            </div>
        </li><!--            Срок аренды-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Предоплата</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="1 месяц">
                    1 месяц
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="2 месяца">
                    2 месяца
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="3 месяца">
                    3 месяца
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="4 месяца">
                    4 месяца
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="5 месяцев">
                    5 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="6 месяцев">
                    6 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="7 месяцев">
                    7 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="8 месяцев">
                    8 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="9 месяцев">
                    9 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="10 месяцев">
                    10 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="11 месяцев">
                    11 месяцев
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PREPAY"
                           value="1 год">
                    1 год
                </label>

            </div>
        </li><!--            Предоплата-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Залог</div>

            <input class="filter__input" name="UF_DEPOSIT_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_DEPOSIT_DO" type="number" placeholder="до">
        </li><!--            Залог-->
    <? }
    if ($deal == 68) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__subtitle">Залог</div>

            <input class="filter__input" name="UF_DEPOSIT_OT" type="number" placeholder="от">

            <input class="filter__input" name="UF_DEPOSIT_DO" type="number" placeholder="до">
        </li><!--            Залог-->
    <? }
    if ($type == 139) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Статус</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_STATUS"
                           value="Кооператив">
                    Кооператив
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_STATUS"
                           value="Собственность">
                    Собственность
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GARAGE_STATUS"
                           value="По доверенности">
                    По доверенности
                </label>

            </div>
        </li><!--            Статус гаража-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">О здании</div>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_LIGHT"
                           value="1">
                    Свет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELECTRICITY"
                           value="1">
                    Электричество
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_WATER"
                           value="1">
                    Вода
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HEATING"
                           value="1">
                    Отопление
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FIRE_SYSTEM"
                           value="1">
                    Система пожаротушения
                </label>
            </div>
        </li><!--            О гараже-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Инфраструктура</div>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARWASH"
                           value="1">
                    Автомойка
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARSERVICE"
                           value="1">
                    Автосервис
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_AUTO_GATES"
                           value="1">
                    Автоматические ворота
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CCTV"
                           value="1">
                    Видеонаблюдение
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY_PASSES"
                           value="1">
                    Въезд по пропускам
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ALL_DAY_SECURITY"
                           value="1">
                    Круглосуточная охрана
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BESEMENT_SELLAR"
                           value="1">
                    Подвал/погреб
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_VIE_HOLE"
                           value="1">
                    Смотровая яма
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TIRE_FITTING"
                           value="1">
                    Шиномонтаж
                </label>
            </div>
        </li><!--            Инфраструктура-->
    <? }
    if ($type == 136) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Состояние</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Типовой ремонт">
                    Типовой ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Дизайнерский ремонт">
                    Дизайнерский ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Под чистовую отделку">
                    Под чистовую отделку
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется капитальный ремонт">
                    Требуется капитальный ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется косметический ремонт">
                    Требуется косметический ремонт
                </label>

            </div>
        </li><!--            Состояние-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Класс здания</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="A">
                    A
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="A+">
                    A+
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B">
                    B
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B+">
                    B+
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B-">
                    B-
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="C">
                    C
                </label>

            </div>
        </li><!--            Класс здания-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Возможное назначение</div>
                <? $str = 'Административное здание, Бизнес-центр, Свободное, Производственное здание, Модульное здание, Офисно-складское, Офисное здание, Имущественный комплекс, Торгово-развлекательный центр';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_POSPURPOSE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Возможное назначение-->
    <? }
    if ($type == 137 || $type == 138) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Состояние</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Типовой ремонт">
                    Типовой ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется капитальный ремонт">
                    Требуется капитальный ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется косметический ремонт">
                    Требуется косметический ремонт
                </label>

            </div>
        </li><!--            Состояние-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Кран</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_OVERHEAD_CRANES"
                           value="1">
                    Мостовой кран
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_BEAM_CRANES"
                           value="1">
                    Кран-балка
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_GANTRY_CRANES"
                           value="1">
                    Козловой кран
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_RAIL_CRANES"
                           value="1">
                    Ж/д кран
                </label>

            </div>
        </li><!--            Кран-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Ворота</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GATES"
                           value="На пандусе">
                    На пандусе
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GATES"
                           value="Докового типа">
                    Докового типа
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_GATES"
                           value="На нулевой отметке">
                    На нулевой отметке
                </label>

            </div>
        </li><!--            Ворота-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Лифт</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_PASS"
                           value="Пассажирский">
                    Пассажирский
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ELEVATOR_SERV"
                           value="Грузовой">
                    Грузовой
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NUM_HOISTS"
                           value="Тельфер">
                    Тельфер
                </label>

            </div>
        </li><!--            Лифт-->
<!--        <div class="filter__title filter-ajax">-->
<!--            Здание-->
<!--        </div>-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип здания</div>
                <? $str = 'Административное здание, Бизнес-парк, Производственный комплекс, Индустриальный парк, Промплощадка, Производственно-складской комплекс, Производственный цех, Многофункциональный комплекс, Офисно-производственный комплекс';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_TYPE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Тип здания-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Инфраструктура</div>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUFFET"
                           value="1">
                    Буфет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HOTEL"
                           value="1">
                    Гостиница
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_OFFICE_ROOMS"
                           value="1">
                    Офисные помещения
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_DINING"
                           value="1">
                    Столовая
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RECEPTION"
                           value="1">
                    Центральная рецепция
                </label>
            </div>
        </li><!--            Инфраструктура-->
    <? }
    if ($type == 140) { ?>
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Мебель</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FURNITURE"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Мебель-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Оборудование</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_EQUIPMENT"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Оборудование-->
    <? }
    if ($type == 141) { ?>

        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Витринные окна</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_DISPLAY_WINDOWS"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Витринные окна-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Состояние</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Типовой ремонт">
                    Типовой ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Дизайнерский ремонт">
                    Дизайнерский ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Под чистовую отделку">
                    Под чистовую отделку
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется капитальный ремонт">
                    Требуется капитальный ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется косметический ремонт">
                    Требуется косметический ремонт
                </label>

            </div>
        </li><!--            Состояние-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Вход</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Отдельный со двора">
                    Отдельный со двора
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Отдельный с улицы">
                    Отдельный с улицы
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Общий со двора">
                    Общий со двора
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Общий с улицы">
                    Общий с улицы
                </label>
            </div>
        </li><!--            Вход-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип здания</div>
                <? $str = 'Административное здание, Свободное, Многофункциональный комплекс, Торгово-развлекательный центр, Жилой комплекс, Жилой дом, Отдельно стоящее здание';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_TYPE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Тип здания-->
    <? }
    if ($type == 142) { ?>

        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Витринные окна</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_DISPLAY_WINDOWS"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Витринные окна-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Состояние</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Типовой ремонт">
                    Типовой ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Дизайнерский ремонт">
                    Дизайнерский ремонт
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Под чистовую отделку">
                    Под чистовую отделку
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется капитальный ремонт">
                    Требуется капитальный ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется косметический ремонт">
                    Требуется косметический ремонт
                </label>

            </div>
        </li><!--            Состояние-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Вход</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Отдельный со двора">
                    Отдельный со двора
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Отдельный с улицы">
                    Отдельный с улицы
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Общий со двора">
                    Общий со двора
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ENTRY"
                           value="Общий с улицы">
                    Общий с улицы
                </label>
            </div>
        </li><!--            Вход-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип здания</div>
                <? $str = 'Административное здание, Жилой комплекс, Жилой дом, Бизнес центр, Старый фонд';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_TYPE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Тип здания-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Линия домов</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HOUSE_LINE"
                           value="Первая">
                    Первая
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HOUSE_LINE"
                           value="Вторая">
                    Вторая
                </label>

            </div>
        </li><!--            Линия домов-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Инфраструктура</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARWASH"
                           value="1">
                    Автомойка
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARSERVICE"
                           value="1">
                    Автосервис
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PHARMACY"
                           value="1">
                    Аптека
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_AQUAPARK"
                           value="1">
                    Аквапарк
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ATELIER"
                           value="1">
                    Ателье одежды
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ATM"
                           value="1">
                    Банкомат
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BABY_CITY"
                           value="1">
                    Беби-ситинг
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BOWLING"
                           value="1">
                    Боулинг
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_POOL"
                           value="1">
                    Бассейн
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUFFET"
                           value="1">
                    Буфет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_COMPLEX"
                           value="1">
                    Выставочно-складской комплекс
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HOTEL"
                           value="1">
                    Гостиница
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PLAY_ROOM"
                           value="1">
                    Игровая комната
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_SLOT_MACHINES"
                           value="1">
                    Игровые автоматы
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ICE_RINK"
                           value="1">
                    Каток
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CAFE"
                           value="1">
                    Кафе
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MOVIE_THEATER"
                           value="1">
                    Кинотеатр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONFERENCE_HALL"
                           value="1">
                    Конференц-зал
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MED_CENTER"
                           value="1">
                    Медицинский центр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MINIMARKET"
                           value="1">
                    Минимаркет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_WAREHOUSES"
                           value="1">
                    Складские помещения
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NOTARIAL"
                           value="1">
                    Нотариальная контора
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BANK"
                           value="1">
                    Отделение банка
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARK"
                           value="1">
                    Парк
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RESTAURANT"
                           value="1">
                    Ресторан
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BEAUTY_SALOON"
                           value="1">
                    Салон красоты
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_DINING"
                           value="1">
                    Столовая
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_SUPERMARKET"
                           value="1">
                    Супермаркет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TRADING_ZONE"
                           value="1">
                    Торговая зона
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FITNESS"
                           value="1">
                    Фитнес-центр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FOTO_SALOON"
                           value="1">
                    Фотосалон
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FOOD_COURT"
                           value="1">
                    Фуд-корт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RECEPTION"
                           value="1">
                    Центральная рецепция
                </label>
            </div>
        </li><!--            Инфраструктура-->
    <? }
    if ($type == 135) { ?>
        <li class="filter__item filter-ajax filter__item--seller">
            <div class="filter__subtitle">Пропускной режим</div>
            <ul class="filter__inner">
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_ACCESS" type="radio"
                               value="Неважно">

                        Неважно
                    </label> <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_ACCESS" type="radio"
                               value="Свободный">

                        Свободный
                    </label>
                </li>
                <li class="filter__case">
                    <label class="filter__label-radio">
                        <input class="filter__radio" name="UF_ACCESS" type="radio"
                               value="Пропускная система">

                        Пропускная система
                    </label>
                </li>

            </ul>
        </li><!--            Пропускной режим-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Состояние</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Офисная отделка">
                    Офисная отделка
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Под чистовую отделку">
                    Под чистовую отделку
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется капитальный ремонт">
                    Требуется капитальный ремонт
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONDITION"
                           value="Требуется косметический ремонт">
                    Требуется косметический ремонт
                </label>

            </div>
        </li><!--            Состояние-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Мебель</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FURNITURE"
                           value="1">
                    Да
                </label>
            </div>
        </li><!--            Мебель-->
<!--        <div class="filter__title filter-ajax">-->
<!--            Здание-->
<!--        </div>-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Класс здания</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="A">
                    A
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="A+">
                    A+
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B">
                    B
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B+">
                    B+
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="B-">
                    B-
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_CLASS"
                           value="C">
                    C
                </label>

            </div>
        </li><!--            Класс здания-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Тип здания</div>
                <? $str = 'Административное здание, Бизнес-центр, Деловой центр, Бизнес-парк, Бизнес-квартал, Особняк, Многофункциональный комплекс, Офисно-гостиничный комплекс, Офисно-жилой комплекс, Офисно-складской комплекс, Офисное здание, Офисно-производственный комплекс, Старый фонд, Жилой комплекс, Жилой дом, Торгово-деловой комплекс, Отдельно стоящее здание, Технопарк, Торгово-офисный комплекс';
                $arr = explode(', ', $str);
                foreach ($arr as $item):?>
                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_BUILDING_TYPE"
                               value="<?= $item ?>">
                        <?= $item ?>
                    </label>
                <? endforeach; ?>
            </div>
        </li><!--            Тип здания-->
        <li class="filter__item filter-ajax filter__item--range">
            <div class="filter__wrapper">
                <div class="filter__subtitle">Инфраструктура</div>

                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARWASH"
                           value="1">
                    Автомойка
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CARSERVICE"
                           value="1">
                    Автосервис
                </label><label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PHARMACY"
                           value="1">
                    Аптека
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ATELIER"
                           value="1">
                    Ателье одежды
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_ATM"
                           value="1">
                    Банкомат
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_POOL"
                           value="1">
                    Бассейн
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BUFFET"
                           value="1">
                    Буфет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_COMPLEX"
                           value="1">
                    Выставочно-складской комплекс
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_HOTEL"
                           value="1">
                    Гостиница
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CAFE"
                           value="1">
                    Кафе
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MOVIE_THEATER"
                           value="1">
                    Кинотеатр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_CONFERENCE_HALL"
                           value="1">
                    Конференц-зал
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MED_CENTER"
                           value="1">
                    Медицинский центр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_MINIMARKET"
                           value="1">
                    Минимаркет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_WAREHOUSES"
                           value="1">
                    Складские помещения
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_NOTARIAL"
                           value="1">
                    Нотариальная контора
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BANK"
                           value="1">
                    Отделение банка
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_PARK"
                           value="1">
                    Парк
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RESTAURANT"
                           value="1">
                    Ресторан
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_BEAUTY_SALOON"
                           value="1">
                    Салон красоты
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_DINING"
                           value="1">
                    Столовая
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_SUPERMARKET"
                           value="1">
                    Супермаркет
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_TRADING_ZONE"
                           value="1">
                    Торговая зона
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FITNESS"
                           value="1">
                    Фитнес-центр
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_FOTO_SALOON"
                           value="1">
                    Фотосалон
                </label>
                <label class="filter__label">
                    <input class="filter__checkbox" type="checkbox" name="UF_RECEPTION"
                           value="1">
                    Центральная рецепция
                </label>
            </div>
        </li><!--            Инфраструктура-->
    <? }
    if ($_REQUEST['deal'] == 66) {
        if ($type_of_rs == 145 && $type != 139 && $type != 143) { ?>
            <li class="filter__item filter-ajax filter__item--range">
                <div class="filter__wrapper">
                    <div class="filter__subtitle">Переуступка прав аренды</div>

                    <label class="filter__label">
                        <input class="filter__checkbox" type="checkbox" name="UF_RENT_RIGHTS"
                               value="1">
                        Да
                    </label>
                </div>
            </li><!--            Переуступка прав аренды-->
        <? }
    }
}
?>

<script>
    $('.filter__checkbox').on('change', function () {
        $(this).closest('.filter__label').toggleClass('filter__label--active');
    });
    $('.filter__item--seller .filter__radio').on('change', function () {
        $('.filter__item--seller .filter__label-radio').removeClass('filter__label-radio--active');
        $(this).closest('.filter__label-radio').addClass('filter__label-radio--active');

    });
</script>