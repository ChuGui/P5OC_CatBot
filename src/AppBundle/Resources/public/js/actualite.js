$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        var $form = $(e.currentTarget);
        var content = $('#content').val();
        console.log(content);

        $.ajax({
            url: $form.data('url'),
            type: "POST",
            dataType: "application/json",
            data: {content : content},
            success: function(data) {
                console.log(data)
            },
            error: function(){

                console.log('erreurData ');
            }
        })


    });
});