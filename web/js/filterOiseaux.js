$(function () {
    function searchKeyWord() {
        var plumage = ($('#appbundle_birdFilter_plumage').val());
        var formebec = ($('#appbundle_birdFilter_formeBec').val());
        var pattes = ($('#appbundle_birdFilter_pattes').val());
        var couleurbec = ($('#appbundle_birdFilter_couleurBec').val());

        $('.oneBird').each
        (function () {
                if
                (
                    (plumage == '' || $(this).attr('data-plumage') == plumage)
                    &&
                    (formebec == '' || $(this).attr('data-formebec') == formebec)
                    &&
                    (pattes == '' || $(this).attr('data-pattes') == pattes)
                    &&
                    (couleurbec == '' || $(this).attr('data-couleurbec') == couleurbec)
                ) {
                    $(this).addClass('correspond');
                    $(this).removeClass('correspondPas');
                    //console.log(' CORRESPOND !! ');
                } else {
                    $(this).removeClass('correspond');
                    $(this).addClass('correspondPas');
                    //console.log(' nope !! ');
                }
            }
        );
    }
    $(document).on('change', '.filter', searchKeyWord);

    function searchBirdByName(){
        var value = $('#searchBird').val().toLowerCase();
        $('.oneBird').each(
            function(){
                var birdName = $(this).attr('data-birdName').toLowerCase();
                var ok = birdName.indexOf(value);
                if(ok > -1){
                    $(this).addClass("correspond");
                    $(this).removeClass("correspondPas");
                    placeCircles();
                } else {
                    $(this).addClass("correspondPas");
                    $(this).removeClass("correspond");
                }
            }
        )
    }

    $(document).on('keyup', '#searchBird', searchBirdByName);


    function placeCircles() {
        var map;
        var paris = {lat: 46.221231201571015, lng: 2.9345673322677612}
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: paris,
            styles: myStyle
        })

        var birds = [];
        $('.oneBird.correspond').each
        (function (index) {
            var birdId = parseInt($(this).attr('data-birdId'));
            birds.push(birdId)
        })

            $.ajax({
                url: Routing.generate('validated_observations_coordinates_show_id'),
                type: "GET",
                data: {birdsId: birds},
                dataType: "json",
                success: function (response) {
                    var datas = $.parseJSON(response);
                    $.each(datas, function (idx, data) {
                        var latitude = parseInt(data.latitude);
                        var longitude = parseInt(data.longitude);
                        var birdName = data.bird.name;
                        var position = {
                            center: {
                                lat: latitude, lng: longitude
                            }
                        }
                        observationsCircles = new google.maps.Circle({
                            strokeColor: '#53399E',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#f8e2a9',
                            fillOpacity: 0.5,
                            map: map,
                            center: position.center,
                            radius: 10000,
                            title: birdName
                        });

                    })
                },
                error: function (xhr, status, error) {
                    console.log('erreur status :' + status);
                }
            })
    }
    $(document).on('change', '.filter', placeCircles);
});

