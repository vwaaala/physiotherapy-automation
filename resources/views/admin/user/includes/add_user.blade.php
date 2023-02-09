<div id="add_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.add-user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Emaill Address</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Repeat Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating @error('gender') is-invalid @enderror" name="gender" id="gender"> 
                                    <option selected disabled>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Rather not say">Rather not say</option>
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
                                <select class="select floating  @error('blood_group')is-invalid @enderror" name="blood_group" id="blood_group"> 
                                    <option selected disabled>Select</option>
                                    <option value="A+">A positive</option>
                                    <option value="A-">A negative</option>
                                </select>
                                <label class="focus-label">Blood Group</label>
                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4"> 
                            <div class="form-group form-focus select-focus">
                                <select class="select floating  @error('roles') is-invalid @enderror" name="role" id="role"> 
                                    <option selected disabled>Select</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <label class="focus-label">User Role</label>
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    </div>
                    <div class="row"> 
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                <div class="form-group form-focus select-focus">
                                <select class="select floating" id="dobday" name="dobday">    
                                </select>
                                <label class="focus-label">Birth Date</label>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-focus select-focus">
                                    <select class="select floating" id="dobmonth" name="dobmonth">    
                                    </select>
                                    <label class="focus-label">Birth Month</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-focus select-focus">
                                    <select class="select floating" id="dobyear" name="dobyear">    
                                    </select>
                                    <label class="focus-label">Birth Year</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <div class="form-group form-focus select-focus">
                                <select class="select floating  @error('user_status') is-invalid @enderror" name="user_status" id="status">
                                    <option selected disabled>Select</option>
                                    @foreach ($user_status as $status )
                                    <option value="{{ $status->name }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <label class="focus-label">User Status</label>
                                @error('user_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="tel" name="phone_number" placeholder="Enter Phone">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Photo</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>