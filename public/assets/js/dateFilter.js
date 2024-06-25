$(document).ready(function() {
    var table = $('#datatable-buttons').DataTable();
    $('#loadingIndicator').hide();
    var loaderTimeout; // To store timeout reference
    // Show loader when drawing starts
    table.on('preDraw', function() {
        $('#loadingIndicator').show();
        // Clear any existing timeout to prevent multiple triggers
        clearTimeout(loaderTimeout);
    });
    // Hide loader when drawing is complete
    table.on('draw', function() {
        // Set timeout to hide the loader after 1 second
        loaderTimeout = setTimeout(function() {
            $('#loadingIndicator').hide();
        }, 200); // 1000 milliseconds equals 1 second
    });
    // Custom filter for date range
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#minDate').val();
            var max = $('#maxDate').val();
            var minDateColumnIndex = parseInt($('#minDate').attr('data-column'), 10);
            var maxDateColumnIndex = parseInt($('#maxDate').attr('data-column'), 10);

            // Ensure we use the same column for both min and max date inputs
            var columnIndex = minDateColumnIndex; // Assuming both dates are in the same column

            var date = new Date(data[columnIndex].split('-').reverse().join('-')); // Convert dd-mm-yyyy to yyyy-mm-dd

            // Extend the 'max' date to the end of the day
            var startDate = min ? new Date(min) : null;
            if (startDate) {
                startDate.setHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to 0
            }
            var endDate = max ? new Date(max) : null;
            if (endDate) {
                endDate.setDate(endDate.getDate() + 1);
                endDate.setSeconds(endDate.getSeconds() - 1);
            }

            if (
                (!startDate && !endDate) ||
                (!startDate && date <= endDate) ||
                (startDate <= date && !endDate) ||
                (startDate <= date && date <= endDate)
            ) {
                return true;
            }
            return false;
        }
    );

    // Event listener for date range search
    $('#minDate, #maxDate').change(function() {
        table.draw();
    });

    // Make table variable accessible globally
    window.table = table;
});
