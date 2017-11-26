$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        var $form = $(e.currentTarget);
        var content = $('#content').val();
        console.log(content);


        $.ajax({
            url: $form.data('url'),
            type: "POST",
            dataType: "json",
            data: {content : content},
            success:function(data) {
                console.log(data)
            }

            ,
            error: function(jqXHR){
                var errorData = JSON.parse(jqXHR.responseText);
                console.log('erreurData :' + errorData);
            }
        })


    });
});