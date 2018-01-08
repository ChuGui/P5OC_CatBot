$(document).ready(function() {
    console.log('fichier admin.js chargé');

    /*Gestion des utilisateurs*/
    $('.delete-user').on('click', function (e) {

        var $trash = $(e.currentTarget);
        var userId = $trash.data('userid');
        var userElt = $('#user_' + userId);
        console.log(userElt);
        var url = $trash.data('url');
        $('.confirmDeleteUserBtn').on('click', function (e) {
            $.ajax({
                url: url,
                type: "GET",
                success: function () {
                    $(userElt).fadeOut(300, function(){$(this).remove();});
                },
                error: function () {
                    console.log("Cet utilisateur n'existe pas.")
                }
            })


        });
    });






});

