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
                        <td class="text-center">{{ $prescription->creator->email }}</td>
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
                <h5 class="modal-title text-secondary">Create New Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin.prescriptions.store') }}" method="post">
                    @csrf
                    <div class="row">
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
                            <div class="form-group">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <input class="form-control @error('phone_number') is-invalid @enderror"
                                    type="number" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">  
                            <div class="form-group">
                                <label class="col-form-label">Weight
                                    <span class="text-secondary"><small> (in kg)</small></span>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number"
                                    class="form-control  @error('weight') is-invalid @enderror"
                                    name="weight"
                                    value="{{ old('weight') }}"
                                >
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">  
                            <div class="form-group">
                                <label class="col-form-label">Age
                                    <span class="text-secondary"><small> (in yr)</small></span>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number"
                                    class="form-control  @error('age') is-invalid @enderror"
                                    name="age"
                                    value="{{ old('age') }}"
                                >
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-secondary"><small>(optional)</small></span></label>
                                <input class="form-control" name="email" type="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating @error('gender') is-invalid @enderror" name="gender"> 
                                    <option> -- Select -- </option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="other">Other</option>
                                </select>
                                <label class="focus-label">Gender <span class="text-danger">*</span></label>
                            </div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <p><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="observation">Observation<span class="text-danger"> *</span></label>

                            <textarea class="form-control @error('observation') is-invalid @enderror"
                                id="observation" name="observation" rows="4" cols="50"
                                value="{{ old('observation') }}"
                            ></textarea>
                            @error('observation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="col-form-label" for="investigation">Investigation
                            <span class="text-secondary"><small> (optional)</small></span>
                        </label>

                            <textarea class="form-control"
                                id="investigation" name="investigation"
                                rows="4" cols="50"
                                value="{{ old('investigation') }}"
                            ></textarea>
                        </div>
                    </div>
                    <hr/>
                    <hr/>
                    <div class="row">
                        <table class="table table-bordered" id="prescription_item" style="margin:14px;">  
                            <tr>
                                <th>Name</th>
                                <th>Dose</th>
                                <th>Action</th>
                            </tr>
                            <tr>  
                                <td>
                                    <input type="text" name="item[0][name]" placeholder="Enter Name" class="form-control" />
                                </td>  
                                <td>
                                    <input type="text" name="item[0][dose]" placeholder="Enter Dose" class="form-control" />
                                </td>  
                                <td>
                                    <button type="button" name="add" id="add-btn" class="btn btn-success">
                                        <i class="las la-folder-plus"></i>
                                    </button>
                                </td>  
                            </tr>  
                        </table>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Create</button>
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
        $('#prescription-table').DataTable();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#add-btn").click(function(){
        ++i;
        $("#prescription_item")
            .append(
                '<tr><td><input type="text" name="item['+i+'][name]" placeholder="Enter Name" class="form-control" /></td><td><input type="text" name="item['+i+'][dose]" placeholder="Enter Dose" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="las la-trash"></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });
        
</script>
@endpush