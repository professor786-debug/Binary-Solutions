<!DOCTYPE html>
<html lang="en">
<x-head />
<style>
    .main-banner {
        padding: 120px 0;
    }

    .section-padding {
        padding: 37px 0;
    }

    .iti {
        width: 100%;
    }

    .iti__placeholder {
        color: #6c757d;
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
                    <h2>Register</h2>
                    <p>
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Register
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" class="blshape">
        <img src="assets/img/shapes/hstart.svg" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <!-- START LOGIN AND REGISTER -->
    <section class="login_register section-padding">
        <div class="container">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="col-xl-6 mx-auto wow fadeIn">
                    <div class="register">
                        <h4 class="login_register_title">Create a new account</h4>
                        <div id="form-messages"></div>
                        <form id="registerForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username<span>*</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name<span>*</span></label>
                                <input type="text" name="full_name" class="form-control">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
                                <label for="contact_no">Contact No<span>*</span></label>
                                <input type="text" name="contact_no" class="form-control">
=======
                            <!-- New Phone Field with Country Code -->
                            <div class="form-group mb-4">
                                <label for="phone">Whatsapp No<span>*</span></label>
                                <input type="tel" id="phone" name="contact_no" class="form-control"
                                    value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
>>>>>>> f733c3fdfe85aa2279fe5d7f9e44f4625401dc5b
                            </div>
                            <!-- End New Phone Field -->

                            <div class="form-group ">
                                <label for="email">Email<span>*</span></label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password<span>*</span></label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="bg-btn">Register</button>
                        </form>

                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                        <div class="text-center mb-3     mt-3">
                            <a href="{{ route('google.login') }}"
                                class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                                <i class="fab fa-google" style="margin-right: 7px"></i> Signup with Google
                            </a>
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END LOGIN AND REGISTER -->
    @include('main_footer')
<<<<<<< HEAD
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AJAX for Register -->
    <script>
        $("#registerForm").on("submit", function(e) {
            e.preventDefault();

            $("#form-messages").html('<div class="alert alert-info">Processing...</div>');

            $.ajax({
                url: "{{ route('student.register') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Send verification email in background
                        $.post("{{ route('student.sendVerification') }}", {
                            email: response.email,
                            token: response.token,
                            _token: "{{ csrf_token() }}"
                        });

                        $("#form-messages").html(
                            '<div class="alert alert-success">' + response.message + '</div>'
                        );

                        $("#registerForm")[0].reset(); // clear form
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessages += '<li>' + value[0] + '</li>';
                        });
                        errorMessages += '</ul></div>';
                        $("#form-messages").html(errorMessages);
                    } else {
                        $("#form-messages").html(
                            '<div class="alert alert-danger">Something went wrong. Please try again.</div>'
                        );
                    }
                }
            });
        });
=======

    <!-- intl-tel-input scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>

    <script>
        const input = document.querySelector("#phone");
        if (input) {
            window.intlTelInput(input, {
                initialCountry: "us", // Default US
                preferredCountries: ["us", "pk", "gb", "in", "sa"],
                separateDialCode: true,
                placeholderNumberType: "MOBILE",
                customPlaceholder: function() {
                    return "Enter whatsapp number";
                }
            });
        }
>>>>>>> f733c3fdfe85aa2279fe5d7f9e44f4625401dc5b
    </script>
</body>

</html>
