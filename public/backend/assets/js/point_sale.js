
$('.show_confirm').click(function(event){
    let form = $(this).closest('form');
    event.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });

});

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

