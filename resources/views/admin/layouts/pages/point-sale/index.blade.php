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
                        <table class="table table-bordered table-striped dataTable table-hover js-basic-example">
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
                            <tbody>
                                @foreach ($pointSales as $key => $sale)
                                    @php $totalAmount += $sale->amount; @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sale->user->name ?? 'N/A' }}</td>
                                        <td>{{ number_format($sale->amount, 2) }}</td>
                                        <td>{{ $sale->points }}</td>
                                        <td>{{ $sale->admin->name ?? 'System' }}</td>
                                        <td>{{ $sale->created_at->format('d M Y') }}</td>
                                        <td>

                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm editDistrict">
                                                <i class="material-icons text-white">edit</i>
                                            </a>
                                            <!-- Edit or Delete (optional) -->
                                            <form action="" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm show_confirm" type="submit"><i
                                                        class="material-icons">delete</i></button>
                                            </form>
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

                    <!-- Edit Modal (if needed) -->
                    {{-- @include('admin.layouts.pages.point-sale.edit') --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>

    
@endpush
