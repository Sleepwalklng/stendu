$(document).ready(function () {
  // $(document).on('click', '.navigation-params-ajax', function ()
  // {
  //     var category = $('.data__categories-item.data__categories-item--active').children('label').children('input').val()
  //     var mileage = $('.data__isuse-item.data__isuse-item--active').children('label').children('input').val()
  //
  //     var data = {'category': category, 'mileage': mileage}
  //     $.ajax({
  //         type: 'post',
  //         url: '/ajax/transport/changeURL.php',
  //         data: data,
  //         dataType: 'html',
  //         success: function (response) {
  //             const url = location.protocol + '//' + location.host + location.pathname;  // == window.location.href
  //             var uri = url+'?'+response
  //             history.pushState(null, null, uri);    // == url.href
  //         }
  //     });
  //
  //     $.ajax({
  //         type: 'post',
  //         url: '/ajax/transport/mainNav.php?category='+category+'&mileage='+mileage,
  //         data: data,
  //         dataType: 'html',
  //         success: function (response) {
  //            $('.data__items').remove()
  //            $('.data__more').remove()
  //            $('.nav-container-ajax').append(response)
  //         }
  //     });
  //     return false;
  //
  // })

  $(document).on('click', '.show-current-transports-ajax', function () {
    $.ajax({
      type: 'post',
      url: '/ajax/transport/mainElements.php' + location.search,
      dataType: 'html',
      success: function (response) {
        $('.announcements__items').empty();
        $('.announcements__items').append(response);
      },
    });
    return false;
  });

  var selectBlock = $('.announcements__top'); // Замените селектор на свой нужный

  $('.announcements__btn--sort').click(function () {
    console.log('tut');
    selectBlock.find('.announcements__filter').toggleClass('announcements__filter-show');
  });

  $(document).on('change', '.select-sort-ajax', function () {
    var category = $('.data__categories-item.data__categories-item--active')
      .children('label')
      .children('input')
      .val();
    var mileage = $('.data__isuse-item.data__isuse-item--active')
      .children('label')
      .children('input')
      .val();

    var that = $(this);
    var type = $(this).attr('type');

    var siblin = that
      .parent()
      .siblings('.announcements__select')
      .children('select')
      .children('option:first')
      .prop('selected', true); //Ставим значение по умолчанию в соседней сортировке

    var data = { category: category, mileage: mileage };
    var sortVal = $(this).serialize();

    if (type == 'date') {
      var newUrlUpdate =
        location.protocol +
        '//' +
        location.host +
        location.pathname +
        '?category=' +
        category +
        '&mileage=' +
        mileage +
        '&sort_time=' +
        that.val();
      var newUrlAjax = '?category=' + category + '&mileage=' + mileage + '&sort_time=' + that.val();
    } else if (type == 'price') {
      var newUrlUpdate =
        location.protocol +
        '//' +
        location.host +
        location.pathname +
        '?category=' +
        category +
        '&mileage=' +
        mileage +
        '&sort_price=' +
        that.val();
      var newUrlAjax =
        '?category=' + category + '&mileage=' + mileage + '&sort_price=' + that.val();
    }

    history.pushState(null, null, newUrlUpdate); // == url.href

    $.ajax({
      type: 'post',
      url: '/ajax/transport/mainElements.php' + newUrlAjax,
      dataType: 'html',
      success: function (response) {
        $('.announcements__items').empty();
        $('.announcements__items').append(response);
      },
    });
    return false;
  });

  let catalog_items = $('.announcements__items');
  let lock = false;
  $(window).scroll(function () {
    let scroll = $(window).scrollTop() + $(window).height();
    let offset = catalog_items.offset().top + catalog_items.height();

    if (scroll > offset && !lock) {
      lock = true;
      //тут выполняем подгрузку
      console.log('выполняем подгрузку');

      //после загрузки элементов делаем...
      lock = false;
    }
  });
});
