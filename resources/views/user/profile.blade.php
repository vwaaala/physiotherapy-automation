@extends('layouts.master')
@section('header')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Tagsinput CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<title>Physiopoint - Profile</title>
@endsection
@section('content')
<!-- Page Content -->
<div>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to(Session::get('role').'/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt="" src="{{ URL::asset('admin/assets/images/avatar/'. Auth::user()->avatar) }}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{ Auth::user()->name }}</h3>
                                        <h6 class="text-muted">UI/UX Design Team</h6>
                                        <small class="text-muted">Web Designer</small>
                                        <div class="staff-id">Employee ID : FT-0001</div>
                                        <div class="small doj text-muted">Date of Join : {{ Auth::user()->created_at->format('d M Y') }}</div>
                                        <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Phone:</div>
                                            <div class="text"><a href="">{{ Auth::user()->phone_number }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class="text"><a href="">{{ Auth::user()->email }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Birthday:</div>
                                            <div class="text">24th July</div>
                                        </li>
                                        <li>
                                            <div class="title">Address:</div>
                                            <div class="text">{{ Auth::user()->address }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text">{{ Auth::user()->gender }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->



@endsection
@section('js')
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('admin/assets/js/moment.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Tagsinput JS -->
<script src="{{ URL::to('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<!-- Update Education form -->
<script>
    $(document).on('click', '#remove-edu', function(){  
        $(this).parents('.card').remove();
    });

    $('#edu-add').click(function(){
        $("#edu-form").append(`
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <a href="javascript:void(0);" class="delete-icon" id="remove-edu">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <input type="text" name="more[0][institution_name]" value="Oxford University" class="form-control floating">
                                <label class="focus-label">School / College / University</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <input type="text" name="more[0][roll_number]" value="Computer Science" class="form-control floating">
                                <label class="focus-label">Roll number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="more[0][start_date]" value="01/06/2002" class="form-control floating datetimepicker">
                                </div>
                                <label class="focus-label">Starting Date</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <div class="cal-icon">
                                    <input type="text" name="more[0][end_date]" value="31/05/2006" class="form-control floating datetimepicker">
                                </div>
                                <label class="focus-label">Complete Date</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <input type="text" name="more[0][degree]" value="BE Computer Science" class="form-control floating">
                                <label class="focus-label">Degree</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <input type="text" name="more[0][grade]" value="Grade A" class="form-control floating">
                                <label class="focus-label">Grade</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus focused">
                                <input type="text" name="more[0][campus]" value="Grade A" class="form-control floating">
                                <label class="focus-label">Campus</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
    });
</script>
@endsection

