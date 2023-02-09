@extends('layouts.master')
@section('header')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">
<title>Physiopoint - Appointments</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Appointments</li>
            </ul>
        </div>
    </div>
    <!-- <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
    </div> -->
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="appointments-table" class="table table-striped custom-table datatable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Doctor</th>
                        <th class="text-nowrap">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="id"></td>
                        <td></td>
                        <td>
                            <span hidden class="image"></span>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar"><img src="" alt=""></a>
                                <a href="#" class="name"></span></a>
                            </h2>
                        </td>
                        <td></td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection
@section('js')
<!-- Datatable JS -->
<script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datatable initiate -->
<script>
    $(document).ready(function () {
        $('#appointments-table').DataTable();
    });
</script>
@endsection

