export const HandleShowDistricts = {

    config: {},

    'elements': {},

    init: function () {
        this.cachedElements();
        this.bindEvents();
    },

    cachedElements: function () {
        this.elements = {
            $makeDistrictExecutiveButton: $('.make-district-executive'),
            $modalHolder: $('#modal_holder'),
        }
    },


    bindEvents: function () {
        $(document).on('click', '.table tbody .make-district-executive', this.handleMakeDistrictExecutiveButtonClick.bind(this));
    },


    async handleMakeDistrictExecutiveButtonClick(event) {
        event.preventDefault();
        console.log('Make District Executive button clicked');

        const $url = $(event.currentTarget).data('url');
        const $district_id = $(event.currentTarget).data('district_id');
        const $weenorth_id = $(event.currentTarget).data('weenorth_id');

        const response = await $.get($url, {
                district_id: $district_id,
                weenorth_id: $weenorth_id
            },
        );

        console.log('Modal content loaded:', response);

        $('#modal_holder').html(response);
        $('#makeDistrictExecutiveModal').modal('show');
    },

}


$(document).ready(() => {
    HandleShowDistricts.init();
})
