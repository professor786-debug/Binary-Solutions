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
        .compact-table th,
        .compact-table td {
            padding: 6px 10px !important;
            vertical-align: middle;
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
                    <div class="row ">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Weekly Revenuessss</h5>
                                                    <h2 class="mb-3 font-18">${{ number_format($weeklyRevenue, 2) }}
                                                    </h2>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="{{ asset('admin/img/banner/1.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="card-content">

                                        <div class="row align-items-center">
                                            <!-- Table left -->
                                            <div class="col-md-7">
                                                <table class="table table-bordered table-sm compact-table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-15 text-start">Registered Users</th>
                                                            <td class="font-18 text-center">{{ $users }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-15 text-start">Customers</th>
                                                            <td class="font-18 text-center">{{ $customers }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-15 text-start">Purchases</th>
                                                            <td class="font-18 text-center">{{ $purchases }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Image right -->
                                            <div class="col-md-5 text-center mb-3 mb-md-0">
                                                <div class="banner-img">
                                                    <img src="{{ asset('admin/img/banner/2.png') }}" alt="stats image"
                                                        class="img-fluid" style="max-height: 200px;">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4 p-3">
                                    <div class="row align-items-center">
                                        <!-- Table on left -->
                                        <div class="col-md-6" style="padding: 17px 10px;">
                                            <table class="table table-bordered  table-sm compact-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Solutions</td>
                                                        <td>{{ $solutions }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Custom Solutions</td>
                                                        <td>{{ $customSolutions }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Image on right -->
                                        <div class="col-md-6 text-center">
                                            <div class="banner-img">
                                                <img src="{{ asset('admin/img/banner/3.png') }}" alt=""
                                                    class="img-fluid" style="max-height:120px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Revenue (Year)</h5>
                                                    <h2 class="mb-0 m-b-0">${{ number_format($yearlyRevenue, 2) }}</h2>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="{{ asset('admin/img/banner/4.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Revenue chart</h4>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div id="chart1"></div>
                                            <div class="row mb-0">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i
                                                                data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="m-b-0">${{ number_format($weeklyRevenue, 2) }}
                                                            </h5>
                                                            <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i
                                                                data-feather="arrow-down-circle"
                                                                class="col-orange"></i>
                                                            <h5 class="m-b-0">
                                                                ${{ number_format($monthlyRevenue, 2) }}</h5>
                                                            <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i
                                                                data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="mb-0 m-b-0">
                                                                ${{ number_format($yearlyRevenue, 2) }}</h5>
                                                            <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mt-5">
                                                <div class="col-7 col-xl-7 mb-3">Total customers</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">{{ $totalCustomers }}</span>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total Income</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span
                                                        class="text-big">${{ number_format($totalIncome, 2) }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        window.revenueData = {
                            weekly: {{ $weeklyRevenue }},
                            monthly: {{ $monthlyRevenue }},
                            yearly: {{ $yearlyRevenue }}
                        };
                    </script>

                    <div class="row">

                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
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
</body>

</html>
