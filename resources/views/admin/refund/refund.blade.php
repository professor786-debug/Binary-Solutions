<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Binary - Admin Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}" />
    <style>
        .btn-upload {
            width: 116px !important;
        }
    </style>
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

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Refund Requests</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Transaction ID</th>
                                                        <th>Reason</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Card Last Digits</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Dummy Row 1 -->
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Ali Khan</td>
                                                        <td>Blanditiis sunt nat</td>
                                                        <td>Dolor libero excepte</td>
                                                        <td><span class="badge">$20</span></td>
                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                        <td><span>4242</span></td>
                                                        <td><span class="text-muted">
                                                                <button class="btn btn-sm btn-success btn-upload"
                                                                    data-toggle="modal" data-target="#priceModal-2">
                                                                    Refund
                                                                </button></span></td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Dummy Modal -->
                <div class="modal fade" id="priceModal-2" tabindex="-1" role="dialog"
                    aria-labelledby="priceModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="priceModalLabel-2">Upload Solution
                                        File for #2</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="solution_file">Solution File</label>
                                        <input type="file" name="solution_file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <footer class="main-footer">
                <div class="footer-left">Footer Section</div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/datatables.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>

</body>

</html>
