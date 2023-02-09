@extends('layouts.master')
@section('css')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">

@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact Request Log</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="contact_us_table" class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Subject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contact_us_list as $key=>$contact )
                    <tr>
                        <td class="id">{{ $contact->id }}</td>
                        <td class="email">{{ $contact->email }}</td>
                        <td>{{ $contact->name}}</td>
                        <td>{{ $contact->phone_number}}</td>
                        <td>{{ $contact->subject}}</td>
                    </tr>
                    @endforeach
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
        $('#contact_us_table').DataTable();
    });
</script>
@endsection