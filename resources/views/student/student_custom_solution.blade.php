<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('student/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('student/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Custom Solution</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('student/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <link href="{{ asset('student/demo/demo.css') }}" rel="stylesheet" />
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
                        <a class="navbar-brand" href="javascript:;">Solutions</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h4 class="card-title"> Solutions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Sr #</th>
                                                <th>Problem File</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($solutions as $index => $solution)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @php
                                                            $ext = pathinfo(
                                                                $solution->problem_file,
                                                                PATHINFO_EXTENSION,
                                                            );
                                                            $isImage = in_array($ext, ['jpg', 'jpeg', 'png']);
                                                        @endphp

                                                        @if ($isImage)
                                                            <a href="{{ asset($solution->problem_file) }}" download>
                                                                <img src="{{ asset($solution->problem_file) }}"
                                                                    alt="File" width="80"
                                                                    class="rounded shadow-sm">
                                                            </a>
                                                        @elseif($ext === 'pdf')
                                                            <a href="{{ asset($solution->problem_file) }}" download>
                                                                <img src="{{ asset('admin/pdf-icon.png') }}"
                                                                    alt="PDF" width="40">
                                                            </a>
                                                        @elseif(in_array($ext, ['doc', 'docx']))
                                                            <a href="{{ asset($solution->problem_file) }}" download>
                                                                <img src="{{ asset('admin/word-icon.png') }}"
                                                                    alt="Word" width="40">
                                                            </a>
                                                        @else
                                                            <a href="{{ asset($solution->problem_file) }}"
                                                                download>{{ $ext }}</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ Str::limit($solution->problem_description, 50) }}</td>
                                                    <td><span
                                                            class="badge badge-info">{{ ucfirst($solution->status) }}</span>
                                                    </td>
                                                    <td>
                                                        {{-- Any actions like edit/delete can go here --}}

                                                        <a href="{{ route('student.solution.view', $solution->id) }}"
                                                            class="btn btn-sm btn-primary">View</a>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No solutions found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

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
