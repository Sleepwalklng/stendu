// New ads
// $('.new-ad__category-label input').change(function () {
//     let $this = $(this).parent(),
//         text = $('<span>'+ $this.find('.new-ad__category-label-name').text() +'</span>');
//     $this.parents('.new-ad__category-list').slideUp();
//     $('.new-ad__category').css('display', 'flex').hide().slideDown().find('.new-ad__category-title').append(text);
//     $('.new-ad__category-label-search.active').removeClass('active').next().addClass('active');
//     setTimeout(function () {
//         $this.parents('.new-ad__category-list').next().css('display', 'flex').hide().fadeIn();
//     }, 300);
// });
// $('.new-ad__subcategory-label input').click(function () {
//     let $this = $(this).parent();
//     if ($this.parents('.new-ad__subcategory-list-box').next().length) {
//         let textDesk = $('<span class="desktop">'+ $this.find('span').text() +'</span>'),
//             textMob = $('<span class="mobile">'+ $this.find('span').text() +'</span>');
//         $this.parents('.new-ad__subcategory-list-box').fadeOut(200);
//         $('.new-ad__category').find('.new-ad__category-title').append(textDesk);
//         $('.new-ad__category').find('.new-ad__category-sub-title').append(textMob);
//         $('.new-ad__category-label-search.active').removeClass('active').next().addClass('active');
//         setTimeout(function () {
//             $this.parents('.new-ad__subcategory-list-box').next().css('display', 'flex').hide().fadeIn();
//         }, 201);
//     } else {
//         let text = $('<span>'+ $this.find('span').text() +'</span>');
//         $this.parents('.new-ad__subcategory-list-box').fadeOut(200);
//         $('.new-ad__category-search-box').fadeOut(200);
//         $('.new-ad__category-box').animate({
//             'min-height': '25rem',
//         });
//         $('.new-ad__category').animate({margin: 0}).find('.new-ad__category-sub-title').append(text);
//         $('.new-ad__status-item:first-child').addClass('active');
//     }
// });
// $('.new-ad__category-reset-btn').click(function () {
//     $('.new-ad__category-label-search.active').removeClass('active');
//     $('.new-ad__category-label-search:first-child').addClass('active');
//     $('.new-ad__category').slideUp();
// });