<!DOCTYPE html>
<html lang="en">

<x-head />
<body>

		<!-- START PRELOADER -->
		<div id="loader"></div>
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
		<header id="navigation" class="header-2">		
			<div class="container-fluid py-3 px-0">							
				<div class="main-header">	
					<div class="header-left d-flex justify-content-start">	
						<div class="site-logo">
							<a href=""><img src="assets/img/logo.svg" alt="binary"></a>
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
                                            <li><a href="{{ route('category_detail') }}">Online Assignment</a></li>
                                            <li><a href="{{ route('category_detail') }}">Essay Writing Service</a></li>
                                            <li><a href="{{ route('category_detail') }}">Live Session</a></li>
                                            <li><a href="{{ route('category_detail') }}">Lab Report Writing Services</a></li>
                                            <li><a href="{{ route('category_detail') }}">Project Report Writing Service</a></li>
                                            <li><a href="{{ route('category_detail') }}">Speech Writing Service</a></li>
                                            <li><a href="{{ route('category_detail') }}">Presentation Writing Service</a></li>
                                            <li><a href="{{ route('category_detail') }}">Video Solu{{ route('category_detail') }}tions</a></li>
                                            <li><a href="{{ route('category_detail') }}">Online Tutoring</a></li>
                                            <li><a href="{{ route('category_detail') }}">Pay Someone To Do My Homework</a></li>
                                            <li><a href="{{ route('category_detail') }}">Do My Math Homework</a></li>
                                        </ul>
                                    </li>	
                                    
                                    <li class="menu-item-has-children">
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
                                    </li>		

                                    <li>
                                        <a href="{{ route('blogs') }}">Blog</a>
                                        </li>

                                        <li>
                                        <a href="{{ route('contact_us') }}">Contact</a>
                                        </li>
                                </ul>
                            </nav><!-- End Main Menu -->
                        </div>
                        <!-- End Header Middle -->
					
					<div class="header-right d-flex justify-content-end">					
						<div class="ac-cart d-flex">	
							
							<a href="#" class="mcart_icon" data-menu="#mini_cart">
								<i class='bx bx-shopping-bag'></i>
								<span>3</span>
							</a>			
						</div>					
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
												<span class="quantity">3 × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>250.00</bdi></span></span>								</span>
										</div>
									</div>
								</div>
								
								<div class="produc_remove">
									<a href="#" class="remove-product" aria-label="Remove Professional Ceramic Moulding for Beginners from cart" data-product_id="861" data-cart_item_key="f9a40a4780f5e1306c46f1c8daecee3b" data-product_sku=""><i class="bx bx-trash"></i></a>						
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
												<span class="quantity">1 × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>270.00</bdi></span></span>								</span>
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
						<strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>1,020.00</bdi></span>	</div>

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
		
		<!-- Start Main Banner -->
		<section class="main-banner" style="background-image: url(assets/img/bg/course-bg.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 text-center z-1 position-relative wow fadeInUp">
						<h2>Login</h2>
						<p>
							<a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Login
						</p>
					</div>
				</div>				
			</div>
			
			<img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
			<img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
			<div class="bbig_shape"></div>		
		</section>
		<!-- End Main Banner -->

		<!-- START LOGIN -->
		<section class="login_register section-padding">
			<div class="container">
				<div class="row">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif

					@if(session('package_error'))
						<div class="alert alert-danger">
							{{ session('package_error') }}
						</div>
					@endif

					@if(session('solution_error'))
						<div class="alert alert-danger">
							{{ session('package_error') }}
						</div>
					@endif
					<div class="col-xl-6 mx-auto wow fadeIn">
						<div class="text-center mb-3">
							<a href="{{ route('google.login') }}" class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
								<i class="fab fa-google mr-2"></i> Login with Google
							</a>
						</div>
							<hr class="my-4">

						<div class="login">
							<h4 class="login_register_title">Already a Member? Sign In</h4>

							<form action="{{ route('student.login') }}" method="POST">
								@csrf

								<div class="form-group">
									<label for="contact-name">Username<span>*</span></label>
									<input type="text" id="contact-name" placeholder="Username or Email" class="form-control" name="name" value="{{ old('name') }}">
									@error('name')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								<div class="form-group">
									<label for="contact-email">Password<span>*</span></label>
									<input type="password" placeholder="Enter Password" id="contact-email" class="form-control" name="password">
									@error('password')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								<div class="form-check mb-4">
									<input id="rpaword" class="form-check-input" type="checkbox" name="remember">
									<label class="form-check-label" for="rpaword">
										Remember Me
									</label>
								</div>

								<div class="form-group col-lg-12">
									<button class="bg-btn" type="submit" name="submit">
										Sign In <i class="fa-solid fa-arrow-right"></i>
									</button>
								</div>
							</form>

							<p>Don't have an account? <a href="{{ route('register') }}">Register Now</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END LOGIN -->
@include('main_footer')		
	</body>
</html>