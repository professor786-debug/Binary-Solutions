<!DOCTYPE html>
<html lang="en">
<x-head />
<style>
    .card {
        max-width: 400px;
        margin: 50px auto;
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: transparent;
        border: none;
        text-align: center;
        color: #ff5722;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .product-list .row {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .total {
        font-weight: bold;
        font-size: 1.1rem;
    }

    .payment-methods img {
        height: 30px;
        margin-right: 10px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #007bff;
    }

    .btn-pay {
        background: linear-gradient(90deg, #2c3e50, #4ca1af);
        color: #fff;
        border-radius: 0 0 20px 20px;
        padding: 15px;
        font-weight: bold;
        border: none;
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
                                <img src="{{ asset('assets/img/logo.svg') }}" alt="edutec">
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

    <!-- Start Main Banner -->
    <section class="home-banner position-relative"
        style="background-image: url('{{ asset('assets/img/bg/course-bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center z-1 position-relative wow fadeInUp">
                    <h2>Checkout</h2>
                    <p>
                        <a href="#" class="">Home</a> <i class='bx bx-chevrons-right'></i> Checkout
                    </p>

                </div>
            </div>
            <section>
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-cart3"></i><br>Summary
                    </div>
                    <div class="card-body">
                        <div class="product-list mb-3">

                            <div class="row">
                                <div class="col">{{ $package->name }}</div>
                                <div class="col text-end">${{ number_format($package->price, 2) }}</div>
                            </div>

                            <div class="row total">
                                <div class="col">Total:</div>
                                <div class="col text-end">${{ number_format($package->price, 2) }}</div>
                            </div>
                        </div>

                        <div class="payment-methods d-flex justify-content-center mb-3">
                            <img src="https://img.icons8.com/color/48/000000/visa.png" />
                            <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                            <img src="https://img.icons8.com/color/48/000000/stripe.png" />
                        </div>

                        @if (!Auth::guard('student')->check())
                            <script>
                                alert("You must be logged in as a student to proceed with the payment.");
                                window.location.href = "{{ route('login') }}";
                            </script>
                        @else
                            <form id="payment-form" action="{{ route('stripe.checkout') }}" method="POST"
                                class="p-4 bg-white rounded">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <input type="hidden" name="stripeToken" id="stripeToken">

                                <div class="mb-3">
                                    <label class="form-label">Card Number (Stripe only)</label>
                                    <div id="card-number" class="form-control" style="height: 50px; font-size: 16px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">Expiry Date</label>
                                        <div id="card-expiry" class="form-control"
                                            style="height: 50px; font-size: 16px;"></div>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">CVC/CVV2</label>
                                        <div id="card-cvc" class="form-control" style="height: 50px; font-size: 16px;">
                                        </div>
                                    </div>
                                </div>

                                <div id="card-errors" class="text-danger mt-2" role="alert"></div>

                                <div class="mt-4">
                                    <button type="submit" id="checkout-btn" class="btn btn-pay w-100">
                                        Pay ${{ number_format($package->price, 2) }}
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>

            </section>
        </div>

        <img src="{{ asset('assets/img/shapes/hsmile.svg') }}" alt="img" class="blshape">
        <img src="{{ asset('assets/img/shapes/hstart.svg') }}" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->
    @include('main_footer')
</body>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ $stripeKey }}");
    const elements = stripe.elements();

    const style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create individual elements
    const cardNumber = elements.create('cardNumber', {
        style
    });
    const cardExpiry = elements.create('cardExpiry', {
        style
    });
    const cardCvc = elements.create('cardCvc', {
        style
    });

    // Mount them
    cardNumber.mount('#card-number');
    cardExpiry.mount('#card-expiry');
    cardCvc.mount('#card-cvc');

    const form = document.getElementById('payment-form');
    const stripeTokenInput = document.getElementById('stripeToken');
    const cardErrors = document.getElementById('card-errors');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        stripe.createToken(cardNumber).then(function(result) {
            if (result.error) {
                cardErrors.textContent = result.error.message;
            } else {
                stripeTokenInput.value = result.token.id;
                form.submit();
            }
        });
    });
</script>

</html>
