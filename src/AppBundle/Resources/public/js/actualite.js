$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        $form = $(this);
        var url = $form.attr('action');
        /*var data = $('#appbundle_comment_content').val();*/
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($form[0]),
            success: function(data, status) {
                 console.log(data);
                 console.log(status);
            },
            error: function(jqXHR, satus, Throw){
                console.log(satus);
            }
        })


    });
});