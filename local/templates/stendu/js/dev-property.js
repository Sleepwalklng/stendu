$(document).ready(function() {
	if ($('.filter-nedvizhimost')[0]) {

		console.log('dev-property');

		$('form').on('submit', function(e) {
			var url = new URL(location);
			data = $(this).serializeArray();
			valued_data = [];
			console.log(url);
			furl = '';

			$('.filter_room').each(function() {
				name = $(this).attr('name');
				url.searchParams.delete(name);
			});
			data.forEach(function(item) {
				if (item.value) {
					url.searchParams.set(item.name, item.value);
					valued_data.push(item.name);
				}
			});
			console.log(valued_data);
			if (url.pathname.includes('snyat') && valued_data.indexOf('room1') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-1-komnatnuyu-kvartiru/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room2') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-2-komnatnuyu-kvartiru/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room3') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-3-komnatnuyu-kvartiru/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room4') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-4-komnatnuyu-kvartiru/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room5') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-mnogkomnatnuyu-kvartiru/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room6') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-kvartiru-studiu/';
			}
			if (url.pathname.includes('snyat') && valued_data.indexOf('room7') >= 0 && valued_data.length == 1) {
				furl = url.origin + '/nedvizhimost/' + 'snyat-kvartiru-svobodnoy-planirovki/';
			}
			console.log(url.pathname);
			if (furl) {
				furl_url = new URL(furl);
				window.location.href = furl_url;
			} else {
				if (url.pathname.includes('snyat')) {
					url.pathname = '/nedvizhimost/snyat/';
				}
				window.location.href = url;
			}
		});

	}
});