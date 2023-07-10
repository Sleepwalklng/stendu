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
                                    <div class="announcement-content__category-description">Готовый бизнес</div>
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
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Тип бизнеса</div>
                            <div class="announcement-content__subtitle">Помещение в собственности с арендатором на
                                долгий срок
                            </div>
                            <div class="announcement-switch announcement-switch--boxy">
                                <div class="announcement-switch__wrap">
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_BUSINESS_TYPE" checked value="Арендный бизнес">
                                        <span>Арендный бизнес</span>
                                    </label>
                                    <label class="announcement-switch__item">
                                        <input type="radio" name="UF_BUSINESS_TYPE" value="Готовый бизнес">
                                        <span>Готовый бизнес</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="announcement-chapter announcement-chapter--without-divider ajax-business">
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
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="announcement-chapter__title announcement-chapter__title--bold">Месячная прибыль,
                                €
                            </div>
                            <div class="range ">
                                <label>
                                    <input name="UF_MONTH_PROFIT_OT" type="number" placeholder="от">
                                </label>
                                <label>
                                    <input name="UF_MONTH_PROFIT_DO" type="number" placeholder="до">
                                </label>
                            </div>
                        </div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="announcement-chapter__title announcement-chapter__title--bold">Этаж</div>
                            <div class="grid">
                                <div class="col_33">
                                    <div class="range ">
                                        <label>
                                            <input name="UF_FLOOR_LEVEL_OT" type="number" placeholder="от">
                                        </label>
                                        <label>
                                            <input name="UF_FLOOR_LEVEL_DO" type="number" placeholder="до">
                                        </label>
                                    </div>
                                </div>
                                <div class="col_33">
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

                    </div>

                    <!-- Площадь -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Площадь</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">

                            <div class="announcement-chapter__title announcement-chapter__title--bold">Общая площадь,
                                м²
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
                    </div>

                    <!-- Параметры -->
                    <div class="announcement-content__block">
                        <div class="announcement-content__title">Параметры</div>

                        <div class="announcement-chapter announcement-chapter--without-divider">
                            <div class="grid">
                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">Мебель
                                    </div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_FURNITURE_Y" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Есть</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_FURNITURE_N" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Нет</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_50">
                                    <div class="announcement-chapter__title announcement-chapter__title--bold">
                                        Оборудование
                                    </div>
                                    <div class="grid">
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_EQUIPMENT_Y" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Есть</div>
                                            </label>
                                        </div>
                                        <div class="col_50">
                                            <label class="label-checkbox label-checkbox--boxy">
                                                <input name="UF_EQUIPMENT_N" type="checkbox" class="visually-hidden">
                                                <span></span>
                                                <div>Нет</div>
                                            </label>
                                        </div>
                                    </div>
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

<script>
    $('input[name=UF_BUSINESS_TYPE]').click(function () {
        var data = $(this).val();
        $.ajax({
            type: 'post',
            url: '/ajax/business.php',
            data: {data: data},
            dataType: 'html',
            success: function (e) {
                $('.ajax-business').empty().append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    })
</script>

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