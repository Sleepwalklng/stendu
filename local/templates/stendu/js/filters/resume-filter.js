/* Фильтр Резюме*/
$(document).ready(function () {
    function ajaxResumeFilter(data){
        $.ajax({
            type: 'POST',
            url: '/ajax/work/resume/filter.php',
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

    function ajaxResumeFilterCount(data){
        $.ajax({
            type: 'POST',
            url: '/ajax/work/resume/count.php',
            data: data,
            success: function (data) {
                $('span.filter__submit-count').html(data);
                return true;
            },
            error: function (data) {
                return false
            },
        });
    }

    function getData(obj, type) {
        let price = type == 'price' ? obj.val() : $('#resume_select_price').val()
        let date = type == 'date' ? obj.val() : $('#resume_select_date').val()
        let arData = type == 'form' ? obj.serialize() : $('.filter-resume').serialize()

        let data = arData + '&selectPrice=' + price + '&selectDate=' + date;
        return data;
    }

    $('#resume_select_price').on('change', function () {
        let data = getData($(this),'price');
        ajaxResumeFilter(data)
        return false;

    });
    $('#resume_select_date').on('change', function () {
        let data = getData($(this),'date');
        ajaxResumeFilter(data)
        return false;
    });

    $('.filter-resume').on('change', function () {
        let data = getData($(this),'form');
        ajaxResumeFilterCount(data)
        return false;
    });
    $('.filter-resume').submit(function () {
        let data = getData($(this),'form');
        ajaxResumeFilter(data)
        return false;
    });
});