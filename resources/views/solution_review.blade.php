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
            .blurred {
                filter: blur(8px);
                pointer-events: none;
                user-select: none;
                opacity: 0.7;
            }

            .blurred-text {
                filter: blur(4px);
                pointer-events: none;
                user-select: none;
                opacity: 0.6;
            }

            .overlay-locked {
                position: absolute;
                top: 20%;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 10;
            }

            .locked-msg {
                background-color: rgba(255, 255, 255, 0.85);
                padding: 20px;
                display: inline-block;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }
		</style>
	
	<body>

	<div id="loader"></div>

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
			
		<section class="home-banner position-relative" style="background-image: url(assets/img/bg/bg2.jpg);">
			<div class="container">
                <div class="row justify-content-center mt-5">
                <form class="banner_search_form" method="GET" action="{{ route('chat') }}">
							<input type="text" class="form-control hsearch-field" name="query" placeholder="Whats your Next Question?">
							<button type="submit" class="hsearch_btn">
								<i class="fa-solid fa-magnifying-glass"></i> Search
							</button>
						</form>
                </div>
                
			</div>
		</section>
        <section class="solution-detail py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <h2>{{ $solution->title }}</h2>

                        <div class="text-center position-relative">
                            <img src="{{ $solution->preview_image ?? asset('default-image.jpg') }}"
                                alt="Solution Image" 
                                class="img-fluid rounded mb-4 {{ !$hasAccess ? 'blurred' : '' }}" 
                                style="max-height: 300px; object-fit: cover;">

                            @if(!$hasAccess)
                                <div class="overlay-locked d-flex flex-column justify-content-center align-items-center">
                                    <div class="locked-msg text-center">
                                        <p class="mb-3"><strong>You need to buy Subscription to Access</strong></p>
                                        @guest('student')
                                            <a href="{{ route('login_confirmation', ['solution' => $solution->id]) }}" class="btn btn-primary">Login to Access</a>
                                        @else
                                            <a href="{{ route('packages') }}" class="btn btn-warning">Buy Subscription</a>
                                        @endguest
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="solution-description mt-4 {{ !$hasAccess ? 'blurred-text' : '' }}">
                            {!! nl2br(e($solution->problem_statement)) !!}
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('checkout', ['solution_id' => $solution->id]) }}"
                                class="bg-btn btn-lg px-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm {{ !$hasAccess ? 'disabled' : '' }}"
                                @if(!$hasAccess)
                                    @guest('student')
                                        onclick="window.location='{{ route('login_confirmation') }}'; return false;"
                                        title="Please log in to purchase this solution"
                                    @else
                                        onclick="window.location='{{ route('packages') }}'; return false;"
                                        title="You need a subscription to buy this solution"
                                    @endguest
                                @endif
                            >
                                <i class="fas fa-shopping-cart"></i> Get this solution
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@include('main_footer')
	</body>
</html>