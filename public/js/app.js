let parentId = 0;
let parent = null;
let level = 0;
let editData = {};
let editBtn = null;
let isEdit = false;
let itemHTML = document.getElementById('comment-item').outerHTML;
$(".comment-expand-icon").click(function () {
    $(this).parents('.parent').find('.children').toggle();
});

$(".reply-element").click(function () {
    parentId = $(this).data('id');
    parent = $(this).parents(".parent").eq(0);
    level = parseInt($(this).data("level"));
});

$("#header-add-comment-btn").click(function () {
    parentId = 0;
});

$(".edit-element").click(function () {
    isEdit = true;
    editData = $(this).data("data");
    editBtn = $(this);
    $("#username-input").val(editData.username);
    $("#comment-input").val(editData.text);
});


$("#add-comment-submit-btn").click(function () {
    const username = $("#username-input").val();
    const comment = $("#comment-input").val();
    const data = {
        username,
        comment,
        parentId
    };

    if (!isEdit) {
        $.ajax({
            url: "/api/comments",
            method: "POST",
            data,
            success: function (response) {
                if (response.success) {
                    $("#addComment").modal("hide");
                    let item;
                    if (parentId === 0) {
                        let wrapper = $(".comments-wrapper");
                        wrapper.append(itemHTML);
                        item = wrapper.find(".parent").last();
                    } else {
                        parent.children(".children").append(itemHTML);
                        parent.children(".main-content").find(".comment-expand-icon").show();
                        item = parent.children(".children").find("#comment-item");
                        item.css({
                            'padding-left': (level*30)+"px"
                        })
                    }


                    item.find("#username").text(username);
                    item.find("#comment").text(comment);
                    item.find("#add-comment-btn").data('id', response.item.id);
                    item.find("#edit-comment-btn").data('id', response.item.id);
                    item.find("#remove-comment-btn").data('id', response.item.id);

                    item.show();
                }
            }
        });
    } else {
        $.ajax({
            url: "/api/comments/"+editData.id,
            method: "PUT",
            data,
            success: function (response) {
                if (response.success) {
                    $("#addComment").modal("hide");
                    editBtn.attr("data-data", JSON.stringify(response.item));
                    let editParent = editBtn.parents(".main-content");
                    editParent.find(".comment-text").eq(0).text(response.item.text);
                    editParent.find("h4").eq(0).text(response.item.username);
                }

            }
        });
    }

});


$(".remove-element").click(function () {
    let id = $(this).data('id');
    let _this = $(this);

    $.ajax({
        url: "/api/comments/"+id,
        method: "DELETE",
        success: function (response) {
            if (response.success) {
                _this.parents(".parent").eq(0).remove();
            } else {
                alert(response.message);
            }
        }
    });
});

$('#addComment').on('hidden.bs.modal', function (event) {
    isEdit = false;
})
