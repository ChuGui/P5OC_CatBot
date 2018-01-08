$("document").ready(function() {
    $("#searchUser").on('keyup', function(e) {
        e.preventDefault();
        var url = Routing.generate('show_user', { username : ""});
        console.log(url);
        var userVal = $('#searchUser').val();
        console.log(userVal);
        if(userVal.length > 1) {
            $.ajax({
                url: url + '/' + userVal,
                type: 'GET',
                dataType: "json",
                beforeSend: function() {
                    console.log('ça charge !');
                },
                success: function(data) {
                    $('#userDisplay').children().fadeOut(500,function(){$ (this).remove() });
                    $.each(data, function(index, element) {
                        $('#userDisplay').append($('<div class="mt-3"></div>').text(element.username));
                    });
                },
                error: function() {
                    console.log('Une erreur est survenu')
                }
            })
        } else {

        }

    });
    function createUserElement(element) {
        $("")
    }


});
