@extends('layouts.master')
@section('css')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Activity Log</li>
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
                        <th>Email</th>
                        <th>Description</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity_logs as $key=>$activity )
                    <tr>
                        <td class="id">{{ $activity->id }}</td>
                        <td class="email">{{ $activity->email }}</td>
                        <td class="position">{{ $activity->description }}</td>
                        <td>{{ $activity->created_at }}</td>
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

<!-- Datatable JS -->
<script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Datatable initiate -->
<script>
    $(document).ready(function () {
        $('#activity-log').DataTable();
    });
</script>
@endpush