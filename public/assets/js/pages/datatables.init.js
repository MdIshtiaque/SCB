$(document).ready(function () {
    $("#datatable").DataTable();
    $("#datatable-buttons").DataTable({
        dom: '<"top"Bf>rt<"bottom"il><"right"p><"clear">',
        lengthChange: true, // Enable the length menu
        buttons: ["copy", "excel", "pdf"],
        paging: true,
        pageLength: 10, // Default number of items per page
        lengthMenu: [10, 30, 50, 100, 150] // Options for items per page
    }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
    $(".dataTables_length select").addClass("form-select form-select-sm");
});
