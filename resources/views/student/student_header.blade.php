<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('assets/img/logo.svg') }}">
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
            <a href="{{ route('student.dashboard') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ request()->routeIs('student.customsolutions') ? 'active' : '' }}">
            <a href="{{ route('student.customsolutions') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Custom Slutions</p>
            </a>
          </li>
          <li class="{{ request()->routeIs('student.solutions') ? 'active' : '' }}">
            <a href="{{ route('student.solutions') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="{{ request()->routeIs('student.subscription') ? 'active' : '' }}">
            <a href="{{ route('student.subscription') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Subscription</p>
            </a>
          </li>
          <li class="{{ request()->routeIs('student.refund.show') ? 'active' : '' }}">
            <a href="{{ route('student.refund.show') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Refund Option</p>
            </a>
          </li>
          <li class="{{ request()->routeIs('student.logout') ? 'active' : '' }}">
            <a href="{{ route('student.logout') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>