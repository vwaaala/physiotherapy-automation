<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            
                        </ul>
                    </li>

                    <!-- Site Section -->
                    <li class="menu-title"> <span>Regular Activities</span> </li>
                    <li class="submenu {{ (request()->is('admin/appointments*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-clipboard-list"></i> <span>Appointments</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ (request()->is('admin/appointments/all')) ? 'active' : '' }}"
                                href="{{ route('admin.appointments.all') }}"
                                >
                                    All Appointments
                                </a>
                            </li>
                            <li>
                                <a class="{{ (request()->is('admin/appointments/create')) ? 'active' : '' }}"
                                href="{{ route('admin.appointments.create') }}"
                                >
                                    Create Appointment
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu {{ (request()->is('admin/prescriptions*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-file-powerpoint"></i> <span>Prescriptions</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ (request()->is('admin/prescriptions/all')) ? 'active' : '' }}"
                                href="{{ route('admin.prescriptions.all') }}"
                                >
                                    All Prescriptions
                                </a>
                            </li>
                            <li>
                                <a class="{{ (request()->is('admin/prescriptions/create')) ? 'active' : '' }}"
                                href="{{ route('admin.prescriptions.create') }}"
                                >
                                    Create Prescriptions
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu {{ (request()->is('admin/therapy-packages*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-tape"></i> <span>Package</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ (request()->is('admin/therapy-packages/index')) ? 'active' : '' }}"
                                href="{{ route('admin.therapy-packages.index') }}"
                                >
                                    All Packages
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu {{ (request()->is('admin/therapy-sessions*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-hand-holding-heart"></i> <span>Therapy Session</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ (request()->is('admin/therapy-sessions/index')) ? 'active' : '' }}"
                                href="{{ route('admin.therapy-sessions.index') }}"
                                >
                                    All Session
                                </a>
                            </li>
                            <li>
                                <a class="{{ (request()->is('admin/therapy-sessions/create')) ? 'active' : '' }}"
                                href="{{ route('admin.therapy-sessions.create') }}"
                                >
                                    Add New Session
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Auth Guard Section -->
                    <li class="menu-title"> <span>Auth Guard</span> </li>
                    <li class="submenu {{ (request()->is('admin/users/*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-alt"></i> <span> Users</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/users/index')) ? 'active' : '' }}" href="{{ route('admin.users.index') }}">All Users</a></li>
                            <li><a class="{{ (request()->is('admin/users/create')) ? 'active' : '' }}" href="{{ route('admin.users.create') }}">Create User</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ (request()->is('admin/users-activity*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-snowboarding"></i> <span> Activities</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/users-activity/normal')) ? 'active' : '' }}" href="{{ route('admin.users-activity.normal-log') }}">Activity Logs</a></li>
                            <li><a class="{{ (request()->is('admin/users-activity/advance')) ? 'active' : '' }}" href="{{ route('admin.users-activity.advance-log') }}">User Other Activity Logs</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ (request()->is('admin/role*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-tag"></i> <span> Roles and Permissions</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/roles/index')) ? 'active' : ''}}" href="{{ route('admin.roles.index') }}">Roles</a></li>
                            <!-- <li><a class="{{ (request()->is('admin/role/permissions/index')) ? 'active' : ''}}" href="{{ route('admin.roles.index') }}">Permissions</a></li> -->
                            <li><a href="#">Permissions</a></li>
                        </ul>
                    </li>

                    <!-- Site Section -->
                    <li class="menu-title"> <span>Site</span> </li>
                    <li class="submenu {{ (request()->is('admin/portfolio*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-globe-asia"></i> <span>Portfolio</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/portfolio/contact-us-requests')) ? 'active' : '' }}" href="{{ route('admin.portfolio.contact_us_index') }}">Contact Requests</a></li>
                        </ul>
                    </li>

                    <!-- Accounting Section -->
                    <li class="menu-title"> <span>Settings</span> </li>
                    <li class="submenu {{ (request()->is('admin/software-settings*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-git"></i> <span>Software</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/software-settings/profile')) ? 'active' : '' }}" href="{{ route('admin.portfolio.profile') }}">Company Profile</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<!-- /Sidebar -->