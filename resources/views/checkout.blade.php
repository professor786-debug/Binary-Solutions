<!DOCTYPE html>
<html lang="en">
<x-head />
<style>
    body {
        background-color: #f0f7f7;
        font-family: 'Segoe UI', sans-serif;
    }

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
                        <a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Checkout
                    </p>
                </div>
            </div>
        </div>

        <section class="shop section-padding py-5">
            <div class="container">
                <div class="row justify-content-center">

                    {{-- Error Alert --}}
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif

                    <div class="col-lg-8 mb-4">
                        <div class="shadow-sm p-4 rounded bg-white">

                            @if ($solution)
                                @php
                                    $student = Auth::guard('student')->user();
                                    $subscription = $student?->latestSubscription;
                                    $discount = 0;

                                    if (
                                        $subscription &&
                                        $subscription->package &&
                                        $subscription->package->discount_percentage > 0
                                    ) {
                                        $discount =
                                            ($solution->price * $subscription->package->discount_percentage) / 100;
                                    }

                                    $discountedPrice = $solution ? $solution->price - $discount : 0;
                                @endphp

                                <h4 class="mb-2">{{ $solution->title }}</h4>
                                @if ($discount > 0)
                                    <p class="mb-1">Original Price:
                                        <del>${{ number_format($solution->price, 2) }}</del></p>
                                    <p class="mb-1 text-success">Discount
                                        ({{ $subscription->package->discount_percentage }}%):
                                        -${{ number_format($discount, 2) }}</p>
                                    <p class="fw-bold mb-2">Final Price: ${{ number_format($discountedPrice, 2) }}</p>
                                @else
                                    <p class="mb-1">Price: <strong>${{ number_format($solution->price, 2) }}</strong>
                                    </p>
                                @endif
                            @elseif($package)
                                <h4 class="mb-2">{{ $package->name }}</h4>
                                <p class="mb-1">Price: <strong>${{ number_format($package->price, 2) }}</strong></p>
                                <p class="mb-0">Downloads: <strong>{{ $package->download_limit }}</strong> / month
                                </p>
                                <p class="mb-0">Discount on Solutions:
                                    <strong>{{ $package->discount_percentage }}%</strong></p>
                                <p class="mb-0">1-on-1 Sessions: <strong>{{ $package->one_on_one_sessions }}</strong>
                                    / month</p>
                            @endif

                            <hr>
                            {{-- Add-ons --}}
                            <h5 class="mt-4">Add-ons (Optional)</h5>
                            @php
                                $addons = [
                                    ['id' => 'video_demo', 'label' => 'Video Demo', 'price' => 10],
                                    ['id' => 'walkthrough_pdf', 'label' => 'Walkthrough PDF', 'price' => 8],
                                    ['id' => 'report_path', 'label' => 'Report Path', 'price' => 12],
                                ];
                            @endphp
                            @foreach ($addons as $addon)
                                <div class="form-check mb-2">
                                    <input class="form-check-input addon-checkbox" type="checkbox"
                                        value="{{ $addon['price'] }}" data-label="{{ $addon['label'] }}"
                                        id="{{ $addon['id'] }}">
                                    <label class="form-check-label" for="{{ $addon['id'] }}">
                                        {{ $addon['label'] }} -
                                        <strong>${{ number_format($addon['price'], 2) }}</strong>
                                    </label>
                                </div>
                            @endforeach
                            <p class="text-muted mt-3 small">* Source code is included in the base price.</p>
                        </div>
                    </div>

                    {{-- Right Column: Summary + Payment --}}
                    <div class="col-lg-4">
                        <div class="shadow-sm p-4 rounded bg-white">
                            <div class="card-header mb-3">
                                <i class="bi bi-cart3"></i><br>Total Summary
                            </div>

                            <ul class="list-group mb-4">
                                <li class="list-group-item d-flex justify-content-between">
                                    Base Price
                                    <span id="base-price">
                                        @if ($solution)
                                            ${{ number_format($discountedPrice, 2) }}
                                        @elseif($package)
                                            ${{ number_format($package->price, 2) }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    Add-ons
                                    <span id="addon-total">$0.00</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold border-top">
                                    Total
                                    <span id="grand-total">
                                        @if ($solution)
                                            ${{ number_format($discountedPrice, 2) }}
                                        @elseif($package)
                                            ${{ number_format($package->price, 2) }}
                                        @endif
                                    </span>
                                </li>
                            </ul>

                            <div class="payment-methods d-flex justify-content-center mb-3">
                                <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                <img src="https://img.icons8.com/color/48/000000/stripe.png" />
                            </div>

                            {{-- Payment Form --}}
                            <form id="payment-form" action="{{ route('checkout.solution.stripe') }}" method="POST">
                                @csrf
                                <input type="hidden" name="solution_id" value="{{ $solution->id ?? '' }}">
                                <input type="hidden" name="total_amount" id="final-amount">
                                <input type="hidden" name="addons" id="selected-addons">
                                <input type="hidden" name="addon_total" id="addon-total-input">
                                <input type="hidden" name="stripeToken" id="stripeToken">

                                <div class="mb-3">
                                    <label class="form-label">Cardholder's Name</label>
                                    <input type="text" name="cardholder_name" class="form-control"
                                        placeholder="John Doe" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Card Number</label>
                                    <div id="card-number" class="form-control" style="height: 50px;"></div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">Expiry</label>
                                        <div id="card-expiry" class="form-control" style="height: 50px;"></div>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">CVC</label>
                                        <div id="card-cvc" class="form-control" style="height: 50px;"></div>
                                    </div>
                                </div>

                                <div id="card-errors" class="text-danger mb-3" role="alert"></div>

                                <button type="submit" id="checkout-btn" class="btn btn-pay w-100">
                                    Pay
                                </button>
                            </form>

                            <script src="https://js.stripe.com/v3/"></script>
                            <script>
                                const stripe = Stripe("{{ config('services.stripe.key') }}");
                                const elements = stripe.elements();

                                // Create separate elements for number, expiry, and CVC
                                const cardNumber = elements.create('cardNumber', {
                                    style: {
                                        base: {
                                            fontSize: '16px'
                                        }
                                    }
                                });
                                const cardExpiry = elements.create('cardExpiry', {
                                    style: {
                                        base: {
                                            fontSize: '16px'
                                        }
                                    }
                                });
                                const cardCvc = elements.create('cardCvc', {
                                    style: {
                                        base: {
                                            fontSize: '16px'
                                        }
                                    }
                                });

                                cardNumber.mount('#card-number');
                                cardExpiry.mount('#card-expiry');
                                cardCvc.mount('#card-cvc');

                                const form = document.getElementById('payment-form');
                                const stripeTokenField = document.getElementById('stripeToken');
                                const errorElement = document.getElementById('card-errors');

                                form.addEventListener('submit', async function(e) {
                                    e.preventDefault();

                                    const {
                                        token,
                                        error
                                    } = await stripe.createToken(cardNumber);

                                    if (error) {
                                        errorElement.textContent = error.message;
                                    } else {
                                        stripeTokenField.value = token.id; // ✅ inject token into hidden input
                                        form.submit(); // ✅ now submit form with token
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <img src="{{ asset('assets/img/shapes/hsmile.svg') }}" alt="img" class="blshape">
        <img src="{{ asset('assets/img/shapes/hstart.svg') }}" alt="img" class="brshape">
        <div class="bbig_shape"></div>
    </section>
    <!-- End Main Banner -->
    <!-- End Checkout -->
    @include('main_footer')
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

        // Create and mount Stripe elements
        const cardNumber = elements.create('cardNumber', {
            style
        });
        const cardExpiry = elements.create('cardExpiry', {
            style
        });
        const cardCvc = elements.create('cardCvc', {
            style
        });

        cardNumber.mount('#card-number');
        cardExpiry.mount('#card-expiry');
        cardCvc.mount('#card-cvc');

        const form = document.getElementById('payment-form');
        const stripeTokenInput = document.getElementById('stripeToken');
        const cardErrors = document.getElementById('card-errors');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // ✅ Set required hidden input values before tokenization
            const grandTotalText = document.getElementById('grand-total')?.textContent || "$0.00";
            const addonTotalText = document.getElementById('addon-total')?.textContent || "$0.00";

            const totalAmount = parseFloat(grandTotalText.replace(/[^\d.]/g, '')) || 0;
            const addonTotal = parseFloat(addonTotalText.replace(/[^\d.]/g, '')) || 0;

            document.getElementById('checkout-btn').value = totalAmount;
            document.getElementById('final-amount').value = totalAmount;
            document.getElementById('addon-total-input').value = addonTotal;

            const selectedAddons = Array.from(document.querySelectorAll('.addon-checkbox:checked'))
                .map(el => el.value || el.dataset.id);
            document.getElementById('selected-addons').value = JSON.stringify(selectedAddons);

            // ✅ Create token and submit form
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addonCheckboxes = document.querySelectorAll('.addon-checkbox');
            const addonTotalElement = document.getElementById('addon-total');
            const basePriceElement = document.getElementById('base-price');
            const grandTotalElement = document.getElementById('grand-total');

            // Hidden inputs for form submission
            const addonTotalInput = document.getElementById('addon-total-input');
            const selectedAddonsInput = document.getElementById('selected-addons');
            const finalAmountInput = document.getElementById('final-amount');

            function parsePrice(text) {
                return parseFloat(text.replace(/[^\d.]/g, '')) || 0;
            }

            function updateTotals() {
                let addonTotal = 0;
                let selectedAddons = [];

                addonCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        addonTotal += parseFloat(checkbox.value);
                        selectedAddons.push(checkbox.getAttribute('data-addon-name') || checkbox.id);
                    }
                });

                const basePrice = parsePrice(basePriceElement.textContent);
                const grandTotal = basePrice + addonTotal;

                // Update visible values
                addonTotalElement.textContent = `$${addonTotal.toFixed(2)}`;
                grandTotalElement.textContent = `$${grandTotal.toFixed(2)}`;

                // Update hidden inputs
                addonTotalInput.value = addonTotal.toFixed(2);
                selectedAddonsInput.value = selectedAddons.join(',');
                finalAmountInput.value = grandTotal.toFixed(2);
            }

            addonCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateTotals);
            });

            // Ensure values are up-to-date just before submitting
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', function() {
                updateTotals();
            });

            updateTotals(); // initial call
        });
    </script>

</html>
