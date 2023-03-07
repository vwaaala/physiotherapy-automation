@extends('layouts.master')
@section('css')

<title>Physiopoint - Therapy Sessions</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Therapy Sessions</li>
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
                        <th>Package</th>
                        <th>Assistant</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($therapies as $therapy)
                    <tr>
                        <td></td>
                        <td>{{$therapy->package_id}}</td>
                        <td>{{$therapy->assistant_id}}</td>
                        <td>{{$therapy->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush