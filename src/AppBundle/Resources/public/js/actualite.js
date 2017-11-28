$(document).ready(function() {

    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        var $form = $(e.currentTarget);
        /*// always makes sense to signal user that something is happening
        $('#loadingSpinner').show();

        // simple approach avoid submitting multiple times
        $('#mySubmitButton').hide();*/
        console.log(data);

        $.ajax({
            url: $form.data('url'),
            type: "POST",
            dataType: "application/json",
            data: $(this).serialize(),
            success: function(data) {
                console.log(JSON.stringify(data))
            },
            error: function(){

                console.log('erreurData ');
            }
        })


    });
});