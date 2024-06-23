$(document).ready(function () {
    var table = $('#datatable-buttons').DataTable(); // adjust the ID to your table ID

    // Event listener to the Department search box
    $('#districtSearch').on('change',function () {
        var columnIndex = $(this).data('column');
        table.column(columnIndex).search(this.value).draw(); // Adjust the index if necessary
    });
});
