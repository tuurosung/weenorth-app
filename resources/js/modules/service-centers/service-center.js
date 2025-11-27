export const ServiceCenter = {

    elements: {},

    constructor() {
        this.elements = {

        }
    },

    init() {
        this.bindEvents();
    },

    bindEvents() {
        $(document).on('click', '.table tbody .edit', this.handleEditClick.bind(this));
        $(document).on('click', '.table tbody .delete', this.handleDeleteClick.bind(this));
    },

    async handleEditClick(event) {
        event.preventDefault();

        try {
            const response = await $.get(
                $(event.currentTarget).data('url')
            );

            if (!response) {
                bootbox.alert('Error loading edit form');
                return;
            }

            $('#modal_holder').html(response);
            $('#editServiceCenterModal').modal('show');

        } catch (error) {

            console.error('Error retrieving URL for edit:', error);
            return;
        }
    },


    handleDeleteClick(event) {
        event.preventDefault();

        const $form = $(event.currentTarget).closest('form');

        bootbox.confirm("Are you sure you want to delete this service center?", function (answer) {
            if (answer) {
                $form.submit();
            }
        });
    }
}

$(document).ready(
    () => {
        ServiceCenter.init();
    }
)



// $(document).ready(function () {

//     $(document).on('click', '.table tbody .edit', function (event) {
//         event.preventDefault();
//         const url = $(this).data('url');

//         $.get(url)
//             .done(function (response) {
//                 $('#modal_holder').html(response)
//                 $('#editServiceCenterModal').modal('show');
//             })
//             .fail(function () {
//                 bootbox.alert('Error loading edit form');
//             });
//     });


//     $(document).on('click', '.table tbody .delete', function (event) {
//         event.preventDefault()

//         const $form = $(this).closest('form')

//         bootbox.confirm("Are you sure you want to delete this service center?", function (answer) {
//             if (answer) {
//                 $form.submit()
//             }
//         })
//     })
// });
