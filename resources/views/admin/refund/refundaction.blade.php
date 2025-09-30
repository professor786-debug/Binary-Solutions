<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('admin/img/favicon.ico') }}" />

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.header');
            <div class="main-sidebar sidebar-style-2">
                @include('admin.sidebar');
            </div>
            <div class="main-content" style="padding-top: 85px !important;">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <form method="POST" action="">

                                        <div class="card-header"
                                            style="text-align: center; display: flex; justify-content: center">
                                            <h4>Refund Actions</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label><strong>Select any Action</strong></label>
                                                <div class="d-flex flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="action_type" id="fullRefund" value="full">
                                                        <label class="form-check-label" for="fullRefund">Full
                                                            Refund</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="action_type" id="partialRefund" value="partial">
                                                        <label class="form-check-label" for="partialRefund">Partial
                                                            Refund</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="action_type" id="rejectRefund" value="reject">
                                                        <label class="form-check-label"
                                                            for="rejectRefund">Rejection</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Full Refund Fields -->
                                            <div id="fullRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <input type="text" name="full_reason" class="form-control"
                                                        placeholder="Enter reason for full refund">
                                                </div>
                                            </div>

                                            <!-- Partial Refund Fields -->
                                            <div id="partialRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group">
                                                    <label>Amount </label>
                                                    <input type="number" name="partial_percentage" class="form-control"
                                                        placeholder="e.g. 50">
                                                </div>
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <input type="text" name="partial_reason" class="form-control"
                                                        placeholder="Enter reason for partial refund">
                                                </div>
                                            </div>

                                            <!-- Rejection Fields -->
                                            <div id="rejectRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <input type="text" name="reject_reason" class="form-control"
                                                        placeholder="Enter reason for rejection">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
