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
                <li class="breadcrumb-item active">User Activity Log</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="user-activity-log" class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Activity</th>
                        <th>Reference</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_activity_logs as $key=>$activity )
                    <tr>
                        <td class="id">{{ $activity->id }}</td>
                        <td class="email">{{ $activity->email }}</td>
                        <td>{{ $activity->status}}</td>
                        <td>{{ $activity->role}}</td>
                        <td>{{ $activity->action}}</td>
                        <td>{{ $activity->reference}}</td>
                        <td>{{ $activity->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
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
        $('#user-activity-log').DataTable();
    });
</script>
@endsection