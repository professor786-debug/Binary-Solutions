<style>
    .menu-icon {
        width: 15%;
        margin-left: 5px
    }
</style>
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <div class="logo-image-small">
            <a href="{{ route('main') }}"><img style="width: 35%" src="{{ asset('assets/img/logo.svg') }}"></a>
        </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->routeIs('main') ? 'active' : '' }}">
                <a href="{{ route('main') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Main</p>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                <a href="{{ route('student.dashboard') }}" style="display: flex; gap: 15px">
                    <img src="{{ asset('student/img/dashboard.png') }}" alt="icon" class="menu-icon">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.customsolutions') ? 'active' : '' }}">
                <a href="{{ route('student.customsolutions') }}" style="display: flex; gap: 15px">
                    <img src="{{ asset('student/img/custom-solutions.png') }}" alt="icon" class="menu-icon">
                    <span>Custom Solutions</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.solutions') ? 'active' : '' }}">
                <a href="{{ route('student.solutions') }}" style="display: flex; gap: 17px">
                    <img style="margin-left: 4px;" src="{{ asset('student/img/order.png') }}" alt="icon"
                        class="menu-icon">
                    <span>Order</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.subscription') ? 'active' : '' }}">
                <a href="{{ route('student.subscription') }}" style="display: flex; gap: 13px">
                    <img style="margin-left: 9px;" src="{{ asset('student/img/subscription.png') }}" alt="icon"
                        class="menu-icon">
                    <span>Subscription</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.refund.show') ? 'active' : '' }}">
                <a href="{{ route('student.refund.show') }}" style="display: flex; gap: 19px">
                    <img style="margin-left: 4px;" src="{{ asset('student/img/refund.png') }}" alt="icon"
                        class="menu-icon">
                    <span>Refund option</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('student.logout') ? 'active' : '' }}">
                <a href="{{ route('student.logout') }}" style="display: flex; gap: 19px">
                    <img src="{{ asset('student/img/logout.png') }}" alt="icon" class="menu-icon">
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
