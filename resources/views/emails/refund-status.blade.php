<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Refund Status</title>
    <style>
        body {
            background: #f5f7fa;
            font-family: "Helvetica", sans-serif;
        }

        .refund-card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 20px auto;
            background: #fff;
            padding: 25px;
            max-width: 600px;
        }

        .refund-heading {
            font-weight: 600;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .thankyou-text {
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
        }

        .btn-status {
            display: inline-block;
            margin: 15px auto 0;
            font-weight: 500;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
        }

        .icon-green {
            color: #28a745;
        }

        .icon-yellow {
            color: #ffc107;
        }

        .icon-red {
            color: #dc3545;
        }

        .border-success {
            border-top: 2px solid #28a745;
        }

        .border-warning {
            border-top: 2px solid #ffc107;
        }

        .border-danger {
            border-top: 2px solid #dc3545;
        }

        .btn-success {
            background: #28a745;
            color: #fff;
        }

        .btn-warning {
            background: #ffc107;
            color: #fff;
        }

        .btn-danger {
            background: #dc3545;
            color: #fff;
        }

        .logo-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-header img {
            max-width: 180px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container" style="text-align: center">
        <!-- Logo Header -->
        <div class="logo-header">
            <img src="https://via.placeholder.com/180x60?text=Your+Logo" alt="Company Logo">
        </div>

        <h2 class="text-center" style="text-align:center;margin-bottom:20px;">Refund Status Update</h2>

        <!-- Full Refund -->
        @if ($type === 'full')
            <div class="refund-card">
                <h4 class="refund-heading icon-green" style="justify-self:center">
                    💵 Full Refund
                </h4>
                <hr class="border-success" />
                <p>
                    Dear <strong>{{ $refund->student->name }}</strong>, <br><br>
                    We are pleased to inform you that your <strong>full amount of ${{ $refund->amount }}</strong>
                    has been successfully refunded to your account.
                </p>
                <p class="thankyou-text" style="color:#28a745;">✅ Thank you for your patience!</p>
                <a href="{{ url('/student/refund') }}" class="btn-status btn-success">Check Status</a>
                <br><br>

                <p style="margin-top:15px; font-size:14px; color:#6c757d; text-align:center;">
                    💬 If you have any questions, simply reply to this email — we’ll be happy to assist you.
                </p>
            </div>
        @endif

        <!-- Partial Refund -->
        @if ($type === 'partial')
            <div class="refund-card">
                <h4 class="refund-heading icon-yellow" style="justify-self:center">
                    🔄 Partial Refund
                </h4>
                <hr class="border-warning" />
                <p>
                    Dear <strong>{{ $refund->student->name }}</strong>, <br><br>
                    Your refund request has been <strong>partially approved</strong>.
                    You have received <strong>${{ number_format($refund->refund_amount, 2) }}</strong> as a partial
                    refund.


                    <br><br>
                    <strong>Reason:</strong> {{ $refund->rejection_reason ?? 'Not specified' }}
                </p>
                <p class="thankyou-text" style="color:#ffc107;">⚡ Thank you for your understanding!</p>
                <a href="{{ url('/student/refund') }}" class="btn-status btn-warning">Check Status</a>
                <br><br>

                <p style="margin-top:15px; font-size:14px; color:#6c757d; text-align:center;">
                    💬 If you have any questions, simply reply to this email — we’ll be happy to assist you.
                </p>
            </div>
        @endif

        <!-- Refund Rejected -->
        @if ($type === 'reject')
            <div class="refund-card">
                <h4 class="refund-heading icon-red" style="justify-self:center">
                    ❌ Refund Rejected
                </h4>
                <hr class="border-danger" />
                <p>
                    Dear <strong>{{ $refund->student->name }}</strong>, <br><br>
                    We regret to inform you that your refund request has been
                    <strong>rejected</strong>. <br><br>
                    <strong>Reason:</strong> {{ $refund->rejection_reason }}
                </p>
                <p class="thankyou-text" style="color:#dc3545;">🙏 Thank you for contacting us!</p>
                <a href="{{ url('/student/refund') }}" class="btn-status btn-danger">Check Status</a>
                <br><br>

                <p style="margin-top:15px; font-size:14px; color:#6c757d; text-align:center;">
                    💬 If you have any questions, simply reply to this email — we’ll be happy to assist you.
                </p>
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} Binary Solutions. All rights reserved.
        </div>
    </div>
</body>

</html>
