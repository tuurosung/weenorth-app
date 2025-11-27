export const HandleRegionChange = {

    config: {},

    init() {
        this.bindEvents();
    },


    bindEvents() {
        $(document).on('change', '.region-select', this.onRegionChange.bind(this));
        $(document).on('change', '.district-select', this.onDistrictChange.bind(this));
    },


    async onRegionChange(event) {
        event.preventDefault();

        try {

            const $regionId = $(event.currentTarget).val();
            const $districtSelect = $(event.currentTarget).closest('form').find('.district-select');

            if (!$regionId) return;

            const response = await $.get(
                window.routes.filterDistrictsByRegionId,
                {
                    regionId: $regionId
                }
            );

            if (response.status === 'success') {

                let $districts = response.districts;
                let $options = '<option value="">Select District</option>';
                $districtSelect.empty();

                $.each($districts, function(key, value) {
                    $options +=
                        `<option value="${value.id}">${value.district_name}</option>`;
                });

                $districtSelect.html($options);
            } else {
                console.error('Error fetching districts:', response.message);
            }

        } catch (error) {
            console.error('Error fetching districts:', error);
        }
    },


    onDistrictChange(newDistrict) {

    }
}


$(document).ready(
    () => {
        HandleRegionChange.init();
    }
)
