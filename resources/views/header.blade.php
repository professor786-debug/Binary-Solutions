  <!-- Start Header -->
  <header id="navigation" class="header1 position-absolute z-2">
      <div class="container-fluid py-3 px-0">
          <div class="main-header">
              <div class="header-left d-flex justify-content-start">
                  <div class="site-logo">
                      <a href="{{ route('main') }}"><img src="{{ asset('assets/img/logo.svg') }}" alt="Binary"></a>
                  </div>
              </div>
              <!-- End site-logo -->

              <div class="header-middle d-flex justify-content-center">
                  <nav id="main-menu">
                      <ul>
                          <li class="menu-item-has-children">
                              <a href="{{ route('main') }}">Home</a>
                          </li>

                          <li class="menu-item-has-children">
                              <a href="#">Services</a>
                              <ul class="sub-menu">
                                  <li><a href="{{ route('solution_store') }}">Solution Store</a></li>
                                  <li><a href="">Custom Solutions</a></li>
                                  <li><a href="{{ route('category_detail') }}">Online Assignment</a></li>
                                  <li><a href="{{ route('checkout') }}">Checkout</a></li>
                              </ul>
                          </li>

                          {{-- <li class="menu-item-has-children">
                              <a href="#">Subjects</a>
                              <ul class="sub-menu">
                                  <li><a href="about.html">About</a></li>
                                  <li><a href="faq.html">FAQ</a></li>
                                  <li><a href="instructors.html">Instructors</a></li>
                                  <li><a href="grid-blog.html">Grid Blog</a></li>
                                  <li><a href="standard-blog.html">Standard Blog</a></li>
                                  <li><a href="blog-details.html">Blog Details</a></li>
                                  <li><a href="cart.html">Cart</a></li>
                                  <li><a href="checkout.html">Checkout</a></li>
                                  <li><a href="login.html">Login</a></li>
                                  <li><a href="register.html">Register</a></li>
                                  <li><a href="404.html">404</a></li>
                              </ul>
                          </li> --}}

                          {{-- <li>
                                    <a href="{{ route('blogs') }}">Blog</a>
                                    </li> --}}

                          <li>
                              <a href="{{ route('about_us') }}">About Us</a>
                          </li>

                          <li>
                              <a href="{{ route('packages') }}">Pricing</a>
                          </li>
                          <li>
                              <a href="{{ route('contact_us') }}">Contact</a>
                          </li>
                          @unless (Auth::guard('student')->check() || Route::is('login') || Route::is('register'))
                              <li>
                                  <a href="{{ route('login') }}">Login</a>
                              </li>
                          @endunless

                      </ul>
                  </nav><!-- End Main Menu -->
              </div>
              <!-- End Header Middle -->

              <div class="header-right d-flex justify-content-end">
                  @if (Auth::guard('student')->check())
                      <div class="ac-cart">
                          <a href="{{ route('student.dashboard') }}" class="mcart_icon">
                              <i class='bx bx-user'></i>
                          </a>
                      </div>
                  @endif

                  <a href="#" class="bg-btn">Enroll Now <i class="fa-solid fa-arrow-right-long"></i></a>
                  <div class="header__hamburger d-xl-none my-auto">
                      <div class="sidebar__toggle">
                          <i class="fa-solid fa-bars"></i>
                      </div>
                  </div>
              </div><!-- End ac-cart -->
          </div>
      </div>

      <div id="mini_cart" class="min_cart_wrapper">
          <div class="cart_drawer">
              <div class="cart_top">
                  <a href="#" class="cart_close"><i class="bx bx-x"></i></a>
                  <h3 class="title">Courses List</h3>
                  <span class="cart_number">4</span>
              </div>

              <div class="mini_cart_list">
                  <ul>
                      <li class="d-flex">
                          <div class="thumb_img_cartmini">
                              <a href="" class="mc_img">
                                  <img src="assets/img/course/1.jpg" alt="">
                          </div>

                          <div class="product-detail">
                              <h3 class="product_name_mini">
                                  <a href="#">Professional Ceramic Moulding for Beginners</a>
                              </h3>
                              <div class="product_info">
                                  <div class="product_quanity"></div>
                                  <div class="product_price">
                                      <span class="price_sale">
                                          <span class="quantity">3 × <span
                                                  class="woocommerce-Price-amount amount"><bdi><span
                                                          class="woocommerce-Price-currencySymbol">$</span>250.00</bdi></span></span>
                                      </span>
                                  </div>
                              </div>
                          </div>

                          <div class="produc_remove">
                              <a href="#" class="remove-product"
                                  aria-label="Remove Professional Ceramic Moulding for Beginners from cart"
                                  data-product_id="861" data-cart_item_key="f9a40a4780f5e1306c46f1c8daecee3b"
                                  data-product_sku=""><i class="bx bx-trash"></i></a>
                          </div>
                      </li>

                      <li class="d-flex">
                          <div class="thumb_img_cartmini">
                              <a href="" class="mc_img">
                                  <img src="assets/img/course/2.jpg" alt="">
                              </a>
                          </div>

                          <div class="product-detail">
                              <h3 class="product_name_mini">
                                  <a href="#">
                                      WordPress for Beginners – Master WordPress
                                  </a>
                              </h3>
                              <div class="product_info">
                                  <div class="product_quanity"></div>
                                  <div class="product_price">
                                      <span class="price_sale">
                                          <span class="quantity">1 × <span
                                                  class="woocommerce-Price-amount amount"><bdi><span
                                                          class="woocommerce-Price-currencySymbol">$</span>270.00</bdi></span></span>
                                      </span>
                                  </div>
                              </div>
                          </div>

                          <div class="produc_remove">
                              <a href="#" class="remove-product"><i class="bx bx-trash"></i></a>
                          </div>
                      </li>
                  </ul>
              </div>

              <div class="cart_drawer_btm">
                  <div class="sub-total">
                      <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><bdi><span
                                  class="woocommerce-Price-currencySymbol">$</span>1,020.00</bdi></span>
                  </div>

                  <div class="bottom_group">
                      <a href="#" class="button-viewcart">
                          <span>View Cart</span>
                      </a>
                      <a href="#" class="button-checkout">
                          <span>Checkout</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <!-- End Header -->
