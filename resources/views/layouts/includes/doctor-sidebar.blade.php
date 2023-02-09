<!-- Sidebar style="display: none;" -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="submenu {{ (request()->is('doctor/dashboard')) ? 'active' : '' }}">
                        <a href="{{ route('doctor.dashboard') }}">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>

                    <!-- Medical History Section -->
                    <li class="menu-title"> <span>History</span> </li>
                    <li class="submenu {{ (request()->is('doctor/medical-history*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-alt"></i> <span>Medical</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('doctor/medical-history/patients')) ? 'active' : '' }}" href="{{ route('doctor.patients') }}">Patients</a></li>
                            <li><a class="{{ (request()->is('doctor/medical-history/appointments')) ? 'active' : '' }}" href="{{ route('doctor.appointments') }}">Appointments</a></li>
                            <li><a class="{{ (request()->is('doctor/medical-history/prescriptions')) ? 'active' : '' }}" href="{{ route('doctor.prescriptions') }}">Prescriptions</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ (request()->is('patient/wallet-history*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-tag"></i> <span>Wallet</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('doctor/wallet-history/honorium')) ? 'active' : ''}}" href="{{ route('doctor.honorium') }}">Honorium</a></li>
                            <li><a class="{{ (request()->is('doctor/wallet-history/cash-out')) ? 'active' : ''}}" href="{{ route('doctor.cash-out') }}">Cash out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<!-- /Sidebar -->