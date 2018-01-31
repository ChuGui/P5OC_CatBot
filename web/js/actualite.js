function addComment() {
    var commentInput = $('#content');
    var content = commentInput.val();
    var actualiteId = $('#addComment').attr('data-actualiteId');
    console.log(content);
    console.log(actualiteId);

    $.ajax({
        url: Routing.generate('add_comment_actualite'),
        type: "GET",
        data: {actualiteId: actualiteId, commentContent: content},
        dataType: "json",
        success: function (response) {
            commentInput.val('');
            $('#commentDisplay').empty();
            var comments = $.parseJSON(response);
            $.each(comments, function (idx, comment) {
                var content = comment.content;
                var userImage = comment.user.profile_picture;
                var username = comment.user.username;
                var updateAt = comment.update_at;
                var prettyDate = $.format.prettyDate(updateAt);
                $('#commentDisplay').append(
                    '<div class="d-flex flex-nowrap align-items-center comm m-3">'
                    + '<img src="../img/profilePictures/' + userImage + '" alt="' + username + '" class="comment-avatar rounded-circle">'
                    + '<div class="col-12 pl-3 text-left">'
                    + '<div class="col-12 px-0">'
                    + '<p class="mb-1 font-weight-bold">' + username + '</p>'
                    + '</div>'
                    + '<div class="col-12 px-0">'
                    + '<p class="mb-0 text-left">' + content + '</p>'
                    + '</div>'
                    + '<div class="col-12 px-0">'
                    + '<span class="time">' + prettyDate + '</span>'
                    + '</div>'
                    + '</div>'
                    + '</div>'
                )

            })
        },
        error: function (xhr, status, error) {
        }
    })
}

$(document).on('submit', '#commentForm', addComment);



