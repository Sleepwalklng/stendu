
<?

$arUslugi = $arResult['MAP'];?>


<!--<input-->
<!--        id="pac-input"-->
<!--        class="controls"-->
<!--        type="text"-->
<!--        placeholder="Search Box"-->
<!--/>-->
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
        const myLatlng = new google.maps.LatLng(<?= $arUslugi['0']['UF_GEO'] ?>);
        const map = new google.maps.Map(document.getElementById("map"), {
            center: myLatlng,
            zoom: 10,
            mapTypeId: "roadmap",
            styles
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
                  url: '../local/templates/stendu/images/placemark1.png', 
                  scaledSize: new google.maps.Size(70, 96) // Размер маркера
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
        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });

        let markers1 = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers1.forEach((marker) => {
                marker.setMap(null);
            });
            markers1 = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };

                // Create a marker for each place.
                markers1.push(
                    new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    })
                );
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    const locations = [
        <?php foreach ($arUslugi as $item) {
        if($item['UF_GEO']){
        if ($item['UF_DEAL_TYPE'] == 67)
            $url = 'snyat';
        elseif ($item['UF_RENT_TYPE'] == 71)
            $url = 'posutochno';
        elseif ($item['UF_DEAL_TYPE'] == 66)
            $url = 'kupit';
        ?>
        <? $coor = explode(',',$item['UF_GEO'])?>
        [{ lat: <?=$coor[0]?>, lng: <?=$coor[1]?>},'<div class="map-block-item">' +
        '<a href="/nedvizhimost/<?= $url ?>/<?= $item['UF_SESSION_CODE'] ?>/"><div class="map-block-item-cont">' +
        '<div class="map-block-item-cont-text">' +
        '<ul><li><?=$item["UF_TITLE"]?></li>' +
        '<li><?= $item['UF_PRICE'] . ' ₽'?></li>' +
        '</ul></div></div> </a>' +
        '</div>',],
        <?}?>
        <?}?>

    ];

    window.initAutocomplete = initAutocomplete;

</script>