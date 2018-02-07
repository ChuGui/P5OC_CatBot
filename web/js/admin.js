/*-------------------------------------------------------*/
/*---------------RECHERCHE UTILISATEUR-------------------*/

/*-------------------------------------------------------*/
function searchUserByName() {
    var value = $('#searchUser').val().toLowerCase();
    $('.oneUser').each(
        function () {
            var userName = $(this).attr('data-userName').toLowerCase();
            var ok = userName.indexOf(value);
            if (ok > -1) {
                $(this).addClass("correspond");
                $(this).removeClass("correspondPas");
            } else {
                $(this).addClass("correspondPas");
                $(this).removeClass("correspond");
            }
        }
    )
}

$(document).on('keyup', '#searchUser', searchUserByName);

/*----------------------------------------------------------*/
/*----------------------------DELETE USER-------------------*/
/*----------------------------------------------------------*/

function deleteUser() {
    var userId = $(this).attr('data-userId');
    $.ajax({
        url: Routing.generate('delete_user'),
        data: {userId : userId},
        type: "GET",
        success: function (response) {
            $("#user_" + userId).hide('slow');
            $('#modal-success-delete').modal('toggle');
        },
        error: function (xhr, status, error) {
            $("#modal-error").modal('toggle');
        }
    })
}

$(document).on('click', '.confirmDeleteUser-JS', deleteUser);

/*----------------------------------------------------------*/
/*-----------------------DELETE ACTUALITE-------------------*/
/*----------------------------------------------------------*/

function deleteActualite() {
    var actualiteId = $(this).attr('data-actualiteId');
    $.ajax({
        url: Routing.generate('delete_actualite'),
        data: {actualiteId : actualiteId},
        type: "GET",
        success: function (response) {
            $("#actualite_" + actualiteId).hide('slow');
            $('#modal-success-delete').modal('toggle');
        },
        error: function (xhr, status, error) {
            $("#modal-error").modal('toggle');
        }
    })
}

$(document).on('click', '.confirmDeleteActualite-JS', deleteActualite);


