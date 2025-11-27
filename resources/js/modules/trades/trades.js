export const HandleTrades = {

    elements: {},

    init(){
        this.bindEvents();
    },

    bindEvents()
    {
        $(document).on('click', '.table tbody .edit', this.handleEditBtnClick.bind(this));
        $(document).on('click', '.table tbody .delete', this.handleDeleteBtnClick.bind(this));
    },

    async handleEditBtnClick(event) {
        event.preventDefault();

        try {

            const response = await $.get(
                $(event.currentTarget).data('url')
            );

            if (!response) return;

            $('#modal_holder').html(response)
            $('#editTradeModal').modal('show');

        } catch (error) {
            console.error('Error fetching trade data:', error);
        }
    },


    handleDeleteBtnClick(event) {
        event.preventDefault();

        const $form = $(event.currentTarget).closest('form');

        bootbox.confirm("Are you sure you want to delete this trade?", function(response) {
            if (response) {
                $form.submit();
            }
        });
    }

}


$(document).ready(function() {
    HandleTrades.init();
});
