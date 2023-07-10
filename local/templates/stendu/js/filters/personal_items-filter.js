/* Фильтр Личных вещей*/
$(document).ready(function () {
    $('.info__list').on('click', '.categories-outerwear', function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('input[name=outerwear]').val('');
        $('li.dop_filter').addClass('disable-filter');
        $('li#filter__item_category3').addClass('disable-filter');
        if (name == 'Верхняя одежда' && (id == '5' || id == '30')) {
            $('li#filter__item_category3').removeClass('disable-filter');
            $.ajax({
                type: 'POST',
                url: '/ajax/personal_items/filter_filters.php',
                data: {category3: id},
                success: function (data) {
                    $('li#filter__item_category3').find('.info__list').html(data);
                },
                error: function (data) {
                    console.log(data);
                },
            });
        }
    });

    $('.info__list').on('click', '.main-categories', function () {
        $('#select_category2').attr('data-id', '')
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('li#filter__item_category3').addClass('disable-filter');
        $('li.dop_filter').addClass('disable-filter');
        $('li#filter__item_category2').addClass('disable-filter');
        $('li#filter__item_category1').removeClass('disable-filter');
        $('input[name=type]').val('');
        $('input[name=outerwear]').val('');
        $('input[name=categoria]').val('');
        $.ajax({
            type: 'POST',
            url: '/ajax/personal_items/filter_filters.php',
            data: {category1: id},
            success: function (data) {
                $('li#filter__item_category1').find('.info__list').html(data);
            },
            error: function (data) {
                console.log(data);
            },
        });
    });

    $('.info__list').on('click', '.categories-outerwear', function () {
        $('input[name=category_size]').val('');
        $('input[name=size_foot]').val('');
        $('input[name=size_child]').val('');
        $('input[name=color]').val('');
        $('input[name=size_foot_child]').val('');

        let id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/ajax/personal_items/filter_size.php',
            data: {category: id},
            dataType: 'json',
            success: function (data) {
                if (data.color) {
                    $('li#filter__item_category_color').removeClass('disable-filter');
                }
                if (data.footSizeChild) {
                    $('li#filter__item_category_size_foot_child').removeClass('disable-filter');
                }
                if (data.footSize) {
                    $('li#filter__item_category_size_foot').removeClass('disable-filter');
                }
                if (data.clothesSize) {
                    $('li#filter__item_category_size').removeClass('disable-filter');
                }
                if (data.clothesSizeChild) {
                    $('li#filter__item_category_size_child').removeClass('disable-filter');
                }
                if (data.footSizeMan) {
                    $('li#filter__item_category_size_foot_man').removeClass('disable-filter');
                }
                if (data.clothesSizeMan) {
                    $('li#filter__item_category_size_man').removeClass('disable-filter');
                }
            },
            error: function (data) {
                console.log(data);
            },
        });
    });

    $('.info__list').on('click', '.categories-categoria', function () {
        $('#select_category2').attr('data-id', '')
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('li.dop_filter').addClass('disable-filter');
        $('li#filter__item_category3').addClass('disable-filter');

        $('input[name=type]').val('');
        $('input[name=outerwear]').val('');

        $.ajax({
            type: 'POST',
            url: '/ajax/personal_items/filter_filters.php',
            data: {category2: id},
            success: function (data) {
                if (data.trim()) {
                    $('li#filter__item_category2').removeClass('disable-filter');
                    $('li#filter__item_category2').find('.info__list').html(data);
                    //Добавил две строки нижние
                }
            },
            error: function (data) {
                console.log(data);
            },
        });
    });

    $('.personal_items_filter-category').click(function () {
        $('#select_category2').attr('data-id', '')
        $('li.dop_filter').addClass('disable-filter');
        $('li#filter__item_category3').addClass('disable-filter');
        $('li#filter__item_category2').addClass('disable-filter');
        // $('li#filter__item_category0').addClass('disable-filter');
        $('input[name=categoria]').val('');
        $('input[name=category]').val('');
        $('input[name=type]').val('');
        $('input[name=outerwear]').val('');

        $('.data__categories-item').removeClass('data__categories-item--active');
        $(this).parent('.data__categories-item').addClass('data__categories-item--active');
        let categoryId = $(this).attr('data-id');
        let data = 'categoriesId=' + categoryId + '&selectPrice=' + $('#personal_items_select_price').val() + '&selectDate=' +
            $('#personal_items_select_date').val();
        $('.info__select-input').first().val($(this).attr('data-name'));
        $('html, body').animate({scrollTop: $('#catalog').offset().top + 'px'}, {duration: 1e3});
        $.ajax({
            type: 'post',
            url: '/ajax/personal_items/filter.php',
            data: data,
            dataType: 'html',

            success: function (e) {
                $('.wrapper-filter').empty();
                $('.wrapper-filter').append(e);
                let data1 = $('.filter-personal_items').serialize() + '&selectPrice=' + $('#personal_items_select_price').val() + '&selectDate=' +
                    $('#personal_items_select_date').val() + '&categoriesId=' + categoryId;
                $.ajax({
                    type: 'POST',
                    url: '/ajax/personal_items/filter_filters.php',
                    data: {categoriesId: categoryId},
                    success: function (data) {
                        $('#categories1').html(data);
                        $('li#filter__item_category1').removeClass('disable-filter');
                        $.ajax({
                            type: 'POST',
                            url: '/ajax/personal_items/count.php',
                            data: data1,
                            success: function (data) {
                                $('span.filter__submit-count').html(data);
                                if ($('#format-carts').hasClass('announcements__format--active')) {
                                    $('.announcements__items').addClass('announcements__items--justify');
                                    $('.cart').addClass('cart--justify');
                                } else {
                                    $('.cart').removeClass('cart--justify');
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            },
                        });
                    },
                    error: function (data) {
                        console.log(data);
                    },
                });
            },
            error: function (e) {
                console.log(e);
                console.log(false);
            },
        });
        return false;
    });

    function ajaxPersonalItemsFilter(data, catId) {
        $.ajax({
            type: 'POST',
            url: '/ajax/personal_items/filter.php',
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
                $('.data__categories-item').removeClass('data__categories-item--active');
                $('.personal_items_filter-category[data-id=' + catId + ']').parent('.data__categories-item').addClass('data__categories-item--active');
                return true;
            },
            error: function (data) {
                return false
            },
        });
    }

    function ajaxPersonalItemsFilterCount(data) {
        $.ajax({
            type: 'POST',
            url: '/ajax/personal_items/count.php',
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

    function getCategoryId() {
        let category = $('input[name=category]').val()
        var categoryId = '';
        if (category) {
            $('.main-categories').each(function () {
                let that = $(this)
                let name = that.find('.info__elem').text()
                if (category == name) {
                    categoryId = that.attr('data-id');
                }
            })
        }
        return categoryId;
    }

    function getData(obj, type, categoryId) {
        let price = type == 'price' ? obj.val() : $('#personal_items_select_price').val()
        let date = type == 'date' ? obj.val() : $('#personal_items_select_date').val()
        let arData = type == 'form' ? obj.serialize() : $('.filter-personal_items').serialize()
        let data =  arData +'&selectPrice=' + price + '&selectDate=' + date +
            '&categoriesId=' + categoryId + '&type=' + $('#select_category2').attr('data-id');
        return data;
    }

    $('#personal_items_select_price').on('change', function () {
        let categoryId = getCategoryId();
        let data = getData($(this), 'price', categoryId)
        ajaxPersonalItemsFilter(data, categoryId)
        return false;

    });
    $('#personal_items_select_date').on('change', function () {
        let categoryId = getCategoryId();
        let data = getData($(this), 'date', categoryId)
        ajaxPersonalItemsFilter(data, categoryId)
        return false;
    });

    $('.filter-personal_items').on('click', '.info__list .info__elem', function () {
        let categoryId = getCategoryId();
        let data = $('.filter-personal_items').serialize() + '&selectPrice=' + $('#personal_items_select_price').val() + '&selectDate=' +
            $('#personal_items_select_date').val() + '&categoriesId=' + categoryId + '&type=' + $('#select_category2').attr('data-id');
        ajaxPersonalItemsFilterCount(data)
        return false;
    });

    $('.filter-personal_items').on('change', function () {
        let categoryId = getCategoryId();
        let data = getData($(this), 'form', categoryId)
        ajaxPersonalItemsFilterCount(data)
        return false;
    });

    $('.filter-personal_items').submit(function () {
        let categoryId = getCategoryId();
        let data = getData($(this), 'form', categoryId)
        ajaxPersonalItemsFilter(data, categoryId)
        return false;
    });

});
