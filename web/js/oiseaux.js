var map, map2;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: centreFrance,
        styles: myStyle
        })
}

$(document).ready(function() {
    $.ajax({
        url: Routing.generate('observations_coordinates_show'),
        type: "GET",
        dataType: "json",
        success: function(response) {
            var coordinatesObservations = $.parseJSON(response);
            $.each(coordinatesObservations, function (idx, observation) {

                var latLng = new google.maps.LatLng(observation.latitude,observation.longitude);

                var observationCircle = new google.maps.Circle({
                    strokeColor: '#53399E',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#f8e2a9',
                    fillOpacity: 0.5,
                    map: map,
                    center: latLng,
                    radius: 10000,
                    title: observation.bird.name
                });
                google.maps.event.addListener(observationCircle, "mouseover", function() {
                    this.getMap().getDiv().setAttribute('title',this.get('title'));
                })
            })

        },
        error: function(xhr, status, error) {
        }
    })

    $('.oneBird').on('click', function(){

        var lastObservationId = $(this).attr('data-lastObservationId');
        console.log(lastObservationId);
        $.ajax({
            url: Routing.generate('coordinate_show'),
            type: "GET",
            data: {id : lastObservationId},
            dataType: "json",
            success: function(response) {
                var coordinatesLastObservation = $.parseJSON(response);
                var latLngLastObservation = new google.maps.LatLng(coordinatesLastObservation.latitude,coordinatesLastObservation.longitude);
                map[lastObservationId] = new google.maps.Map(document.getElementById('map'+ lastObservationId), {
                        zoom:9,
                        center: latLngLastObservation,
                        styles: myStyle
                    })

                observationsCircles = new google.maps.Circle({
                        strokeColor: '#53399E',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#f8e2a9',
                        fillOpacity: 0.5,
                        map: map[lastObservationId],
                        center: latLngLastObservation,
                        radius: 10000,
                        /*title: observation.bird.name*/
                    });
                    /*google.maps.event.addListener(observationCircle, "mouseover", function() {
                        this.getMap().getDiv().setAttribute('title',this.get('title'));
                    })*/


            },
            error: function(xhr, status, error) {
            }
        })

    })

    /*---------------------*/
    /*----PARTIE VOTE------*/
    /*---------------------*/
    $('.voteJs').on('click', function() {
        var userId = $(this).attr('data-userId');
        var observationId = $(this).attr('data-observationId');
        if(userId == "none"){
            console.log('Vous devez être connecté pour voter');
        } else {
            $.ajax({
                url: Routing.generate('vote'),
                data: {userId: userId, observationId: observationId},
                success: function(response) {
                    $('.heartJs').text(response)
                },
                error: function(response) {
                    console.log(response)
                }
            })
        }

    })
    /*-----------------------------*/
    /*----PARTIE COMMENTAIRES------*/
    /*-----------------------------*/
    $('.commentFormObservation_JS').on('submit', function(e){
        e.preventDefault();
        var observationId = $(this).attr('data-observationId');
        var commentInput = $('#contentObservation'+observationId);
        var commentContent = commentInput.val();
        $.ajax({
            url: Routing.generate('comment_observation'),
            data: {'observationId' : observationId, 'commentContent' : commentContent},
            dataType: 'json',
            success: function(response) {
                commentInput.val('');
                var comments = $.parseJSON(response);
                $('#Js-observationCommentsDisplay'+observationId).empty();
                $.each(comments, function(idx, comment) {
                    var content = comment.content;
                    var userImage = comment.user.profile_picture;
                    console.log(userImage);
                    var username = comment.user.username;
                    var updateAt = comment.update_at;
                    var prettyDate = $.format.prettyDate(updateAt);
                    $('#Js-observationCommentsDisplay' + observationId).append(
                            '<div class="d-flex flex-nowrap align-items-center comm m-3">'
                        +   '<img src="' + userImage +'" alt="" class="comment-avatar rounded-circle">'
                        +   '<div class="col-12 pl-3 text-left">'
                        +   '<div class="col-12 px-0">'
                        +   '<p class="mb-1 font-weight-bold">' + username + '</p>'
                        +   '</div>'
                        +   '<div class="col-12 px-0">'
                        +   '<p class="mb-0 text-left">' + content + '</p>'
                        +   '</div>'
                        +   '<div class="col-12 px-0">'
                        +   '<span class="time">' + prettyDate + '</span>'
                        +   '</div>'
                        +   '</div>'
                        +   '</div>'
                    )

                })

            },
            error: function(response) {
                commentInput.val('une erreur est survenue');
            }
        })

    })
})

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
centreFrance = {lat:47.04, lng:2.30}

