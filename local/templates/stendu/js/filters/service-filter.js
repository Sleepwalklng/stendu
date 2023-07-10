/* Фильтр Услуг*/
$(document).ready(function () {
    function ajaxServiceFilter(data) {
        $.ajax({
            type: 'POST',
            url: '/ajax/uslugi/filter.php',
            data: data,
            success: function (data) {
                $('.wrapper-filter').empty();
                $('.wrapper-filter').append(data);
                if ($('#format-carts').hasClass('announcements__format--active')) {
                    $('.announcements__items').addClass('announcements__items--justify');
                    $('.cart').addClass('cart--justify');
                } else {
                    $('.cart').removeClass('cart--justify');
                }
                return true;
            },
            error: function (data) {
                return false;
            },
        });
    }

    function ajaxServiceFilterCount(data) {
        $.ajax({
            type: 'POST',
            url: '/ajax/uslugi/count.php',
            data: data,
            success: function (data) {
                $('span.filter__submit-count').html(data);
                return true;
            },
            error: function (data) {
                return false;
            },
        });
    }

    function getData(obj, type) {
        let price = type == 'price' ? obj.val() : $('#uslugi_select_price').val()
        let date = type == 'date' ? obj.val() : $('#uslugi_select_date').val()
        let arData = type == 'form' ? obj.serialize() : $('.filter-uslugi').serialize()

        let data = arData + '&selectPrice=' + price + '&selectDate=' + date;
        return data;
    }

    $('#uslugi_select_price').on('change', function () {
        let data = getData($(this), 'price');
        ajaxServiceFilter(data);
        return false;
    });
    $('#uslugi_select_date').on('change', function () {
        let data = getData($(this), 'date');
        ajaxServiceFilter(data);
        return false;
    });

    $('.filter-uslugi').on('click', '.info__list .info__elem', function () {
        let data = $('.filter-uslugi').serialize() + '&selectPrice=' + $('#uslugi_select_price').val() + '&selectDate=' + $('#uslugi_select_date').val();
        ajaxServiceFilterCount(data)
        return false;
    });
    $('.filter-uslugi').change(function () {
        let data = getData($(this), 'form');
        ajaxServiceFilterCount(data)
        return false;
    });

    $('.filter-uslugi').submit(function () {
        let data = getData($(this), 'form');
        ajaxServiceFilter(data);
        return false;
    });

    $('.uslugi_filter-category').click(function () {
        $('.filter-uslugi')[0].reset();
        $('.data__categories-item').removeClass('data__categories-item--active');
        $(this).parent('.data__categories-item').addClass('data__categories-item--active');
        let data = 'categoria=' + $(this).attr('data-id') + '&selectPrice=' + $('#uslugi_select_price').val() + '&selectDate=' + $('#uslugi_select_date').val();
        $('.info__select-input').first().val($(this).attr('data-id'));
        $('html, body').animate({scrollTop: $('#catalog').offset().top + 'px'}, {duration: 1e3});

        ajaxServiceFilter(data);
        ajaxServiceFilterCount(data)
        return false;
    });

});
