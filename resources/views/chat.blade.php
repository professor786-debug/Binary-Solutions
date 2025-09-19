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

    .links img,
    svg {
        display: none;
    }

    .solution-btn {
        border: 1px solid transparent;
        /* position: absolute; */
        background: var(--blue);
        padding: 6px 10px;
        border-radius: 9px;
        transition: .5s;
        color: white !important;
    }

    .solution-btn:hover {
        border: 1px solid var(--blue);
        /* position: absolute; */
        background: white;
        padding: 6 10px;
        border-radius: 9px;
        transition: .5s;
        color: black !important;
    }

    .truncate {
        width: 300px;
        /* jis width ke andar text ko limit karna hai */
        white-space: nowrap;
        /* text ko ek line me rakhega */
        overflow: hidden;
        /* extra text ko hide karega */
        text-overflow: ellipsis;
    }

    .result-item {
        height: 20rem;
    }

    @media (max-width:500px) {
        .result-img {
            width: 130px !important;
            height: 192px !important;
            object-fit: cover;
        }

        .result-item {
            height: 18rem
        }
    }
</style>

<body>


    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="{{ route('main') }}">
                                <img src="assets/img/logo.svg" alt="Binary Solutions">
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
                <form class="banner_search_form" method="GET" action="{{ route('chat') }}">
                    <input type="text" class="form-control hsearch-field" name="query"
                        placeholder="Whats your Next Question?">
                    <button type="submit" class="hsearch_btn">
                        <i class="fa-solid fa-magnifying-glass"></i> Search
                    </button>
                </form>
            </div>

        </div>
    </section>
    <!-- End Home Banner -->


    <section class="about pb-120 position-relative mt-5">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-xl-6 col-12 wow fadeIn">
                    <h2 class="mb-4">Search Results</h2>
                    @if ($query)
                        <p><strong>{{ $query }}</strong></p>
                    @endif
<p>Total Results: {{ count($results) }}</p>

                    @forelse($results as $result)
                        <div class="result-item d-flex mb-4 p-3 border rounded shadow-sm bg-white position-relative clickable-card"
                            data-href="{{ route('solution.detail') }}?solution_id={{ $result->id }}"
                            style="cursor: pointer;">
                            <img class="result-img" src="{{ $result->preview_image ?? asset('default-image.jpg') }}"
                                alt="Result" class="img-fluid rounded mr-3"
                                style="width: 182px; height: 217px; object-fit: cover;">
                            <div class="flex-grow-1 position-relative" style="padding: inherit;">
                                <h5 class="mb-2">{{ $result->title ?? 'Untitled' }}</h5>
                                <p style="margin-bottom: 6px">Description: {{ $result->description ?? 'Untitled' }} </p>
                                <p style="margin-bottom: 6px" class="truncate">Problem Statment : {{ $result->problem_statement ?? 'Untitled' }}  </p>
                                <h4 style="font-weight: 500;font-size: 18px;margin-bottom: 2px">Course ID : <span
                                        style="color: rgb(142, 141, 141)">{{ $result->course_name ?? 'Untitled' }}</span>
                                </h4>

                                <div>
                                    <p style="margin-bottom: 2px">{{ $result->universty_name ?? 'Untitled' }}</p>
                                </div>
                                <div class="text-right d-flex justify-content-between align-items-center position-absolute w-100"
                                    style="left:0; bottom: -16px; padding: 10px 10px 10px 10px;">
                                    <div>
                                        <span class="float-right solution-btn"
                                            style="color:rgb(71, 39, 195); font-weight: 600;bottom: 6px">
                                            Get Solution
                                        </span>
                                    </div>
                                    <div>
                                        <p style="margin-bottom: 0px;font-weight: 600;font-size: 24px">$
                                            {{ $result->price ?? 'Untitled' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No results found for <strong>{{ $query }}</strong>.</p>
                    @endforelse
                    <div class="mt-4 links">
                        @if (method_exists($results, 'links'))
                            {{ $results->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="about_shape"></div>
    </section>

    @include('main_footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.clickable-card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const target = card.getAttribute('data-href');
                    if (target) {
                        window.location.href = target;
                    }
                });
            });
        });
    </script>
</body>

</html>
