export const HandleShowRegions = {

    config: {

    },

    'elements': {},

    init: function () {
        this.cachedElements();
        this.bindEvents();
    },

    cachedElements: function () {
        this.elements = {
            $makeRegionalExecutiveButton: $('.make-regional-executive'),
            $modalHolder: $('#modal_holder'),
        }
    },


    bindEvents: function () {
        $(document).on('click', '.table tbody .make-regional-executive', this.handleMakeRegionalExecutiveButtonClick.bind(this));
    },


    async handleMakeRegionalExecutiveButtonClick(event) {
        event.preventDefault();
        console.log('Make Regional Executive button clicked');

        const $url = $(event.currentTarget).data('url');
        const $region_id = $(event.currentTarget).data('region_id');
        const $weenorth_id = $(event.currentTarget).data('weenorth_id');

        const response = await $.get($url, {
                region_id: $region_id,
                weenorth_id: $weenorth_id
            },
        );

        console.log('Modal content loaded:', response);

        $('#modal_holder').html(response);
        $('#makeRegionalExecutiveModal').modal('show');
    },

}


$(document).ready(() => {
    HandleShowRegions.init();
})
