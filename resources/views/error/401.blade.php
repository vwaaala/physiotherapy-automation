@extends('layouts.app')
@section('content')
    <div class="main-wrapper">	
        <div class="error-box">
            <h1>401</h1>
            <h3><i class="fa fa-warning"></i> Oops! Not Authorizedd!</h3>
            <p>The page you requested is not available for you.</p>
            
            <a href="#" class="btn btn-custom">Back to Home</a>
        </div>
    </div>
@endsection
