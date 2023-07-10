
<?
$arUslugi = $arResult['MAP'];?>



<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script>
    ymaps.ready(function () {
              myMapRest = new ymaps.Map('map', {
                  center: [<?= $arUslugi['0']['UF_ADRES_CODE'] ?>],
                  zoom: 10,
                  controls: [],
                  behaviors: ['default', 'scrollZoom']
              });
              myMapRest.controls.add('zoomControl');
              // Создаем собственный макет с информацией о выбранном геообъекте.
              customBalloonContentLayout = ymaps.templateLayoutFactory.createClass([
                  '<ul class=list>',
                  // Выводим в цикле список всех геообъектов.
                  '{% for geoObject in properties.geoObjects %}',
                  '<li><a href=# data-placemarkid="{{ geoObject.properties.placemarkId }}" class="list_item">{{ geoObject.properties.balloonContentBody|raw }}</a></li>',
                  '{% endfor %}',
                  '</ul>'
              ].join(''));

              myCollection = new ymaps.Clusterer({
                  clusterOpenBalloonOnClick: true,
                  clusterBalloonPanelMaxMapArea: 0,
                  clusterBalloonMaxHeight: 200,
                  clusterBalloonContentLayout: customBalloonContentLayout
              });

              // Заполняем кластер геообъектами
              var placemarks = [];

             <?foreach ($arUslugi as $item) {
               if($item['UF_ADRES_CODE']){ ?>
                <?foreach($Count as $arUrlMap):?>
                  <?if($item['UF_TYPE_USLUGI'] == $arUrlMap['ID']):
                    $urlmap = $arUrlMap['UF_SESSION_CODE'];
                  endif;?>
                <?endforeach?>

            myPlacemark = new ymaps.Placemark([<?=$item['UF_ADRES_CODE']?>],
                { balloonContentBody: '<div class="map-block-item">' +
                      '<a href="<?= $urlmap;?>/<?= $item['UF_SESSION_CODE'];?>"><div class="map-block-item-cont">' +
                      '<div class="map-block-item-cont-text">' +
                      '<ul><li><?=$item["UF_NAME"]?></li>' +
                      '<li><?= $item['UF_PRICE'].' ₽'?></li>' +
                      '</ul></div></div> </a>' +
                      '</div>'},
                {   hintContent: "<?= $item['UF_NAME'] ?>" ,
                    iconLayout: 'default#image',
                    iconImageHref: '<?= SITE_TEMPLATE_PATH ?>/images/map-marker.svg',
                    iconImageSize: [27, 27],
                    iconImageOffset: [-25, -25]
                }
                );

              placemarks.push(myPlacemark);

            <? } } ?>


              myCollection.add(placemarks);
              myMapRest.geoObjects.add(myCollection);
          });



  </script>
  <!-- Карта -->