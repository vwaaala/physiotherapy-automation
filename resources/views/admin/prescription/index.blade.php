@extends('layouts.master')
@section('header')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/dataTables.bootstrap4.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<title>Physiopoint - Prescriptions</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Prescriptions</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_appointment">
                <i class="fa fa-plus"></i> New Prescription
            </a>
        </div>
    </div>
</div>

<!-- Table  -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="prescription-table" class="table table-striped custom-table datatable" >
                <thead>
                    <tr>
                        <th class="text-right no-sort">Action</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Weight</th>
                        <th>Gender</th>
                        <th class="text-nowrap">Created At</th>
                        <th class="text-nowrap">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $key=>$prescription )
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
                        <td class="id">{{ $prescription->id }}</td>
                        <td class="name">{{ $prescription->name }}</td>
                        <td class="text-center">{{ $prescription->creator_id }}</td>
                        <td class="phone-number">{{ $prescription->phone_number }}</td>
                        <td>{{ $prescription->age }}</td>
                        <td>{{ $prescription->weight }}</td>
                        <td>{{ $prescription->gender }}</td>
                        <td>{{ $prescription->created_at }}</td>
                        <td>{{ $prescription->updated_at }}</td>
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

@endsection

@push('js')
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{ URL::to('admin/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Datatable initiate -->
<script>
    $(document).ready(function () {
        $('#prescription-table').DataTable({
            scrollX: true,
        });
    });
</script>
@endpush