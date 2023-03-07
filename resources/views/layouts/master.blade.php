<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Physiopoint - Physiotherapy center">
		<meta name="keywords" content="Physiotherapy center in Khulna">
        <meta name="author" content="Crazy Grape - Top IT firm in Khulna, Bangladesh">
        <meta name="robots" content="noindex, nofollow">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('admin/assets/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/font-awesome.min.css')}}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/line-awesome.min.css')}}">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ URL::to('admin/assets/css/select2.min.css') }}">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ URL::to('admin/assets/css/bootstrap-datetimepicker.min.css') }}">

		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ URL::to('admin/assets/css/dataTables.bootstrap4.min.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/style.css')}}">

		<link rel="stylesheet" href="{{ URL::asset('admin/assets/css/toastr.min.css') }}">
		
		
		@yield('header')
    </head>
    <body>
        <div class="main-wrapper">
			

			<!-- Header -->
            @include('layouts.includes.navbar')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@if (Auth::user()->role =='admin')
            @include('layouts.includes.admin-sidebar')

			@elseif (Auth::user()->role =='patient')
            @include('layouts.includes.patient-sidebar')
			
			@elseif (Auth::user()->role =='doctor')
            @include('layouts.includes.doctor-sidebar')

			@endif
            
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					{!! Toastr::message() !!}
					<!-- Preloader Starts -->
					<!-- <div class="d-flex justify-content-center preloader">
						<div class="spinner-grow text-success" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div> -->
					<!-- /Preloader End -->

					<!-- Loaded Content Starts -->
					<div id="content">
						@yield('content')
					</div>
					<!-- /Loaded Content End -->
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ URL::to('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ URL::to('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ URL::to('admin/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{ URL::to('admin/assets/js/jquery.slimscroll.min.js') }}"></script>

		<!-- Select2 JS -->
		<script src="{{ URL::to('admin/assets/js/select2.min.js') }}"></script>

		<!-- Datetimepicker JS -->
		<script src="{{ URL::to('admin/assets/js/moment.min.js') }}"></script>
		<script src="{{ URL::to('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

		<!-- Toastr JS -->
		<script src="{{ URL::to('admin/assets/js/toastr.min.js') }}"></script>
        
		<!-- Custom JS -->
		<script src="{{ URL::to('admin/assets/js/app.js') }}"></script>

		<script>
			$(document).on('load', function (){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
					
				});
				// console.log($('meta[name="csrf-token"]').attr('content'));
			});
		</script>

		{!! Toastr::message() !!}
		@stack('js')
    </body>
</html>