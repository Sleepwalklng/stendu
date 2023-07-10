/* Фильтр Работ*/
$(document).ready(function () {
    function ajaxWorkFilter(data) {
        $.ajax({
            type: 'POST',
            url: '/ajax/work/filter.php',
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

    function ajaxWorkFilterCount(data) {
        $.ajax({
            type: 'POST',
            url: '/ajax/work/count.php',
            data: data,
            success: function (data) {
                $('span.filter__submit-count').html(data);
                return true;
            },
            error: function (data) {
                console.log(data);
                return false;
            },
        });
    }

    function getData(obj, type) {
        let price = type == 'price' ? obj.val() : $('#work_select_price').val()
        let date = type == 'date' ? obj.val() : $('#work_select_date').val()
        let arData = type == 'form' ? obj.serialize() : $('.filter-work').serialize()

        let data = arData + '&selectPrice=' + price + '&selectDate=' + date;
        return data;
    }

    $('#work_select_price').on('change', function () {
        let data = getData($(this), 'price');
        ajaxWorkFilter(data)
        return false;
    });
    $('#work_select_date').on('change', function () {
        let data = getData($(this), 'date');
        ajaxWorkFilter(data)
        return false;
    });

    $('.filter-work').on('change', function () {
        let data = getData($(this), 'form');
        ajaxWorkFilterCount(data)
        return false;
    });

    $('.filter-work').on('click', '.info__list .info__elem', function () {
        let data = $('.filter-work').serialize() + '&selectPrice=' + $('#work_select_price').val() + '&selectDate=' + $('#work_select_date').val();
        ajaxWorkFilterCount(data)
        return false;
    });

    $('.filter-work').submit(function () {
        let data = getData($(this), 'form');
        ajaxWorkFilter(data)
        return false;
    });
});