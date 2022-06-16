const { createApp } = Vue
import Items from './items.js';
import Item from "./item.js";

createApp({
    data: () => ({
        items: {},
        parentId: null,
        username: null,
        comment: null,
        isEdit: false,
        editId: null,
    }),

    created: function () {
        this.items = {...window.commentItems};
    },

    mounted: function () {
        $("#add-comment-submit-btn").click(() => {
            const username = this.username;
            const comment = this.comment;
            const data = {
                username,
                comment,
                parentId: this.parentId
            };

            if (!this.isEdit) {
                $.ajax({
                    url: "/api/comments",
                    method: "POST",
                    data,
                    success: (response) => {
                        $("#addComment").modal("hide");
                        if (response.success) {
                            this.items = {...response.items};
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "/api/comments/" + this.editId,
                    method: "PUT",
                    data,
                    success: (response) => {
                        $("#addComment").modal("hide");
                        if (response.success) {
                            this.items = {...response.items};
                        }
                    }
                });
            }
        });

        $('#addComment').on('hidden.bs.modal', (event) => {
            this.parentId = 0;
            this.isEdit = false;
            this.username = null;
            this.comment = null;
        });
    },
    methods: {
        updateItems: function (items) {
            this.items = {...items};
        },

        setParentId: function (id) {
            this.parentId = id;
        },

        setModalData: function (data) {
            this.isEdit = true;
            this.editId = data.id
            this.username = data.username;
            this.comment = data.text;
        }
    }
}).component("Items", Items)
    .component('Item', Item)
    .mount('#app')
