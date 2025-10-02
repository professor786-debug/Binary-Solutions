<!DOCTYPE html>
<html lang="en">
<x-head />

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
    <section class="main-banner" style="background-image: url(assets/img/bg/course-bg.jpg); ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center z-1 position-relative wow fadeInUp" style="margin-top: 4rem">
                    <h2>Contact</h2>
                    <p>
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Contact
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
        <img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <!-- Start Contact Us -->
    <section class="contact_us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow fadeInLeft">
                    <div class="contact_content">
                        <div class="contact-img position-relative">
                            <img src="assets/img/contact/contact.jpg" class="con_main_img" alt="image">
                            <img src="assets/img/contact/cicon.svg" class="cont-icon z-1" alt="image">
                        </div>
                        <div class="contact_info position-relative z-1">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_list bbottom bright">
                                        <div class="cicon">
                                            <i class='bx bx-phone-call'></i>
                                        </div>
                                        <div class="cinfo_content">
                                            <h4>For any Query?</h4>
                                            <p>
                                                <a href="#">Free +68 (026)-9879</a>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End contact_list -->

                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_list bbottom">
                                        <div class="cicon">
                                            <i class='bx bx-envelope'></i>
                                        </div>
                                        <div class="cinfo_content">
                                            <h4>Write email Us</h4>
                                            <p>
                                                <a href="#">support@example.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End contact_list -->

                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_list bright">
                                        <div class="cicon">
                                            <i class='bx bx-map'></i>
                                        </div>
                                        <div class="cinfo_content">
                                            <h4>Visit anytime</h4>
                                            <p>
                                                427 Hall Place Longview
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End contact_list -->

                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_list cllast">
                                        <div class="cicon">
                                            <i class='bx bx-time'></i>
                                        </div>
                                        <div class="cinfo_content">
                                            <h4>Office Time</h4>
                                            <p>
                                                10AM - 10PM
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End contact_list -->
                            </div>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-xl-6 wow fadeInRight">
                    <div class="contact-form align-self-center">
                        <div class="section-title">
                            <span>Send us email</span>
                            <h2>Feel Free to write</h2>
                        </div>

                        <form id="contact-form" method="post" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" name="name" placeholder="Enter Name" class="form-control">
                                </div>

                                <div class="col-xl-6">
                                    <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                </div>

                                <div class="col-xl-6">
                                    <input type="text" name="subject" placeholder="Enter Subject"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6">
                                    <input type="text" name="phone" placeholder="Enter Phone" class="form-control">
                                </div>

                                <div class="col-12">
                                    <textarea placeholder="Enter Message" name="message" class="form-control"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="bg-btn">Send Message</button>
                                </div>
                                @if (session('success'))
                                    <div class="alert" style="color: green; text-align: center">
                                        {{ session('success') }}
                                    </div>
                                @endif

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
                        </form>
                        <p class="form-message mt-4 text-center"></p>
                    </div>
                </div> <!-- End Col -->

            </div>
        </div>
    </section>
    <!-- End Contact Us -->

    <!-- Start google_map -->
    <div class="google_map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107671.30068149016!2d-94.83771425184243!3d32.5066944202184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x863635ff97df3351%3A0xb30ff0f774195933!2sLongview%2C%20TX%2C%20USA!5e0!3m2!1sen!2sbd!4v1709976191256!5m2!1sen!2sbd"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End google_map -->
    @include('main_footer')
</body>

</html>
