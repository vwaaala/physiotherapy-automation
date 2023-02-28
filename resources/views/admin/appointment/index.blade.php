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
                <li class="breadcrumb-item active">All Appointments</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_appointment">
                <i class="fa fa-plus"></i> Add Appointment
            </a>
        </div>
    </div>
</div>

<!-- Table  -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="appointment-table" class="table table-striped custom-table datatable" >
                <thead>
                    <tr>
                        <th class="text-right no-sort">Action</th>
                        <th>ID</th>
                        <th class="text-nowrap">Date</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Doctor</th>
                        <th class="text-nowrap">Created At</th>
                        <th>Email</th>
                        <th class="text-nowrap">Updated At</th>
                        <th class="text-nowrap">Message</th>
                        <th class="text-nowrap">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $key=>$appointment )
                    <tr>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item appointment-edit" href="#" data-toggle="modal" data-target="#edit_appointment"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                    <a class="dropdown-item appointment-delete" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td class="id">{{ $appointment->id }}</td>
                        <td class="date">{{ $appointment->date }}</td>
                        <td class="name">{{ $appointment->name }}</td>
                        <td class="text-center">
                            <div class="dropdown action-label">
                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                    @if( $appointment->status == 'processing')
                                        <i class="fa fa-dot-circle-o text-warning"></i>
                                        <span class="statuss"> Processing</span>
                                    @elseif( $appointment->status == 'success')
                                        <i class="fa fa-dot-circle-o text-success"></i>
                                        <span class="statuss"> Success</span>
                                    @elseif( $appointment->status == 'spam')
                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                        <span class="statuss"> Spam</span>
                                    @endif

                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Processing</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Success</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Spam</a>
                                </div>
                            </div>
                        </td>
                        <td class="phone-number">{{ $appointment->phone_number }}</td>
                        <td class="doctor">{{ $appointment->doctor }}</td>
                        <td>{{ $appointment->created_at }}</td>
                        <td class="email">{{ $appointment->email }}</td>
                        <td>{{$appointment->updated_at}}</td>
                        <td class="message">{{$appointment->message}}</td>
                        <td class="notes">{{$appointment->notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Add appointment -->
<div id="add_appointment" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary">Create New Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                <label class="focus-label">Doctor <span class="text-danger">*</span></label>
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
</div>

<!-- Modal Edit appointment -->
<div id="edit_appointment" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary">Edit Appointment</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-action="{{ route('admin.appointments.update') }}" id="edit-appointment-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Appointment Date <span class="text-danger">*</span></label>
                                <input type="hidden" name="appointment_id" id="a_id" value="">
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker @error('appointment_date') is-invalid @enderror" name="appointment_date" id="a_date" value="{{ old('appointment_date')}}" type="text">
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
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="a_name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating @error('doctor') is-invalid @enderror" id="a_doctor" name="doctor">
                                    @foreach ($doctors as $doctor )
                                        <option value="{{$doctor->email}}">{{$doctor->email}}</option>
                                    @endforeach
                                </select>
                                <label class="focus-label">Doctor <span class="text-danger">*</span></label>
                                @error('doctor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating @error('appointment_status') is-invalid @enderror"
                                    id="a_status" name="appointment_status"> 
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
                                <input class="form-control" id="a_email" name="email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" id="a_phone_number" name="phone_number">
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
                                <input type="text" class="form-control" id="a_message" name="message">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Notes <span class="text-secondary">(optional)</span></label>
                                <input type="text" class="form-control" id="a_notes" name="notes">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Update</button>
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
        $('#appointment-table').DataTable();
    });
</script>

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
                $('#add_appointment').modal('hide');
                location.reload();
            },
            error: function(response) {
                toastr.error(response.message);
            }
        });
    });
        
</script>

<script>
    $(document).on('click','.appointment-edit',function()
    {
        var _this = $(this).parents('tr');
        $('#a_id').val(_this.find('.id').text());
        $('#a_date').val(_this.find('.date').text());
        $('#a_name').val(_this.find('.name').text());
        $('#a_phone_number').val(_this.find('.phone-number').text());
        $('#a_email').val(_this.find('.email').text());
        $('#a_message').val(_this.find('.message').text());
        $('#a_notes').val(_this.find('.notes').text());

        var a_doctor = (_this.find(".doctor").text());
        $("#a_doctor").val(a_doctor);

        var a_status = (_this.find(".statuss").text());
        $("#a_status").value(a_status);
    });
    var form = '#edit-appointment-form';

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
                alert(response.message);
                $('#add_appointment').modal('hide');
                location.reload();
            },
            error: function(response) {
                toastr.error(response.message);
            }
        });
    });
</script>

<script>    
    $(document).on('click','.appointment-delete',function()
    {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.e_avatar').val(_this.find('.image').text());
        
        $('.user-info').html(_this.find('.table-avatar').clone());
    });
</script>
@endpush