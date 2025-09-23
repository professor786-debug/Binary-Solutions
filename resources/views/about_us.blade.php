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

    .icon-custom-sol {
        width: 67%;
        justify-self: center;
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
    <section class="course-category section-padding">
        <div class="container">
            <div class="section-title text-center wow fadeInUp">
                <span>Our Core Services</span>
                <h2>
                    Delivering excellence across a range of digital solutions
                </h2>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="category-item">
                        <div class="cat_content">
                            <a href="{{ route('solution_store') }}">
                                <div class="cicon">
                                    <!-- Store colored icon SVG -->
                                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                                        <rect x="3" y="14" width="36" height="22" rx="3"
                                            fill="#4F8BFF" />
                                        <rect x="7" y="18" width="28" height="14" rx="2"
                                            fill="#fff" />
                                        <rect x="13" y="24" width="6" height="8" rx="1"
                                            fill="#FFD600" />
                                        <rect x="23" y="24" width="6" height="8" rx="1"
                                            fill="#FF7043" />
                                        <rect x="3" y="10" width="36" height="8" rx="2"
                                            fill="#FFB300" />
                                        <rect x="7" y="6" width="28" height="8" rx="2" fill="#FF7043" />
                                        <rect x="15" y="2" width="12" height="6" rx="2"
                                            fill="#4F8BFF" />
                                        <rect x="19" y="28" width="4" height="4" rx="1"
                                            fill="#4F8BFF" />
                                        <rect x="11" y="18" width="20" height="2" rx="1"
                                            fill="#E0E0E0" />
                                        <rect x="11" y="30" width="20" height="2" rx="1"
                                            fill="#E0E0E0" />
                                        <rect x="19" y="18" width="4" height="14" rx="1"
                                            fill="#B3E5FC" />
                                    </svg>
                                </div>
                                <h4>Solution Store</h4>
                                <p>A curated store of ready-to-use problems solutions and tools to accelerate
                                    your results.</p>
                            </a>
                        </div>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor1">
                        <div class="cat_content">
                            <a href="">
                                <div class="cicon">
                                    <!-- Custom Solutions Colored Icon SVG -->
                                    <div class="icon-custom-sol">
                                        <img src="{{ asset('assets/img/about/solution-icon.png') }}"
                                            alt="Custom Solutions">
                                    </div>
                                </div>

                                <h4>Custom Solutions</h4>
                                <p>Tailored digital solutions designed to meet your unique problems
                                    challenges and goals.</p>
                            </a>
                        </div>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor3">
                        <div class="cat_content">
                            <a href="">
                                <div class="cicon">
                                    <div class="icon-custom-sol">
                                        <img src="{{ asset('assets/img/about/formatting-tool.png') }}"
                                            alt="Custom Solutions">
                                    </div>
                                </div>
                                <h4>Formatting Tool</h4>
                                <p>Advanced PDF formatting services to streamline your document management
                                    and presentation.</p>
                            </a>
                        </div>
                    </div>
                </div><!-- End Col -->

                {{-- <div class="col-xl-3 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor2">
                        <div class="cat_content">
                            <a href="{{ route('category_detail') }}">
                                <div class="cicon">
                                    <svg fill="none" viewBox="0 0 42 42">
                                        <g fill="#fff" fill-rule="evenodd" clip-path="url(#clip0_212_7330)"
                                            clip-rule="evenodd">
                                            <path
                                                d="M41.959 24.24v3.035a5.108 5.108 0 01-1.723.698 31.607 31.607 0 01-.902 1.927c.249.428.481.865.697 1.313.055.191.055.383 0 .574-.585.668-1.2 1.31-1.846 1.928-.235.12-.48.147-.738.082a31.445 31.445 0 01-1.353-.697 8.731 8.731 0 01-1.846.82 52.514 52.514 0 00-.533 1.559.63.63 0 01-.533.287c-.909.076-1.811.049-2.707-.082a.724.724 0 01-.288-.287c-.162-.514-.34-1.02-.533-1.518a9.652 9.652 0 01-1.845-.78c-.445.244-.896.476-1.354.698a1.025 1.025 0 01-.574 0 27.994 27.994 0 01-1.846-1.764.756.756 0 01-.123-.615 31.564 31.564 0 00-3.937.041c.35.954.691 1.911 1.025 2.871.828.068 1.662.108 2.502.123.352.31.42.679.205 1.108a.772.772 0 01-.205.123c-4.698.135-9.402.163-14.11.082-.605-.158-.782-.527-.533-1.108l.205-.205 2.461-.082c.413-.978.768-1.976 1.067-2.994-3.446.014-6.89 0-10.336-.041-1.138-.249-1.903-.919-2.297-2.01V8.244C.356 6.96 1.231 6.262 2.584 6.152c9.353-.08 18.705-.053 28.055.082 1.103.365 1.773 1.117 2.01 2.256.04 2.406.054 4.813.04 7.219.406-.072.748.038 1.026.328.19.541.394 1.074.615 1.6.625.176 1.226.409 1.805.697.447-.182.884-.387 1.312-.615.219-.055.438-.055.656 0 .698.588 1.34 1.23 1.928 1.927.055.192.055.383 0 .575l-.697 1.394c.36.586.605 1.214.738 1.887a33.33 33.33 0 011.559.451c.099.113.208.209.328.287zM2.502 7.506c9.3-.04 18.597 0 27.89.123.465.191.752.533.862 1.025.04 2.352.055 4.703.04 7.055a1.43 1.43 0 00-1.024.246 58.77 58.77 0 01-.616 1.64 12.23 12.23 0 00-1.64.698.349.349 0 01-.328 0l-1.149-.574a1.23 1.23 0 00-.82.082l-1.682 1.682-.205.45c.234.564.48 1.125.738 1.682a12.945 12.945 0 00-.738 1.805 59.2 59.2 0 01-1.64.615.775.775 0 00-.247.698H1.271c-.013-5.278 0-10.555.042-15.833.064-.76.46-1.225 1.189-1.394zm28.793 9.598c.44-.027.878 0 1.312.082.168.516.36 1.022.575 1.517.948.27 1.85.654 2.707 1.149a.533.533 0 00.41 0l1.148-.575a.205.205 0 01.246 0c.289.275.562.562.82.862-.282.484-.5.99-.656 1.517.17.461.374.912.616 1.354.153.432.29.87.41 1.312a.76.76 0 00.451.37c.404.148.814.271 1.23.369.014.438 0 .875-.04 1.312a9.098 9.098 0 00-1.56.656 10.403 10.403 0 01-1.066 2.543 1.025 1.025 0 000 .575c.242.427.434.865.575 1.312-.275.288-.562.562-.862.82a7.414 7.414 0 00-1.517-.656 8.14 8.14 0 00-1.354.615c-.432.154-.87.29-1.312.41a.616.616 0 00-.37.37c-.142.44-.292.878-.45 1.312a2.558 2.558 0 01-1.272 0 21.083 21.083 0 00-.492-1.394.946.946 0 00-.37-.288c-.359-.096-.714-.206-1.066-.328a9.904 9.904 0 00-1.558-.697 8.867 8.867 0 00-1.477.656c-.3-.258-.587-.532-.861-.82.118-.484.31-.949.574-1.395a.532.532 0 000-.41 11.096 11.096 0 01-1.107-2.625 6.759 6.759 0 00-1.6-.656c-.041-.437-.055-.874-.041-1.312a3.735 3.735 0 001.681-.657c.097-.359.207-.714.329-1.066l.779-1.723a4.802 4.802 0 00-.615-1.312.205.205 0 010-.246c.274-.289.562-.562.861-.82.475.264.967.483 1.477.656l1.722-.78c.36-.096.716-.206 1.067-.328a.947.947 0 00.287-.369c.132-.437.255-.874.369-1.312zm.574 5.906c1.706.134 2.636 1.05 2.79 2.748-.056 1.231-.657 2.079-1.806 2.543-1.572.382-2.707-.15-3.404-1.6-.4-1.342-.03-2.422 1.108-3.24a3.418 3.418 0 011.312-.451zM1.271 26.127h20.672c-.04.427.015.837.164 1.23.577.27 1.165.516 1.764.739.193.646.425 1.275.697 1.887-7.383.013-14.765 0-22.148-.041a1.372 1.372 0 01-1.025-.862 20.514 20.514 0 01-.124-2.953zm12.88 5.25h4.347a27.835 27.835 0 001.066 2.994c-2.16.041-4.32.055-6.48.041a69.93 69.93 0 011.066-3.035z"
                                                opacity=".942" />
                                            <path
                                                d="M17.268 10.541c.725.054.984.436.779 1.149l-2.215 9.597a.945.945 0 01-.287.37c-.788.168-1.13-.147-1.025-.944.744-3.287 1.51-6.568 2.296-9.844a.912.912 0 01.452-.328z"
                                                opacity=".928" />
                                            <path
                                                d="M12.756 12.428c.698.029.958.384.78 1.066l-.288.287-4.266 2.38a53.764 53.764 0 014.553 2.665c.173.577-.032.905-.615.985a2.509 2.509 0 01-.985-.37 208.5 208.5 0 00-4.84-2.707c-.327-.383-.327-.765 0-1.148a8862.74 8862.74 0 005.66-3.158z"
                                                opacity=".924" />
                                            <path
                                                d="M19.564 12.428c.293.038.566.134.82.287 1.655.95 3.323 1.88 5.005 2.789.401.387.428.797.082 1.23-1.75.985-3.5 1.97-5.25 2.953-.821.353-1.218.093-1.19-.779a.945.945 0 01.287-.369l4.266-2.379a168.875 168.875 0 00-4.348-2.46c-.392-.559-.283-.983.328-1.272z"
                                                opacity=".923" />
                                            <path
                                                d="M31.87 21.615c2.554.217 3.948 1.598 4.183 4.143-.206 2.502-1.56 3.856-4.06 4.06-1.747-.025-3.005-.818-3.774-2.379-.707-2-.255-3.682 1.353-5.044a5.007 5.007 0 012.297-.78zm0 1.395a3.417 3.417 0 00-1.313.45c-1.139.819-1.508 1.899-1.108 3.241.697 1.45 1.832 1.982 3.405 1.6 1.148-.464 1.75-1.312 1.804-2.543-.153-1.698-1.083-2.614-2.789-2.748z"
                                                opacity=".93" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_212_7330">
                                                <path fill="#fff" d="M0 0h42v42H0z" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h4>Professional Speech Writing</h4>
                                <span>13 Courses</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
                {{--
                <div class="col-xl-3 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor4">
                        <div class="cat_content">
                            <a href="{{ route('category_detail') }}">
                                <div class="cicon">
                                    <svg fill="none" viewBox="0 0 42 42">
                                        <g fill="#fff" fill-rule="evenodd" clip-path="url(#clip0_212_7263)"
                                            clip-rule="evenodd">
                                            <path
                                                d="M18.99-.041h.657a263.558 263.558 0 014.142 5.25c.463.977.354 1.88-.328 2.707a260.413 260.413 0 01-3.732 4.02c-.745.337-1.483.323-2.215-.041-.368-.3-.723-.614-1.067-.944a6.063 6.063 0 01-1.763.574c.188 3.58.42 7.162.697 10.746 3.71-2.053 7.36-1.943 10.951.329 3.82-4.33 8.29-5.136 13.412-2.42.424.253.835.526 1.23.82.383.525.3.963-.245 1.313a.533.533 0 01-.41 0 15.336 15.336 0 00-3.528-1.805c-2.768-.874-5.284-.409-7.547 1.394a12.811 12.811 0 00-1.723 1.723 7.902 7.902 0 011.764 2.994c.082.388.04.757-.123 1.108-.383.278-.752.264-1.107-.041-.747-2.607-2.429-4.288-5.045-5.045-2.819-.787-5.375-.282-7.67 1.517-.2.674-.446 1.33-.738 1.969a3.223 3.223 0 01-.78.943c-1.015.349-1.412.007-1.19-1.025.333-.196.58-.47.74-.82a6.19 6.19 0 00.532-1.97c-.22-3.719-.453-7.437-.697-11.155l-.738-1.067c-.104-.436.047-.75.45-.943a11.84 11.84 0 002.38-.246c.293-.129.539-.32.738-.574a.745.745 0 01.82 0c.49.407.955.845 1.395 1.312a.844.844 0 00.656.082 127.608 127.608 0 003.65-4.06.755.755 0 00-.163-.739A259.678 259.678 0 0019.072 1.6 631.034 631.034 0 008.367 6.52a507.387 507.387 0 00-6.152 22.97c-.068.766-.055 1.532.04 2.296.756.275 1.494.59 2.216.944a64.485 64.485 0 006.398 4.43c2.883 1.646 5.986 2.425 9.31 2.337a39.898 39.898 0 008.737-1.107c.246-.055.492-.055.738 0 3.498 1.716 7.19 2.4 11.074 2.05.43.216.58.558.452 1.026-.233.334-.547.498-.944.492h-3.609a21.82 21.82 0 01-7.424-2.133 35.95 35.95 0 01-11.607 1.026 18.92 18.92 0 01-8.04-2.707 72.042 72.042 0 01-5.824-4.102l-2.296-.984a1.305 1.305 0 01-.616-.698 11.698 11.698 0 01.328-4.921A606.675 606.675 0 017.055 5.782c.28-.394.65-.681 1.107-.861A987.561 987.561 0 0018.99-.041z"
                                                opacity=".935" />
                                            <path
                                                d="M30.31 2.748c1.393-.192 2.569.218 3.528 1.23 1.183-1.177 2.578-1.519 4.183-1.025 1.825.873 2.55 2.309 2.174 4.307a3.882 3.882 0 01-.984 1.723 208.87 208.87 0 01-4.963 4.88c-.317.174-.618.147-.902-.082L28.3 8.736c-1.05-1.448-1.133-2.952-.246-4.511a4.074 4.074 0 012.256-1.477zm.165 1.477a3.736 3.736 0 011.558.205c.462.38.9.79 1.313 1.23.3.18.6.207.902.082a6.639 6.639 0 011.64-1.394c1.693-.371 2.677.299 2.954 2.01a2.551 2.551 0 01-.615 1.476l-4.348 4.348-4.512-4.512c-.82-1.544-.451-2.692 1.107-3.445zM9.475 30.639c.258-.024.504.017.738.123 2.792 3.813 6.565 5.508 11.32 5.086a17.157 17.157 0 012.543-.246c.407.282.503.65.287 1.107a1.02 1.02 0 01-.533.287c-4.113.937-7.942.28-11.484-1.969a13.359 13.359 0 01-3.24-3.322c-.133-.457-.01-.813.369-1.066z"
                                                opacity=".931" />
                                            <path
                                                d="M36.299 31.295c.165.06.329.128.492.205.145.352.364.653.656.902l.985.492c.846.246 1.693.479 2.542.698.392.527.31.95-.246 1.271a8.97 8.97 0 01-4.02-1.148 2.689 2.689 0 01-1.106-1.354c-.135-.607.097-.963.697-1.066z"
                                                opacity=".924" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_212_7263">
                                                <path fill="#fff" d="M0 0h42v42H0z" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h4>Expert Essay Assistance</h4>
                                <span>16 Courses</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 wow fadeIn">
                    <div class="category-item">
                        <div class="cat_content">
                            <a href="{{ route('category_detail') }}">
                                <div class="cicon">
                                    <svg fill="none" viewBox="0 0 36 36">
                                        <g fill="#fff" fill-rule="evenodd" clip-path="url(#clip0_212_7284)"
                                            clip-rule="evenodd">
                                            <path
                                                d="M19.813.747h2.014c3.994.858 6.143 3.331 6.444 7.418-.164 3.196-1.686 5.478-4.565 6.848-3.341 1.164-6.217.46-8.626-2.115-2.028-2.756-2.23-5.643-.605-8.66C15.74 2.29 17.52 1.127 19.813.747zm.134 1.41c2.629-.225 4.654.76 6.076 2.953 1.407 2.9.948 5.462-1.377 7.687-2.415 1.752-4.876 1.82-7.385.202-2.318-1.945-2.978-4.35-1.98-7.217.941-2.005 2.497-3.214 4.666-3.626z"
                                                opacity=".943" />
                                            <path
                                                d="M20.35 3.432c.404-.086.728.026.973.335.082.376.116.757.1 1.142.407.125.754.348 1.042.671.236.6.046.981-.571 1.141a1.962 1.962 0 01-.47-.167c-.44-.469-.876-.48-1.31-.034-.11.365-.01.645.303.84 1.394.057 2.177.773 2.35 2.147-.08.886-.516 1.524-1.31 1.914a3.734 3.734 0 01-.201 1.208c-.38.358-.76.358-1.141 0a3.73 3.73 0 01-.202-1.208 2.991 2.991 0 01-1.275-1.074c-.09-.739.235-1.04.973-.907.222.154.423.333.604.537.354.245.679.211.974-.1.209-.428.108-.753-.302-.974-1.763-.182-2.468-1.133-2.115-2.853.2-.546.569-.926 1.108-1.141.052-.381.108-.762.168-1.142.091-.125.192-.236.302-.335z"
                                                opacity=".936" />
                                            <path
                                                d="M35.12 16.791v1.88c-.192.383-.427.74-.706 1.074a432.874 432.874 0 00-5.84 6.982 6.294 6.294 0 01-3.592 1.712l-9.936.067a2.59 2.59 0 00-.872.336 8.631 8.631 0 01-.94.873c.202.646.124 1.261-.235 1.846a278.689 278.689 0 01-3.66 3.625h-.67A1265.923 1265.923 0 00.913 27.4a.8.8 0 00-.167-.269v-.47a90.935 90.935 0 013.692-3.726 3.277 3.277 0 011.544-.369c1.712-2.81 4.23-4.22 7.553-4.23a8.584 8.584 0 013.323.638l7.989.068a3.101 3.101 0 011.678.906 397.201 397.201 0 004.297-4.397c1.28-.815 2.5-.737 3.659.234.258.313.47.649.637 1.007zm-2.82-.402c1.239.108 1.698.756 1.376 1.947a268.616 268.616 0 01-6.546 7.754 5.28 5.28 0 01-2.215.94l-10.003.067a4.133 4.133 0 00-2.518 1.443l-5.203-5.203c1.107-1.975 2.785-3.139 5.036-3.49a7.755 7.755 0 014.363.536c2.78.001 5.554.046 8.325.134.815.476 1.005 1.136.57 1.98a1.365 1.365 0 01-.57.437c-2.055.088-4.113.133-6.176.135-.332.112-.51.347-.537.704a.838.838 0 00.47.638c2.173.066 4.344.043 6.511-.067 1.372-.515 2.032-1.51 1.981-2.987l4.532-4.666a3.82 3.82 0 01.604-.302zM5.312 24.042c.233-.021.457.012.671.1l5.874 5.875a.61.61 0 010 .671l-2.719 2.72a.168.168 0 01-.201 0 878.137 878.137 0 01-6.445-6.48l2.82-2.886z"
                                                opacity=".945" />
                                            <path
                                                d="M15.986 22.9c.592 0 .872.29.84.874-.154.486-.478.654-.974.503-.377-.22-.5-.544-.37-.973.142-.176.31-.31.504-.403z"
                                                opacity=".893" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_212_7284">
                                                <path fill="#fff" d="M0 0h34.373v34.44H0z"
                                                    transform="translate(.78 .78)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h4>Engaging Presentation Creation</h4>
                                <span>12 Courses</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor2">
                        <div class="cat_content">
                            <a href="{{ route('category_detail') }}">
                                <div class="cicon">
                                    <svg fill="none" viewBox="0 0 42 42">
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M4.553 5.209c10.937-.014 21.875 0 32.812.041 1.026.26 1.668.902 1.928 1.928.055 9.187.055 18.375 0 27.562-.26 1.026-.902 1.668-1.928 1.928-10.937.055-21.875.055-32.812 0-1.026-.26-1.668-.902-1.928-1.928-.055-9.187-.055-18.375 0-27.562.275-1.027.917-1.683 1.928-1.969zm.656 1.312H8.49v3.282H3.896c-.029-.798.012-1.59.124-2.38.231-.53.627-.831 1.189-.902zm4.594 0h4.593v3.282H9.803V6.52zm5.906 0h4.594v3.282h-4.594V6.52zm5.906 0h4.594v3.282h-4.594V6.52zm5.907 0h4.593v3.282h-4.594V6.52zm5.906 0c1.094-.013 2.188 0 3.281.042.752.095 1.176.519 1.271 1.271.042.656.055 1.312.042 1.969h-4.594V6.52zM3.896 11.115h34.126v19.688H3.896V11.115zm14.602 6.07a1.75 1.75 0 01.738.124l6.153 3.076c.253.245.294.519.123.82a111.297 111.297 0 01-6.768 3.363.744.744 0 01-.615-.574 118.444 118.444 0 010-6.234c.012-.27.135-.462.369-.575zM3.896 32.115H8.49v3.282c-1.094.013-2.188 0-3.281-.041-.752-.096-1.176-.52-1.271-1.272a23.662 23.662 0 01-.042-1.969zm5.907 0h4.593v3.282H9.803v-3.282zm5.906 0h4.594v3.282h-4.594v-3.282zm5.906 0h4.594v3.282h-4.594v-3.282zm5.907 0h4.593v3.282h-4.594v-3.282zm5.906 0h4.594c.013.657 0 1.313-.041 1.969-.096.752-.52 1.176-1.272 1.271-1.093.042-2.187.055-3.281.042v-3.282z"
                                            clip-rule="evenodd" opacity=".996" />
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M18.744 15.709c.276.053.55.12.82.205a528.063 528.063 0 016.645 3.281c.835.786 1.013 1.702.533 2.748a1.66 1.66 0 01-.615.616 374.429 374.429 0 01-6.645 3.28c-1.123.301-1.985-.04-2.584-1.024a3.532 3.532 0 01-.164-.739l-.04-3.199c-.01-1.26.032-2.518.122-3.773.385-.84 1.027-1.305 1.928-1.395zm-.246 1.477c-.234.112-.357.304-.37.574a118.444 118.444 0 000 6.234c.086.318.291.51.616.574a111.326 111.326 0 006.768-3.363c.17-.301.13-.575-.123-.82l-6.153-3.076a1.75 1.75 0 00-.738-.123z"
                                            clip-rule="evenodd" opacity=".931" />
                                    </svg>
                                </div>
                                <h4>Step-by-Step Video Explanations</h4>
                                <span>14 Courses</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 wow fadeIn">
                    <div class="category-item ccolor1">
                        <div class="cat_content">
                            <a href="{{ route('category_detail') }}">
                                <div class="cicon">
                                    <svg fill="none" viewBox="0 0 42 42">
                                        <g fill="#fff" fill-rule="evenodd" clip-path="url(#clip0_212_7346)"
                                            clip-rule="evenodd">
                                            <path
                                                d="M41.959 9.639v19.933c-.395 1.23-1.216 2.036-2.461 2.42-2.02.117-4.044.158-6.07.123.013 2.051 0 4.102-.041 6.153-.314 1.38-1.175 2.159-2.584 2.337a1181 1181 0 01-19.688 0c-1.409-.178-2.27-.957-2.584-2.337-.04-2.051-.054-4.102-.04-6.153a81.528 81.528 0 01-6.071-.123c-1.246-.384-2.066-1.19-2.461-2.42V9.64c.477-1.568 1.544-2.415 3.2-2.543-.093-1.888.755-3.105 2.542-3.65a50.428 50.428 0 002.871-.124c.293-1.017.949-1.66 1.969-1.927a55.47 55.47 0 014.266 0c.437.382.437.765 0 1.148l-3.61.082c-.586.053-1.01.34-1.271.861a147.948 147.948 0 00-.123 8.45h22.312c.014-2.735 0-5.47-.04-8.204-.185-.687-.636-1.057-1.354-1.107l-14.11-.082c-.304-.206-.4-.493-.287-.861a.775.775 0 01.123-.205c4.97-.136 9.947-.164 14.93-.082 1.02.268 1.676.91 1.969 1.927.956.069 1.913.11 2.87.123 1.788.546 2.636 1.763 2.544 3.65 1.655.129 2.721.976 3.199 2.544zM5.865 4.717H8.49v2.379H4.47c-.099-1.143.366-1.936 1.395-2.38zm27.563 0c.875-.014 1.75 0 2.625.04 1.04.424 1.504 1.203 1.394 2.339h-4.02v-2.38zM2.912 8.408H8.49c-.013 1.477 0 2.954.041 4.43.065.146.16.27.287.37 8.094.054 16.188.054 24.282 0a.946.946 0 00.287-.37c.04-1.476.054-2.953.04-4.43 1.86-.013 3.72 0 5.579.041 1.044.214 1.605.856 1.681 1.928.055 6.125.055 12.25 0 18.375-.101 1.14-.716 1.81-1.845 2.01-1.805.04-3.61.055-5.414.04V20.222c1.422.013 2.844 0 4.265-.041.479-.493.424-.903-.164-1.23a3340.353 3340.353 0 00-33.14 0c-.588.327-.643.737-.164 1.23 1.421.04 2.843.054 4.265.04v10.583a72.628 72.628 0 01-5.824-.123 2.09 2.09 0 01-1.353-1.354 555.906 555.906 0 01-.083-18.949c.085-1.077.646-1.733 1.682-1.969zm33.715 2.625c.56-.055.793.191.697.739-.455.436-.796.354-1.025-.247.08-.187.188-.351.328-.492zm0 4.266c.76.008.924.322.492.943-.416.118-.69-.032-.82-.451a.654.654 0 01.328-.492zM9.803 20.22h22.312c.014 3.199 0 6.398-.04 9.597-2.005-2.041-4.37-2.602-7.097-1.681a9.681 9.681 0 00-1.476.82 92.554 92.554 0 00-3.322 3.24c-.673-.7-1.37-1.37-2.092-2.01-1.286-.891-2.707-1.22-4.266-.984a5.761 5.761 0 00-2.789 1.313l-1.19 1.19a803.442 803.442 0 01-.04-11.485zm6.726 3.035c.907.032 1.427.497 1.559 1.394-.11.82-.574 1.286-1.395 1.395-.82-.11-1.285-.574-1.394-1.395.098-.753.508-1.218 1.23-1.394zm10.254 5.742a5.367 5.367 0 013.61 1.025l1.681 1.682a124.76 124.76 0 010 6.398c-.196.69-.648 1.086-1.353 1.19-5.223.055-10.446.055-15.668 0a42.167 42.167 0 002.174-2.256c.183-.565-.009-.893-.575-.984a.68.68 0 00-.533.205l-3.035 3.035c-.77.07-1.536.043-2.297-.082a1.603 1.603 0 01-.943-1.108 62.02 62.02 0 010-4.511 28.71 28.71 0 012.666-2.502c1.736-.909 3.405-.8 5.004.328l1.722 1.723a18.74 18.74 0 00-1.435 1.517c-.084.895.285 1.155 1.107.78l5.414-5.415a5.574 5.574 0 012.461-1.025z"
                                                opacity=".946" />
                                            <path
                                                d="M36.38 9.72c1.776-.043 2.5.805 2.175 2.544-.505.961-1.284 1.303-2.338 1.025-1.104-.554-1.446-1.415-1.026-2.584a2.32 2.32 0 011.19-.984zm.247 1.313c-.14.14-.249.305-.328.492.229.601.57.683 1.025.247.096-.548-.137-.794-.697-.739z"
                                                opacity=".925" />
                                            <path
                                                d="M36.299 13.986c1.415-.196 2.208.405 2.379 1.805-.168 1.41-.961 1.999-2.38 1.764-1.148-.52-1.517-1.381-1.107-2.584.234-.491.603-.82 1.108-.985zm.328 1.313a.654.654 0 00-.328.492c.13.419.404.569.82.451.432-.621.268-.935-.492-.943z"
                                                opacity=".926" />
                                            <path
                                                d="M16.447 21.943c1.77.048 2.755.95 2.953 2.707-.163 1.64-1.066 2.543-2.707 2.707-1.64-.164-2.543-1.066-2.707-2.707.142-1.535.962-2.438 2.461-2.707zm.082 1.313c-.722.176-1.132.64-1.23 1.394.11.82.574 1.286 1.394 1.395.82-.11 1.285-.574 1.395-1.395-.132-.897-.652-1.362-1.559-1.394z"
                                                opacity=".925" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_212_7346">
                                                <path fill="#fff" d="M0 0h42v42H0z" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h4>Detailed Lab Report Assistance</h4>
                                <span>17 Courses</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Services Section end -->

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
