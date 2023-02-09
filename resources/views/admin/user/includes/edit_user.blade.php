<!-- Edit User Modal -->
<div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <div class="modal-body">
                <form action="{{ route('admin.users.update-user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="e_id" value="">
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" id="e_name" value="" />
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" id="e_email" value=""/>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" id="e_phone_number" name="phone_number" placeholder="Enter Phone" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <input type="hidden" name="hidden_image" id="e_image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="birth_date" type="text" value="{{ $user->birth_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Role Name</label>
                                <select class="select" name="role" id="e_role_name">
                                @foreach ($roles as $i )
                                    <option {{ ($user->role === $i->name) ? 'selected' : '' }} value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Status</label>
                                <select class="select" name="user_status" id="e_status">
                                @foreach ($user_status as $status )
                                <option {{ ($user->status === $status->name) ? 'selected' : '' }} value="{{ $status->name }}">{{ $status->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating  @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option {{ ($user->gender === 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ ($user->gender === 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                    <option {{ ($user->gender === 'Private') ? 'selected' : '' }} value="Private">Private</option>
                                </select>
                                <label class="focus-label">Gender</label>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating  @error('blood_group') is-invalid @enderror" name="blood_group" id="blood_group"> 
                                    <option {{ ($user->blood_group === 'A+') ? 'selected' : '' }} value="A+">A positive</option>
                                    <option {{ ($user->blood_group === 'A-') ? 'selected' : '' }} value="A-">A negative</option>
                                    <option {{ ($user->blood_group === 'B+') ? 'selected' : '' }} value="B+">B positive</option>
                                    <option {{ ($user->blood_group === 'B-') ? 'selected' : '' }} value="B-">B negative</option>
                                    <option {{ ($user->blood_group === 'O+') ? 'selected' : '' }} value="O+">O positive</option>
                                    <option {{ ($user->blood_group === 'O-') ? 'selected' : '' }} value="O-">O negative</option>
                                    <option {{ ($user->blood_group === 'AB+') ? 'selected' : '' }} value="AB+">AB positive</option>
                                    <option {{ ($user->blood_group === 'AB-') ? 'selected' : '' }} value="AB-">AB negative</option>
                                </select>
                                <label class="focus-label">Blood Group</label>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12"> 
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" placeholder="Enter address" rows="4" cols="50">
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 ml-2">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div> 
                    </div>               
                </form>
            </div>
        </div>
    </div>
</div>