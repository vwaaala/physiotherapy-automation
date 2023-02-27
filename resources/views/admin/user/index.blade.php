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
<!-- Table  -->
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
                        <th>Gender</th>
                        <th>Blood</th>
                        <th>Mobile</th>
                        <th class="text-nowrap">Join Date</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>DOB</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user )
                    <tr>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item userUpdate" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                    <a class="dropdown-item userDelete" href="#" data-toggle="modal" data-target="#delete_user">
                                        <i class="fa fa-trash-o m-r-5"></i>delete</a>
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
                        <td class="gender">{{ $user->gender }}</td>
                        <td class="blood_group">{{ $user->blood_group }}</td>
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
                        <td class="dob">{{ $user->birth_date }}</td>
                        <td class="address">{{ $user->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Add User Modal -->
<div id="add_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}"/>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Repeat Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password" required>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <input class="form-control" type="file" name="image">
                                <input type="hidden" name="hidden_image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="birth_date" type="text" value="{{ old('birth_date') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Role Name</label>
                                <select class="select @error('role') is-invalid @enderror" name="role">
                                    @foreach ($roles as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">User Status</label>
                                <select class="select @error('user_status') is-invalid @enderror" name="user_status">
                                    @foreach ($user_status as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Gender</label>
                                <select class="select @error('gender') is-invalid @enderror" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Private">Private</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Blood Group</label>
                                <select class="select @error('blood_group') is-invalid @enderror" name="blood_group">
                                    <option value="A+">A positive</option>
                                    <option value="A-">A negative</option>
                                    <option value="B+">B positive</option>
                                    <option value="B-">B negative</option>
                                    <option value="O+">O positive</option>
                                    <option value="O-">O negative</option>
                                    <option value="AB+">AB positive</option>
                                    <option value="AB-">AB negative</option>
                                </select>
                                @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" placeholder="Enter address" rows="4" cols="50">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 ml-2">
                                    <button type="submit" class="btn btn-primary submit-btn">Create</button>
                                </div> 
                            </div>               
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit User Modal -->
<div class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-header">
                    <div class="user-info"></div>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('admin.users.delete')}}" method="POST">
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

<div class="modal custom-modal fade" id="edit_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="e_id" value="">
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" id="user_name" name="name" value="" />
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" id="user_email" value=""/>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone_number" id="user_phone_number" placeholder="Enter Phone" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <input class="form-control" type="file" name="image">
                                <input type="hidden" id="user_prev_image" name="hidden_image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" id="user_birth_date" name="birth_date" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Role Name</label>
                                <select class="select @error('role') is-invalid @enderror" id="user_role" name="role">
                                @foreach ($roles as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">User Status</label>
                                <select class="select @error('user_status') is-invalid @enderror" id="user_user_status" name="user_status">
                                @foreach ($user_status as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                                </select>
                                @error('user_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Gender</label>
                                <select class="select @error('gender') is-invalid @enderror" id="user_gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Private">Private</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Blood Group</label>
                                <select class="select @error('blood_group') is-invalid @enderror" id="user_blood_group" name="blood_group">
                                    <option value="A+">A positive</option>
                                    <option value="A+">A positive</option>
                                    <option value="A-">A negative</option>
                                    <option value="B+">B positive</option>
                                    <option value="B-">B negative</option>
                                    <option value="O+">O positive</option>
                                    <option value="O-">O negative</option>
                                    <option value="AB+">AB positive</option>
                                    <option value="AB-">AB negative</option>
                                </select>
                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12"> 
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" type="text" id="user_address" name="address" value="" placeholder="Enter address" rows="4" cols="50">
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 ml-2">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div> 
                    </div>               
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
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
    });
</script>

<script>
    $(document).on('click','.userUpdate',function()
    {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#user_name').val(_this.find('.name').text());
        $('#user_email').val(_this.find('.email').text());
        $('#user_address').val(_this.find('.address').text());
        $('#user_birth_date').val(_this.find('.dob').text());
        $('#user_prev_image').val(_this.find('.image').text());
        $('#user_phone_number').val(_this.find('.phone_number').text());
        $('#user_image').val(_this.find('.image').text());

        var name_role = (_this.find(".role").text());
        var _option = '<option selected value="' + name_role+ '">' + _this.find('.role').text() + '</option>'
        $( _option).appendTo("#user_role");

        var user_status = (_this.find(".statuss").text());
        var _option = '<option selected value="' +user_status+ '">' + _this.find('.statuss').text() + '</option>'
        $( _option).appendTo("#user_user_status");

        var gender = (_this.find(".gender").text());
        var _option = '<option selected value="' +gender+ '">' + _this.find('.gender').text() + '</option>'
        $( _option).appendTo("#user_gender");

        var blood_group = (_this.find(".blood_group").text());
        var _option = '<option selected value="' +blood_group+ '">' + _this.find('.blood_group').text() + '</option>'
        $( _option).appendTo("#user_blood_group");
        
    });
</script>
<script>    
    $(document).on('click','.userDelete',function()
    {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.e_avatar').val(_this.find('.image').text());
        
        $('.user-info').html(_this.find('.table-avatar').clone());
    });
</script>
@endpush