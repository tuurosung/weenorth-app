import DataTable from 'datatables.net-bs5'
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css'
import bootstrap from 'bootstrap'
import $ from 'jquery'
import bootbox from 'bootbox'

// Make jQuery globally available
window.$ = window.jQuery = $;

// Initialize DataTables on page load

let table = new DataTable('.datatables', {
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100],
    responsive: true,
    language: {
        search: "Search:",
        lengthMenu: "Show _MENU_ entries",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        paginate: {
            first: "First",
            last: "Last",
            next: "Next",
            previous: "Previous"
        }
    }
});

// Make bootbox globally available
window.bootbox = bootbox;
