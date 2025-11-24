const HandleUsers =  {

    config: {

    },


    'elements': {},

    init() {
        this.cachedElements();
        this.bindEvents();
    },

    cachedElements() {
        this.elements = {
            $editUserButton: $('.edit-user-button'),
            $deleteUserButton: $('.delete-user-button'),
            $modalHolder: $('#modal_holder'),
            $editUserModal: $('#editUserModal')
        }
    },


    bindEvents() {
        this.elements.$editUserButton.on('click', this.handleEditUserButtonClick.bind(this));
        this.elements.$deleteUserButton.on('click', this.handleDeleteUserButtonClick.bind(this));
    },


    /**
     * Handles the edit user button click event
     *
     * @param {Event} event - The event object
     *
     * @returns {Promise<void>} - A promise that resolves when the edit user form has been fetched and shown
     *
     * @throws {Error} - If there is an error fetching the edit user form
     */
    async handleEditUserButtonClick(event) {
        try {
            const editUrl = $(event.currentTarget).data('edit-url');
            const response = await $.get(editUrl);
            this.showEditUserModal(response);
        } catch (error) {
            console.error('Error fetching edit user form:', error);
        }
    },


    /**
     * Handle the delete user button click event
     *
     * @param {Event} event - The event object
     *
     * @returns {void}
     */
    handleDeleteUserButtonClick(event) {
        event.preventDefault();

        const $form = $(event.currentTarget).closest('form');

        bootbox.confirm('Are you sure you want to delete this user?', function (result) {
            if (result) {
                $form.submit();
            }
        });

    },


    /**
     * Show the edit user modal based on the response
     *
     * @param {string} response - The HTML response from the server
     *
     * @returns {void}
     */
    showEditUserModal(response) {
        this.elements.$modalHolder.html(response);
        $('#editUserModal').modal('show');
    }
}

$(document).ready(() => HandleUsers.init());
