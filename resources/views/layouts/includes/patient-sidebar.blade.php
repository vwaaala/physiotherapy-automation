<!-- Sidebar style="display: none;" -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="submenu {{ (request()->is('patient/dashboard')) ? 'active' : '' }}">
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>

                    <!-- Medical History Section -->
                    <li class="menu-title"> <span>History</span> </li>
                    <li class="submenu {{ (request()->is('patient/medical-history*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-alt"></i> <span>Medical</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('patient/medical-history/therapy')) ? 'active' : '' }}" href="{{ route('patient.therapy') }}">Therapy</a></li>
                            <li><a class="{{ (request()->is('patient/medical-history/appointments')) ? 'active' : '' }}" href="{{ route('patient.appointments') }}">Appointments</a></li>
                            <li><a class="{{ (request()->is('patient/medical-history/prescriptions')) ? 'active' : '' }}" href="{{ route('patient.prescriptions') }}">Prescriptions</a></li>
                        </ul>
                    </li>
                    <li class="submenu {{ (request()->is('patient/payment-history*')) ? 'active' : '' }}">
                        <a href="#">
                            <i class="la la-user-tag"></i> <span>Payment</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="{{ (request()->is('patient/payment-history/invoices')) ? 'active' : ''}}" href="{{ route('patient.invoices') }}">Invoices</a></li>
                            <li><a class="{{ (request()->is('patient/payment-history/transactions')) ? 'active' : ''}}" href="{{ route('patient.transactions') }}">Transactions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<!-- /Sidebar -->