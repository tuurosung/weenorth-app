/**
 * Handles cascading dropdown changes for Region -> District -> Service Center
 */
export const HandleRegionChange = {

    /**
     * CSS selectors configuration
     */
    config: {
        selectors: {
            region: '.region-select',
            district: '.district-select',
            serviceCenter: '.service-center-select',
        },
        placeholders: {
            district: 'Select District',
            serviceCenter: 'Select Service Center',
        },
    },

    /**
     * Initialize the module
     */
    init() {
        this.bindEvents();
    },

    /**
     * Bind change events to select elements
     */
    bindEvents() {
        $(document).on('change', this.config.selectors.region, this.onRegionChange.bind(this));
        $(document).on('change', this.config.selectors.district, this.onDistrictChange.bind(this));
    },

    /**
     * Handle region select change event
     * @param {Event} event - The change event
     */
    async onRegionChange(event) {
        event.preventDefault();

        const $target = $(event.currentTarget);
        const regionId = $target.val();
        const $districtSelect = $target.closest('form').find(this.config.selectors.district);
        const $serviceCenterSelect = $target.closest('form').find(this.config.selectors.serviceCenter);

        if (!regionId) {
            this.resetSelect($districtSelect, this.config.placeholders.district);
            this.resetSelect($serviceCenterSelect, this.config.placeholders.serviceCenter);
            return;
        }

        this.showLoading($districtSelect);

        try {
            const districts = await this.fetchDistricts(regionId);
            this.populateSelect($districtSelect, districts, 'district_name', this.config.placeholders.district);
            this.resetSelect($serviceCenterSelect, this.config.placeholders.serviceCenter);
        } catch (error) {
            console.error('Error fetching districts:', error);
            this.showError($districtSelect, 'Failed to load districts');
        }
    },

    /**
     * Handle district select change event
     * @param {Event} event - The change event
     */
    async onDistrictChange(event) {
        event.preventDefault();

        const $target = $(event.currentTarget);
        const districtId = $target.val();
        const $serviceCenterSelect = $target.closest('form').find(this.config.selectors.serviceCenter);

        if (!districtId) {
            this.resetSelect($serviceCenterSelect, this.config.placeholders.serviceCenter);
            return;
        }

        this.showLoading($serviceCenterSelect);

        try {

            const serviceCenters = await this.fetchServiceCenters(districtId);
            this.populateSelect($serviceCenterSelect, serviceCenters, 'location', this.config.placeholders.serviceCenter);

        } catch (error) {

            console.error('Error fetching service centers:', error);
            this.showError($serviceCenterSelect, 'Failed to load service centers');
        }
    },

    /**
     * Fetch districts by region ID
     * @param {string|number} regionId - The region ID
     * @returns {Promise<Array>} Array of districts
     */
    async fetchDistricts(regionId) {
        const response = await $.get(window.routes.filterDistrictsByRegionId, { regionId });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Failed to fetch districts');
        }

        return response.districts;
    },

    /**
     * Fetch service centers by district ID
     * @param {string|number} districtId - The district ID
     * @returns {Promise<Array>} Array of service centers
     */
    async fetchServiceCenters(districtId) {
        const response = await $.get(window.routes.filterServiceCentersByDistrictId, { districtId });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Failed to fetch service centers');
        }

        console.log('Retrieved ' + (response.service_centers ? response.service_centers.length : 0) + ' service centers for District ID: ' + districtId);

        return response.service_centers;
    },

    /**
     * Populate select element with options
     * @param {jQuery} $select - The select element
     * @param {Array} items - Array of items to populate
     * @param {string} nameField - The field name to use for display text
     * @param {string} placeholder - Placeholder text for default option
     */
    populateSelect($select, items, nameField, placeholder) {
        const options = items.map(item =>
            `<option value="${item.id}">${item[nameField]}</option>`
        ).join('');

        $select.html(`<option value="">${placeholder}</option>${options}`).prop('disabled', false);
    },

    /**
     * Reset select element to default state
     * @param {jQuery} $select - The select element
     * @param {string} placeholder - Placeholder text
     */
    resetSelect($select, placeholder) {
        $select.html(`<option value="">${placeholder}</option>`).prop('disabled', false);
    },

    /**
     * Show loading state on select element
     * @param {jQuery} $select - The select element
     */
    showLoading($select) {
        $select.html('<option value="">Loading...</option>').prop('disabled', true);
    },

    /**
     * Show error state on select element
     * @param {jQuery} $select - The select element
     * @param {string} message - Error message
     */
    showError($select, message) {
        $select.html(`<option value="">${message}</option>`).prop('disabled', false);
    },
};

// Auto-initialize on DOM ready
$(document).ready(() => {
    HandleRegionChange.init();
});
