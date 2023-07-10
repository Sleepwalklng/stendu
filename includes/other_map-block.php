<div class="map-ad new-ad__form-item update-block">
    <h2 class="new-ad__item-title">Место сделки</h2>
    <div class="new-ad__item-content">
        <div class="new-ad__flex-full">
            <p class="new-ad__label-name">
                <span>Адрес</span>
                <span class="new-ad__label-name-icon">?</span>
            </p>
            <label class="map-ad__search-label new-ad__input-box">
                <input name="UF_ADDRESS" id="pac-input" type="search"
                       placeholder="Начните вводить адрес, а потом выберите из списка">
                <input name="UF_ADRES_CODE" id="geo" type="hidden">
                <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.725 18.7424C15.6473 18.7424 19.6376 14.7707 19.6376 9.87121C19.6376 4.97178 15.6473 1 10.725 1C5.80278 1 1.8125 4.97178 1.8125 9.87121C1.8125 14.7707 5.80278 18.7424 10.725 18.7424Z"
                          stroke="#4067F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.5167 20.6098L19.6406 18.7422" stroke="#4067F0" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </label>
        </div>
        <div id="map-ad__map" class="map-ad__map">
        </div>
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
            defer
        ></script>
        <script>
            function initAutocomplete() {
                const myLatlng = new google.maps.LatLng(56.97306259784141, 24.1009260120028);
                const map = new google.maps.Map(document.getElementById("map-ad__map"), {
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
</div>