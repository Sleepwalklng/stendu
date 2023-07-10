<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


$MY_HL_BLOCK_ID = 6;

$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => array('UF_VAZH' => '1')
));

?>


                    <div class="brand-ad update-block">
                        <div class="new-ad__form-item">
                            <h2 class="new-ad__item-title">Выберите марку</h2>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-full">
                                    <label class="new-ad__input-box">
                                        <input placeholder="Название марки" type="text" name="NAME" readonly>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="brand-ad__content block-vse-marki">
                            <ul class="brand-ad__list">


								<? while($el = $rsData->fetch()) { ?>
    							<li class="brand-ad__item brand-ad__item-d">
                                    <label class="brand-ad__label">
                                        <input type="text" name="brand" value="<?= $el['UF_ID_CAR'] ?>">
                                        <span class="brand-ad__item-img-box desktop">
                                            <img src="<?= CFile::GetPath($el['UF_TRANSPORT_MARK_LOGO']) ?>" alt="">
                                        </span>
                                        <span class="brand-ad__item-name"><?= $el['UF_TRANSPORT_MARK_NAME'] ?></span>
                                        <span class="brand-ad__item-number mobile"></span>
                                    </label>
                                </li>
								<? } ?>
                                

                                <li class="brand-ad__item">
                                     <a class="brand-ad__btn vse-marki">
                                        <span>Все марки</span>
                                        <span class="brand-ad__btn-icon">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.999999 1L7 7L1 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


<script>

    // все марки
    $(document).ready(function () {
        $('.vse-marki').click(function () {
            var data = $(this).val();
            console.log(data);
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/vse-marki.php',
                data: { data: data },
                dataType: 'html',
                success: function (e) {
                    $('.block-vse-marki').empty().append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });

		// выбор марки и переход к выбору модели
		$(document).ready(function () {
        $('.brand-ad__item-d').click(function () {
            var data = $(this).find('input').val();

            console.log(data);
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/model.php',
                data: { data: data },
                dataType: 'html',
                success: function (e) {
                    //$('.category-select').empty().append(e);
                    $('.brand-ad').remove();
                    $('.new-ad__form').append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });


    // Отправление форм
    /*$(document).ready(function () {
        $('.new-ad__form').submit(function () {
            var data = $(this).serialize();
    
            $.ajax({
                type: 'post',
                url: '/ajax/additem/transport.php',
                data: data,
                dataType: 'html',
                success: function (e) {
                    //$('.category-select').empty().append(e);
                    $('body').append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });*/
    $('.new-ad__form').on('submit', function (e) {
        e.preventDefault()
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
            $(this).find(':input[name]').not('[type="file"]').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $(this).find('select').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $.each($("#upload-file")[0].files, function (key, input) {
                formData.append('file[]', input);
            });
            $('.announcement-content__appearance-photo').each(function ()  {
                formData.append('files[]', $(this).attr('data-id'));
            });
            /*formData.append('UF_REGION', $('.region').val());
            formData.append('UF_SELLERS', $('.agent').val());
            formData.append('UF_DEAL_TYPE', $('.deal').val());
            formData.append('UF_TYPE', $('.type').val());
            formData.append('UF_TYPE_OF_RS', $('.type_of_rs').val());
            formData.append('UF_GEO', $('#geo').val());
            formData.append('UF_STATUS', 86);
            formData.append('oper', $('.oper').val());
            formData.append('id', $('.id_property').val());*/
            $.ajax({
                type: 'post',
                contentType: false,
                processData: false,
                url: '/ajax/additem/transport.php',
                data: formData,
                dataType: 'html',
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
                            $('textarea[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('input[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('select[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                        });
                        $('html, body').animate({
                            scrollTop: $('input[name=' + Object.keys(e)[0] + ']').offset().top // класс объекта к которому приезжаем
                        }, 1000);
                    }

                },
                error: function (data) {
                    console.log(data);
                    console.log(false);
                }
            });
        }

    })


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
    $('.photo-ad__del').click(function () {
        $(this).parents('.photo-ad__photo-item').remove();
    });
    $('.photo-ad__photo-list').sortable({
        items: '.photo-ad__photo-item:not(:last-child)'
    });

});
</script>