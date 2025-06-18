@extends('admin.layouts.app')
@section('title', 'All Point Sales')

@push('styles')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- pdfmake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <style>
        .form-line.case-input {
            border: 1px solid #8a8a8a;
        }

        .input-group .input-group-addon {
            padding-left: 10px;
        }
    </style>
@endpush

@section('admin_content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            All Point Sales
                            <button type="button" class="btn btn-warning text-white right" data-toggle="modal"
                                data-target="#addPointSaleModal">
                                + Add New
                            </button>
                        </h4>
                    </div>
                    <div class="body">
                        @php
                            $totalAmount = 0;
                        @endphp
                        {{-- <table id="pointSaleDataTable" class="table table-bordered table-striped dataTable table-hover js-basic-example display nowrap" style="width:100%"> --}}
                        <table id="pointSaleDataTable" class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Member Name</th>
                                    <th>Amount (৳)</th>
                                    <th>Points</th>
                                    <th>Admin</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="salesTable">
                                @foreach ($pointSales as $key => $sale)
                                    @php $totalAmount += $sale->amount; @endphp
                                    <tr id="sale-row-{{ $sale->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sale->user->name ?? 'N/A' }}</td>
                                        <td>{{ number_format($sale->amount, 2) }}</td>
                                        <td>{{ $sale->points }}</td>
                                        <td>{{ $sale->admin->name ?? 'System' }}</td>
                                        <td>{{ $sale->created_at->format('d M Y') }}</td>
                                        <td>

                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editPointSale"
                                                data-id="{{ $sale->id }}" data-user-id="{{ $sale->user_id }}"
                                                data-user-name="{{ $sale->user->name ?? 'N/A' }}"
                                                data-amount="{{ $sale->amount }}" data-points="{{ $sale->points }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>

                                            <!-- Edit or Delete (optional) -->
                                            <button class="btn btn-danger btn-sm deletePointSale" data-id="{{ $sale->id }}">
                                                <i class="material-icons">delete</i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>{{ number_format($totalAmount, 2) }} TK</th>
                                    <th colspan="3"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Modal -->
                    @include('admin.layouts.pages.point-sale.create')
                    @include('admin.layouts.pages.point-sale.edit')

                    <!-- Edit Modal (if needed) -->
                    {{-- @include('admin.layouts.pages.point-sale.edit') --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>

    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>

    <!-- JSZip (for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- pdfmake (for PDF export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>



    <script src="{{ asset('backend') }}/assets/js/point_sale.js"></script>

    <script>
        $(document).on('click', '.deletePointSale', function () {
            let id = $(this).data('id');
            let url = `/admin/point-sale/delete/${id}`;

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function (response) {
                        toastr.success(response.message || "Deleted successfully");
                        $(`#sale-row-${id}`).remove();
                    },
                    error: function (xhr) {
                        toastr.error("Something went wrong!");
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>

    <!-- add script code -->
    <script>
        $(document).ready(function() {
            $('#pointSaleForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('point_sale.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log("Response:", response); // debug করার জন্য

                        $('#addPointSaleModal').modal('hide');
                        $('#pointSaleForm')[0].reset();

                        // ✅ সার্ভার থেকে আসা মেসেজ ব্যবহার করুন
                        toastr.success(response.message);

                        let newRow = `
                            <tr id="sale-row-${response.id}">
                                <td>${response.index}</td>
                                <td>${response.user_name}</td>
                                <td>${response.amount}</td>
                                <td>${response.points}</td>
                                <td>${response.admin_name}</td>
                                <td>${response.created_at}</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm editPointSale"
                                        data-id="${response.id}" data-user-id="${response.user_id}"
                                        data-user-name="${response.user_name}" data-amount="${response.amount}"
                                        data-points="${response.points}">
                                        <i class="material-icons text-white">edit</i>
                                    </a>
                                    <button class="btn btn-danger btn-sm deletePointSale" data-id="${response.id}">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        `;
                        $('tbody').prepend(newRow); // ✅ এখন এটি উপরে বসবে
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value + '<br>';
                        });
                        toastr.error(errorMessages);
                    }

                });
            });
        });
    </script>


    <!-- Edit script code -->
    <script>
        $(document).on('click', '.editPointSale', function() {
            let button = $(this);

            let saleId = button.data('id');
            let userId = button.data('user-id');
            let amount = button.data('amount');
            let points = button.data('points');

            // ইনপুট ফিল্ডে ভ্যালু সেট
            $('#sale_id').val(saleId);
            $('#edit_amount').val(amount);
            $('#edit_points').val(points);

            // সিলেক্ট বক্সে ইউজার আইডি সেট করে ট্রিগার করা হচ্ছে
            $('#edit_user_id').val(userId).trigger('change');

            // মডাল শো
            $('#editSaleModal').modal('show');
        });
    </script>


    <!-- Update script code -->
    <script>
        $('#updateSaleForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: '{{ route('point-sale.update') }}', // 🔁 আপনার রাউট চেক করুন
                method: 'POST',
                data: formData,
                success: function(response) {
                    $('#editSaleModal').modal('hide');
                    $('#updateSaleForm')[0].reset();

                    // ✅ toastr success message
                    toastr.success('Sale updated successfully');

                    // ✅ Updated row HTML including index
                    let updatedRow = `
                    <td>${response.index}</td>
                    <td>${response.user_name}</td>
                    <td>${parseFloat(response.amount).toFixed(2)}</td>
                    <td>${response.points}</td>
                    <td>${response.admin_name}</td>
                    <td>${response.created_at}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-warning btn-sm editPointSale"
                            data-id="${response.id}" data-user-id="${response.user_id}"
                            data-user-name="${response.user_name}" data-amount="${response.amount}"
                            data-points="${response.points}">
                            <i class="material-icons text-white">edit</i>
                        </a>
                        <button class="btn btn-danger btn-sm deletePointSale" data-id="${response.id}">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>`;

                    $('#sale-row-' + response.id).html(updatedRow);
                },
                error: function(xhr) {
                    toastr.success('Sale updated successfully');
                }
            });
        });
    </script>
@endpush
