
// Custom print and number filter option

    $(document).ready(function () {
        if ($.fn.DataTable.isDataTable('#pointSaleDataTable')) {
            $('#pointSaleDataTable').DataTable().destroy();
        }

        $('#pointSaleDataTable').DataTable({
            dom: '<"top-controls"<"dataTables_length"l><"dt-buttons"B><"dataTables_filter"f>>tip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            // dom: 'Blfrtip', // note: 'l' = length menu
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            pageLength: 20,
            lengthMenu: [[20, 50, 100, 250, 500, -1], [20, 50, 100, 250, 500, "All"]]
        });
    });

