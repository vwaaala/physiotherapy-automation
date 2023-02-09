@extends('layouts.master')
@section('css')
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Company Profile</li>
            </ul>
        </div>
    </div>
</div>


<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img alt="" src="{{ URL::to('admin/assets/img/logo.png') }}"></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{ $company_profile->company_name}}</h3>
                                    <h6 class="text-muted">{{ $company_profile->contact_person}}</h6>
                                    <small class="text-muted">CEO</small>
                                    <div class="staff-id">License NO : FT-0001</div>
                                    <div class="small doj text-muted">Exp. Date : 1st Jan 2013</div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Primary Phone:</div>
                                        <div class="text"><a href="">{{ $company_profile->primary_phone}}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Secondary Phone:</div>
                                        <div class="text"><a href="">{{ $company_profile->secondary_phone}}</a></div>
                                    </li>
                                    <br/>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><a href="">{{ $company_profile->email}}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Address:</div>
                                        <div class="text">{{ $company_profile->address}}</div>
                                    </li>
                                    <li>
                                        <div class="title">City:</div>
                                        <div class="text">{{ $company_profile->city}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Police Station:</div>
                                        <div class="text">{{ $company_profile->police_station}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Post Code:</div>
                                        <div class="text">{{ $company_profile->postal_code}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Modal -->
<div id="profile_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Company Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_profile_info_update" name="form_profile_info_update">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="profile-img-wrap edit-img">
                                <img class="inline-block" src="admin/assets/img/profiles/avatar-02.jpg" alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file">
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control @error('company_name')is-invalid @enderror" name="company_name" id="company_name" value="{{ $company_profile->company_name}}">
                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control @error('contact_person')is-invalid @enderror" name="contact_person" id="contact_person" value="{{ $company_profile->contact_person }}">
                                        @error('contact_person')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" value="{{ $company_profile->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Primary Phone Number</label>
                                <input type="text" class="form-control @error('primary_phone')is-invalid @enderror" name="primary_phone" id="primary_phone" value="{{ $company_profile->primary_phone }}">
                                @error('primary_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Secondary Phone Number</label>
                                <input type="text" class="form-control @error('secondary_phone')is-invalid @enderror" name="secondary_phone" id="secondary_phone" value="{{ $company_profile->secondary_phone }}">
                                @error('secondary_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" id="address" value="{{ $company_profile->address }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control @error('city')is-invalid @enderror" name="city" id="city" value="{{ $company_profile->city }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Police Station</label>
                                <input type="text" class="form-control @error('police_station')is-invalid @enderror" name="police_station" id="police_station" value="{{ $company_profile->police_station }}">
                                @error('police_station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" class="form-control @error('postal_code')is-invalid @enderror" name="postal_code" id="postal_code" value="{{ $company_profile->postal_code }}">
                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" class="form-control @error('facebook_url')is-invalid @enderror" name="facebook_url" id="facebook_url" value="{{ $company_profile->facebook_url }}">
                                @error('facebook_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" id="btn_profile_update" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Profile Modal -->
@endsection

@section('js')
<script type="text/javascript">
    $(function () {
        $('#btn_profile_update').click(function (e) {
            e.preventDefault();
            
            const $data = {
                company_name: $('#company_name').val(),
                contact_person: $('#company_name').val(),
                email: $('#email').val(),
                contact_person: $('#company_name').val(),
                primary_phone : $('#primary_phone').val(),
                secondary_phone : $('#secondary_phone').val(),
                address : $('#address').val(),
                city : $('#city').val(),
                police_station : $('#police_station').val(),
                postal_code : $('#postal_code').val(),
                facebook_url : $('#facebook_url').val(),
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $data,
                url: "{{ route('admin.portfolio.edit') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    })
</script>
@endsection