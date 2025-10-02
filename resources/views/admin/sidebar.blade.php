<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href=""> <img alt="image" src="{{ asset('assets/img/logo.svg') }}" class="header-logo" /> <span
                class="logo-name"></span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="{{ route('admin_dashboard') }}" class="nav-link"><i
                    data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Custom
                    Solution</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.custom_solution_list_review') }}">Solutions Review</a>
                </li>
                <li><a class="nav-link" href="{{ route('admin.custom_solution_list_payment') }}">Solutions Payment</a>
                </li>
                <li><a class="nav-link" href="{{ route('admin.custom_solution_list_solutions') }}">Solutions Upload</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Solution
                    Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('solutions.create') }}">Add Solution</a></li>
                <li><a class="nav-link" href="{{ route('solutions.index') }}">Solution List</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="book"></i><span>Universty
                    Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('universty.create') }}">Add Universty</a></li>
                <li><a class="nav-link" href="{{ route('universty.index') }}">Universty List</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span> Student
                    Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('student.create') }}">Add Student</a></li>
                <li><a class="nav-link" href="{{ route('student.index') }}">Student List</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="book"></i><span>Subscription
                    Package</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('package.create') }}">Add Package</a></li>
                <li><a class="nav-link" href="{{ route('package.index') }}">Package List</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="{{ route('admin_refund_requests') }}" class="nav-link">
                <i data-feather="book"></i><span>Refund Requests</span>
            </a>
        </li>



    </ul>
    </li>
    </ul>
    </li>
    </ul>
</aside>
