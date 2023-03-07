@extends('layouts.master')
@section('css')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
<title>Physiopoint - Therapy Package</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Therapy Packages</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="activity-log" class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient</th>
                        <th>Prescription</th>
                        <th>Price</th>
                        <th>Daily Times</th>
                        <th>Number of days</th>
                        <th>Discount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td></td>
                        <td>{{$package->patient_phonenumber}}</td>
                        <td><a href="{{ route('admin.prescriptions.detail', $package->prescription_id) }}">{{$package->prescription_id}}</a></td>
                        <td>{{$package->price}}</td>
                        <td>{{$package->daily_times}}</td>
                        <td>{{$package->num_days}}</td>
                        <td>{{$package->discount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Select2 JS -->
<script src="{{ URL::to('assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
<script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>


@endpush