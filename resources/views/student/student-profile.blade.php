@php
    $student = $student ?? auth('student')->user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <!-- ✅ Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('student/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('student/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <link href="{{ asset('student/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <link href="{{ asset('student/demo/demo.css') }}" rel="stylesheet" />
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

        /* ✅ Fixed underline issue */
        .nav-tabs .nav-link.active {
            color: #007bff !important;
            font-weight: 600;
            border: none !important;
            border-bottom: 2px solid #007bff !important;
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

        /* .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:active {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
        } */
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

        .main-content {
            padding-left: 2px;
            padding-right: 5px;
            padding-top: 2px;
        }
    </style>

</head>

<body class="">
    <div class="wrapper ">
        @include('student.student_header')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="javascript:;">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student.profile') }}">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>

                            <p>
                                <span class="d-lg-none d-md-block">Some Actions</span>
                            </p>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="javascript:;">
                                    {{-- <i class="nc-icon nc-settings-gear-65"></i> --}}
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-content">
                            <section class="section">
                                <div class="pagetitle">
                                    <h1 style="font-size: 20px">Profile</h1>
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">Dashboard</li>
                                            <li class="breadcrumb-item">Student</li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </nav>
                                </div>

                                <!-- ✅ Flash Messages -->
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <!-- Left Profile Card -->
                                    <div class="col-xl-4">
                                        <div class="profile-card text-center">
                                            <img src="{{ $student->profile_image ? asset('storage/' . $student->profile_image) : asset('assets/img/profile-img.jpg') }}"
                                                alt="Profile" class="img-fluid" width="150">
                                            <h4 class="name">{{ $student->name }}</h4>
                                            <p>{{ $student->university ?? 'No University' }}</p>
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
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab"
                                                        href="#tab-overview">Overview</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#tab-edit-profile">Edit
                                                        Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#tab-change-password">Change Password</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content pt-2">
                                                <!-- Overview -->
                                                <div class="tab-pane fade show active" id="tab-overview">
                                                    <h5 class="card-title">About</h5>
                                                    <p class="small fst-italic">
                                                        {{ $student->about ?? 'No description added yet.' }}</p>

                                                    <h5 class="card-title">Profile Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            {{ $student->full_name ?? '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">University</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            {{ $student->university ?? '-' }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                                        <div class="col-lg-9 col-md-8">{{ $student->country ?? '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                                        <div class="col-lg-9 col-md-8">{{ $student->address ?? '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Contact No</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            {{ $student->contact_no ?? '-' }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                                        <div class="col-lg-9 col-md-8">{{ $student->email }}</div>
                                                    </div>
                                                </div>
                                                <!-- Edit Profile -->
                                                <div class="tab-pane fade" id="tab-edit-profile">

                                                    <div class="row mb-3">
                                                        <label for="profileImage"
                                                            class="col-md-4 col-lg-3 col-form-label">Profile
                                                            Image</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <img src="{{ $student->profile_image ? asset('storage/' . $student->profile_image) : asset('assets/img/profile-img.jpg') }}"
                                                                alt="Profile" width="120" class="rounded-circle">

                                                            <div class="pt-2">
                                                                <!-- Upload Form (separate) -->
                                                                <form
                                                                    action="{{ route('student.update_profile_image') }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    <label class="btn btn-primary btn-sm mb-0"
                                                                        title="Upload new profile image">
                                                                        <i class="bi bi-upload"></i>
                                                                        <input type="file" name="profile_image"
                                                                            class="d-none"
                                                                            onchange="this.form.submit()">
                                                                    </label>
                                                                </form>

                                                                <!-- Delete Form -->
                                                                @if ($student->profile_image)
                                                                    <form
                                                                        action="{{ route('student.delete_profile_image') }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button style="margin-top: 20px;"type="submit"
                                                                            class="btn btn-danger btn-sm"
                                                                            title="Remove my profile image">
                                                                            <i class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Main Profile Update Form -->
                                                    <form method="POST"
                                                        action="{{ route('student.update_profile') }}">
                                                        @csrf

                                                        <div class="mb-3 row">
                                                            <label class="col-md-4 col-lg-3 col-form-label">Full
                                                                Name</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="text" name="full_name"
                                                                    class="form-control"
                                                                    value="{{ old('full_name', $student->full_name) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">University</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="text" name="university"
                                                                    class="form-control"
                                                                    value="{{ old('university', $student->university) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">Country</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="text" name="country"
                                                                    class="form-control"
                                                                    value="{{ old('country', $student->country) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="text" name="address"
                                                                    class="form-control"
                                                                    value="{{ old('address', $student->address) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="text" name="contact_no"
                                                                    class="form-control"
                                                                    value="{{ old('contact_no', $student->contact_no) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input type="email" name="email"
                                                                    class="form-control"
                                                                    value="{{ old('email', $student->email) }}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-md-4 col-lg-3 col-form-label">About</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <textarea name="about" class="form-control" rows="3">{{ old('about', $student->about) }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>


                                                <!-- Change Password -->
                                                <div class="tab-pane fade" id="tab-change-password">
                                                    <form method="POST"
                                                        action="{{ route('student.change_password') }}">
                                                        @csrf
                                                        <div class="mb-3"><label>Current Password</label><input
                                                                type="password" name="current_password"
                                                                class="form-control"></div>
                                                        <div class="mb-3"><label>New Password</label><input
                                                                type="password" name="new_password"
                                                                class="form-control"></div>
                                                        <div class="mb-3"><label>Confirm New Password</label><input
                                                                type="password" name="new_password_confirmation"
                                                                class="form-control"></div>
                                                        <div class="text-center"><button type="submit"
                                                                class="btn btn-primary">Change Password</button></div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('student/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('student/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('student/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('student/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <script src="{{ asset('student/js/plugins/chartjs.min.js') }}"></script>

    <script src="{{ asset('student/js/plugins/bootstrap-notify.js') }}"></script>

    <script src="{{ asset('student/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>

    <script src="{{ asset('student/demo/demo.js') }}"></script>
</body>

</html>
