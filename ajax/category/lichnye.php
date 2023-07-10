<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



function GetFieldArray($MY_HL_BLOCK_ID): array
{
    $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
    $rsData = $entity_data_class::getList(array());
    while ($el = $rsData->fetch()) {
        $arr[] = $el;
    }
    return $arr;
}

if (!empty($_REQUEST['subcategory3SecondName'])) {
    function GetItemArray($MY_HL_BLOCK_ID): array
    {
        $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
        $rsData = $entity_data_class::getList(array(
            'select' => array('*'),
            'filter' => array('UF_SECOND_NAME' => $_REQUEST['subcategory3SecondName'])
        ));
        while ($el = $rsData->fetch()) {
            $arr = $el;
        }
        return $arr;
    }

    $elem = GetItemArray(16);

    foreach ($elem['UF_DOP_FILTER'] as $el) {
        if ($el == 173) {
            $colors = GetFieldArray(21);
        }
        if ($el == 174) {
            $sizeFootChild = GetFieldArray(24);
        }
        if ($el == 175) {
            $footsS = GetFieldArray(23);
        }
        if ($el == 176) {
            $clothesS = GetFieldArray(22);
        }
        if ($el == 177) {
            $clothesSizeChild = GetFieldArray(25);
        }
        if ($el == 178) {
            $footsSm = GetFieldArray(27);
        }
        if ($el == 179) {
            $clothesSm = GetFieldArray(26);
        }

    }
}


