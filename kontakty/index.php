<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
CModule::IncludeModule("iblock");
?>

  <div class="inner inner--hidden inner--services-card inner--contacts"></div>

  <main class="main main--hidden">
    <section class="application">
      <div class="container">
        <div class="application__inner">
          <div class="application__left">
            <div class="application__title">
              Наши контакты
            </div>

            <ul class="application__info">
              <li class="application__item">
                <div class="application__subtitle">
                  Служба поддержки
                </div>
              
                <a class="application__tel" href="tel:88006000001">
                  8 800 600-00-01
                </a>
              
                <a class="application__mail" href="mailto:help@avito.ru">
                  help@avito.ru
                </a>
              </li>

              <li class="application__item">
                <div class="application__subtitle">
                  Для прессы
                </div>
              
                <a class="application__tel" href="tel:84952283630">
                  8 495 228-36-30
                </a>
              
                <a class="application__mail" href="mailto:help@avito.ru">
                  help@avito.ru
                </a>
              </li>
            </ul>
          </div>

          <img class="application__img" src="<?= SITE_TEMPLATE_PATH ?>/images/application-img.png" alt="">

          <form class="application__form">
            <div class="application__title">
              Мы открыты для обратной связи
            </div>
            
            <div class="application__text">
              Наши специалисты ответят в течение часа
            </div>
            
            <div class="application__wrapper">
              <div class="application__elem">
                <div class="application__description">
                  Ваше имя
                </div>
              
                <input class="application__input application__input-name" placeholder="имя" type="text" name="NAME">
              </div>

              <div class="application__elem">
                <div class="application__description">
                  E-mail
                </div>
              
                <input class="application__input application__input-email" placeholder="E-mail" type="email" name="EMAIL">
              </div>
            </div>
            <div class="application__elem application__message">
              <div class="application__description">
                Введите сообщение
              </div>
              <textarea class="application__input application__input--textarea application__input-text" placeholder="Ваше сообщение..." name="TEXT"></textarea>
            </div>
            <input class="application__submit" value="Отправить" type="submit">
          </form>

        </div>
        <div class="map_container">
            <div id="map"></div>
            <? $contacts = CIBlockElement::GetList(
              array(),
              array('IBLOCK_ID' => 8, 'ACTIVE' => 'Y'),
              false,
              array(),
              array('ID', 'NAME', 'PROPERTY_MAP')
            );
            $contact = $contacts->GetNext();
            $map_array = explode(',',$contact['PROPERTY_MAP_VALUE']);
            ?>
            <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

            <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
                    defer
            ></script>
            <script>
            var styles = [
              {
                featureType: 'landscape',
                elementType: 'geometry',
                stylers: [
                  { color: '#F5F5F5' } // Оттенок серого для ландшафта 
                ]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [
                  { color: '#EEEEEE' } // Оттенок серого для дорог
                ]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [
                  { color: '#E0E0E0' } // Оттенок серого для мест 
                ]
              },
              {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [
                  { color: '#D3D3D3' } // Оттенок серого для воды
                ]
              },
            ];

        function initAutocomplete() {
            const myLatlng = new google.maps.LatLng({lat: <?=$map_array[0]?>, lng: <?=$map_array[1]?>});
            const map = new google.maps.Map(document.getElementById("map"), {
                center: myLatlng,
                zoom: 10,
                styles,
                disableDefaultUI: true, // Отключаем стандартные элементы управления
            });
            const infoWindow = new google.maps.InfoWindow({
                content: "",
                disableAutoPan: true,
            });
            const marker = new google.maps.Marker({
                position: {lat: <?=$map_array[0]?>, lng: <?=$map_array[1]?>},
                icon: {
                  url: '../local/templates/stendu/images/placemark1.png', 
                  scaledSize: new google.maps.Size(70, 96) // Размер маркера
                },
                map: map, // Добавляем маркер на карту
            });
            // const markers = locations.map(([position,title], i) => {
            //     const marker = new google.maps.Marker({
            //         position,
            //         title:title,
            //     });

            //     // markers can only be keyboard focusable when they have click listeners
            //     // open info window when marker is clicked
            //     marker.addListener("click", () => {
            //         infoWindow.setContent(marker.getTitle());
            //         infoWindow.open(map, marker);
            //     });
            //     return marker;


            // });
            const markerCluster = new markerClusterer.MarkerClusterer({ map, marker });
        }

        window.initAutocomplete = initAutocomplete;

    </script>
          <div class="map-overlay"></div>
        </div>
      </div>
    </section>
  </main>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
