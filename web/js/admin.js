$(document).ready(function() {
    console.log('fichier admin.js chargé');
    $('#confirmDeleteUserBtn').on('click', function(e) {

        var $confirmBtn = $(e.currentTarget);
        var userId = $confirmBtn.data('userid');
        console.log(userId);
        /*$.ajax({
            url: $form.data('url'),
            type: "POST",
            dataType: "application/json",
            data: { content: $content },
            success: function(data) {
                console.log(data)
            },
            error: function(){

                console.log('erreurData ');
            }
        })*/


    });
});