$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        var $form = $(e.currentTarget);
        var content = JSON.stringify($($form).serializeArray());
        console.log(content);

        $.ajax({
            url: $form.data('url'),
            type: "POST",
            dataType: "application/json",
            data: content,
            success: function(data) {
                console.log(data)
            },
            error: function(){

                console.log('erreurData ');
            }
        })


    });
});