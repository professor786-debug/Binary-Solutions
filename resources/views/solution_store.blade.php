<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <div> @include('header')</div>

    <!-- Start Main Banner -->
    <section class="main-banner position-relative"
        style="background-image: url({{ asset('assets/img/bg/course-bg.jpg') }});">
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

        <img src="{{ asset('assets/img/shapes/hsmile.svg') }}" alt="img" class="blshape">
        <img src="{{ asset('assets/img/shapes/hstart.svg') }}" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->

    <!-- Start Solutions -->
    <section class="courses-area section-padding position-relative"
        style="background-image: url({{ asset('assets/img/bg/course-bg.jpg') }});">
        <div class="container">
            <div class="section-title text-center wow fadeInUp">
                <span>Popular Solutions</span>
                <h2>
                    Pick A Solution To Get Started
                </h2>
            </div>

            <div class="course-list row wow fadeIn">
                {{-- Loop through DB solutions --}}
                @foreach ($solutions as $solution)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="course-item d-flex">
                            <div class="course-inner">
                                <div class="course-img">
                                    <img src="{{ asset($solution->preview_image) }}" alt="course" class="img-fluid">
                                    <div class="course-price">Rs {{ $solution->price }}</div>
                                </div>


                                <div class="course-content">
                                    <div class="ccategory">
                                        <a href="#">{{ $solution->category }}</a>
                                    </div>

                                    <h3><a href="#">{{ $solution->title }}</a></h3>

                                    <div>
                                        <h5 style="font-weight: lighter">{{ $solution->code }}</h5>
                                    </div>
                                    <div>
                                        <p class="mb-1">{{ $solution->university }}</p>
                                        <div>
                                            <p>{{ $solution->description }}</p>
                                        </div>
                                    </div>

                                    <div class="cmeta">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            {{ $solution->year }}
                                        </span>

                                        <span class="cmtime">
                                            <i class="fa fa-location-dot"></i>
                                            {{ $solution->city }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="course-hover align-self-center">
                                <div class="chover_content">
                                    <div class="ccategory">
                                        <a href="#">{{ $solution->category }}</a>
                                    </div>

                                    <h3><a href="#">{{ $solution->title }}</a></h3>
                                    <div class="hcourse-price">Rs {{ $solution->price }}</div>
                                    <p>{{ $solution->problem_statement }}</p>

                                    <div class="dropdown-features">
                                        <div class="dropdown-header d-flex justify-content-between align-items-center"
                                            style="cursor:pointer;"
                                            onclick="this.nextElementSibling.classList.toggle('show'); this.querySelector('.arrow').classList.toggle('rotate');">
                                            <span style="font-weight:600;">Features</span>
                                            <span class="arrow rotate" style="transition:transform 0.2s;">
                                                <i class="fa fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="dropdown-body show" style="display:block; margin-top:10px;">
                                            @if ($solution->features)
                                                @foreach (json_decode($solution->features) as $feature)
                                                    <div class="feature-item d-flex align-items-center mb-1">
                                                        <i class="fa fa-check text-success me-2"></i>
                                                        <span>{{ $feature }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                 <div class="text-center">
    <a href="{{ route('solution.detail', ['solution_id' => $solution->id]) }}" class="solution-btn">
        Get Solution <i class="fa-solid fa-arrow-right-long"></i>
    </a>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- End Solutions --}}

    @include('main_footer')
</body>

</html>
