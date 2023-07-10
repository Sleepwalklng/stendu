/* Фильтр Недвижимость*/
$(document).ready(function () {

    function ajaxPropertyFilter(data) {
        $.ajax({
            type: 'post',
            url: '/ajax/nedvizhimost/filter.php',
            data: data,
            dataType: 'html',

            success: function (data) {
                $('.wrapper-filter').empty();
                $('.wrapper-filter').append(data);

                if ($('#format-carts').hasClass('announcements__format--active')) {
                    $('.announcements__items').addClass('announcements__items--justify');
                    $('.cart').addClass('cart--justify');
                } else {
                    $('.cart').removeClass('cart--justify');
                }
                const swiperNew = new Swiper('.cart:not(.cart--large) .cart__inner', {
                    observer: true,
                    slidesPerView: 1,
                    loop: true,
                    spaceBetween: 120,

                    pagination: {
                        el: '.cart__pagination',
                        clickable: true,
                    },
                });
                return true;
            },
            error: function (data) {
                return false
            },
        });
    }

    function getData(obj, type) {
        let data = type == 'form' ? obj.serializeArray() : $('.filter-real_estate').serializeArray();

        let names = [];
        $('input[type=checkbox]').each(function () {
            let name = $(this).attr('name');
            if (name && !names.includes(name)) {
                names.push(name);
            }
        });
        $.each(names, function (index, value) {
            let arr = [];
            $('input:checkbox[name=' + value + ']:checked').each(function (i) {
                let that = $(this).val();
                arr.push(that);
            });
            data.push({name: value, value: arr});
        });
        let price = type == 'price' ? obj.val() : $('#real_estate_select_price').val()
        let date = type == 'date' ? obj.val() : $('#real_estate_select_date').val()

        data.push({name: 'selectPrice', value: price});
        data.push({name: 'selectDate', value: date});
        return data;
    }

    $('.filter-real_estate').on('change', function () {
        let data = getData($(this), 'form')
        $.ajax({
            type: 'post',
            url: '/ajax/nedvizhimost/count.php',
            data: data,
            dataType: 'html',

            success: function (data) {
                $('span.filter__submit-count').html(data);
            },
            error: function (data) {
                console.log(data);
                console.log(false);
            },
        });
        return false;
    });

    $('#real_estate_select_price').on('change', function () {
        let data = getData($(this), 'price')
        ajaxPropertyFilter(data)
        return false;
    });

    $('#real_estate_select_date').on('change', function () {
        let data = getData($(this), 'date')
        ajaxPropertyFilter(data)
        return false;
    });

    $('.filter-real_estate').submit(function () {
        let data = getData($(this), 'form')
        ajaxPropertyFilter(data)
        return false;
    });
});
