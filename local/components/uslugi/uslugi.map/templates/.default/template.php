
<?
$arUslugi = $arResult['MAP'];?>
<?php
// Получение типов услуг
const MY_HL_BLOCK_ID_TYPES_USLUG = 7;
$entity_data_class_type_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_TYPES_USLUG);
$rsData = $entity_data_class_type_uslugi::getList(array());
while ($el = $rsData->fetch()) {
    $arTypes[] = $el;
}
?>
<div class="container">

      <div id="map"></div>

      <a class="map__btn" href="/uslugi/map.php">Объявления на карте</a>
</div>

<!-- Карта -->

<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initMap">
</script>

<script>
    const rem = function (rem) {
        if ($(window).width() > 768) {
            console.log($(window).width());
            let marg = 0.005208335 * $(window).width() * rem;
            return marg;
        } else {
            let marg = (100 / 375) * (0.1 * $(window).width()) * rem;
            return marg;
        }
    };

    function initMap() {
        const myLatlng = new google.maps.LatLng(<?= $arUslugi['0']['UF_ADRES_CODE'] ?>);
        const  map = new google.maps.Map(document.getElementById("map"), {
            center: myLatlng,
            zoom: 8,
            disableDefaultUI: true,
        });
        const infoWindow = new google.maps.InfoWindow({
            content: "",
            disableAutoPan: true,
        });
        const markers = locations.map(([position,title], i) => {
            const marker = new google.maps.Marker({
                position,
                title:title,
                icon: {
                  url: '../local/templates/stendu/images/placemark.png',
                  scaledSize: new google.maps.Size(rem(4.2), rem(4.2)) // Размер маркера
                },
            });

            // markers can only be keyboard focusable when they have click listeners
            // open info window when marker is clicked
            marker.addListener("click", () => {
                infoWindow.setContent(marker.getTitle());
                infoWindow.open(map, marker);
            });
            return marker;


        });
        const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
    }

    const locations = [
        <?php foreach ($arUslugi as $item) {
        if($item['UF_ADRES_CODE']){?>
                <? foreach ($arTypes as $arType): ?>
        <?foreach($arTypes as $arUrlMap):?>
        <?if($item['UF_TYPE_USLUGI'] == $arUrlMap['ID']):
        $urlmap = $arUrlMap['UF_SESSION_CODE'];
    endif;?>
        <?endforeach?>
            <? endforeach ?>
            <? $coor = explode(',',$item['UF_ADRES_CODE'])?>
            [{ lat: <?=$coor[0]?>, lng: <?=$coor[1]?>},'<div class="map-block-item">' +
                                                        '<a href="/uslugi/<?= $urlmap;?>/<?= $item['UF_SESSION_CODE'];?>"><div class="map-block-item-cont">' +
                                                        '<div class="map-block-item-cont-text">' +
                                                        '<ul><li><?=$item["UF_NAME"]?></li>' +
                                                        '<li><?= $item['UF_PRICE'] . ' ₽'?></li>' +
                                                        '</ul></div></div> </a>' +
                                                        '</div>',],
            <?}?>
        <?}?>

    ];
    window.initMap = initMap;

</script>




























