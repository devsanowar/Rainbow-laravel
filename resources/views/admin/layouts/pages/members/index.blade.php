@extends('admin.layouts.app')
@section('title', 'Members')
@push('styles')

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />


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
                        All District
                        <span>
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-warning text-white text-uppercase text-bold right" data-toggle="modal" data-target="#addDistrictModal">
                                + Add New
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="body">
                    <table id="membersDataTable" class="table table-bordered table-striped table-hover dataTable js-exportable" >
                        <thead>
                            <tr>
                                <th style="width: 60px">S/N</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Upazila</th>
                                <th>Union</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($members as $key=>$member)
                                 <td>{{ $key+1 }}</td>
                                <td>{{ $member->name ? : 'N\A'}}</td>                         
                                <td>{{ $member->member_username ? : 'N\A' }}</td>                         
                                <td>{{ $member->phone ? : 'N\A'}}</td>                      
                                <td>{{ $member->position ? : 'N\A'}}</td>                      
                                <td>{{ $member->division->name ? : 'N\A'}}</td>                      
                                <td>{{ $member->district->district_name ? : 'N\A'}}</td>                      
                                <td>{{ $member->upazila->upazila_name ? : 'N\A'}}</td>                      
                                <td>{{ $member->union->name ? : 'N\A'}}</td>                      
                                <td>
                                    <form class="d-inline-block" action="{{ route('member.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

<!-- Jquery DataTable Plugin Js -->

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

<script>
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


// Pagelength override scripts

$.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });

    $(document).ready(function() {
        $('#membersDataTable').DataTable();
    });

</script>

@endpush
