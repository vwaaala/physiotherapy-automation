@extends('layouts.master')
@section('header')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<title>Physiopoint - Create User</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Create User</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<section class="p-15">
    <div class="card">
        <div class="card-body">
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
</section>
@endsection

@push('js')
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush