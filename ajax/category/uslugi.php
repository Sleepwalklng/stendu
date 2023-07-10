<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';


function GetItemsHL($MY_HL_BLOCK_ID): array
{
    $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
    $rsData = $entity_data_class::getList(array());
    while ($el = $rsData->fetch()) {
        $arr[] = $el;
    }
    return $arr;
}

function userFieldEnum($id): array
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        $arr[] = $ob;
    };
    return $arr;
}

$arSeller = userFieldEnum(156);
?>

<div class="parameters-ad new-ad__form-item update-block">
    <h2 class="new-ad__item-title">Параметры</h2>
    <div class="new-ad__item-content">
        <div class="new-ad__flex-66">
            <p class="new-ad__label-name">Название объявления</p>
            <label class="new-ad__input-box">
                <input type="text" name="UF_NAME" value="">
            </label>
        </div>
        <div class="new-ad__flex-33">
            <p class="new-ad__label-name">
                <span>Цена</span>
            </p>
            <label class="new-ad__input-box ">
                <input type="text" name="UF_PRICE" value="">
            </label>
        </div>
        <!--                            <div class="new-ad__flex-33">-->
        <!--                                <p class="new-ad__label-name">-->
        <!--                                    <span>Ваши клиенты</span>-->
        <!--                                </p>-->
        <!--                                <div class="new-ad__radio-box">-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="KLIENTY" value="Женщины">-->
        <!--                                        <span>Женщины</span>-->
        <!--                                    </label>-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="KLIENTY" value="Мужчины">-->
        <!--                                        <span>Мужчины</span>-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="new-ad__flex-33">-->
        <!--                                <p class="new-ad__label-name">-->
        <!--                                    <span>Кто оказывает услуги</span>-->
        <!--                                </p>-->
        <!--                                <div class="new-ad__radio-box">-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="WHO" value="Женщины">-->
        <!--                                        <span>Женщины</span>-->
        <!--                                    </label>-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="WHO" value="Мужчины">-->
        <!--                                        <span>Мужчины</span>-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="new-ad__flex-33">-->
        <!--                                <p class="new-ad__label-name">-->
        <!--                                    <span>Где вы оказываете услуги</span>-->
        <!--                                </p>-->
        <!--                                <div class="new-ad__radio-box">-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="WHERE" value="У себя дома">-->
        <!--                                        <span>У себя дома</span>-->
        <!--                                    </label>-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="WHERE" value="У заказчика">-->
        <!--                                        <span>У заказчика</span>-->
        <!--                                    </label>-->
        <!--                                    <label class="new-ad__radio">-->
        <!--                                        <input type="radio" name="WHERE" value="В салоне">-->
        <!--                                        <span>В салоне</span>-->
        <!--                                    </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <div class="new-ad__flex-33">
            <div class="new-ad__radio-box">
                <? foreach ($arSeller as $key => $item): ?>
                    <label class="new-ad__radio <?= $key == 0 ? 'active' : '' ?>">
                        <input type="radio" <?= $key == 0 ? 'checked' : '' ?> name="UF_SELLER"
                               value="<?= $item['ID'] ?>">
                        <span><?= $item['VALUE'] ?></span>
                    </label>
                <? endforeach; ?>
            </div>
        </div>
        <div class="new-ad__flex-full">
            <p class="new-ad__label-name">Описание объявления</p>
            <label class="new-ad__textarea-box">
                <textarea name="UF_COMMENT"
                          placeholder="Не указывайте в описании телефон и e-mail — для этого есть отдельные поля"></textarea>
            </label>
        </div>
    </div>
</div>
<div class="photo-ad new-ad__form-item update-block">
    <h2 class="new-ad__item-title">Внешний вид</h2>
    <div class="new-ad__item-content">
        <div class="new-ad__flex-full">
            <p class="new-ad__label-name">
                <span>Фотографии</span>
            </p>
            <ul class="photo-ad__photo-list" id="preview">

                <li class="photo-ad__photo-item">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/photo-ad-new-photo.webp" alt="">
                    <label class="photo-ad__label">
                        <input type="file" id="upload" name="FILE" accept=".txt,image/*" multiple>
                    </label>
                </li>
            </ul>
        </div>
        <div class="new-ad__flex-full">
            <p class="new-ad__label-name">Видео c YouTube</p>
            <label class="new-ad__input-box">
                <input placeholder="Например: https://www.youtube.com/watch?v=dQw4w9WgXcQ" type="text" name="VIDEO"
                       value="">
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
                <input type="email" name="UF_EMAIL" value="">
            </label>
        </div>
        <div class="new-ad__flex-50">
            <p class="new-ad__label-name">
                <span>Введите телефон</span>
            </p>
            <label class="new-ad__input-box">
                <input type="tel" name="UF_PHONE" value="">
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
<input class="subcategoryServ" type="hidden" name="UF_TYPE_USLUGI" value="<?= $_REQUEST['subcategoryServ'] ?>">
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
            formData.append('UF_STATUS', '31');

            $.ajax({
                type: 'POST',
                url: '/ajax/additem/uslugi.php',
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
            formData.append('UF_STATUS', '33');

            $.ajax({
                type: 'POST',
                url: '/ajax/additem/uslugi.php',
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
            $(this).parents('.new-ad__radio-box').find('.new-ad__radio input').removeAttr('checked');
            $(this).parent().addClass('active');
            $(this).prop('checked', true);
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
        $('.photo-ad__del').click(function () {
            $(this).parents('.photo-ad__photo-item').remove();
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
            data: {id: id,hl_id:hl_id},
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
