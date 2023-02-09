<!-- Add User Modal -->
<div id="add_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
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
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}"/>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter Password" required>
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
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <input class="form-control" type="file" name="image">
                                <input type="hidden" name="hidden_image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="birth_date" type="text" value="{{ old('birth_date') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Role Name</label>
                                <select class="select @error('role') is-invalid @enderror" name="role">
                                @foreach ($roles as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">User Status</label>
                                <select class="select @error('user_status') is-invalid @enderror" name="user_status">
                                @foreach ($user_status as $i )
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                                </select>
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
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Gender</label>
                                <select class="select @error('gender') is-invalid @enderror" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Private">Private</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Blood Group</label>
                                <select class="select @error('blood_group') is-invalid @enderror" name="blood_group">
                                    <option value="A+">A positive</option>
                                    <option value="A-">A negative</option>
                                    <option value="B+">B positive</option>
                                    <option value="B-">B negative</option>
                                    <option value="O+">O positive</option>
                                    <option value="O-">O negative</option>
                                    <option value="AB+">AB positive</option>
                                    <option value="AB-">AB negative</option>
                                </select>
                                @error('blood_group')
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
                    <div class="row">
                        <div class="col-sm-4 ml-2">
                            <button type="submit" class="btn btn-primary submit-btn">Create</button>
                        </div> 
                    </div>               
                </form>
            </div>
        </div>
    </div>
</div>


