<style>
    .rotate {
        transform: rotate(90deg);
    }

    .transition {
        transition: transform 0.3s ease;
    }

    .dropdownIcon {
        stroke: #006aff;
        /* outline ka rang */
        stroke-width: 1;
        /* jitna zyada number, utna mota */
    }
</style>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i
                        data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
            <li>
                {{-- <form class="form-inline mr-auto">
                    @if (request()->is('panel/admin/dashboard') || request()->is('panel/admin/edit'))
            @else
                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                        data-width="200">
                    <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                @endif

                </form> --}}
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ Auth::user()->profile_image
                        ? asset('storage/' . Auth::user()->profile_image)
                        : asset('admin/img/users/user.png') }}"
                    class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
                <span>
                    <svg class="dropdownIcon bi bi-chevron-right ms-2 transition" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" style="font-weight: 700" fill="blue" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6.854 4.146a.5.5 0 0 0-.708.708L9.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5z" />
                    </svg>

                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">
                    Hello {{ Auth::user()->name ?? 'Admin' }} !
                </div>
                <a href="{{ route('admin_edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<script></script>
