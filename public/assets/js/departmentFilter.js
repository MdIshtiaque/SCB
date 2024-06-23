$(document).ready(function () {
    var table = $('#datatable-buttons').DataTable(); // adjust the ID to your table ID

    // Event listener to the Department search box
    $('#departmentSearch').on('change', function () {
        var columnIndex = $(this).data('column');
        table.column(columnIndex).search(this.value).draw(); // Assuming 'Department' is the second column (index 1)
    });
});
