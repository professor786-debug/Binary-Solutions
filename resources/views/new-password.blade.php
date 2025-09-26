<!DOCTYPE html>
<html lang="en">
<x-head />

<style>
    .main-banner {
        padding: 140px 0 50px 0;
    }

    .section-padding {
        padding: 37px 0;
    }

    body {
        background: #f4f7fa;
        font-family: 'Segoe UI', sans-serif;
    }

    .reset-card {
        max-width: 420px;
        margin: 40px auto;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        background: #fff;
    }

    .reset-card h3 {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .reset-card p {
        color: #6c757d;
        font-size: 15px;
    }

    .btn-primary {
        border-radius: 50px;
        padding: 10px;
        font-weight: 500;
    }

    .bg-btn {
        width: 100%
    }

    .form-control {
        margin-bottom: 0px
    }
</style>

<body>

    <!-- START PRELOADER -->
    {{-- <div id="loader"></div> --}}
    <!--  END PRELOADER -->

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="assets/img/logo.svg" alt="edutec">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mobile-menu fix mb-3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Start Header -->
    @include('header')
    <!-- End Header -->

    <!-- Start Main Banner -->
    <section class="main-banner" style="background-image: url(assets/img/bg/course-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center z-1 position-relative wow fadeInUp">
                    <h2>Reset Password</h2>
                    <p>
                        <a href="#">Login</a> <i class='bx bx-chevrons-right'></i> Reset
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
        <img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <div class="container">
        <div class="reset-card">
            <h4 class="text-center">Set New Password</h4>

            <form id="newPasswordForm">
                @csrf
                <!-- Hidden values from reset link -->
                <input type="hidden" name="email" value="{{ request('email') }}">
                <input type="hidden" name="token" value="{{ request('token') }}">

                <div class="mb-3">
                    <label for="newPassword" class="form-label"></label>
                    <input type="password" class="form-control" name="password" id="newPassword"
                        placeholder="Enter New Password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label"></label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmPassword"
                        placeholder="Confirm New Password" required>
                </div>
                <div class="form-group col-lg-12">
                    <button class="bg-btn" type="submit" name="submit">
                        Confirm Password <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>

            <!-- Messages -->
            <div id="newpass-messages" class="mt-3"></div>
        </div>
    </div>

    @include('main_footer')

    <script>
        $("#newPasswordForm").on("submit", function(e) {
            e.preventDefault();

            let $btn = $(this).find("button[type=submit]");
            let originalBtnHtml = $btn.html();

            // Disable button and show spinner
            $btn.prop("disabled", true).html(
                'Please wait... <i class="fa fa-spinner fa-spin"></i>'
            );

            $.ajax({
                url: "{{ route('password.reset') }}", // backend route
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $("#newpass-messages").html(
                        '<div class="alert alert-success">' + response.message +
                        '<br><a href="{{ route('login') }}" class="text-primary">Click here to login again</a></div>'
                    );
                    $("#newPasswordForm")[0].reset();
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON?.message || "Something went wrong";
                    $("#newpass-messages").html(
                        '<div class="alert alert-danger">' + msg + '</div>'
                    );
                },
                complete: function() {
                    // Re-enable button with original text
                    $btn.prop("disabled", false).html(originalBtnHtml);
                }
            });
        });
    </script>

</body>

</html>
