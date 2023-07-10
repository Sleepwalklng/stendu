'use strict'

$(document).ready(function () {
    $('.map-filter__list').on('click', '.map-filter__radio-text',function () {
        console.log($(this).text())
        $(this).closest('.map-filter__label').find('.map-filter__radio').val($(this).text());
        // $('.info__select-input').trigger('change');
    });
    // Resume
    $('.resume__desc-btn').click(function () {
        $('.resume__desc-text').toggleClass('active')
        $(this).toggleClass('active');
    });
    $('.resume__map-title-box').click(function () {
        $('.resume__map-btn').toggleClass('active');
        $('.resume__map').slideToggle();
    });

    const rem = function (rem) {
        if ($(window).width() > 768) {
            return 0.005208335 * $(window).width() * rem;
        } else {
            // где 375 это ширина моб версии макета
            return (100/375) * (0.1 * $(window).width()) * rem;
        }
    }
    let sliderThumbLoop = $('.card-slider__thumb-slide').length > 4 ? true : false;
    const card_slider_thumb = new Swiper('.card-slider__thumb-slider', {
        direction: 'vertical',
        loop: sliderThumbLoop,
        slidesPerView: 4,
        spaceBetween: rem(1.7),
        initialSlide: 1,
    });

    const card_slider = new Swiper('.card-slider__slider', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        spaceBetween: rem(5),

        navigation: {
            nextEl: '.card-slider .next',
            prevEl: '.card-slider .prev',
        },

        pagination: {
            el: '.card-slider__pagination',
            type: 'fraction'
        },

        on: {
            slideChange: function (slider) {
                card_slider_thumb.slideToLoop(slider.realIndex + 1);
            },
        }
    });

    $('.announcements__select').click(function () {
        if ($(this).find('.announcements__select-list').hasClass('active')) {
            $(this).find('.announcements__select-list').removeClass('active').slideUp();
        } else {
            $('.announcements__select-list.active').removeClass('active').slideUp();
            $(this).find('.announcements__select-list').addClass('active').slideDown();
        }
    });
    $('.announcements__select-list-item').click(function () {
        // $('.select-input').each(function () {
        //     $(this).attr('value', '');
        //     $(this).parent().find('.announcements__select-list-item').removeClass('active').siblings('.announcements__select-list-item:first-child').addClass('active');
        //     $(this).siblings('.select-text').html($(this).parent().find('.announcements__select-list-item:first-child').html());
        // });
        $(this).parents('.announcements__select').find('.select-text').html($(this).html()).siblings('.select-input').attr('value', $(this).data('value'));
        $(this).siblings('.announcements__select-list-item').removeClass('active');
        $(this).addClass('active');
        $(".select-input").trigger('change');
    });

});