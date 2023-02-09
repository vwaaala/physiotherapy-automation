@extends('layouts.master')
@section('header')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/dataTables.bootstrap4.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<title>Physiopoint - Users</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Search Filter -->
<div class="row filter-row">
    <div class="col-sm-6 col-md-3">  
        <div class="form-group form-focus">
            <input type="text" class="form-control floating">
            <label class="focus-label">User Email</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">  
        <div class="form-group form-focus">
            <input type="text" class="form-control floating">
            <label class="focus-label">User Name</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3"> 
        <div class="form-group form-focus select-focus">
            <select class="select floating  @error('roles') is-invalid @enderror" name="role" id="role_name"> 
                <option selected disabled>Select</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <label class="focus-label">User Role</label>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">  
        <a href="#" class="btn btn-success btn-block"> Search </a>  
    </div>     
</div>
<!-- /Search Filter -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="user-table" class="table table-striped custom-table datatable" >
                <thead>
                    <tr>
                        <th class="text-right no-sort">Action</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th class="text-nowrap">Join Date</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user )
                    <tr>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$user->id.'" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                    <a class="dropdown-item userDelete" href="#" data-toggle="modal" data-id="'.$user->id.'" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td class="id">{{ $user->id }}</td>
                        <td>
                            <span hidden class="image">{{ $user->avatar}}</span>
                            <!-- {{ url('employee/profile/'.$user->id) }} -->
                            <h2 class="table-avatar">
                                <a href="#" class="avatar"><img src="{{ URL::to('/admin/assets/images/avatar/'. $user->avatar) }}" alt="{{ $user->avatar }}"></a>
                                <a href="#" class="name">{{ $user->name }}</span></a>
                            </h2>
                        </td>
                        <td class="email">{{ $user->email }}</td>
                        <td class="phone_number">{{ $user->phone_number }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if ($user->role =='Super Admin')
                                <span class="badge bg-inverse-danger role">{{ $user->role }}</span>
                                @elseif ($user->role =='admin')
                                <span class="badge bg-inverse-warning role">{{ $user->role }}</span>
                                @elseif ($user->role =='doctor')
                                <span class="badge bg-inverse-primary role">{{ $user->role }}</span>
                                @elseif ($user->role =='normal user')
                                <span class="badge bg-inverse-info role">{{ $user->role }}</span>
                                @elseif ($user->role =='patient')
                                <span class="badge bg-inverse-success role">{{ $user->role }}</span>
                                @elseif ($user->role =='employee')
                                <span class="badge bg-inverse-dark role">{{ $user->role }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown action-label">
                                @if ($user->status=='Active')
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-success"></i>
                                        <span class="statuss">{{ $user->status }}</span>
                                    </a>
                                    @elseif ($user->status=='Inactive')
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-info"></i>
                                        <span class="statuss">{{ $user->status }}</span>
                                    </a>
                                    @elseif ($user->status=='Disable')
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                        <span class="statuss">{{ $user->status }}</span>
                                    </a>
                                    @elseif ($user->status=='')
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-dark"></i>
                                        <span class="statuss">N/A</span>
                                    </a>
                                @endif
                                
                            </div>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <div class="user-info"></div>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('admin.users.delete-user')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="e_id" value="">
                        <input type="hidden" name="avatar" class="e_avatar" value="">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.user.includes.add_user')
@include('admin.user.includes.edit_user')
<!-- @include('admin.user.includes.delete_user') -->
@endsection

@section('js')
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{ URL::to('admin/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Datatable initiate -->
<script>
    $(document).ready(function () {
        $('#user-table').DataTable();
        $.dobPicker({
            daySelector:'#dobday',
            monthSelector:'#dobmonth',
            yearSelector:'#dobyear',
        });
    });
</script>

<!-- Update modal -->
<script>
    $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_image').val(_this.find('.image').text());

            
        });
</script>
{{-- delete js --}}
<script>
    var name_role = (_this.find(".role").text());
    var _option = '<option selected value="' + name_role+ '">' + _this.find('.role').text() + '</option>'
    $( _option).appendTo("#e_role_name");

    var statuss = (_this.find(".statuss").text());
    var _option = '<option selected value="' +statuss+ '">' + _this.find('.statuss').text() + '</option>'
    $( _option).appendTo("#e_status");
    
    $(document).on('click','.userDelete',function()
    {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.e_avatar').val(_this.find('.image').text());
        
        $('.user-info').html(_this.find('.table-avatar').clone());
    });
</script>
@endsection