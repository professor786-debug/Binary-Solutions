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

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border: none
        }

        .nav-link {
            background-color: white
        }

        button {
            font-weight: 600
        }

        /* .nav-link:focus,
        .nav-link:active {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
        } */
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
    </style>
</head>

<body>
    {{-- <div class="loader"></div> --}}
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
                    <div class="row ">
                        <div class="col-xl-4">
                            <div class="profile-card text-center">
                                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="img-fluid">

                                <h4 class="name">Kevin Anderson</h4>
                                <p>Web Designer</p>
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
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                    <li>
                                        <button type="button" class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-edit">Edit Profile</button>
                                    </li>
                                    <li>
                                        <button type="button" class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Change Password</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <!-- Overview -->
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">
                                            Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus.
                                            Tempora libero non est unde veniam est qui dolor.
                                        </p>

                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Full Name</div>
                                            <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Company</div>
                                            <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8">Web Designer</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8">USA</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8">A108 Adam Street, New York, USA</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                        </div>
                                    </div>

                                    <!-- Edit Profile -->
                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <form>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" value="Kevin Anderson">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Company</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control"
                                                        value="Lueilwitz, Wisoky and Leuschke">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Job</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" value="Web Designer">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Country</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" value="USA">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control"
                                                        value="A108 Adam Street, New York, USA">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control"
                                                        value="(436) 486-3538 x29071">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="email" class="form-control"
                                                        value="k.anderson@example.com">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Change Password -->
                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <form>
                                            <div class="mb-3">
                                                <label>Current Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Confirm New Password</label>
                                                <input type="password" class="form-control">
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
