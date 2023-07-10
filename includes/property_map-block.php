<?php
if ($_REQUEST['region'] == 54) {
    $latLng = '56.97306259784141, 24.1009260120028';
} else if ($_REQUEST['region'] == 55) {
    $latLng = '54.752091655781335, 25.3141734869178';
} else if ($_REQUEST['region'] == 56) {
    $latLng = '59.43724772225245, 24.742763279376838';
}
?>

<div class="announcement-content__block announcement-content__place">
    <div class="announcement-content__title">Адрес</div>
    <div class="announcement-content__place-search">
        <label class="wide">
            <div class="announcement-label__title">Адрес <span>?</span></div>
            <input name="UF_ADDRESS" id="pac-input" type="search"
                   placeholder="Начните вводить адрес">
            <input name="UF_GEO" id="geo" type="hidden">
            <button class="announcement-content__place-search-btn">
                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/search.svg" alt="">
            </button>
        </label>
    </div>
    <div class="announcement-content__place-map" id="announcement-place-map"></div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>
    <script>
      
        function initAutocomplete() {
            const myLatlng = new google.maps.LatLng(<?=$latLng?>);
            const map = new google.maps.Map(document.getElementById("announcement-place-map"), {
                center: myLatlng,
                zoom: 10,
                mapTypeId: "roadmap",
                disableDefaultUI: true,
            });


            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const inputGeo = document.getElementById("geo");
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

                    // const icon = {
                    //     url: place.icon,
                    //     size: new google.maps.Size(71, 71),
                    //     origin: new google.maps.Point(0, 0),
                    //     anchor: new google.maps.Point(17, 34),
                    //     scaledSize: new google.maps.Size(25, 25),
                    // };

                    // Create a marker for each place.
                    markers1.push(
                        new google.maps.Marker({
                            map,
                            icon: {
                                url: '../local/templates/stendu/images/placemark.png',
                                scaledSize: new google.maps.Size(rem(4.2), rem(4.2)) // Размер маркера
                            },
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
                    inputGeo.value = place.geometry.location;
                });
                map.fitBounds(bounds);
            });
        }

        window.initAutocomplete = initAutocomplete;

    </script>

</div>
