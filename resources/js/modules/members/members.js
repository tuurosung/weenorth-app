import { InitializeDatatables } from "../plugins/InitializeDatatables";
import { InitializeDatepickers } from "../plugins/InitializeDatepicker";
import { InitializeSelect2 } from "../plugins/InitializeSelect2";
import { HandleRegionChange } from "../plugins/HandleRegionChange";

export const HandleMembers = {

    config: {},

    selectors: {},

    constructor() {
        this.selectors = {

            $editMemberButton: '.table tbody .edit',
            $searchTermInput: '#searchTermInput',
            $filterByRegion: '#filterByRegion',
            $filterByDistrict: '#filterByDistrict',
            $filterByTrade: '#filterByTrade',
            $filterMembersForm: '#filterMembersForm'

        }
    },

    init() {
        this.constructor();
        this.bindEvents();
    },

    bindEvents() {
        $(document).on('click', this.selectors.$editMemberButton, this.editMemberModal.bind(this));

        $(document).on('input', `${this.selectors.$searchTermInput}`, this.filterMembers.bind(this));
        $(document).on('change', `${this.selectors.$filterByRegion}, ${this.selectors.$filterByDistrict}, ${this.selectors.$filterByTrade}`, this.filterMembers.bind(this));
    },

    async editMemberModal(event) {
        event.preventDefault();

        try {

            console.log('Fetching edit member modal from URL:', $(event.currentTarget).data('url'));

            const response = await $.get(
                $(event.currentTarget).data('url')
            );

            console.log(response);

            $('#modal_holder').html(response);
            $('#editMemberModal').modal('show');

            InitializeSelect2.init();
            InitializeDatepickers.init();

        } catch (error) {
            console.error('Error fetching edit member modal:', error);
        }
    },

    async filterMembers() {
        try {

            const $url = $(this.selectors.$filterMembersForm).attr('action');

            if (!$url) {
                console.error('The filter form URL is not defined.');
                return;
            }

            const searchTerm = $(this.selectors.$searchTermInput).val();
            const regionId = $(this.selectors.$filterByRegion).val();
            const districtId = $(this.selectors.$filterByDistrict).val();
            const tradeId = $(this.selectors.$filterByTrade).val();

            const response = await $.get($url, {
                searchTerm: searchTerm,
                regionId: regionId,
                districtId: districtId,
                tradeId: tradeId
            });

            $('#data_holder').html(response);
            InitializeDatatables.init();

        } catch (error) {
            console.error('Error filtering members:', error);
        }
    }

}


$(document).ready(() => {
    HandleMembers.init();
});
