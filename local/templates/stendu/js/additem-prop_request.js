$(document).ready(function () {
    $('input').on('keydown', function () {
        $(this).removeClass('invalid');
        $(this).parent().find('span.error_message').remove();
    });
    $('.visually-hidden').each(function () {
        if($(this).prop('checked')){
            let val = $(this).closest('.label-checkbox').find('div').text()
            $(this).val(val)
        }else{
            $(this).val('off')
        }

    });
    $('.label-checkbox').on('change','.visually-hidden', function (){
        let val = $(this).closest('.label-checkbox').find('div').text();
        if($(this).val() == 'off'){
            $(this).val(val)
        }else{
            $(this).val('off')
        }
    })

    $('.announcement-switch__item').on('click', function () {
        let val = $(this).find('span').text();
        $(this).find('input[type=radio]').val(val);

    });

    let checkboxes = [];
    let checkboxes2 = [];
    $('.add-new-item_form input[type=checkbox]').not('input.infrastructure').each(function () {
        let name = $(this).attr('name')
        if (name && !checkboxes.includes(name)) {
            checkboxes.push(name);
        } else if (name && checkboxes.includes(name)) {
            checkboxes2.push(name)
        }
    });

    $('form').keydown(function (e) {
        if (e.keyCode === 13) {
            e.preventDefault()
        }
    });
    $('.add-new-item_form').on('submit', function (e) {
        e.preventDefault()
        var region = $('.region').val();
        var agent = $('.agent').val();
        var deal = $('.deal').val();
        var type = $('.type').val();
        var request = $('.request').val();
        var type_of_rs = $('.type_of_rs').val();
        var data = $(this).serializeArray();
        data.push({name: 'UF_REGION', value: region});
        data.push({name: 'UF_SELLERS', value: agent});
        data.push({name: 'UF_DEAL_TYPE', value: deal});
        data.push({name: 'UF_TYPE_OF_RS', value: type_of_rs});
        data.push({name: 'UF_REQUEST_FOR_PROPERTY', value: request});
        data.push({name: 'UF_TYPE', value: type});
        data.push({name: 'UF_GEO', value: $('#geo').val()});
        data.push({name: 'UF_STATUS', value: 86});
        data.push({name: 'oper', value: $('.oper').val()});
        data.push({name: 'id', value: $('.id_property').val()});
        $("input.infrastructure:checkbox[name]:checked").each(function () {
            data.push({name: $(this).attr('name'), value: $(this).val()});
        });


        let oneCheckbox = [];
        let arrCheckboxes = [];
        $('.add-new-item_form input[type=checkbox]').not('input.infrastructure').each(function () {
            let name = $(this).attr('name')
            if (name && !checkboxes2.includes(name)) {
                oneCheckbox.push(name);
            } else if (name && !oneCheckbox.includes(name) && !arrCheckboxes.includes(name)) {
                arrCheckboxes.push(name)
            }
        });

        $.each(arrCheckboxes, function (index, value) {
            let arr = []
            $("input:checkbox[name=" + value + "]").each(function (i) {
                let that = $(this).val()
                if (that != 'off') {
                    arr.push(that);
                }
            });
            data.push({name: value, value: arr});
        });
        $.each(oneCheckbox, function (index, value) {
            let arr = []
            $("input:checkbox[name=" + value + "]").each(function (i) {
                let that = $(this).val()
                arr.push(that);
            });
            data.push({name: value, value: arr});
        });

        $.ajax({
            type: 'post',
            url: '/ajax/additem/nedvizhimost-zaprosi.php',
            data: data,
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



    $('.announcement-save__btn').on('click', function (e) {
        e.preventDefault()
        var region = $('.region').val();
        var agent = $('.agent').val();
        var deal = $('.deal').val();
        var type = $('.type').val();
        var request = $('.request').val();
        var type_of_rs = $('.type_of_rs').val();
        var data = $('.add-new-item_form').serializeArray();
        data.push({name: 'UF_REGION', value: region});
        data.push({name: 'UF_SELLERS', value: agent});
        data.push({name: 'UF_DEAL_TYPE', value: deal});
        data.push({name: 'UF_TYPE_OF_RS', value: type_of_rs});
        data.push({name: 'UF_REQUEST_FOR_PROPERTY', value: request});
        data.push({name: 'UF_TYPE', value: type});
        data.push({name: 'UF_GEO', value: $('#geo').val()});
        data.push({name: 'UF_STATUS', value: 88});
        data.push({name: 'oper', value: $('.oper').val()});
        data.push({name: 'id', value: $('.id_property').val()});
        $("input.infrastructure:checkbox[name]:checked").each(function () {
            data.push({name: $(this).attr('name'), value: $(this).val()});
        });


        let oneCheckbox = [];
        let arrCheckboxes = [];
        $('.add-new-item_form input[type=checkbox]').not('input.infrastructure').each(function () {
            let name = $(this).attr('name')
            if (name && !checkboxes2.includes(name)) {
                oneCheckbox.push(name);
            } else if (name && !oneCheckbox.includes(name) && !arrCheckboxes.includes(name)) {
                arrCheckboxes.push(name)
            }
        });

        $.each(arrCheckboxes, function (index, value) {
            let arr = []
            $("input:checkbox[name=" + value + "]").each(function (i) {
                let that = $(this).val()
                if (that != 'off') {
                    arr.push(that);
                }
            });
            data.push({name: value, value: arr});
        });
        $.each(oneCheckbox, function (index, value) {
            let arr = []
            $("input:checkbox[name=" + value + "]").each(function (i) {
                let that = $(this).val()
                arr.push(that);
            });
            data.push({name: value, value: arr});
        });

        $.ajax({
            type: 'post',
            url: '/ajax/additem/nedvizhimost-zaprosi.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                e = JSON.parse(e)
                if (e == 1) {
                    window.location = '/profile';
                } else {
                    $.each(e, function (index, value) {
                        $('textarea[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
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
});