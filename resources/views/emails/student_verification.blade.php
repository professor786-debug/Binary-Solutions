<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Binary Solutions Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f6f9fc;
            padding: 30px 0;
        }
        .email-content {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            max-width: 150px;
        }
        h2 {
            color: #333333;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555555;
            line-height: 1.5;
            margin: 20px 0;
        }
        .button {
            display: block;
            width: fit-content;
            margin: 30px auto;
            padding: 14px 28px;
            background-color: #674CEF;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 40px;
        }
    </style>
</head>
    <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <div class="email-wrapper" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
            <div class="email-content" style="background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);">
                <div class="logo" style="text-align: center; margin-bottom: 25px;">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="Binary Solutions LLC" style="max-width: 180px; height: auto;">
                </div>

                <h2 style="color: #2c3e50; font-size: 22px; margin-top: 0; text-align: center;">Welcome to Binary Solutions LLC!</h2>

                <p style="margin-bottom: 20px;">Thank you for registering with <strong>Binary Solutions LLC</strong>. To complete your registration and access your account, please verify your email address by clicking the button below:</p>

                <div style="text-align: center; margin: 25px 0;">
                    <a href="{{ url('/verify-student/' . $token) }}" class="button" style="display: inline-block; background-color: #0066ff; color: #ffffff; padding: 12px 24px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 16px;">Verify Email Address</a>
                </div>

                <p style="color: #777; font-size: 14px; margin-bottom: 25px;">If you did not create an account with us, please ignore this email or contact our support team.</p>

                <div class="footer" style="border-top: 1px solid #eee; padding-top: 20px; text-align: center; font-size: 12px; color: #999;">
                    &copy; {{ date('Y') }} Binary Solutions LLC. All rights reserved.<br>
                    <span style="font-size: 11px;">Need help? Email us at <a href="mailto:Contact@thebinarysolutionsllc.com" style="color: #0066ff;">Contact@thebinarysolutionsllc.com</a></span>
                </div>
            </div>
        </div>
    </body>
</html>
