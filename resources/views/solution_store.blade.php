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
                    <h2>Solution Store</h2>
                    <p>
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Services <i
                            class='bx bx-chevrons-right'></i>Solution Store
                    </p>
                </div>
            </div>
        </div>

        <img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
        <img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <!-- Start Solutions -->
    <section class="courses-area section-padding position-relative"
        style="background-image: url(assets/img/bg/course-bg.jpg);">
        <div class="container">
            <div class="section-title text-center wow fadeInUp">
                <span>Popular Solutions</span>
                <h2>
                    Pick A Solution To Get Started
                </h2>
            </div>

            <div class="course-list row wow fadeIn">

                {{-- solution Card --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="course-item d-flex">
                        <div class="course-inner">
                            <div class="course-img">
                                <img src="assets/img/course/laravel.jpg" alt="course">
                                <div class="course-price">Rs 4900</div>
                            </div>

                            <div class="course-content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walkthrough</a></h3>

                                <div>
                                    <h5 style="font-weight: lighter">PR300-002</h5>
                                </div>
                                <div>
                                    <p class="mb-1">University of Italy</p>
                                    <div>
                                        <p>Description Will go here......Description Will go here......Description Will
                                            go here.......</p>
                                    </div>

                                </div>
                                <div class="cmeta">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288C167.2 288 160 295.2 160 304zM288 304L288 336C288 344.8 295.2 352 304 352L336 352C344.8 352 352 344.8 352 336L352 304C352 295.2 344.8 288 336 288L304 288C295.2 288 288 295.2 288 304zM432 288C423.2 288 416 295.2 416 304L416 336C416 344.8 423.2 352 432 352L464 352C472.8 352 480 344.8 480 336L480 304C480 295.2 472.8 288 464 288L432 288zM160 432L160 464C160 472.8 167.2 480 176 480L208 480C216.8 480 224 472.8 224 464L224 432C224 423.2 216.8 416 208 416L176 416C167.2 416 160 423.2 160 432zM304 416C295.2 416 288 423.2 288 432L288 464C288 472.8 295.2 480 304 480L336 480C344.8 480 352 472.8 352 464L352 432C352 423.2 344.8 416 336 416L304 416zM416 432L416 464C416 472.8 423.2 480 432 480L464 480C472.8 480 480 472.8 480 464L480 432C480 423.2 472.8 416 464 416L432 416C423.2 416 416 423.2 416 432z" />
                                        </svg>
                                        2025
                                    </span>

                                    <span class="cmtime">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M352 64C316.7 64 288 92.7 288 128L288 160L240 160L240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 160L128 160L128 88C128 74.7 117.3 64 104 64C90.7 64 80 74.7 80 88L80 162C52.4 169.1 32 194.2 32 224L32 512C32 547.3 60.7 576 96 576L544 576C579.3 576 608 547.3 608 512L608 320C608 284.7 579.3 256 544 256L480 256L480 128C480 92.7 451.3 64 416 64L352 64zM416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160L400 160C408.8 160 416 167.2 416 176zM400 256C408.8 256 416 263.2 416 272L416 304C416 312.8 408.8 320 400 320L368 320C359.2 320 352 312.8 352 304L352 272C352 263.2 359.2 256 368 256L400 256zM416 368L416 400C416 408.8 408.8 416 400 416L368 416C359.2 416 352 408.8 352 400L352 368C352 359.2 359.2 352 368 352L400 352C408.8 352 416 359.2 416 368zM528 352C536.8 352 544 359.2 544 368L544 400C544 408.8 536.8 416 528 416L496 416C487.2 416 480 408.8 480 400L480 368C480 359.2 487.2 352 496 352L528 352zM288 368L288 400C288 408.8 280.8 416 272 416L240 416C231.2 416 224 408.8 224 400L224 368C224 359.2 231.2 352 240 352L272 352C280.8 352 288 359.2 288 368zM272 256C280.8 256 288 263.2 288 272L288 304C288 312.8 280.8 320 272 320L240 320C231.2 320 224 312.8 224 304L224 272C224 263.2 231.2 256 240 256L272 256zM160 368L160 400C160 408.8 152.8 416 144 416L112 416C103.2 416 96 408.8 96 400L96 368C96 359.2 103.2 352 112 352L144 352C152.8 352 160 359.2 160 368zM144 256C152.8 256 160 263.2 160 272L160 304C160 312.8 152.8 320 144 320L112 320C103.2 320 96 312.8 96 304L96 272C96 263.2 103.2 256 112 256L144 256z" />
                                        </svg>
                                        City
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="course-hover align-self-center">
                            <div class="chover_content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walk Through</a></h3>

                                <div class="hcourse-price">RS 4900</div>
                                <p>
                                    Problem Stament Goes Here
                                </p>
                                <div class="dropdown-features">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center"
                                        style="cursor:pointer;"
                                        onclick="this.nextElementSibling.classList.toggle('show'); this.querySelector('.arrow').classList.toggle('rotate');">
                                        <span style="font-weight:600;">Features</span>
                                        <span class="arrow rotate" style="transition:transform 0.2s;"><i
                                                class="fa fa-chevron-down"></i></span>
                                    </div>
                                    <div class="dropdown-body show" style="display:block; margin-top:10px;">
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Source Code Included</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>WalkThrough</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-times text-danger me-2"></i>
                                            <span>Report</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Preview Image</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Tutorial Session</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="bg-btn">Get Solution <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End solution-item -->
                {{-- solution Card --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="course-item d-flex">
                        <div class="course-inner">
                            <div class="course-img">
                                <img src="assets/img/course/laravel.jpg" alt="course">
                                <div class="course-price">Rs 4900</div>
                            </div>

                            <div class="course-content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walkthrough</a></h3>

                                <div>
                                    <h5 style="font-weight: lighter">PR300-002</h5>
                                </div>
                                <div>
                                    <p class="mb-1">University of Italy</p>
                                    <div>
                                        <p>Description Will go here......Description Will go here......Description Will
                                            go here.......</p>
                                    </div>

                                </div>
                                <div class="cmeta">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288C167.2 288 160 295.2 160 304zM288 304L288 336C288 344.8 295.2 352 304 352L336 352C344.8 352 352 344.8 352 336L352 304C352 295.2 344.8 288 336 288L304 288C295.2 288 288 295.2 288 304zM432 288C423.2 288 416 295.2 416 304L416 336C416 344.8 423.2 352 432 352L464 352C472.8 352 480 344.8 480 336L480 304C480 295.2 472.8 288 464 288L432 288zM160 432L160 464C160 472.8 167.2 480 176 480L208 480C216.8 480 224 472.8 224 464L224 432C224 423.2 216.8 416 208 416L176 416C167.2 416 160 423.2 160 432zM304 416C295.2 416 288 423.2 288 432L288 464C288 472.8 295.2 480 304 480L336 480C344.8 480 352 472.8 352 464L352 432C352 423.2 344.8 416 336 416L304 416zM416 432L416 464C416 472.8 423.2 480 432 480L464 480C472.8 480 480 472.8 480 464L480 432C480 423.2 472.8 416 464 416L432 416C423.2 416 416 423.2 416 432z" />
                                        </svg>
                                        2025
                                    </span>

                                    <span class="cmtime">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M352 64C316.7 64 288 92.7 288 128L288 160L240 160L240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 160L128 160L128 88C128 74.7 117.3 64 104 64C90.7 64 80 74.7 80 88L80 162C52.4 169.1 32 194.2 32 224L32 512C32 547.3 60.7 576 96 576L544 576C579.3 576 608 547.3 608 512L608 320C608 284.7 579.3 256 544 256L480 256L480 128C480 92.7 451.3 64 416 64L352 64zM416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160L400 160C408.8 160 416 167.2 416 176zM400 256C408.8 256 416 263.2 416 272L416 304C416 312.8 408.8 320 400 320L368 320C359.2 320 352 312.8 352 304L352 272C352 263.2 359.2 256 368 256L400 256zM416 368L416 400C416 408.8 408.8 416 400 416L368 416C359.2 416 352 408.8 352 400L352 368C352 359.2 359.2 352 368 352L400 352C408.8 352 416 359.2 416 368zM528 352C536.8 352 544 359.2 544 368L544 400C544 408.8 536.8 416 528 416L496 416C487.2 416 480 408.8 480 400L480 368C480 359.2 487.2 352 496 352L528 352zM288 368L288 400C288 408.8 280.8 416 272 416L240 416C231.2 416 224 408.8 224 400L224 368C224 359.2 231.2 352 240 352L272 352C280.8 352 288 359.2 288 368zM272 256C280.8 256 288 263.2 288 272L288 304C288 312.8 280.8 320 272 320L240 320C231.2 320 224 312.8 224 304L224 272C224 263.2 231.2 256 240 256L272 256zM160 368L160 400C160 408.8 152.8 416 144 416L112 416C103.2 416 96 408.8 96 400L96 368C96 359.2 103.2 352 112 352L144 352C152.8 352 160 359.2 160 368zM144 256C152.8 256 160 263.2 160 272L160 304C160 312.8 152.8 320 144 320L112 320C103.2 320 96 312.8 96 304L96 272C96 263.2 103.2 256 112 256L144 256z" />
                                        </svg>
                                        City
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="course-hover align-self-center">
                            <div class="chover_content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walk Through</a></h3>

                                <div class="hcourse-price">RS 4900</div>
                                <p>
                                    Problem Stament Goes Here
                                </p>
                                <div class="dropdown-features">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center"
                                        style="cursor:pointer;"
                                        onclick="this.nextElementSibling.classList.toggle('show'); this.querySelector('.arrow').classList.toggle('rotate');">
                                        <span style="font-weight:600;">Features</span>
                                        <span class="arrow rotate" style="transition:transform 0.2s;"><i
                                                class="fa fa-chevron-down"></i></span>
                                    </div>
                                    <div class="dropdown-body show" style="display:block; margin-top:10px;">
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Source Code Included</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>WalkThrough</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-times text-danger me-2"></i>
                                            <span>Report</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Preview Image</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Tutorial Session</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="bg-btn">Get Solution <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End solution-item -->
                {{-- solution Card --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="course-item d-flex">
                        <div class="course-inner">
                            <div class="course-img">
                                <img src="assets/img/course/laravel.jpg" alt="course">
                                <div class="course-price">Rs 4900</div>
                            </div>

                            <div class="course-content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walkthrough</a></h3>

                                <div>
                                    <h5 style="font-weight: lighter">PR300-002</h5>
                                </div>
                                <div>
                                    <p class="mb-1">University of Italy</p>
                                    <div>
                                        <p>Description Will go here......Description Will go here......Description Will
                                            go here.......</p>
                                    </div>

                                </div>
                                <div class="cmeta">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288C167.2 288 160 295.2 160 304zM288 304L288 336C288 344.8 295.2 352 304 352L336 352C344.8 352 352 344.8 352 336L352 304C352 295.2 344.8 288 336 288L304 288C295.2 288 288 295.2 288 304zM432 288C423.2 288 416 295.2 416 304L416 336C416 344.8 423.2 352 432 352L464 352C472.8 352 480 344.8 480 336L480 304C480 295.2 472.8 288 464 288L432 288zM160 432L160 464C160 472.8 167.2 480 176 480L208 480C216.8 480 224 472.8 224 464L224 432C224 423.2 216.8 416 208 416L176 416C167.2 416 160 423.2 160 432zM304 416C295.2 416 288 423.2 288 432L288 464C288 472.8 295.2 480 304 480L336 480C344.8 480 352 472.8 352 464L352 432C352 423.2 344.8 416 336 416L304 416zM416 432L416 464C416 472.8 423.2 480 432 480L464 480C472.8 480 480 472.8 480 464L480 432C480 423.2 472.8 416 464 416L432 416C423.2 416 416 423.2 416 432z" />
                                        </svg>
                                        2025
                                    </span>

                                    <span class="cmtime">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path fill="#FFD43B"
                                                d="M352 64C316.7 64 288 92.7 288 128L288 160L240 160L240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 160L128 160L128 88C128 74.7 117.3 64 104 64C90.7 64 80 74.7 80 88L80 162C52.4 169.1 32 194.2 32 224L32 512C32 547.3 60.7 576 96 576L544 576C579.3 576 608 547.3 608 512L608 320C608 284.7 579.3 256 544 256L480 256L480 128C480 92.7 451.3 64 416 64L352 64zM416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160L400 160C408.8 160 416 167.2 416 176zM400 256C408.8 256 416 263.2 416 272L416 304C416 312.8 408.8 320 400 320L368 320C359.2 320 352 312.8 352 304L352 272C352 263.2 359.2 256 368 256L400 256zM416 368L416 400C416 408.8 408.8 416 400 416L368 416C359.2 416 352 408.8 352 400L352 368C352 359.2 359.2 352 368 352L400 352C408.8 352 416 359.2 416 368zM528 352C536.8 352 544 359.2 544 368L544 400C544 408.8 536.8 416 528 416L496 416C487.2 416 480 408.8 480 400L480 368C480 359.2 487.2 352 496 352L528 352zM288 368L288 400C288 408.8 280.8 416 272 416L240 416C231.2 416 224 408.8 224 400L224 368C224 359.2 231.2 352 240 352L272 352C280.8 352 288 359.2 288 368zM272 256C280.8 256 288 263.2 288 272L288 304C288 312.8 280.8 320 272 320L240 320C231.2 320 224 312.8 224 304L224 272C224 263.2 231.2 256 240 256L272 256zM160 368L160 400C160 408.8 152.8 416 144 416L112 416C103.2 416 96 408.8 96 400L96 368C96 359.2 103.2 352 112 352L144 352C152.8 352 160 359.2 160 368zM144 256C152.8 256 160 263.2 160 272L160 304C160 312.8 152.8 320 144 320L112 320C103.2 320 96 312.8 96 304L96 272C96 263.2 103.2 256 112 256L144 256z" />
                                        </svg>
                                        City
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="course-hover align-self-center">
                            <div class="chover_content">
                                <div class="ccategory">
                                    <a href="#">Web Programming</a>
                                </div>

                                <h3><a href="#">Laravel Walk Through</a></h3>

                                <div class="hcourse-price">RS 4900</div>
                                <p>
                                    Problem Stament Goes Here
                                </p>
                                <div class="dropdown-features">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center"
                                        style="cursor:pointer;"
                                        onclick="this.nextElementSibling.classList.toggle('show'); this.querySelector('.arrow').classList.toggle('rotate');">
                                        <span style="font-weight:600;">Features</span>
                                        <span class="arrow rotate" style="transition:transform 0.2s;"><i
                                                class="fa fa-chevron-down"></i></span>
                                    </div>
                                    <div class="dropdown-body show" style="display:block; margin-top:10px;">
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Source Code Included</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>WalkThrough</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-times text-danger me-2"></i>
                                            <span>Report</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Preview Image</span>
                                        </div>
                                        <div class="feature-item d-flex align-items-center mb-1">
                                            <i class="fa fa-check text-success me-2"></i>
                                            <span>Tutorial Session</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="bg-btn">Get Solution <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End solution-item -->

            </div>

            <div class="text-center mt-5">
                <p class="cbtn-wrap">
                    <img src="assets/img/icons/course/bigarrow.svg" alt="img">
                    We have more Courses in different Categories .
                    <a href="#">Browse All <i class="fa-solid fa-arrow-right"></i></a>
                </p>
            </div>
        </div>

        <img src="assets/img/shapes/course/book.svg" class="cbook-shape" alt="img">
        <img src="assets/img/shapes/course/star.svg" class="cstar-shape" alt="img">
    </section>
    {{-- End Solutions --}}

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
