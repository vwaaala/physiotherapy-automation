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
                <li class="breadcrumb-item active">Prescription View</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->


<!-- Table  -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="prescription-item" class="table table-striped custom-table datatable" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Dose</th>
                        <th>Created at</th>
                        <th>Update at</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@push('js')


@endpush