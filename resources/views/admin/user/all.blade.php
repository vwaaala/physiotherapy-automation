@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

<title>Physiopoint - Create User</title>
@endsection
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<section class="p-15">
    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">  
            <div class="form-group form-focus">
                <input type="text" id="searchName"  class="form-control floating">
                <label class="focus-label">User Name</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3"> 
            <div class="form-group form-focus select-focus">
                <select class="select floating" id="filter_role"> 
                    <option selected value="">All</option>
                    @foreach($roles as $role){
                        <option value='{{ $role["role"] }}'>{{ $role["role"] }}</option>
                    @endforeach
                </select>
                <label class="focus-label">User Role</label>
            </div>
        </div>    
    </div>

   <table id='user_datatable' class="table table-striped table-bordered" width='100%' border="1" style='border-collapse: collapse;'>
      <thead>
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Role</th>
         </tr>
      </thead>
   </table>
</section>
@endsection

@push('js')
<!-- Datatable JS -->
<script src="{{ URL::to('admin/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Select2 JS -->
<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var userTable = $('#user_datatable').DataTable({
            scrollY: 200,
            scrollX: true,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url:"{{route('admin.users.filter')}}",
                data: function(data){
                    data.filter_role = $('#filter_role').val();
                    data.searchName = $('#searchName').val();
                }
            },
            columns: [
                { data: 'name' },
                { data: 'email' },
                { data: 'gender' },
                { data: 'role' },
            ]
        });

        $('#filter_role').change(function(){
            userTable.draw();
        });

        

        $('#searchName').keyup(function(){
            userTable.draw();
        });

    });
</script>
@endpush