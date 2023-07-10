document.addEventListener('DOMContentLoaded', function () {
  // var moreFiltersLink = document.getElementById('moreFiltersLink');
  // var modal = document.querySelector('.modal__map');
  // var modalContent = document.querySelector('.modal-content');
  // var closeBtn = document.querySelector('.close');

  // moreFiltersLink.addEventListener('click', function (event) {
  //   event.preventDefault();
  //   modal.style.display = 'flex';
  // });

  // closeBtn.addEventListener('click', function () {
  //   modal.style.display = 'none';
  // });

  // window.addEventListener('click', function (event) {
  //   if (event.target === modal) {
  //     modal.style.display = 'none';
  //   }
  // });

  var dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(function (dropdown) {
    var dropdownBtn = dropdown.querySelector('.dropdown-btn');
    var dropdownList = dropdown.querySelector('.dropdown-list');
    var dropdownItems = dropdown.querySelectorAll('.dropdown-item');

    dropdown.addEventListener('click', function (event) {
      if (event.target !== dropdownList) {
        dropdowns.forEach(function (dropdown) {
          dropdown.querySelector('.dropdown-list').classList.remove('active');
        });

        dropdownList.classList.toggle('active');
      }
    });

    dropdownItems.forEach(function (item) {
      item.addEventListener('click', function () {
        var dropdown = this.closest('.dropdown');
        var dropdownBtn = dropdown.querySelector('.dropdown-btn');
        var dropdownList = dropdown.querySelector('.dropdown-list');
        var input = dropdown.querySelector('input');

        if (!input) {
          dropdownItems.forEach(function (item) {
            item.classList.remove('active');
          });

          this.classList.add('active');
          dropdownBtn.textContent = this.textContent;
          dropdownList.classList.remove('active');
        }
      });
    });

    dropdownList.addEventListener('click', function (event) {
      event.stopPropagation();
    });
  });

  document.addEventListener('click', function (event) {
    var targetElement = event.target;
    var isInsideDropdown = false;

    dropdowns.forEach(function (dropdown) {
      if (dropdown.contains(targetElement) || targetElement.classList.contains('dropdown-btn')) {
        isInsideDropdown = true;
      }
    });

    if (!isInsideDropdown) {
      dropdowns.forEach(function (dropdown) {
        dropdown.querySelector('.dropdown-list').classList.remove('active');
      });
    }
  });

  // ymaps.ready(function () {
  //   var map = new ymaps.Map('map', {
  //       center: [55.840245, 37.492024],
  //       zoom: 14,
  //       controls: [],
  //       hideFooter: true,
  //       behaviors: ['default'],
  //     }),
  //     Placemark = new ymaps.Placemark(
  //       [55.840245, 37.492024],
  //       {},
  //       {
  //         // Опции.
  //         // Необходимо указать данный тип макета.
  //         iconLayout: 'default#image',
  //         // Своё изображение иконки метки.
  //         iconImageHref: '../local/templates/stendu/images/placemark1.png',
  //         // Размеры метки.
  //         iconImageSize: width < 768 ? [58, 78] : [70, 96],
  //         // Смещение левого верхнего угла иконки относительно
  //         // её "ножки" (точки привязки).
  //         iconImageOffset: [-30, -80],
  //         // Смещение слоя с содержимым относительно слоя с картинкой.
  //         // iconContentOffset: [15, 15],
  //         // Макет содержимого.
  //       },
  //     );
  //   //   myMap.container.fitToViewport();
  //   map.setType('yandex#map');

  //   map.geoObjects.add(Placemark);
  // });

  // const filters = document.querySelectorAll('.modal-content__filter-type');

  // filters.forEach((filter) => {
  //   filter.addEventListener('click', () => {
  //     filters.forEach((item) => {
  //       item.classList.remove('active');
  //     });
  //     filter.classList.toggle('active');
  //   });
  // });
});
