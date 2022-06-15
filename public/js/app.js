let parentId = 0;
$(".comment-expand-icon").click(function () {
    $(this).parents('.parent-comment').find('.parent-children-wrapper').toggle();
});

$(".reply-element").click(function () {
    parentId = $(this).data('id');
    $("#comment-parent-id").val(parentId);
});


$("#add-comment-submit-btn").click(function () {
    const username = $("#username").val();
    const comment = $("#comment").val();
    const data = {
        username,
        comment,
        parentId
    };

    $.ajax({
        url: "/api/comments",
        method: "POST",
        data,
        success: function (response) {
            if (response.success) {
                $("#addComment").modal("hide");
            }
        }
    })

});
