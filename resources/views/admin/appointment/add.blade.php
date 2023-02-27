@extends('layouts.master')
@section('header')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<title>Physiopoint - Add appointment</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Appointment</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <form data-action="{{ route('admin.appointments.store') }}" id="appointment-form">
                @csrf
                <div class="row">
                    <div class="col-sm-6">  
                        <div class="form-group">
                            <label class="col-form-label">Appointment Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker @error('appointment_date') is-invalid @enderror" name="appointment_date" value="{{ old('appointment_date')}}" type="text">
                            </div>
                            @error('appointment_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Patient Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating @error('doctor') is-invalid @enderror" name="doctor"> 
                                <option> -- Select -- </option>
                                <option value="doctor@physiopoint.com">doctor@physiopoint.com</option>
                            </select>
                            <label class="focus-label">Status <span class="text-danger">*</span></label>
                            @error('doctor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating @error('appointment_status') is-invalid @enderror" name="appointment_status"> 
                                <option> -- Select -- </option>
                                <option value="processing">Processing</option>
                                <option value="success">Success</option>
                                <option value="spam">Spam</option>
                            </select>
                            <label class="focus-label">Status <span class="text-danger">*</span></label>
                            @error('appointment_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Email <span class="text-secondary">(optional)</span></label>
                            <input class="form-control" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">  
                        <div class="form-group">
                            <label class="col-form-label">Message <span class="text-secondary">(optional)</span></label>
                            <input type="text" class="form-control" name="message">
                        </div>
                    </div>
                    <div class="col-sm-6">  
                        <div class="form-group">
                            <label class="col-form-label">Notes <span class="text-secondary">(optional)</span></label>
                            <input type="text" class="form-control" name="notes">
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                </div>
            </form>
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



<script type="text/javascript">
    
    var form = '#appointment-form';

    $(form).on('submit', function(event){
        event.preventDefault();
        let data = new FormData(this);

        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                toastr.success(response.message);
            },
            error: function(response) {
                alert(response.message);
            }
        });
    });
        
</script>
@endpush