<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('student/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('student/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link href="{{ url('https://fonts.googleapis.com/css?family=Montserrat:400,700,200') }}" rel="stylesheet" />
    <link href="{{ url('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}"
        rel="stylesheet">

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
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        @unless (Request::is('student/dashboard'))
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
                        @endunless

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
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center text-info">
                                            <i class="nc-icon nc-paper text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Solutions Bought</p>
                                            <p class="card-title">{{ $solutionsBought }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-book"></i> Total purchased solutions
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Subscription -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center text-success">
                                            <i class="nc-icon nc-badge text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Subscription</p>
                                            <p class="card-title">{{ $activeSubscription }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check-circle"></i> Current subscription status
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Payments -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center text-danger">
                                            <i class="nc-icon nc-money-coins text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Pending Payments</p>
                                            <p class="card-title">2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-exclamation-circle"></i> Needs your attention
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscription Expiry -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center text-warning">
                                            <i class="nc-icon nc-time-alarm text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Expiry Date</p>

                                            @if ($packagesCount > 1)
                                                <p style="font-size: 19px" class="card-title mb-1">Packages =
                                                    {{ $packagesCount }}</p>
                                                <ul class="list-unstyled mb-0"
                                                    style="font-size: 13px; color: #6c757d;">
                                                    @foreach ($expiryInfo as $info)
                                                        <li>• {{ $info }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p style="font-size: 19px" class="card-title">{{ $expiryInfo[0] }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-calendar"></i> Subscription ends
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Purchases</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Product</th>
                                            <th>Base Price</th>
                                            <th>Add-on Total</th>
                                            <th>Grand Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                            <tr>
                                                <td>
                                                    @if ($purchase->package)
                                                        Package: {{ $purchase->package->name }}
                                                    @elseif($purchase->solution)
                                                        Solution: {{ $purchase->solution->title }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>${{ number_format($purchase->base_price, 2) }}</td>
                                                <td>${{ number_format($purchase->addon_total, 2) }}</td>
                                                <td>${{ number_format($purchase->grand_total, 2) }}</td>
                                                <td>{{ ucfirst($purchase->payment_method) ?? 'N/A' }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $purchase->payment_status === 'completed' ? 'badge-success' : 'badge-warning' }}">
                                                        {{ ucfirst($purchase->payment_status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No purchases found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Subscription Activity Chart -->

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

        <script>
            $(document).ready(function() {
                demo.initChartsPages();
            });
        </script>
        <script>
            // Pie Chart for Solution Access
            var ctx1 = document.getElementById("chartSolutionAccess").getContext("2d");
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ["Viewed", "Partially Viewed", "Ignored", "Not Opened"],
                    datasets: [{
                        data: [50, 20, 15, 15],
                        backgroundColor: ["#007bff", "#ffc107", "#dc3545", "#6c757d"]
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    }
                }
            });

            // Line Chart for Subscription Usage
            var ctx2 = document.getElementById("subscriptionUsageChart").getContext("2d");
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    datasets: [{
                        label: "Sessions",
                        borderColor: "#17a2b8",
                        data: [3, 5, 4, 6, 7, 4, 5],
                        fill: false
                    }, {
                        label: "Renewals",
                        borderColor: "#ffc107",
                        data: [1, 0, 2, 1, 3, 2, 1],
                        fill: false
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
</body>

</html>
