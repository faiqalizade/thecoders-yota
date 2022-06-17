export default {
    props: {
        item: Object,
        level: {
            type: Number,
            default: 0
        },
    },
    data: () => ({
        showChild: false
    }),
    methods: {
        deleteItem: function (id) {
            axios.delete("/api/comments/" + id).then(response => {
                if (response.data.success) {
                    this.updateItems(response.data.items)
                } else {
                    alert(response.data.message);
                }
            })
        },
        updateItems: function (items) {
            this.$emit('updateItems', items);
        },

        setParentId: function (id) {
            this.$emit('setParentId', id);
        },

        setModalData: function (data) {
            this.$emit('setModalData', {...data});
        }
    },
    template: `
    <div>
        <div class="main-content" style="padding: 10px 0;">
        <div class="comment-main-content-wrapper">
            <h4>{{item.username}}</h4>
            <div class="comment-wrapper d-flex align-items-start">
                <div v-if="item.children !== undefined" @click="showChild = !showChild" class="comment-expand-icon mr-2">
                    <i v-if="!showChild" class="bi bi-plus-square-fill"></i>
                    <i v-else class="bi bi-dash"></i>
                </div>
                <div class="comment-text">
                    {{item.text}}
                </div>
            </div>
        </div>
        <div class="buttons-wrapper">
            <div @click="setParentId(item.id)" data-toggle="modal" data-target="#addComment"
                 class="reply-element btn btn-primary mr-3">
                Reply
            </div>
            <div @click="setModalData(item)" data-toggle="modal" data-target="#addComment"
                 class="edit-element btn btn-primary mr-3">
                Edit
            </div>

            <div :data-id="item.id"
                @click="deleteItem(item.id)"
                 class="remove-element btn btn-danger">
                Remove
            </div>
        </div>
        </div>
        <div v-if="item.children !== undefined && showChild">
            <Items
            @set-modal-data="setModalData"
            @update-items="updateItems"
            @set-parent-id="setParentId"
            :items="{...item.children}" :level="(level + 1)" />
        </div>
    </div>
    `
}
