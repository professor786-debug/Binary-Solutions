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

        td {
            white-space: nowrap;
            /* ek hi line me rakhega */
        }

        .table-responsive {
            overflow-x: auto;
        }

        .dropdown-toggle::after {
            display: none !important;
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
                                            <table class="table table-striped" id="table-1">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Transaction ID</th>
                                                        <th>Reason</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($refunds as $refund)
                                                        <tr>
                                                            <td>{{ $refund->id }}</td>
                                                            <td>{{ $refund->student->name ?? 'N/A' }}</td>
                                                            <td
                                                                style="max-width: 200px; white-space: normal; word-break: break-all;">
                                                                {{ $refund->transaction_id }}</td>
                                                            <td>{{ $refund->reason ?? 'N/A' }}</td>
                                                            <td><span class="badge">${{ $refund->amount }}</span></td>
                                                            <td>
                                                                @if ($refund->status == 'completed')
                                                                    <span class="badge bg-success">Completed</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-secondary">{{ ucfirst($refund->status) }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($refund->status === 'completed')
                                                                    <button class="btn btn-primary btn-sm" disabled>
                                                                        Take Action
                                                                    </button>
                                                                @elseif ($refund->status === 'rejected')
                                                                    <button class="btn btn-primary btn-sm" disabled>
                                                                        Take Action
                                                                    </button>
                                                                @else
                                                                    <a href="{{ route('admin_refund_action', ['id' => $refund->id]) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        Take Action
                                                                    </a>
                                                                @endif
                                                            </td>



                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center text-muted">No refund
                                                                requests found</td>
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
                </section>

                <!-- Dummy Modal -->

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
