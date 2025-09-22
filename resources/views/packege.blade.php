<!DOCTYPE html>
<html lang="en">
<x-head />
<style>
    .result-item {
        transition: box-shadow 0.3s ease, border 0.3s ease;
    }

    .result-item:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        border: 2px solid #4727c3;
        z-index: 2;
    }

    .plan-card {
        border-radius: 1rem;
        background: white;
        transition: transform 0.3s ease;
    }

    .plan-card:hover {
        transform: translateY(-10px);
    }

    .btn-orange {
        background-color: #ff6f0f;
        color: white;
        border-radius: 30px;
        font-weight: bold;
        border: none;
    }

    .btn-orange:hover {
        background-color: #e65c00;
    }

    .text-orange {
        color: #ff6f0f;
        font-weight: bold;
        margin-right: 5px;
    }

    .best-value-badge {
        position: absolute;
        top: 15px;
        right: -45px;
        background: #ff6f0f;
        color: white;
        font-weight: bold;
        padding: 5px 50px;
        transform: rotate(45deg);
        z-index: 10;
        font-size: 0.8rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<body>

    {{-- <div id="loader"></div> --}}

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

    @include('header')

    <!-- Start Home Banner -->
    <section class="home-banner position-relative" style="background-image: url(assets/img/bg/bg2.jpg);">
        <div class="container">
            <div class="row justify-content-center mt-5">
                @foreach ($packages as $package)
                    <div class="col-md-4 mb-4">
                        <div class="card plan-card text-center shadow-lg">
                            <div class="card-body">
                                <h4 class="font-weight-bold">{{ $package->name }}</h4>
                                <h2
                                    class="text-{{ $loop->index === 0 ? 'secondary' : ($loop->index === 1 ? 'primary' : 'success') }} font-weight-bold mt-3">
                                    ${{ number_format($package->price, 2) }}/mo.
                                </h2>

                                <a href="{{ route('package_checkout', ['id' => $package->id]) }}" class="bg-btn">Choose
                                    Plan</a>

                                <ul class="list-unstyled text-left px-3">
                                    <li>
                                        <i class="text-primary">{{ $package->download_limit > 0 ? '✔' : '✘' }}</i>
                                        Access to
                                        <strong>{{ $package->download_limit > 0 ? $package->download_limit : 'No' }}</strong>
                                        downloads/month
                                    </li>
                                    <li>
                                        <i class="text-primary">{{ $package->discount_percentage > 0 ? '✔' : '✘' }}</i>
                                        {{ $package->discount_percentage > 0 ? "$package->discount_percentage% discount on custom solutions" : 'No custom solutions discount' }}
                                    </li>
                                    <li>
                                        <i class="text-primary">✔</i> Cancel anytime
                                    </li>
                                    <li>
                                        <i class="text-primary">{{ $package->one_on_one_sessions > 0 ? '✔' : '✘' }}</i>
                                        {{ $package->one_on_one_sessions > 0 ? '1-on-1 session(s)/month' : 'No 1-on-1 session' }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Home Banner -->
    @include('main_footer')
</body>

</html>
