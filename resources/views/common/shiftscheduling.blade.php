@extends('layouts.master')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='Admin')
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('userManagement') }}">All User</a></li>
                                <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-user"></i>
                            <span> Employees</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                            <li><a href="{{ route('form/holidays/new') }}">Holidays</a></li>
                            <li><a href="{{ route('form/leaves/new') }}">Leaves (Admin) 
                                <span class="badge badge-pill bg-primary float-right">1</span></a>
                            </li>
                            <li><a href="{{route('form/leavesemployee/new')}}">Leaves (Employee)</a></li>
                            <li><a href="{{ route('form/leavesettings/page') }}">Leave Settings</a></li>
                            <li><a href="{{ route('attendance/page') }}">Attendance (Admin)</a></li>
                            <li><a href="{{ route('attendance/employee/page') }}">Attendance (Employee)</a></li>
                            <li><a href="departments.html">Departments</a></li>
                            <li><a href="designations.html">Designations</a></li>
                            <li><a href="timesheet.html">Timesheet</a></li>
                            <li><a class="active" href="{{ route('form/shiftscheduling/page') }}">Shift & Schedule</a></li>
                            <li><a href="overtime.html">Overtime</a></li>
                        </ul>
                    </li>

                    <li class="menu-title"> <span>HR</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> Sales </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="estimates.html">Estimates</a></li>
                            <li><a href="{{ route('form/invoice/view/page') }}">Invoices</a></li>
                            <li><a href="payments.html">Payments</a></li>
                            <li><a href="expenses.html">Expenses</a></li>
                            <li><a href="provident-fund.html">Provident Fund</a></li>
                            <li><a href="taxes.html">Taxes</a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-money"></i>
                        <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                            <li><a href="{{ url('form/salary/view') }}"> Payslip </a></li>
                            <li><a href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-pie-chart"></i>
                        <span> Reports </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('form/expense/reports/page') }}"> Expense Report </a></li>
                            <li><a href="{{ route('form/invoice/reports/page') }}"> Invoice Report </a></li>
                            <li><a href="payments-reports.html"> Payments Report </a></li>
                            <li><a href="employee-reports.html"> Employee Report </a></li>
                            <li><a href="payslip-reports.html"> Payslip Report </a></li>
                            <li><a href="attendance-reports.html"> Attendance Report </a></li>
                            <li><a href="{{ route('form/leave/reports/page') }}"> Leave Report </a></li>
                            <li><a href="{{ route('form/daily/reports/page') }}"> Daily Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Performance</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a></li>
                            <li><a href="{{ route('form/performance/page') }}"> Performance Review </a></li>
                            <li><a href="{{ route('form/performance/appraisal/page') }}"> Performance Appraisal </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-edit"></i>
                        <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('form/training/list/page') }}"> Training List </a></li>
                            <li><a href="{{ route('form/trainers/list/page') }}"> Trainers</a></li>
                            <li><a href="{{ route('form/training/type/list/page') }}"> Training Type </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Administration</span> </li>
                    <li> <a href="assets.html"><i class="la la-object-ungroup">
                        </i> <span>Assets</span></a>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="user-dashboard.html"> User Dasboard </a></li>
                            <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                            <li><a href="jobs.html"> Manage Jobs </a></li>
                            <li><a href="manage-resumes.html"> Manage Resumes </a></li>
                            <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                            <li><a href="interview-questions.html"> Interview Questions </a></li>
                            <li><a href="offer_approvals.html"> Offer Approvals </a></li>
                            <li><a href="experiance-level.html"> Experience Level </a></li>
                            <li><a href="candidates.html"> Candidates List </a></li>
                            <li><a href="schedule-timing.html"> Schedule timing </a></li>
                            <li><a href="apptitude-result.html"> Aptitude Results </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Daily Scheduling</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all/employee/list') }}">Employees</a></li>
                            <li class="breadcrumb-item active">Shift Scheduling</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('form/shiftlist/page') }}" class="btn add-btn m-r-5">Shifts</a>
                        <a href="#" class="btn add-btn m-r-5" data-toggle="modal" data-target="#add_schedule"> Assign Shifts</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            <!-- Content Starts -->
            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option>All Department</option>
                            <option value="1">Finance</option>
                            <option value="2">Finance and Management</option>
                            <option value="3">Hr & Finance</option>
                            <option value="4">ITech</option>
                        </select>
                        <label class="focus-label">Department</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus focused">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus focused">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <a href="#" class="btn btn-success btn-block"> Search </a>  
                </div>     
            </div>
            <!-- Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Scheduled Shift</th>
                                    <th>Fri 21</th>
                                    <th>Sat 22</th>
                                    <th>Sun 23</th>
                                    <th>Mon 24</th>
                                    <th>Tue 25</th>
                                    <th>Wed 26</th>
                                    <th>Thu 27</th>
                                    <th>Fri 28</th>
                                    <th>Sat 29</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}"></a>
                                            <a href="profile.html">John Doe <span>Web Designer</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-09.jpg') }}"></a>
                                            <a href="profile.html">Richard Miles <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-10.jpg') }}"></a>
                                            <a href="profile.html">John Smith <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-05.jpg') }}"></a>
                                            <a href="profile.html">Mike Litorus <span>IOS Developer</span></a>
                                        </h2>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-11.jpg') }}"></a>
                                            <a href="profile.html">Wilmer Deluna <span>Team Leader</span></a>
                                        </h2>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-12.jpg') }}"></a>
                                            <a href="profile.html">Jeffrey Warden <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-13.jpg') }}"></a>
                                            <a href="profile.html">Bernardo Galaviz <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <h2>
                                                <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                <span class="username-info m-b-10">6:30 am - 9:30 pm ( 14 hrs 15 mins)</span>
                                                <span class="userrole-info">Web Designer - SMARTHR</span>
                                                </a>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-add-shedule-list">
                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                            <span><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Content End -->


        </div>
        <!-- /Page Content -->
     
        <!-- Add Schedule Modal -->
        <div id="add_schedule" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Department <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select</option>
                                            <option value="">Development</option>
                                            <option value="1">Finance</option>
                                            <option value="2">Finance and Management</option>
                                            <option value="3">Hr & Finance</option>
                                            <option value="4">ITech</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select </option>
                                            <option value="1">Richard Miles </option>
                                            <option value="2">John Smith</option>
                                            <option value="3">Mike Litorus </option>
                                            <option value="4">Wilmer Deluna</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Date</label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Shifts <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select </option>
                                            <option value="1">10'o clock Shift</option>
                                            <option value="2">10:30 shift</option>
                                            <option value="3">Daily Shift </option>
                                            <option value="4">New Shift</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Min Start Time  <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Start Time  <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Max Start Time  <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Min End Time  <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">End Time   <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Max End Time <span class="text-danger">*</span></label>
                                        <div class="input-group time timepicker">
                                            <input class="form-control"><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Break Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Accept Extra Hours </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Publish </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="">
                                            <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Schedule Modal -->
        
        <!-- Edit Schedule Modal -->
        <div id="edit_schedule" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Department <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select</option>
                                            <option selected value="">Development</option>
                                            <option value="1">Finance</option>
                                            <option value="2">Finance and Management</option>
                                            <option value="3">Hr & Finance</option>
                                            <option value="4">ITech</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select </option>
                                            <option selected value="1">Richard Miles </option>
                                            <option value="2">John Smith</option>
                                            <option value="3">Mike Litorus </option>
                                            <option value="4">Wilmer Deluna</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Shifts <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option value="">Select </option>
                                            <option value="1">10'o clock Shift</option>
                                            <option value="2">10:30 shift</option>
                                            <option value="3">Daily Shift </option>
                                            <option  selected value="4">New Shift</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Min Start Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="06:11 am">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Start Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="06:30 am">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Max Start Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="08:12 am">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Min End Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="09:12 pm">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">End Time   <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="09:30 pm">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Max End Time <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="09:45 pm">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Break Time  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="45">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Recurring Shift</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Repeat Every</label>
                                        <select class="select">
                                            <option value="">1 </option>
                                            <option value="1">2</option>
                                            <option value="2">3</option>
                                            <option value="3">4</option>
                                            <option  selected value="4">5</option>
                                            <option value="3">6</option>
                                        </select>
                                        <label class="col-form-label">Week(s)</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group wday-box">
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="monday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">M</span></label>
        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="tuesday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">T</span></label>
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="wednesday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">W</span></label>
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="thursday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">T</span></label>
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="friday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">F</span></label>
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="saturday" class="days recurring" onclick="return false;"><span class="checkmark">S</span></label>
                                        
                                            <label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="sunday" class="days recurring" onclick="return false;"><span class="checkmark">S</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">End On <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Indefinite</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Accept Extra Hours </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" checked="">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Publish </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                            <label class="custom-control-label" for="customSwitch4"></label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Schedule Modal -->

    </div>
    <!-- Page Wrapper -->
@endsection
