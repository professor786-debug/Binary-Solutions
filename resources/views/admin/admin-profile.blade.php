<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        .pagetitle {
            margin-top: 15px !important;
        }

        .breadcrumb {
            background: transparent;
        }

        .main-content {
            padding-left: 265px;
            padding-right: 30px;
            padding-top: 65px;
            width: 100%;
            position: relative;
        }

        .profile-card {
            background: white;
            padding: 10px;
            border-radius: 12px;
        }

        .img-fluid {
            border-radius: 50%
        }

        .name {
            margin-top: 15px;
        }

        .nav-tabs .nav-link.active {
            color: #007bff !important;
            font-weight: 600;
            border: none;
            border-bottom: 2px solid #007bff;
            background: transparent !important;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            background: transparent;
        }

        .nav-tabs .nav-link:hover {
            color: #007bff;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:active {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:active {
            border-bottom: #007bff 2px solid !important;
        }

        .card-title {
            color: #012970;
            font-size: 18px;
        }

        .label {
            font-weight: 600;
            color: rgba(1, 41, 112, 0.6);
        }

        .col-form-label {
            font-weight: 600;
            color: rgba(1, 41, 112, 0.6);
        }

        @media (max-width:1024px) {
            .main-content {
                padding-left: 0px !important;
            }
        }
    </style>
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.header')
            <div class="main-sidebar sidebar-style-2">
                @include('admin.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="pagetitle">
                        <h1 style="font-size: 20px">Profile</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Admin</li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <!-- Left Profile Card -->
                        <div class="col-xl-4">
                            <div class="profile-card text-center">
                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/img/profile-img.jpg') }}" alt="Profile" class="img-fluid"
                                    width="150">
                                <h4 class="name">{{ $user->name }}</h4>
                                <p>{{ $user->job ?? 'No Job Title' }}</p>
                                <div class="social-links">
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Right Tabs Content -->
                        <div class="col-xl-8">
                            <div class="card p-3">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered mb-3">
                                    <li>
                                        <button type="button" class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#tab-overview">Overview</button>
                                    </li>
                                    <li>
                                        <button type="button" class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#tab-edit-profile">Edit Profile</button>
                                    </li>
                                    <li>
                                        <button type="button" class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#tab-change-password">Change Password</button>
                                    </li>
                                </ul>
                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                {{-- Error Message --}}

                                {{-- Validation Errors --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif


                                <div class="tab-content pt-2">
                                    <!-- Overview -->
                                    <div class="tab-pane fade show active" id="tab-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">
                                            {{ $user->about ?? 'No description added yet.' }}
                                        </p>

                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Full Name</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Company</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->company ?? '-' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->job ?? '-' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->country ?? '-' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->address ?? '-' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->phone ?? '-' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                        </div>
                                    </div>

                                    <!-- Edit Profile -->

                                    <!-- Edit Profile Tab -->
                                    <div class="tab-pane fade" id="tab-edit-profile">

                                        {{-- Success Message --}}
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show"
                                                role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"></button>
                                            </div>
                                        @endif

                                        {{-- Error Message --}}
                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show"
                                                role="alert">
                                                {{ session('error') }}
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"></button>
                                            </div>
                                        @endif

                                        {{-- Validation Errors --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show"
                                                role="alert">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"></button>
                                            </div>
                                        @endif

                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/img/profile-img.jpg') }}"
                                                    alt="Profile" width="120" class="rounded-circle">

                                                <div class="pt-2">
                                                    <!-- Upload Form (separate) -->
                                                    <form action="{{ route('admin_update_profile_image') }}"
                                                        method="POST" enctype="multipart/form-data"
                                                        style="display:inline;">
                                                        @csrf
                                                        <label class="btn btn-primary btn-sm mb-0"
                                                            title="Upload new profile image">
                                                            <i class="bi bi-upload"></i>
                                                            <input type="file" name="profile_image" class="d-none"
                                                                onchange="this.form.submit()">
                                                        </label>
                                                    </form>

                                                    <!-- Delete Form -->
                                                    @if ($user->profile_image)
                                                        <form action="{{ route('admin_delete_profile_image') }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Remove my profile image">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Main Profile Update Form -->
                                        <form method="POST" action="{{ route('admin_update') }}">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', $user->name) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Company</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="company" class="form-control"
                                                        value="{{ old('company', $user->company) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Job</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="job" class="form-control"
                                                        value="{{ old('job', $user->job) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Country</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="country" class="form-control"
                                                        value="{{ old('country', $user->country) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="address" class="form-control"
                                                        value="{{ old('address', $user->address) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ old('phone', $user->phone) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email', $user->email) }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">About</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <textarea name="about" class="form-control" rows="3">{{ old('about', $user->about) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>

                                    </div>


                                    <!-- Change Password -->
                                    <div class="tab-pane fade" id="tab-change-password">
                                        <form method="POST" action="{{ route('admin_change_password') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>New Password</label>
                                                <input type="password" name="new_password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Confirm New Password</label>
                                                <input type="password" name="new_password_confirmation"
                                                    class="form-control">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Change
                                                    Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <script src="{{ asset('admin/js/app.min.js') }}"></script>
        <script src="{{ asset('admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/js/page/index.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
