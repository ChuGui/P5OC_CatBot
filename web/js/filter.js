$(document).ready(function() {

    $('.filter').on('change', function(e) {
        e.preventDefault();
        var plumage = ($('#appbundle_birdFilter_plumage').val());
        var couleur_bec = ($('#appbundle_birdFilter_couleur_bec').val());
        var pattes = ($('#appbundle_birdFilter_pattes').val());
        var forme_bec = ($('#appbundle_birdFilter_forme_bec').val());


        $.ajax({
            url: Routing.generate('filter_bird'),
            type: "GET",
            data:  {plumage : plumage, couleur_bec : couleur_bec, pattes: pattes, forme_bec: forme_bec},
            dataType: "json",
            beforeSend: function() {
                    $(".oiseaux").hide('slow');
                    $('.searching').hide('slow');
                    $('#aidez-moi').append("<img src='../img/Loading_icon.gif'  alt='loading' height='100' width='100' class='ml-3 mt-3 searching'></img>");
            },
            success: function(response) {

                $('.searching').hide('slow');
                var birds = $.parseJSON(response);
                $.each(birds, function(idx, bird) {
                    $("#aidez-moi").append('<div class="col-12 col-sm-10 col-lg-6 col-xxl-5 mx-auto mx-xl-0 mb-4 oiseaux">'
                        +'<div class="p-2 nao-card mx-auto">'
                        +'<div class="d-flex flex-nowrap align-items-center">'
                        +'<div class="bird-img-wrapper">'
                        +'<img src="'+ bird.image +'"class="bird-img">'
                        +'</div>'
                        +'<div class="col d-flex flex-column justify-content-between">'
                        +'<div class="d-flex flex-column align-self-start">'
                        +'<h3 class="align-self-end text-left bird-name">'+ bird.name +'</h3>'
                        +'</div>'
                        +'</div>'
                        +'</div>'
                        +'</div>'
                        +'</div>');
                });
            },
            error: function(xhr, status, error) {

                $(".oiseaux").hide('slow');
                $("#aidez-moi").append('<p class="searching">Aucun oiseaux ne correspond à cette description</p>');

            }
        })
    });

    $('.oiseaux').on('click', 'div' , function(){
        console.log('hello');
    })
});