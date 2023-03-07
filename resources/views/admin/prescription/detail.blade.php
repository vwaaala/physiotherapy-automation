@extends('layouts.master')
@section('header')

<title>Physiopoint - Prescription</title>
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

<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img alt="" src="{{ URL::asset('admin/assets/images/avatar/photo_defaults.jpg') }}"></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{$prescription->name}}</h3>
                                    <h6 class="small doj text-muted">UI/UX Design Team</h6>
                                    <small class="text-muted"></small>
                                    <div class="staff-id text-danger">Created By : Dr. {{$prescription->creator->name}}</div>
                                    <br>
                                    <div class="small text-info">Prescribed on : {{$prescription->created_at}}</div>
                                    <div class="staff-msg"><a class="btn btn-custom" href="#">Send Message</a></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Phone:</div>
                                        <div class="text"><a href="#">{{$prescription->phone_number}}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Weight:</div>
                                        <div class="text">{{$prescription->weight}}kg</div>
                                    </li>
                                    <li>
                                        <div class="title">Age:</div>
                                        <div class="text">{{$prescription->age}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        <div class="text">{{$prescription->gender}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="card tab-box">
    <div class="row user-tabs">
        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Detail</a></li>
                <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Package</a></li>
                <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
            </ul>
        </div>
    </div>
</div>
					
<div class="tab-content">

    <!-- Detail Info Tab -->
    <div id="emp_profile" class="pro-overview tab-pane fade show active">
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title"><span class="text-secondary">Instruction</span></h3>
                        <ul class="personal-info">
                            @foreach($prescriptionItems as $prescriptionItem)
                                <li>
                                    <div class="title">{{$prescriptionItem->dose}}</div>
                                    <div class="text">{{$prescriptionItem->name}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title"><span class="text-secondary">Observation</span></h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Name</div>
                                <div class="text">John Doe</div>
                            </li>
                            <li>
                                <div class="title">Relationship</div>
                                <div class="text">Father</div>
                            </li>
                            <li>
                                <div class="title">Phone </div>
                                <div class="text">9876543210, 9876543210</div>
                            </li>
                        </ul>
                        <hr>
                        <h3 class="card-title"><span class="text-secondary">History</span></h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Name</div>
                                <div class="text">Karen Wills</div>
                            </li>
                            <li>
                                <div class="title">Relationship</div>
                                <div class="text">Brother</div>
                            </li>
                            <li>
                                <div class="title">Phone </div>
                                <div class="text">9876543210, 9876543210</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Profile Info Tab -->
    
    <!-- Package Tab -->
    <div class="tab-pane fade" id="emp_projects">
        <div class="row">
            @if(is_null($package))
                <a href="{{ route('admin.therapy-packages.create', $prescription->id) }}" class="btn btn-success">Create Package</a>
            @else
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Session History</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                @foreach($therapy_attendances as $therapy_attendance)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name">{{ $therapy_attendance->created_at->format("m/d/Y") }}</a>
                                                <div>by {{ $therapy_attendance->assistant_id }}</div>
                                                <span class="time">{{ $therapy_attendance->notes }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown profile-action">
                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="project-title"><a href="project-view.html">{{ $package->patient_phonenumber }}</a></h4>
                        <small class="block text-ellipsis m-b-15">
                            <span class="text-xs">{{ $package->daily_times}}</span> <span class="text-muted"> {{$package->daily_times < 2 ? 'time' : 'times'}}, </span>
                            <span class="text-xs">{{ $package->num_days}}</span> <span class="text-muted">days</span>
                        </small>
                        <div class="pro-deadline m-b-15">
                            <div class="sub-title">
                                Follow up:
                            </div>
                            <div class="text-muted">
                                {{ $package->follow_up}}
                            </div>
                            <div class="sub-title">
                                Follow notification:
                            </div>
                            <div class="text-muted">
                                {{ $package->notify_followup == 1 ? 'Enabled' : 'Disabled'}}
                            </div>
                        </div>
                        <div class="project-members m-b-15">
                            <div>Assistant mostly treated :</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="{{ URL::asset('admin/assets/images/avatar/photo_defaults.jpg') }}"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="project-members m-b-15">
                            <div>Other :</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" class="all-users">+15</a>
                                </li>
                            </ul>
                        </div>
                        <p class="m-b-5">Progress <span class="text-success float-right">{{ round($package_progress, 2)}}%</span></p>
                        <div class="progress progress-xs mb-0">
                            <div style="width: {{ round($package_progress, 2)}}%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="{{ round($package_progress, 2)}}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
    <!-- /Projects Tab -->
    
    <!-- Bank Statutory Tab -->
    <div class="tab-pane fade" id="bank_statutory">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Basic Salary Information</h3>
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select salary basis type</option>
                                    <option>Hourly</option>
                                    <option>Daily</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Payment type</label>
                                <select class="select">
                                    <option>Select payment type</option>
                                    <option>Bank transfer</option>
                                    <option>Check</option>
                                    <option>Cash</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3 class="card-title"> PF Information</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">PF contribution</label>
                                <select class="select">
                                    <option>Select PF contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select PF contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Employee PF rate</label>
                                <select class="select">
                                    <option>Select PF contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select additional rate</option>
                                    <option>0%</option>
                                    <option>1%</option>
                                    <option>2%</option>
                                    <option>3%</option>
                                    <option>4%</option>
                                    <option>5%</option>
                                    <option>6%</option>
                                    <option>7%</option>
                                    <option>8%</option>
                                    <option>9%</option>
                                    <option>10%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Total rate</label>
                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Employee PF rate</label>
                                <select class="select">
                                    <option>Select PF contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select additional rate</option>
                                    <option>0%</option>
                                    <option>1%</option>
                                    <option>2%</option>
                                    <option>3%</option>
                                    <option>4%</option>
                                    <option>5%</option>
                                    <option>6%</option>
                                    <option>7%</option>
                                    <option>8%</option>
                                    <option>9%</option>
                                    <option>10%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Total rate</label>
                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <h3 class="card-title"> ESI Information</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">ESI contribution</label>
                                <select class="select">
                                    <option>Select ESI contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select ESI contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Employee ESI rate</label>
                                <select class="select">
                                    <option>Select ESI contribution</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select additional rate</option>
                                    <option>0%</option>
                                    <option>1%</option>
                                    <option>2%</option>
                                    <option>3%</option>
                                    <option>4%</option>
                                    <option>5%</option>
                                    <option>6%</option>
                                    <option>7%</option>
                                    <option>8%</option>
                                    <option>9%</option>
                                    <option>10%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Total rate</label>
                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                            </div>
                        </div>
                    </div>
                    
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Bank Statutory Tab -->
    
</div>


@endsection

@push('js')

@endpush