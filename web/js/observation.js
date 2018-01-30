$(document).ready(function () {
    console.log('fichier observation.js chargé');

    /*Modal google map*/
    $('#appbundle_observation_lieuObservation').on('click', function () {

        $("#dialog").position({
            my: "center",
            at: "center",
        });
        $('#dialog').dialog({
            modal: true,
            height: 500,
            width: 600,
            show: {effect: "blind", duration: 400},
            hide: {effect: "blind", duration: 400},
            clickOutside: true,
            clickOutsideTrigger: '#appbundle_observation_lieuObservation',
            open: function () {
                var position = {lat: 46.221231201571015, lng: 2.9345673322677612}
                var mapOptions = {
                    center: position,
                    zoom: 10,
                    styles: myStyle
                }

                var map = new google.maps.Map($("#map")[0], mapOptions);


                var marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    icon: '../img/marker.png'
                });

                /*Click and move marker*/
                google.maps.event.addListener(map, 'click', function(event) {
                    marker.setPosition(event.latLng);
                    var markerPosition = marker.getPosition();
                    var geocoder = new google.maps.Geocoder;
                    var infoWindow = new google.maps.InfoWindow;
                    adress = geocodeLatLng(geocoder, map, infoWindow, markerPosition);
                });



                /*AFFICHER L'ADRESSE EN FONCTION DES COORDONNÉES CHOISIES PAR L'UTILISATEUR*/
                marker.addListener('dragend', function (e) {
                    var markerPosition = marker.getPosition();
                    var geocoder = new google.maps.Geocoder;
                    var infoWindow = new google.maps.InfoWindow;
                    adress = geocodeLatLng(geocoder, map, infoWindow, markerPosition);
                });

                /*GEOCODER*/
                function geocodeLatLng(geocoder, map, infowindow, markerPosition) {
                    var latlng = markerPosition;
                    geocoder.geocode({'location': latlng}, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                infowindow.close(map, marker);
                                map.setZoom(11);
                                infowindow.setContent(results[1].formatted_address);
                                infowindow.open(map, marker);
                                $('#appbundle_observation_lieuObservation').val(results[1].formatted_address);
                                /*Hydratation des champs hidden*/
                                $('#appbundle_observation_latitude').val(latlng.lat());
                                $('#appbundle_observation_longitude').val(latlng.lng());

                            } else {
                                window.alert('No results found');
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                        }
                    });
                }

                /*GÉOLOCALISATION*/
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };


                        marker.setPosition(pos);
                        map.setCenter(pos);
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                        'Error: Le service de gécolocalisation à échoué.' :
                        'Error: Votre navigateur ne supporte pas la géocalisation.');
                }

            }

        });
    }); /*FIN DE LA GOOGLE MAP*/

    /*FILTRE SELECTION OISEAU*/

});

myStyle = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#c7c4c7"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#6d438d"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#8e6ba8"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": "0"
            },
            {
                "saturation": "0"
            },
            {
                "color": "#f4f5f1"
            },
            {
                "gamma": "1"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "-3"
            },
            {
                "gamma": "1.00"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#b59ac9"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#8B7CB7"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": "65"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#dbcce4"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#4e4e4e"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#787878"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#b59ac9"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#947fa0"
            },
            {
                "saturation": "-50"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#b59ac9"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "labels.icon",
        "stylers": [
            {
                "hue": "#0a00ff"
            },
            {
                "saturation": "-77"
            },
            {
                "gamma": "0.57"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#8f7f93"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "labels.icon",
        "stylers": [
            {
                "lightness": "42"
            },
            {
                "gamma": "0.75"
            },
            {
                "saturation": "-68"
            },
            {
                "hue": "#9200ff"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#eaf6f8"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#cee5f2"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "lightness": "-49"
            },
            {
                "saturation": "-53"
            },
            {
                "gamma": "0.79"
            }
        ]
    }
]
