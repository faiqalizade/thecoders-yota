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
    methods: {
        updateItems: function (items) {
            this.items = {...items};
        },

        clearData: function () {
            this.parentId = 0;
            this.isEdit = false;
            this.username = null;
            this.comment = null;
        },

        sendComment: function () {
            const username = this.username;
            const comment = this.comment;
            const data = {
                username,
                comment,
                parentId: this.parentId
            };

            let url = this.isEdit ? "/api/comments/" + this.editId : "/api/comments";
            axios({
                method: this.isEdit ? 'PUT' : 'POST',
                url,
                data
            }).then(response => {
                if (response.data.success) {
                    this.updateItems(response.data.items);
                    this.clearData();
                }
            });
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
