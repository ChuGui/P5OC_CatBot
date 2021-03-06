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
                    $("#aidez-moi").empty();
                    $('.searching').hide('slow');
                    $('#aidez-moi').append("<img src='../img/elements/Loading_icon.gif'  alt='loading' height='100' width='100' class='ml-3 mt-3 searching'></img>");
            },
            success: function(response) {
                $('#aidez-moi').empty();
                var birds = $.parseJSON(response);
                console.log(birds);
                $.each(birds, function(idx, bird) {
                    console.log(bird);
                    $("#aidez-moi").append(
                            '<div class="p-2 nao-card mx-auto mb-3 oiseau-help">'
                        +   '<div class="d-flex flex-nowrap align-items-center">'
                        +   '<div class="bird-img-wrapper">'
                        +   '<img src="../img/birds/'+ bird.image +'"class="bird-img">'
                        +   '</div>'
                        +   '<div class="col d-flex flex-column justify-content-between">'
                        +   '<div class="d-flex flex-column align-self-start">'
                        +   '<h3 class="align-self-end text-left bird-name">'+ bird.name +'</h3>'
                        +   '</div>'
                        +   '</div>'
                        +   '</div>'
                        +   '</div>');
                });
            },
            error: function(xhr, status, error) {

                $(".oiseaux").hide('slow');
                $("#aidez-moi").append('<p class="searching">Aucun oiseaux ne correspond à cette description</p>');

            }
        })
    });

});