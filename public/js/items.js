export default {
    props: {
        items: Object,
        level: {
            type: Number,
            default: 0
        },
    },
    data: () => ({
        showChild: false
    }),
    methods: {
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
    <template v-for="item in items">
        <div class="parent" :style="{paddingLeft: (level * 30) + 'px'}">
            <Item
            @set-modal-data="setModalData"
            @update-items="updateItems"
            @set-parent-id="setParentId"
            :item="item"
            :level="level"
            />
        </div>
    </template>
`
}
