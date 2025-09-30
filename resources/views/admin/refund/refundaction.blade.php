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
            <div class="navbar-bg"></div> @include('admin.header'); <div class="main-sidebar sidebar-style-2">
                @include('admin.sidebar'); </div>
            <div class="main-content" style="padding-top: 85px !important;">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card"> <!-- ✅ Updated form -->
                                    <form method="POST" action="{{ route('admin_refund_handle', $refund->id) }}"> @csrf
                                        <div class="card-header"
                                            style="text-align: center; display: flex; justify-content: center">
                                            <h4>Refund Actions</h4>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="card-body">
                                            <div class="form-group"> <label><strong>Select any Action</strong></label>
                                                <div class="d-flex flex-column">
                                                    <div class="form-check"> <input class="form-check-input"
                                                            type="radio" name="action_type" id="fullRefund"
                                                            value="full"> <label class="form-check-label"
                                                            for="fullRefund">Full Refund</label> </div>
                                                    <div class="form-check"> <input class="form-check-input"
                                                            type="radio" name="action_type" id="partialRefund"
                                                            value="partial"> <label class="form-check-label"
                                                            for="partialRefund">Partial Refund</label> </div>
                                                    <div class="form-check"> <input class="form-check-input"
                                                            type="radio" name="action_type" id="rejectRefund"
                                                            value="reject"> <label class="form-check-label"
                                                            for="rejectRefund">Rejection</label> </div>
                                                </div>
                                            </div> <!-- Full Refund Fields -->
                                            <div id="fullRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group"> <label>Reason</label> <input type="text"
                                                        name="full_reason" class="form-control"
                                                        placeholder="Enter reason for full refund"> </div>
                                            </div> <!-- Partial Refund Fields -->
                                            <div id="partialRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group">
                                                    <label>Amount ($)</label>
                                                    <input type="number" name="amount" id="partial_amount"
                                                        class="form-control" placeholder="e.g. 25.99" min="0.01"
                                                        step="0.01">
                                                    <small id="partial_amount_error"
                                                        style="color:red; display:none;"></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <input type="text" name="reason" class="form-control"
                                                        placeholder="Enter reason for partial refund">
                                                </div>
                                            </div>

                                            <script>
                                                const refundId = "{{ $refund->id }}"; // ✅ fixed variable name
                                                const input = document.getElementById("partial_amount");
                                                const errorMsg = document.getElementById("partial_amount_error");
                                                let paidAmount = 0;

                                                // ✅ Fetch paid amount from DB (AJAX)
                                                fetch(`/panel/admin/refund/paid-amount/${refundId}`)
                                                    .then(res => res.json())
                                                    .then(data => {
                                                        paidAmount = parseFloat(data.amount);
                                                    });

                                                // ✅ Real-time validation
                                                input.addEventListener("input", function() {
                                                    const val = parseFloat(this.value);

                                                    if (!isNaN(val) && val > paidAmount) {
                                                        errorMsg.style.display = "block";
                                                        errorMsg.innerText = `Enter amount under $${paidAmount.toFixed(2)}`;
                                                        this.setCustomValidity("Invalid");
                                                    } else {
                                                        errorMsg.style.display = "none";
                                                        this.setCustomValidity("");
                                                    }
                                                });
                                            </script>



                                            <!-- Rejection Fields -->
                                            <div id="rejectRefundFields" class="action-fields" style="display:none;">
                                                <div class="form-group"> <label>Reason</label> <input type="text"
                                                        name="reject_reason" class="form-control"
                                                        placeholder="Enter reason for rejection"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center"> <button type="submit"
                                                class="btn btn-primary">Submit</button> </div>
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
    <script src="{{ asset('admin/js/custom.js') }}"></script> <!-- ✅ JS for showing/hiding fields -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fullRefund = document.getElementById("fullRefund");
            const partialRefund = document.getElementById("partialRefund");
            const rejectRefund = document.getElementById("rejectRefund");
            const fullFields = document.getElementById("fullRefundFields");
            const partialFields = document.getElementById("partialRefundFields");
            const rejectFields = document.getElementById("rejectRefundFields");

            function toggleFields() {
                fullFields.style.display = fullRefund.checked ? "block" : "none";
                partialFields.style.display = partialRefund.checked ? "block" : "none";
                rejectFields.style.display = rejectRefund.checked ? "block" : "none";
            } [fullRefund, partialRefund, rejectRefund].forEach(radio => {
                radio.addEventListener("change", toggleFields);
            });
        });
    </script>
</body>

</html>
