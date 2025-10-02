<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('student/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('student/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Subscription</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('student/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <link href="{{ asset('student/demo/demo.css') }}" rel="stylesheet" />
    <style>
        .refund-btn {
            margin-left: 17px
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
                        <a class="navbar-brand" href="javascript:;">Subscription</a>
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
                                <h4 class="card-title">Refund Request</h4>
                            </div>
                            <div>
                                <button type="button" class="btn btn-info refund-btn" data-toggle="modal"
                                    data-target="#refundModal">
                                    Request Refund
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Student Name</th>
                                                <th>Amount</th>
                                                <th>Card Last 4</th>
                                                <th>Payment Status</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                                <th>Decision Reason (Approved / Partial / Rejected)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($refundRequests as $request)
                                                <tr>
                                                    <td>{{ $request->transaction_id }}</td>
                                                    <td>{{ $request->student->name }}</td>
                                                    <td>${{ number_format($request->amount, 2) }}</td>
                                                    <td>**** **** **** {{ $request->card_last4 }}</td>
                                                    <td>
                                                        @if ($request->payment_status === 'paid')
                                                            <span class="badge badge-success">Paid</span>
                                                        @else
                                                            <span class="badge badge-danger">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $request->reason ?? '—' }}</td>
                                                    <td>
                                                        @if ($request->status === 'pending')
                                                            <span class="badge badge-warning">Pending</span>
                                                        @elseif($request->status === 'completed')
                                                            <span class="badge badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </td>
                                                      <td>{{ $request->rejection_reason ?? '—' }}</td>

                                                </tr>
                                            @endforeach
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
    <!-- Refund Request Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" role="dialog" aria-labelledby="refundModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('refund-requests.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ Auth::guard('student')->id() }}">
                <input type="hidden" name="subscription_id"
                    value="{{ optional(Auth::guard('student')->user()->latestSubscription)->id }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="refundModalLabel">Request a Refund</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="transaction_id">Transaction ID</label>
                            <input type="text" class="form-control" name="transaction_id" required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" name="amount" required>
                        </div>

                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" name="reason" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="card_last_four">Card Last 4 Digits</label>
                            <input type="text" class="form-control" maxlength="4" name="card_last_four">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
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
