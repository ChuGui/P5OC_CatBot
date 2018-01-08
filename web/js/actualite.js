$(document).ready(function() {

    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        var $form = $(e.currentTarget);

        var $content = $form.find('input[name="content"]').val();


        $.ajax({
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
        })


    });
});