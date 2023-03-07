@extends('layouts.master')
@section('header')

<title>Physiopoint - New Session</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Packages</li>
                <li class="breadcrumb-item active">Therapy Session</li>
            </ul>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.therapy-sessions.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating @error('package_id') is-invalid @enderror" id="package-id" name="package_id"> 
                                <option> -- Select -- </option>
                                @foreach($packages as $key => $package)
                                
                                    <option value="{{ $package->id }}">{{ $package->patient_phonenumber }}</option>
                                @endforeach
                            </select>
                            <label class="focus-label">Package ID <span class="text-danger">*</span></label>
                            @error('package_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating @error('assistant_id') is-invalid @enderror" name="assistant_id"> 
                                <option> -- Select -- </option>
                                @foreach($soldiers as $soldier)
                                    <option value="{{ $soldier->id}}">{{$soldier->name}}</option>
                                @endforeach
                            </select>
                            <label class="focus-label">Assistant ID <span class="text-danger">*</span></label>
                            @error('assistant_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">  
                        <div class="form-group">
                            <label class="col-form-label">Notes <span class="text-secondary">(optional)</span></label>
                            <textarea class="form-control" name="notes" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ URL::to('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    $(document).ready(function(){
 
        // Initialize select2
        $("#package-id").select2({
            maximumInputLength: 20
        });
    });
</script>

@endpush