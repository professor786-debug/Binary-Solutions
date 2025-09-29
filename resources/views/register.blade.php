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

    .alert-nw {
        text-align: center;
        color: green;
        font-weight: 600;
    }
</style>

<body>
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
    </section>
    <!-- End Main Banner -->

    <!-- START LOGIN AND REGISTER -->
    <section class="login_register section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mx-auto wow fadeIn">
                    <div class="register">
                        <h4 class="login_register_title">Create a new account</h4>

                        <!-- ✅ Messages will show here -->
                        <form id="registerForm" action="{{ route('student.register') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="username">Username<span>*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
<<<<<<< HEAD
=======

>>>>>>> ace71b301c96a6c869ae0caff32b3032cefff122
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name<span>*</span></label>
                                <input type="text" name="full_name" class="form-control"
                                    value="{{ old('full_name') }}">
                            </div>

                            <!-- Phone Field -->
                            <div class="form-group mb-4">
                                <label for="phone">Whatsapp No<span>*</span></label>
                                <input type="tel" id="phone" name="contact_no" class="form-control"
                                    value="{{ old('contact_no') }}">
                                <small id="phone-error" class="text-danger"></small>
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span>*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
<<<<<<< HEAD
=======

>>>>>>> ace71b301c96a6c869ae0caff32b3032cefff122
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
<<<<<<< HEAD
=======


>>>>>>> ace71b301c96a6c869ae0caff32b3032cefff122
                            </div>

                            <div class="form-group">
                                <label for="password">Password<span>*</span></label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="bg-btn">Register</button>
                        </form>

                        <div id="form-messages" class="mt-3"></div>

                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
<<<<<<< HEAD

                        <div class="text-center mb-3 mt-3">
                            <a href="{{ route('google.login') }}"
                                class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                                <i class="fab fa-google" style="margin-right: 7px"></i> Signup with Google
                            </a>
=======

                        <div class="text-center mb-3 mt-3">

                            <div class="text-center mb-3     mt-3">

                                <a href="{{ route('google.login') }}"
                                    class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                                    <i class="fab fa-google" style="margin-right: 7px"></i> Signup with Google
                                </a>
                            </div>



                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->

>>>>>>> ace71b301c96a6c869ae0caff32b3032cefff122
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
<<<<<<< HEAD
=======

>>>>>>> ace71b301c96a6c869ae0caff32b3032cefff122
    </section>
    <!-- END LOGIN AND REGISTER -->
    @include('main_footer')

    <!-- intl-tel-input scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            initialCountry: "us",
            preferredCountries: ["us", "pk", "gb", "in", "sa"],
            separateDialCode: true,
            placeholderNumberType: "MOBILE",
            customPlaceholder: function() {
                return "Enter Whatsapp number";
            }
        });

        $("#registerForm").on("submit", function(e) {
            e.preventDefault();

            let fullNumber = iti.getNumber();
            $("#phone").val(fullNumber);

            $("#form-messages").html('<div class="alert alert-info">Processing...</div>');

            $.ajax({
                url: "{{ route('student.register') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $.post("{{ route('student.sendVerification') }}", {
                            email: response.email,
                            token: response.token,
                            _token: "{{ csrf_token() }}"
                        });

                        $("#form-messages").html(
                            '<div class="alert alert-nw">' + response.message + '</div>'
                        );

                        $("#registerForm")[0].reset();
                        iti.setCountry("us");
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '<div class="alert text-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessages += '<li>' + value[0] + '</li>';
                        });
                        errorMessages += '</ul></div>';
                        $("#form-messages").html(errorMessages);
                    } else {
                        $("#form-messages").html(
                            '<div class="alert text-danger">Something went wrong. Please try again.</div>'
                        );
                    }
                }
            });
        });
    </script>
</body>

</html>