?>

    <div class="parameters-ad new-ad__form-item update-block">
        <h2 class="new-ad__item-title">Параметры</h2>
        <div class="new-ad__item-content">
            <div class="new-ad__flex-66">
                <p class="new-ad__label-name">
                    <span>Название объявления</span>
                </p>
                <label class="new-ad__input-box">
                    <input type="text" name="UF_NAME">
                </label>
            </div>
            <div class="new-ad__flex-33">
                <p class="new-ad__label-name">
                    <span>Состояние</span>
                    <span class="new-ad__label-name-icon">?</span>
                </p>
                <div class="new-ad__radio-box">
                    <label class="new-ad__radio active">
                        <input type="radio" name="UF_STATE" value="5" checked>
                        <span>Новое</span>
                    </label>
                    <label class="new-ad__radio">
                        <input type="radio" name="UF_STATE" value="6">
                        <span>Б/у</span>
                    </label>
                </div>
            </div>
            <div class="new-ad__flex-33">
                <p class="new-ad__label-name">Вид объявления</p>
                <label class="new-ad__input-box">
                    <select name="vid">
                        <option value="Продаю своё">Продаю своё</option>
                        <option value="Продаю чужое">Продаю чужое</option>
                    </select>
                </label>
            </div>
            <? if (!empty($clothesS)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер одежды</p>
                    <label class="new-ad__input-box">
                        <select name="UF_SIZE">
                            <option value="">Не выбрано</option>
                            <? foreach ($clothesS as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <? if (!empty($footsS)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер обуви</p>
                    <label class="new-ad__input-box">
                        <select name="UF_SIZE_FOOT">
                            <option value="">Не выбрано</option>
                            <? foreach ($footsS as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <? if (!empty($clothesSizeChild)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер одежды</p>
                    <label class="new-ad__input-box">
                        <select name="UF_SIZE_CLOTHES_CHILD">
                            <option value="">Не выбрано</option>
                            <? foreach ($clothesSizeChild as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <? if (!empty($sizeFootChild)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер обуви</p>
                    <label class="new-ad__input-box">
                        <select name="UF_FOOT_SIZE_CHILD">
                            <option value="">Не выбрано</option>
                            <? foreach ($sizeFootChild as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <? if (!empty($clothesSm)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер одежды</p>
                    <label class="new-ad__input-box">
                        <select name="UF_SIZE_CLOTHES_MAN">
                            <option value="">Не выбрано</option>
                            <? foreach ($clothesSm as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <? if (!empty($footsSm)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Размер обуви</p>
                    <label class="new-ad__input-box">
                        <select name="UF_SIZE_FOOT_MAN">
                            <option value="">Не выбрано</option>
                            <? foreach ($footsSm as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>

            <div class="new-ad__flex-33">
                <p class="new-ad__label-name">Цена</p>
                <label class="parameters-ad__price-label new-ad__input-box">
                    <input type="number" name="UF_PRICE">
                </label>
            </div>
            <div class="new-ad__flex-full">
                <p class="new-ad__label-name">Описание объявления</p>
                <label class="new-ad__textarea-box">
                <textarea name="UF_DESCRIPTION"
                          placeholder="Не указывайте в описании телефон и e-mail — для этого есть отдельные поля"></textarea>
                </label>
            </div>
        </div>
    </div>

    <div class="new-ad__form-item update-block"> <!-- photo-ad  -->
        <h2 class="new-ad__item-title">Внешний вид</h2>
        <div class="new-ad__item-content">
            <div class="new-ad__flex-full">
                <p class="new-ad__label-name">
                    <span>Фотографии</span>
                </p>
                <ul class="photo-ad__photo-list" id="preview">
                    <!--<li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img1.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img2.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>
                                    <li class="photo-ad__photo-item">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-img3.webp" alt="">
                                        <button class="photo-ad__del"></button>
                                    </li>-->
                    <li class="photo-ad__photo-item">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-new-photo.webp" alt="">
                        <label class="photo-ad__label">
                            <input type="file" id="upload" name="FILE" accept=".txt,image/*" multiple>
                        </label>
                    </li>
                </ul>
            </div>
            <? if (!empty($colors)): ?>
                <div class="new-ad__flex-33">
                    <p class="new-ad__label-name">Цвет</p>
                    <label class="new-ad__input-box">
                        <select name="UF_COLOR">
                            <option value="">Не выбрано</option>
                            <? foreach ($colors as $item): ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['UF_NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                </div>
            <? endif; ?>
            <div class="new-ad__flex-66">
                <p class="new-ad__label-name">Видео c YouTube</p>
                <label class="new-ad__input-box">
                    <input placeholder="Например: https://www.youtube.com/watch?v=dQw4w9WgXcQ" type="text"
                           name="UF_VIDEO">
                </label>
            </div>
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
        "PATH" => "/includes/other_map-block.php"
    )
);?>
    <div class="contacts-ad new-ad__form-item update-block">
        <h2 class="new-ad__item-title">Контакты</h2>
        <div class="new-ad__item-content">
            <div class="new-ad__flex-50">
                <p class="new-ad__label-name">
                    <span>Введите e-mail</span>
                </p>
                <label class="new-ad__input-box">
                    <input type="email" name="UF_EMAIL">
                </label>
            </div>
            <div class="new-ad__flex-50">
                <p class="new-ad__label-name">
                    <span>Введите телефон</span>
                </p>
                <label class="new-ad__input-box">
                    <input type="tel" name="UF_PHONE">
                </label>
            </div>
            <div class="new-ad__flex-full">
                <div class="contacts-ad__radio-box">
                    <p class="contacts-ad__radio-box-title">Способ связи</p>
                    <label class="contacts-ad__radio-label active">
                        <input type="radio" name="UF_COMMUNICATION" checked value="По телефону и в сообщениях">
                        <span class="contacts-ad__radio-icon"></span>
                        <span class="contacts-ad__radio-name">По телефону и в сообщениях</span>
                    </label>
                    <label class="contacts-ad__radio-label">
                        <input type="radio" name="UF_COMMUNICATION" value="По телефону">
                        <span class="contacts-ad__radio-icon"></span>
                        <span class="contacts-ad__radio-name">По телефону </span>
                    </label>
                    <label class="contacts-ad__radio-label">
                        <input type="radio" name="UF_COMMUNICATION" value="В сообщениях">
                        <span class="contacts-ad__radio-icon"></span>
                        <span class="contacts-ad__radio-name">В сообщениях</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php if (!empty($_REQUEST['idItem'])) { ?>
    <input class="itemId" type="hidden" name="itemId" value="<?=$_REQUEST['idItem']?>">
<?php } ?>
    <input class="oper" type="hidden" name="oper" value="add">
    <input class="UF_CATEGORY" type="hidden" name="UF_MAIN_CATEGORY" value="<?= $_REQUEST['subcategoryNum11'] ?>">
    <input class="UF_CATEGORY" type="hidden" name="UF_CATEGORY" value="<?= $_REQUEST['subcategoryNum22'] ?>">
    <input class="UF_TYPE" type="hidden" name="UF_TYPE" value="<?= $_REQUEST['subcategoryNum33'] ?>">
    <input class="UF_CATEGORIES_OUTERWEAR" type="hidden" name="UF_CATEGORIES_OUTERWEAR"
           value="<?= $_REQUEST['subcategoryNum4'] ?>">
    <div class="new-ad__form-footer update-block">
        <div class="new-ad__footer-box">
            <div class="new-ad__footer-icon desktop">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-ad-footer-icon.svg" alt="">
            </div>
            <button class="new-ad__footer-link">Сохранить и выйти</button>
        </div>
        <button type="submit" class="new-ad__footer-btn">Продолжить</button>
    </div>

    <div class="announcement-modal">
        <div class="announcement-modal__inner">
            <div class="announcement-modal__left">
                <img class="announcement-modal__img" id="load-modal__photo"
                     src="<?= SITE_TEMPLATE_PATH ?>/images/zaglushka_foto.svg" alt="">
            </div>

            <div class="announcement-modal__boundary"></div>

            <div class="announcement-modal__right">
                <div class="announcement-modal__title">
                    Ваше объявление принято!
                </div>

                <div class="announcement-modal__text">
                    Пользователи увидят ваше объявление сразу после проверки.
                    Обычно она занимает пару минут, в редких случаях нам нужно больше времени.
                </div>

                <a class="announcement-modal__up">
                    Поднять просмотры
                </a>

                <a class="announcement-modal__close"></a>
            </div>
        </div>
    </div>

    <script>

        function onload() {
            $('.photo-ad__del').click(function () {
                $(this).parents('.photo-ad__photo-item').remove();
            });
        };

        // загрузка фото
        (function () {
            var inpElem = document.getElementById('upload'),
                divElem = document.getElementById('preview');

            inpElem.addEventListener("change", function (e) {
                preview(this.files[0]);
            });

            function preview(file) {
                if (file.type.match(/image.*/)) {
                    var reader = new FileReader(), img;

                    reader.addEventListener("load", function (event) {
                        li = document.createElement('li');
                        li.className = "photo-ad__photo-item";
                        a = document.createElement('a');
                        a.className = "photo-ad__del";
                        img = document.createElement('img');
                        img.src = event.target.result;
                        divElem.appendChild(li);
                        divElem.prepend(li);
                        li.appendChild(img);
                        li.appendChild(a);

                        onload();
                    });

                    reader.readAsDataURL(file);
                }
            }
        })();


        $(document).ready(function () {

            $('.new-ad__form').submit(function (e) {
                //var data = $(this).serialize();
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                formData.append('UF_STATUS', '26');

                $.ajax({
                    type: 'POST',
                    url: '/ajax/additem/lichnye.php',
                    data: formData,
                    //dataType: 'html',

                    cache: false,
                    processData: false,
                    contentType: false,

                    success: function (e) {
                        e = JSON.parse(e)
                        if (e == 1) {
                            $('.announcement-modal').css('display', 'block');
                            $('.announcement-modal__close').click(function () {
                                window.location = '/profile';
                                $('.announcement-modal').css('display', 'none');
                            })
                        } else {
                            $.each(e, function (index, value) {
                                $('input[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            });
                            $('html, body').animate({
                                scrollTop: $('input[name=' + Object.keys(e)[0] + ']').offset().top // класс объекта к которому приезжаем
                            }, 1000);
                        }

                    },
                    error: function (e) {
                        console.log(false);
                    }
                });
                return false;
            })

            $('.new-ad__footer-link').click(function (e) {
                //var data = $(this).serialize();
                e.preventDefault();
                var formData = new FormData($('.new-ad__form')[0]);
                formData.append('UF_STATUS', '28');

                $.ajax({
                    type: 'POST',
                    url: '/ajax/additem/lichnye.php',
                    data: formData,
                    //dataType: 'html',

                    cache: false,
                    processData: false,
                    contentType: false,

                    success: function (e) {
                        e = JSON.parse(e)
                        if (e == 1) {
                            $('.announcement-modal').css('display', 'block');
                            $('.announcement-modal__close').click(function () {
                                window.location = '/profile';
                                $('.announcement-modal').css('display', 'none');
                            })
                        } else {
                            $.each(e, function (index, value) {
                                $('input[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            });
                            $('html, body').animate({
                                scrollTop: $('input[name=' + Object.keys(e)[0] + ']').offset().top // класс объекта к которому приезжаем
                            }, 1000);
                        }

                    },
                    error: function (e) {
                        console.log(false);
                        console.log(e);
                    }
                });
                return false;
            })
        });

        // Отправление форм
        /* $(document).ready(function () {
             $('.new-ad__form').submit(function () {
                 //var data = $(this).serialize();
                 var formData = new FormData(this);

                 $.ajax({
                     type: 'post',
                     url: '/ajax/additem/lichnye.php',
                     data: formData,
                     //dataType: 'html',
                     dataType: 'json',
                     enctype: 'multipart/form-data',
                     success: function (e) {
                         //$('body').append(e);
                         console.log(e);

                     },
                     error: function (e) {
                         console.log(false);
                     }
                 });
                 return false;
             })
         });
     */



        // 14.12.2022
        $(document).ready(function () {

            // Resume
            $('.resume__desc-btn').click(function () {
                $('.resume__desc-text').toggleClass('active')
                $(this).toggleClass('active');
            });
            $('.resume__map-title-box').click(function () {
                $('.resume__map-btn').toggleClass('active');
                $('.resume__map').slideToggle();
            });

            // New ads
            $('.mask-gosnomer').length ? $('.mask-gosnomer').mask('a  999  a a') : false;
            $('.mask-vin').length ? $('.mask-vin').mask('999') : false;
            $('.new-ad__radio input').change(function () {
                $(this).parents('.new-ad__radio-box').find('.new-ad__radio').removeClass('active');
                $(this).parent().addClass('active');
            });
            $('.new-ad__checkbox-label input').change(function () {
                $(this).parent().toggleClass('active');
            });
            $('.brand-ad__label input').change(function () {
                $(this).parents('.brand-ad__list').find('.brand-ad__label.active').removeClass('active');
                $(this).parent().addClass('active');
            });
            $('.contacts-ad__radio-label input').change(function () {
                $('.contacts-ad__radio-label.active').removeClass('active');
                $(this).parent().addClass('active');
            });

            $('.photo-ad__photo-list').sortable({
                items: '.photo-ad__photo-item:not(:last-child)'
            });

        });
    </script>
<?php if (!empty($_REQUEST['idItem'])) { ?>
    <input class="idItem" type="hidden" name="idItem" value="<?= $_REQUEST['idItem'] ?>">
    <input class="hl_id" type="hidden" name="hl_id" value="<?= $_REQUEST['hl_id'] ?>">
    <script>
        $(document).ready(function () {
            $('input[name=oper]').val('update')
            const id = $('.idItem').val();
            const hl_id = $('.hl_id').val();
            $.ajax({
                type: 'post',
                url: '/ajax/additem/draft.php',
                data: {id: id, hl_id: hl_id},
                dataType: 'html',
                success: function (e) {
                    e = JSON.parse(e)
                    console.log(e)
                    $.each(e, function (index, value) {
                        if (value) {
                            $('textarea[name=' + index + ']').val(value)
                            $('input[name=' + index + ']').not('[type="checkbox"]').not('[type="radio"]').val(value)
                        }
                    });

                },
                error: function (data) {
                    console.log(data);
                    console.log(false);
                }
            })
        })
    </script>
<?php } ?>