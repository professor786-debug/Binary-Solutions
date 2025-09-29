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

    .custom-link {
        text-decoration: none;
        /* default: no underline */
    }

    .custom-link:hover {
        text-decoration: underline;
        /* hover par underline */
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
                    <h2>Login</h2>
                    <p>
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Login
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
        <img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <!-- START LOGIN -->
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

                @if (session('package_error'))
                    <div class="alert alert-danger">
                        {{ session('package_error') }}
                    </div>
                @endif

                @if (session('solution_error'))
                    <div class="alert alert-danger">
                        {{ session('package_error') }}
                    </div>
                @endif
                <div class="col-xl-6 mx-auto wow fadeIn">
                    {{-- <div class="text-center mb-3">
                        <a href="{{ route('google.login') }}"
                            class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                            <i class="fab fa-google mr-2"></i> Login with Google
                        </a>
                    </div>
                    <hr class="my-4"> --}}

                    <div class="login">
                        <h4 class="login_register_title">Already a Member? Sign In</h4>

                        <form action="{{ route('student.login') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="contact-name">Username<span>*</span></label>
                                <input type="text" id="contact-name" placeholder="Username or Email"
                                    class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="contact-email">Password<span>*</span></label>
                                    <a class="text-primary custom-link" href="{{ route('reset.password') }}">
                                        Forgot Password?
                                    </a>

                                </div>
                                <input type="password" placeholder="Enter Password" id="contact-email"
                                    class="form-control" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- <div class="form-check mb-4">
                                <input id="rpaword" class="form-check-input" type="checkbox" name="remember">
                                <label class="form-check-label" for="rpaword">
                                    Remember Me
                                </label>
                            </div> --}}

                            <div class="form-group col-lg-12">
                                <button class="bg-btn" type="submit" name="submit">
                                    Sign In <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>

                        <p>Don't have an account? <a href="{{ route('register') }}">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END LOGIN -->
    @include('main_footer')
</body>

</html>
