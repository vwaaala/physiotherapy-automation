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

                    <!-- Auth Guard Section -->
                    <li class="menu-title"> <span>Auth Guard</span> </li>
                    <li class="submenu {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-alt"></i> <span> Users and Activities</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('admin/users/index')) ? 'active' : '' }}" href="{{ route('admin.users.index') }}">All Users</a></li>
                            <li><a class="{{ (request()->is('admin/users/activity-log')) ? 'active' : '' }}" href="{{ route('admin.users.activity-log') }}">Activity Logs</a></li>
                            <li><a class="{{ (request()->is('admin/users/user-activity-log')) ? 'active' : '' }}" href="{{ route('admin.users.user-activity-log') }}">User Other Activity Logs</a></li>
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

                    <!-- Accounting Section -->
                    <li class="menu-title"> <span>Settings</span> </li>
                    <li class="submenu {{ (request()->is('admin/software-settings*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-alt"></i> <span>Software</span> <span class="menu-arrow"></span>
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