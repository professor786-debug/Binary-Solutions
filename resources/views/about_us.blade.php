<!DOCTYPE html>
<html lang="en">
<x-head />
<style>
    .dropdown-features .arrow.rotate {
        transform: rotate(180deg);
    }

    .dropdown-features .dropdown-body.show {
        display: block !important;
    }

    .service-card-hover {
        transition: transform 0.2s;
    }

    .service-card-hover:hover {
        transform: scale(1.05);
        z-index: 2;
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
    <div> @include('header')</div>

    <!-- Start Main Banner -->
    <section class="main-banner position-relative" style="background-image: url(assets/img/bg/course-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center z-1 mt-5 position-relative wow fadeInUp">
                    <h2>ABOUT US</h2>
                    <p>
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> About <Us></Us>
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
        <img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    {{-- About Section --}}

    <!-- About Us Section -->
    <section class="about-area py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="assets/img/why/why.jpg" alt="Our Team" class="img-fluid rounded shadow wow fadeInLeft">
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3">Who We Are</h3>
                    <p class="text-muted mb-4">
                        Binary Solutions is dedicated to empowering students and teachers by providing innovative
                        educational services. Our platform offers a Solution Store for purchasing ready-made problem
                        solutions, Custom Solutions tailored to individual academic needs, and a PDF Formatter to help
                        writers manage and convert documents according to international formatting standards. We strive
                        to make learning and teaching more efficient, accessible, and effective for everyone in the
                        academic community.
                        We are a passionate team dedicated to delivering innovative digital solutions. Our mission is to
                        empower businesses with cutting-edge technology and creative strategies that drive growth and
                        success.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> Ready-made solutions for
                            quick academic help</li>
                        <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> Custom solutions tailored to
                            individual needs</li>
                        <li class="mb-2"><i class="bx bx-check-circle text-primary"></i> PDF formatting for writers
                            and researchers</li>
                        <li><i class="bx bx-check-circle text-primary"></i> Empowering students and teachers with
                            innovative tools</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-area py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h3>Our Core Services</h3>
                <p class="text-muted">Delivering excellence across a range of digital solutions</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 wow fadeInUp service-card-hover"
                        style="background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%); transition: transform 0.4s;">
                        <div class="mb-3">
                            <i class="bx bx-cog fs-1 text-primary"></i>
                        </div>
                        <h5 class="mb-2">Custom Solutions</h5>
                        <p class="text-muted">Tailored digital solutions designed to meet your unique problems
                            challenges and goals.</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 wow fadeInUp service-card-hover"
                        data-wow-delay="0.2s"
                        style="background: linear-gradient(135deg, #f9f26e 0%, #acab76 100%); transition: transform 0.2s;">
                        ">
                        <div class="mb-3">
                            <i class="bx bx-store fs-1 text-success"></i>
                        </div>
                        <h5 class="mb-2">Solutions Store</h5>
                        <p class="text-muted">A curated store of ready-to-use problems solutions and tools to accelerate
                            your results.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 wow fadeInUp service-card-hover"
                        data-wow-delay="0.4s"
                        style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); transition: transform 0.2s;">
                        <div class="mb-3">
                            <i class="bx bx-file fs-1 text-warning"></i>
                        </div>
                        <h5 class="mb-2">PDF Formatter</h5>
                        <p class="text-muted">Advanced PDF formatting services to streamline your document management
                            and presentation.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- About Section End --}}

    <!-- End Blog -->
    @include('main_footer')
    <!-- Start progress-wrap -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- End progress-wrap -->

    {{-- Custom JS code --}}
    <script>
        document.querySelectorAll('.dropdown-header').forEach(function(header) {
            header.addEventListener('click', function() {
                var body = header.nextElementSibling;
                body.style.display = body.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
    <!-- Latest jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery-simple-mobilemenu.min -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- modernizer JS -->
    <script src="assets/js/modernizr-2.8.3.min.js"></script>
    <!-- owl-carousel min js  -->
    <script src="assets/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- counterup -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- jquery appear js -->
    <script src="assets/js/jquery.appear.js"></script>
    <!-- magnific-popup js -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- swiper-bundle.min js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- YouTubePopUp js -->
    <script src="assets/js/YouTubePopUp.jquery.js"></script>
    <!-- yvpopup-active js -->
    <script src="assets/js/yvpopup-active.js"></script>
    <!-- Wow js -->
    <script src="assets/js/wow.js"></script>
    <!-- slick js -->
    <script src="assets/js/slick.js"></script>
    <!-- scroll-top js -->
    <script src="assets/js/scroll-top.js"></script>
    <!-- scripts js -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>
