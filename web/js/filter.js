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
            dataType: "application/json",
            beforeSend: function() {
                $('.searching_bird').append('<p>chargement</p>');
            },
            success: function(response) {
                console.log(response);
            },
            error: function(){
                $('.searching_bird').attr('src').replace('../img/bird_search.gif');
            }
        })
    })
});