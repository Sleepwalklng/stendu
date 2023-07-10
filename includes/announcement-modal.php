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

<input class="oper" type="hidden" name="oper" value="add">
<input class="request" type="hidden" name="request" value="<?= $_REQUEST['request'] ?>">
<?php
if (!empty($_REQUEST['id_property']) && empty($_REQUEST['request'])) { ?>
    <input class="id_property" type="hidden" name="id_property" value="<?= $_REQUEST['id_property'] ?>">
    <script>
        $(document).ready(function () {
            const id = $('.id_property').val();
            $.ajax({
                type: 'post',
                url: '/ajax/additem/draft-nedvizhimost.php',
                data: {id: id},
                dataType: 'html',
                success: function (e) {
                    e = JSON.parse(e)
                    $.each(e.UF_PHOTOS, function (index, value) {
                        $('.announcement-content__appearance-photos').append(
                            `
        <div class="announcement-content__appearance-photo" data-id="${index}">
          <div class="announcement-content__appearance-photo-img">
            <img src="${value}" alt="">
          </div>
          <div class="announcement-content__appearance-photo-remove" >
            <img src="/local/templates/stendu/images/announcement/appearance-photo-delete.svg" alt="">
          </div>
        </div>
      `);
                    })
                    $('.announcement-content__appearance-photo-remove').click(function () {
                        $(this).closest('.announcement-content__appearance-photo').remove()
                    })
                    $('input[name=type]').val(e.UF_TYPE)
                    $('input[name=oper]').val('update')
                    $.each(e, function (index, value) {
                        if (value) {
                            $('textarea[name=' + index + ']').val(value)
                            $('input[name=' + index + ']').not('[type="checkbox"]').val(value)
                            $('input[type=checkbox][name=' + index + ']').attr('checked', value == 1 ? true : false).val(value == 1 ? 'on' : 'off')
                            $('select[name=' + index + ']').val(value).closest('div.label').find('span.current').text(value)
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
<?php } elseif (!empty($_REQUEST['id_property']) && !empty($_REQUEST['request'])) {
    ?>
    <input class="id_property" type="hidden" name="id_property" value="<?= $_REQUEST['id_property'] ?>">
    <script>
        $(document).ready(function () {
            const id = $('.id_property').val();
            $.ajax({
                type: 'post',
                url: '/ajax/additem/draft-zaprosi.php',
                data: {id: id},
                dataType: 'html',
                success: function (e) {
                    e = JSON.parse(e)
                    $('input[name=type]').val(e.UF_TYPE)
                    $('input[name=oper]').val('update')
                    $.each(e, function (index, value) {
                        if (value) {
                            $('textarea[name=' + index + ']').val(value)
                            $('input[name=' + index + ']').not('[type="checkbox"]').not('[type="radio"]').val(value)
                            let arVal = value.toString().split(',')
                            let checkbox = $('input[type=checkbox][name=' + index + ']');
                            let radio = $('input[type=radio][name=' + index + ']');
                            $.each(arVal, function (i, val) {
                                if (val == 0 || val == 1) {
                                    checkbox.attr('checked', value == 1 ? true : false).val(value == 1 ? 'on' : 'off')
                                } else {
                                    checkbox.each(function () {
                                        let text = $(this).closest('.label-checkbox').find('div').text()
                                        if (val == text) {
                                            $(this).attr('checked', true).val(text)
                                        }
                                    })
                                    radio.each(function () {
                                        $(this).attr('checked', false)
                                        $(this).val('')
                                        let text = $(this).closest('.announcement-switch__item').find('span').text()
                                        if (val == text) {
                                            $(this).attr('checked', true).val(val)
                                        }
                                    })
                                }

                            });

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