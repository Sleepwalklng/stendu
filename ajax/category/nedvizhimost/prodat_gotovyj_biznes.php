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
                                        <a href="#">Продам</a>
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
                    <div class="announcement-content__block-wrap grid">

                        <div class="col_33">
                            <div class="label">
                                <div class="announcement-label__title">Тип бизнеса</div>
                                <select name="UF_BUSINESS_TYPE" id="">
                                    <option value="Арендный бизнес">Арендный бизнес</option>
                                    <option value="Готовый бизнес">Готовый бизнес</option>
                                </select>
                            </div>
                        </div>

                        <div class="col_33">
                            <div class="label">
                                <div class="announcement-label__title">Категория бизнеса</div>
                                <select name="UF_BUSINESS_CATEGORY" id="">
                                    <option value="3">База отдыха</option>
                                    <option value="2">База отдыха 2</option>
                                    <option value="1">База отдыха 3</option>
                                    <option value="4">База отдыха 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col_33">
                            <label>
                                <div class="announcement-label__title">Месячная прибыль</div>
                                <input type="text" value="1000000" name="UF_MONTH_PROFIT">
                                <span class="measure">€ / месяц</span>
                            </label>
                        </div>

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
                    </div>
                </div>

                <!-- Параметры -->
                <div class="announcement-content__block">
                    <div class="announcement-content__title">Параметры</div>
                    <div class="grid">
                        <div class="col_25">
                            <label class="label-checkbox narrow">
                                <input type="checkbox" class="visually-hidden" name="UF_FURNITURE">
                                <span></span>
                                <div>Мебель</div>
                            </label>
                        </div>
                        <div class="col_25">
                            <label class="label-checkbox narrow">
                                <input type="checkbox" class="visually-hidden" name="UF_EQUIPMENT">
                                <span></span>
                                <div>Оборудование</div>
                            </label>
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
                            <label>
                                <div class="announcement-label__title">Цена</div>
                                <input type="text" value="" name="UF_PRICE">
                                <span class="measure">€</span>
                            </label>
                        </div>

                        <div class="col_50">
                            <div class="label">
                                <div class="announcement-label__title">Налог*</div>
                                <select name="UF_TAX" id="">
                                    <option value="НДС включен">НДС включен</option>
                                    <option value="НДС не облагается">НДС не облагается</option>
                                 
                                </select>
                            </div>
                        </div>

                        <div class="col_50">
                            <div class="label">
                                <div class="announcement-label__title">Недвижимость</div>
                                <select name="UF_REAL_ESTATE" id="">
                                    <option value="В аренде">В аренде</option>
                                    <option value="В собственности">В собственности</option>
                                </select>
                            </div>
                        </div>

                        <? if ($_REQUEST['agent'] == 82): ?>
                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Бонус к агенту</div>
                                    <select name="UF_BONUS" id="bonus">
                                        <option value="Нет">Нет</option>
                                        <option value="Фиксированная цена">Фиксированная цена</option>
                                        <option value="Процент">Процент</option>
                                    </select>
                                </div>
                            </div>
                                                        <div class="col_50"></div>
                            <div class="col_50 agent-bonus"></div>
                            <script>
                                $('#bonus').on('change', function () {
                                    var bonus = $(this).val();
                                    console.log(bonus)
                                    if (bonus != 'Нет') {
                                        $.ajax({
                                            type: 'post',
                                            url: '/ajax/agent_bonus.php',
                                            data: {bonus: bonus},
                                            dataType: 'html',
                                            success: function (e) {
                                                $('.agent-bonus').empty().append(e);
                                            },
                                            error: function (e) {
                                                console.log(e)
                                                console.log(false);
                                            }
                                        });
                                    } else {
                                        $('.agent-bonus').empty()
                                    }
                                })
                            </script>
                        <? endif; ?>

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