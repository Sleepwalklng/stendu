<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
if($_REQUEST['data'] == 'Арендный бизнес'):?>
    <div class="announcement-chapter__title announcement-chapter__title--bold">Категории
        бизнеса
    </div>
    <div class="grid">
        <?
        $str = 'База, База отдыха, Гостевой дом, Гостиница, Доходный дом, Клиентский офис, Мини-отель, Офис, Помещение свободного назначения, Рабочее место, Рабочий кабинет, Склад, Стрит ритейл, Торговая площадь, Торговый комплекс, Торговый центр, Хостел';
        $arr = explode(', ', $str);
        foreach ($arr as $item):
            ?>
            <div class="col_25">
                <label class="label-checkbox label-checkbox--boxy">
                    <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                    <span></span>
                    <div><?=$item?></div>
                </label>
            </div>
        <? endforeach; ?>
    </div>

<?php elseif($_REQUEST['data'] == 'Готовый бизнес'):?>
    <div class="announcement-chapter__title announcement-chapter__title--bold">Категория бизнеса</div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Общественное питание</div>
        <div class="grid">
            <?
            $str = 'Бар, Буфет, Кальянная, Кафе, Кондитерская, кофейня, Кулинария, Общепит, Пекарня, Пиццерия, Продукты, Ресторан, Столовая, Суши, Фастфуд, Шаурма';
            $arr = explode(', ', $str);
            foreach ($arr as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Услуги</div>
        <div class="grid">
            <?
            $str1 = 'Автомойка, Автосервис, Ателье одежды, Банк, Бытовые услуги, Детский клуб, Детский сад, Детский центр, Займы, Ломбард, Нотариальная контора, Обмен валюты, Представительство, Сервис, СТО, Студия танцев, Тату салон, Типография, Турагенство, Услуги, Учебный центр, Фото студия, Химчистка, Частная практика, Шиномонтаж, Школа';
            $arr1 = explode(', ', $str1);
            foreach ($arr1 as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Красота и здоровье</div>
        <div class="grid">
            <?
            $str2 = 'Spa салон, Банный комплекс, Больничный комплекс, Йога, Клиника, Косметология, Маникюр, Массажный салон, Медицинский Центр, Пансионат, Парикмахерская, Салон, Салон красоты, Санаторий, Сауна, Спортзал, Стоматология, Фитнес';
            $arr2 = explode(', ', $str2);
            foreach ($arr2 as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Развлечения</div>
        <div class="grid">
            <?
            $str3 = 'Антикафе, Бильярдная, Боулинг, Букмекерская контора, Выставка, Галерея, Квест, Клуб, Ночной клуб';
            $arr3 = explode(', ', $str3);
            foreach ($arr3 as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Торговля</div>
        <div class="grid">
            <?
            $str4 = 'Авиа кассы, Автозапчасти, Автосалон, АЗС, Алкомаркет, Аптека, Белье, Бижутерия, Бутик, Бытовая техника, Гипермаркет, Детский магазин, Зоомагазин, Коммерция, Косметика, Магазин, Мебель, Мясо, Обувь, Одежда, Оптика, Парфюмерия, Посуда, Пункт выдачи, Рыба, Салон связи, Стройматериалы, Сувениры, Сумки, Супермаркет, Товары для дома, Товары народного потребления, Торговля, Торговое оборудование, Фрукты и овощи, Цветы, Шоурум, Электронные сигареты, Ювелирный';
            $arr4 = explode(', ', $str4);
            foreach ($arr4 as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Производство и сельское хозяйство</div>
        <div class="grid">
            <?
            $str5 = 'Завод, Малое производство, Мастерская, Производство, Хлебокомбинат, Цех, Швейный цех';
            $arr5 = explode(', ', $str5);
            foreach ($arr5 as $item):
                ?>
                <div class="col_25">
                    <label class="label-checkbox label-checkbox--boxy">
                        <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                        <span></span>
                        <div><?=$item?></div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="announcement-chapter announcement-chapter--without-divider">
        <div class="announcement-chapter__title">Дополние категории</div>
        <div class="grid">
            <div class="col_25">
                <label class="label-checkbox label-checkbox--boxy">
                    <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                    <span></span>
                    <div>Другое</div>
                </label>
            </div>
            <div class="col_25">
                <label class="label-checkbox label-checkbox--boxy">
                    <input name="UF_BUSINESS_CATEGORY" type="checkbox" class="visually-hidden">
                    <span></span>
                    <div>Интернет-магазин</div>
                </label>
            </div>
        </div>
    </div>
<?php endif;?>
<script>
    $('.visually-hidden').each(function () {
        $(this).val('off')
    });
    $('.label-checkbox').on('click', function () {
        let val = $(this).find('div').text();
        $(this).find('.visually-hidden').val(val);

    });
    $('.announcement-switch__item').on('click', function () {
        let val = $(this).find('span').text();
        $(this).find('input[type=radio]').val(val);

    });
</script>
