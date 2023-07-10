$(document).ready(function () {

    $('.info__list').on('click', '.deal-type', function () {
        $('.filter-ajax').remove()
        $('li#filter__item_type').addClass('disable-filter')
        $('li#filter__item_request').addClass('disable-filter')
        let id = $(this).attr('data-id');
        $('input[name=UF_TYPE_OF_RS]').val('')
        $('input[name=UF_TYPE]').val('')
        $('input[name=UF_REQUEST_FOR_PROPERTY]').val('')
        if (parseInt(id) == 66 || parseInt(id) == 67) {
            $('li#filter__item_type_of_rs').removeClass('disable-filter')
        } else if (parseInt(id) == 68) {
            $('li#filter__item_type_of_rs').addClass('disable-filter')
            $('li#filter__item_type').removeClass('disable-filter')
            $.ajax({
                type: "POST",
                url: '/ajax/nedvizhimost/filter_filters.php',
                data: {deal: id, oper: 'category'},
                dataType: 'html',
                success: function (data) {
                    console.log(data);
                    $('li#filter__item_type').find('.info__list').html(data)
                },
                error: function (data) {
                    console.log(data);
                }
            });

        }  else if (parseInt(id) == 69) {
            $('li#filter__item_request').removeClass('disable-filter')
            $('li#filter__item_type_of_rs').addClass('disable-filter')

        } else {
            $('li#filter__item_type_of_rs').addClass('disable-filter')

        }

    })
    $('.info__list').on('click', '.request-prop', function () {
        $('.filter-ajax').remove()
        $('li#filter__item_type').addClass('disable-filter')
        let id = $(this).attr('data-id');
        $('input[name=UF_TYPE_OF_RS]').val('')
        $('input[name=UF_TYPE]').val('')

        if (parseInt(id) == 148 || parseInt(id) == 149) {
            $('li#filter__item_type_of_rs').removeClass('disable-filter')
        } else {
            $('li#filter__item_type_of_rs').addClass('disable-filter')
            $('li#filter__item_type').removeClass('disable-filter')
            $.ajax({
                type: "POST",
                url: '/ajax/nedvizhimost/filter_filters.php',
                data: {deal: 69, req: id, oper: 'category'},
                dataType: 'html',
                success: function (data) {
                    $('li#filter__item_type').find('.info__list').html(data)
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    })

    $('.info__list').on('click', '.type_of_rs', function () {
        $('.filter-ajax').remove()
        $('input[name=UF_TYPE]').val('')
        let id = $(this).attr('data-id');
        let req = $('#request-property').val();
        if (req == 'Покупка') {
            req = 148;
        } else if (req == 'Снять') {
            req = 149;
        }
        let deal = $('#deal-type').val();
        if (deal == 'Купить') {
            deal = 66;
        } else if (deal == 'Снять') {
            deal = 67;
        }else if (deal == 'Запрос на недвижимость') {
            deal = 69;
        }
        if (deal == 66 || deal == 67|| deal == 69) {
            console.log(req)
            console.log(deal)
            console.log(id)
            $('li#filter__item_type').removeClass('disable-filter')
            $.ajax({
                type: "POST",
                url: '/ajax/nedvizhimost/filter_filters.php',
                data: {type_of_rs: id, deal: deal, oper: 'category',req:req},
                dataType: 'html',
                success: function (data) {
                    console.log(data)
                    $('li#filter__item_type').find('.info__list').html(data)
                },
                error: function (data) {
                    console.log(false);
                }
            });
        }
    })
    $('.info__list').on('click', '.property-type', function () {
        let id = $(this).attr('data-id');
        let deal = $('#deal-type').val();
        if (deal == 'Купить') {
            deal = 66;
        } else if (deal == 'Снять') {
            deal = 67;
        }
        let type_of_rs = $('#type_of_rs').val();
        if (type_of_rs == 'Жилая') {
            type_of_rs = 144;
        } else if (deal == 'Коммерческая') {
            type_of_rs = 145;
        }
        if (deal != 'Запрос на недвижимость') {
            $.ajax({
                type: "POST",
                url: '/ajax/nedvizhimost/filter_filters.php',
                data: {type: id, type_of_rs: type_of_rs, deal: deal, oper: 'filters'},
                success: function (data) {
                    $('li.filter-ajax').remove()
                    $('li.filter-price').after(data)
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    })
})