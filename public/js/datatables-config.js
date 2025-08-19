let table = new DataTable('.datatables', {
    pageLength: 25,
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
