@extends('admin.layouts.app')
@section('title')
    All Brand
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush

@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4> All Brand <span><a href="{{ route('brand.create') }}" class="btn btn-primary right">Add
                                    Brand</a></span> </h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="select-all" class="custom-design">
                                    </th>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Brand Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="sortable-list">
                                @forelse ($brands as $key => $brand)
                                    <tr id="row-{{ $brand->id }}" data-id="{{ $brand->id }}">

                                        <td>
                                            <input type="checkbox" class="form-check-input custom-design row-checkbox"
                                                value="{{ $brand->id }}">
                                        </td>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td><img src="{{ asset($brand->image) }}" alt="Brand Image" width="40"></td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                            <button data-id="{{ $brand->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $brand->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $brand->is_active ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning"> <i
                                                    class="material-icons text-white">edit</i></a>
                                            <form class="d-inline-block" action="{{ route('brand.destroy', $brand->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-raised bg-pink waves-effect show_confirm"> <i
                                                        class="material-icons">delete</i> </button>
                                            </form>
                                        </td>

                                    <tr>
                                    @empty
                                    <tr>
                                        Brand Not Found! :) Please Add brand. Thank you
                                    </tr>
                                @endforelse

                                <tr>
                                    <button id="bulk-delete" class="btn btn-danger mb-3">Delete Selected</button>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.row-checkbox');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(cb => cb.checked = selectAll.checked);
            });
        });
    </script>


<script>
    $(document).ready(function () {
        $("#sortable-list").sortable({
            placeholder: "ui-state-highlight",
            axis: "y",
            update: function (event, ui) {
                var order = [];

                $("#sortable-list tr").each(function () {
                    order.push($(this).data('id')); // ✅ এখন এটি <tr data-id="..."> থেকে আইডি নিচ্ছে
                });

                console.log(order); // Debug: দেখুন array তৈরি হচ্ছে কিনা

                $.ajax({
                    url: "{{ route('brand.updateOrder') }}",
                    type: "POST",
                    data: {
                        order: order,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        toastr.success(response.message);
                    },
                    error: function (xhr) {
                        toastr.error(response.message || 'Something went wrong.');
                    }
                });
            }
        });
    });
</script>


    <script>
        $('#bulk-delete').on('click', function() {
            const selectedIds = [];
            $('.row-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                toastr.error('Please select at least one category.');
                return;
            }

            if (confirm('Are you sure you want to delete selected categories?')) {
                $.ajax({
                    url: "{{ route('brand.bulkDelete') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selectedIds
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);

                            // Remove deleted rows from DOM
                            selectedIds.forEach(function(id) {
                                $('#row-' + id).remove();
                            });
                        } else {
                            toastr.error(response.message || 'Something went wrong.');
                        }
                    }
                });
            }
        });
    </script>


    <script>
        const brandStatusRoute = "{{ route('brand.status') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('backend') }}/assets/js/brand.js"></script>
@endpush
