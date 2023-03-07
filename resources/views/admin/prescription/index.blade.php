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
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_prescription">
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
                        <th>Observation</th>
                        <th>Investigation</th>
                        <th class="text-nowrap">Created At</th>
                        <th class="text-nowrap">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription )
                    <tr>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item prescription-view"
                                        data-toggle="modal" data-target="#view_prescription"
                                        data-url="{{ route('admin.prescriptions.show', $prescription->id) }}"
                                        href="#"><i class="fa fa-pencil m-r-5"></i>View</a>
                                    <a class="dropdown-item appointment-edit" href="#" data-toggle="modal" data-target="#edit_prescription"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                    <a class="dropdown-item appointment-delete" href="#" data-toggle="modal" data-target="#delete_prescription"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td class="id">{{ $prescription->id }}</td>
                        <td class="patient-name">
                            <a href="{{route('admin.prescriptions.detail', $prescription->id)}}">{{ $prescription->name }}</a>
                            </td>
                        <td class="text-center doctor-name">{{ $prescription->creator->name }}</td>
                        <td class="phone-number">{{ $prescription->phone_number }}</td>
                        <td class="patient-age">{{ $prescription->age }}</td>
                        <td class="patient-weight">{{ $prescription->weight }}</td>
                        <td class="patient-gender">{{ $prescription->gender }}</td>
                        <td class="patient-observation">{{ $prescription->observation }}</td>
                        <td class="patient-investigation">{{ $prescription->investigation }}</td>
                        <td class="created-at">{{ $prescription->created_at->format('d M Y') }}</td>
                        <td>{{ $prescription->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Add prescription -->
<div id="add_prescription" class="modal custom-modal fade" role="dialog">
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

<!-- Modal View prescription -->
<div id="view_prescription" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary">View Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                
                                </li>
                                <li>
                                    
                                    <div class="table-responsive">
                                        <table id="prescription-item" class="table table-striped custom-table" >
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Dose</th>
                                                </tr>
                                            </thead>
                                            <tbody class="prescription-card">
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
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

    var p_item_index = 0;
    $("#add-btn").click(function(){
        ++p_item_index;
        $("#prescription_item")
            .append(
                '<tr><td><input type="text" name="item['+p_item_index+'][name]" placeholder="Enter Name" class="form-control" /></td><td><input type="text" name="item['+p_item_index+'][dose]" placeholder="Enter Dose" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="las la-trash"></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });

    $(document).on('click','.prescription-view', function(){
        var _this = $(this).parents('tr');
        
        $('.profile-info-left').replaceWith('<div class="profile-info-left"><h3 class="user-name m-t-0 mb-0">'+_this.find('.patient-name').text()+'</h3><h6 class="text-muted">'+_this.find('.patient-age').text()+' yr old with '+_this.find('.patient-weight').text()+'kg in '+_this.find('.patient-gender').text()+' format</h6><small class="text-muted">'+ _this.find('.phone-number').text()+'</small><div class="staff-id">Doctor : '+_this.find('.doctor-name').text()+'</div><div class="small doj text-muted">Prescribed on : '+_this.find('.created-at').text()+'</div><br/><div class="small doj text-muted">Observation : '+_this.find('.patient-observation').text()+'</div><br/><div class="small doj text-muted">Invdestigation : '+_this.find('.patient-investigation').text()+'</div></div>');
        
        const url = $(this).data('url');
        $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',

                success: function (data) {
                    console.log(data.package);
                    prescription_card(data.prescription_items);
                },
                error: function(error) {
                    toastr.error(error.message);
                }
        });
    });

    function prescription_card(data){
        
        data.forEach((item) => {
            $('.prescription-card')
                .append('<tr><td></td><td>'+item.name+'</td><td>'+item.dose+'</td></tr>');
        });


    }
        
</script>
@endpush