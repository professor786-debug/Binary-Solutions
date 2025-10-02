<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <!-- ✅ Font Awesome 6 (keep only this) -->
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
    <style>
        .fa-file-alt,
        .fa-code,
        .fa-file-pdf {
            width: 7% !important;
        }

        .btn-secondary,
        .btn-dark {
            width: 71%;
        }

        .card-body {
            text-align: center
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
                                    <table class="table table-striped" id="table-1">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Solution Name</th>
                                                <th>Base Price</th>

                                                <th>Grand Total</th>
                                                <th>Package</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($purchases as $purchase)
                                                <tr>
                                                    <td>{{ $purchase->solution ? $purchase->solution->course_name : 'N/A' }}
                                                    </td>
                                                    <td>${{ number_format($purchase->base_price, 2) }}</td>

                                                    <td>${{ number_format($purchase->grand_total, 2) }}</td>
                                                    <td>
                                                        @if ($purchase->package)
                                                            {{ $purchase->package->name }}
                                                        @elseif($purchase->solution)
                                                            Solution: {{ $purchase->solution->title }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    @php
                                                        $solution = $purchase->solution;
                                                        $addons = json_decode($purchase->addons, true) ?? [];
                                                    @endphp

                                                    @php
                                                        $addons = json_decode($purchase->addons, true) ?? [];

                                                        $addonIcons = [
                                                            'video_demo' => '<i class="fas fa-video text-danger"></i>',
                                                            'walkthrough_pdf' =>
                                                                '<i class="fas fa-file-pdf text-warning"></i>',
                                                            'report_path' =>
                                                                '<i class="fas fa-file-alt text-success"></i>',
                                                            'source_code' => '<i class="fas fa-code text-primary"></i>',
                                                        ];
                                                    @endphp

                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            {{-- Source Code always available --}}
                                                            <div class="d-flex align-items-center mb-1">
                                                                {!! $addonIcons['source_code'] !!}
                                                                <a href="{{ asset($solution->source_code_path) }}"
                                                                    class="btn btn-sm btn-primary ml-2" download>
                                                                    Download Source Code
                                                                </a>
                                                            </div>

                                                            {{-- Video Demo --}}
                                                            @if (in_array('video_demo', $addons) && $solution->video_demo_path)
                                                                <div class="d-flex align-items-center mb-1">
                                                                    {!! $addonIcons['video_demo'] !!}
                                                                    <a href="{{ asset($solution->video_demo_path) }}"
                                                                        class="btn btn-sm btn-info ml-2" download>
                                                                        Video Demo
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            {{-- Walkthrough PDF --}}
                                                            @if (in_array('walkthrough_pdf', $addons) && $solution->walkthrough_path)
                                                                <div class="d-flex align-items-center mb-1">
                                                                    {!! $addonIcons['walkthrough_pdf'] !!}
                                                                    <a href="{{ asset($solution->walkthrough_path) }}"
                                                                        class="btn btn-sm btn-secondary ml-2" download>
                                                                        Walkthrough
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            {{-- Final Report --}}
                                                            @if (in_array('report_path', $addons) && $solution->report_path)
                                                                <div class="d-flex align-items-center">
                                                                    {!! $addonIcons['report_path'] !!}
                                                                    <a href="{{ asset($solution->report_path) }}"
                                                                        class="btn btn-sm btn-dark ml-2" download>
                                                                        Final Report
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">No purchases found.</td>
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
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Student Name</th>
                                            <th>Package</th>
                                            <th>Base Price</th>
                                            <th>Add-ons</th>
                                            <th>Add-on Total</th>
                                            <th>Grand Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                            <tr>
                                                <td>{{ $purchase->stripe_charge_id ?? 'N/A' }}</td>
                                                <td>{{ $purchase->student->name ?? 'N/A' }}</td>

                                                <td>
                                                    @if ($purchase->package)
                                                        {{ $purchase->package->name }}
                                                    @elseif($purchase->solution)
                                                        Solution: {{ $purchase->solution->title }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>

                                                <td>${{ number_format($purchase->base_price, 2) }}</td>

                                                <td>
                                                    @php
                                                        $addons = json_decode($purchase->addons, true);
                                                    @endphp
                                                    @if ($addons && is_array($addons))
                                                        <ul class="list-unstyled mb-0">
                                                            @foreach ($addons as $addon)
                                                                <li>{{ $addon['label'] ?? $addon }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        None
                                                    @endif
                                                </td>

                                                <td>${{ number_format($purchase->addon_total, 2) }}</td>
                                                <td>${{ number_format($purchase->grand_total, 2) }}</td>

                                                <td>{{ ucfirst($purchase->payment_method) ?? 'N/A' }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $purchase->payment_status === 'completed' ? 'badge-success' : 'badge-warning' }}">
                                                        {{ ucfirst($purchase->payment_status) }}
                                                    </span>
                                                </td>
                                                @php
                                                    $solution = $purchase->solution;
                                                    $addons = json_decode($purchase->addons, true) ?? [];
                                                @endphp

                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ asset($solution->source_code_path) }}"
                                                            class="btn btn-sm btn-primary mb-1" download>
                                                            Download Source Code
                                                        </a>

                                                        @if (in_array('video_demo', $addons) && $solution->video_demo_path)
                                                            <a href="{{ asset($solution->video_demo_path) }}"
                                                                class="btn btn-sm btn-info mb-1" download>
                                                                Video Demo
                                                            </a>
                                                        @endif

                                                        @if (in_array('walkthrough_pdf', $addons) && $solution->walkthrough_path)
                                                            <a href="{{ asset($solution->walkthrough_path) }}"
                                                                class="btn btn-sm btn-secondary mb-1" download>
                                                                Walkthrough
                                                            </a>
                                                        @endif

                                                        @if (in_array('report_path', $addons) && $solution->report_path)
                                                            <a href="{{ asset($solution->report_path) }}"
                                                                class="btn btn-sm btn-dark" download>
                                                                Final Report
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No purchases found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            =======

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
                                                    <table class="table">
                                                        <thead class="text-primary">
                                                            <tr>
                                                                <th>Payment ID</th>
                                                                <th>Student Name</th>
                                                                <th>Package</th>
                                                                <th>Base Price</th>
                                                                <th>Add-ons</th>
                                                                <th>Add-on Total</th>
                                                                <th>Grand Total</th>
                                                                <th>Payment Method</th>
                                                                <th>Payment Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($purchases as $purchase)
                                                                <tr>
                                                                    <td>{{ $purchase->stripe_charge_id ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $purchase->student->name ?? 'N/A' }}
                                                                    </td>

                                                                    <td>
                                                                        @if ($purchase->package)
                                                                            {{ $purchase->package->name }}
                                                                        @elseif($purchase->solution)
                                                                            Solution:
                                                                            {{ $purchase->solution->title }}
                                                                        @else
                                                                            N/A
                                                                        @endif
                                                                    </td>

                                                                    <td>${{ number_format($purchase->base_price, 2) }}
                                                                    </td>

                                                                    @php
                                                                        $addons = json_decode($purchase->addons, true);

                                                                        // Mapping addons to icons/images
                                                                        $addonIcons = [
                                                                            'video_demo' =>
                                                                                '<i class="fas fa-video"></i> Video Demo',
                                                                            'walkthrough_pdf' =>
                                                                                '<i class="fas fa-file-pdf"></i> Walkthrough PDF',
                                                                            'report_path' =>
                                                                                '<i  class="fas fa-file-alt"></i> Final Report',
                                                                            'source_code' =>
                                                                                '<i  class="fas fa-code"></i> Source Code',
                                                                        ];
                                                                    @endphp

                                                                    <td>
                                                                        @if ($addons && is_array($addons))
                                                                            <ul class="list-unstyled mb-0">
                                                                                @foreach ($addons as $addon)
                                                                                    @php
                                                                                        // Get addon key (if stored as array with 'label')
                                                                                        $key = is_array($addon)
                                                                                            ? $addon['key'] ??
                                                                                                $addon['label']
                                                                                            : $addon;
                                                                                    @endphp

                                                                                    <li>
                                                                                        {!! $addonIcons[$key] ?? ($addon['label'] ?? $addon) !!}
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @else
                                                                            None
                                                                        @endif
                                                                    </td>

                                                                    <td>${{ number_format($purchase->addon_total, 2) }}
                                                                    </td>
                                                                    <td>${{ number_format($purchase->grand_total, 2) }}
                                                                    </td>

                                                                    <td>{{ ucfirst($purchase->payment_method) ?? 'N/A' }}
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="badge {{ $purchase->payment_status === 'completed' ? 'badge-success' : 'badge-warning' }}">
                                                                            {{ ucfirst($purchase->payment_status) }}
                                                                        </span>
                                                                    </td>
                                                                    @php
                                                                        $solution = $purchase->solution;
                                                                        $addons =
                                                                            json_decode($purchase->addons, true) ?? [];
                                                                    @endphp

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <a href="{{ asset($solution->source_code_path) }}"
                                                                                class="btn btn-sm btn-primary mb-1"
                                                                                download>
                                                                                Download Source Code
                                                                            </a>

                                                                            @if (in_array('video_demo', $addons) && $solution->video_demo_path)
                                                                                <a href="{{ asset($solution->video_demo_path) }}"
                                                                                    class="btn btn-sm btn-info mb-1"
                                                                                    download>
                                                                                    Video Demo
                                                                                </a>
                                                                            @endif

                                                                            @if (in_array('walkthrough_pdf', $addons) && $solution->walkthrough_path)
                                                                                <a href="{{ asset($solution->walkthrough_path) }}"
                                                                                    class="btn btn-sm btn-secondary mb-1"
                                                                                    download>
                                                                                    Walkthrough
                                                                                </a>
                                                                            @endif

                                                                            @if (in_array('report_path', $addons) && $solution->report_path)
                                                                                <a href="{{ asset($solution->report_path) }}"
                                                                                    class="btn btn-sm btn-dark"
                                                                                    download>
                                                                                    Final Report
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="8" class="text-center">No
                                                                        purchases found.</td>
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
