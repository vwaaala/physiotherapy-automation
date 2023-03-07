@extends('layouts.master')
@section('header')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<title>Physiopoint - Add package</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.prescriptions.all') }}">All Precriptions</a></li>
                <li class="breadcrumb-item active">New Package</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.therapy-packages.store') }}" method="post">
                @csrf
                <div class="row">
                    <input type="hidden" name="prescription_id" value="{{ $prescription_id }}">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="col-form-label">Price<span class="text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ old('price') }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="col-form-label">Daily Times <span class="text-danger">*</span></label>
                            <input class="form-control @error('daily_times') is-invalid @enderror"
                                type="number" name="daily_times" value="{{ old('daily_times') }}">
                            @error('daily_times')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">  
                        <div class="form-group">
                            <label class="col-form-label">Days
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                class="form-control  @error('num_days') is-invalid @enderror"
                                name="num_days"
                                value="{{ old('num_days') }}"
                            >
                            @error('num_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">  
                        <div class="form-group">
                            <label class="col-form-label">Discount
                                <span class="text-secondary">%</span>
                                <span class="text-secondary"><small>(optional)</small></span>
                            </label>
                            <input type="number"
                                class="form-control"
                                name="discount"
                                value="{{ old('discount') }}"
                            >
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="col-form-label">Follow up Date<span class="text-danger"> *</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker @error('follow_up') is-invalid @enderror" name="follow_up" value="{{ old('follow_up')}}" type="text">
                            </div>
                            @error('follow_up')
                                <p><span class="text-danger"><small>{{ $message }}</small></span></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating @error('notify_followup') is-invalid @enderror" name="notify_followup"> 
                                <option> -- Select -- </option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            <label class="focus-label">Follow up notification <span class="text-danger">*</span></label>
                            @error('notify_followup')
                                <p><span class="text-danger"><small>{{ $message }}</small></span></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label class="col-form-label" for="investigation">Notes
                        <span class="text-secondary"><small> (optional)</small></span>
                    </label>

                        <textarea class="form-control"
                            id="investigation" name="note"
                            rows="4" cols="50"
                            value="{{ old('note') }}"
                        ></textarea>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Create Package</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

@endpush