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
							<a href="{{ route('main') }}"><img src="assets/img/logo.svg" alt="edutec"></a>
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
										<li><a href="courses.html">Course Style1</a></li>
										<li><a href="course-details.html">Course Details</a></li>
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
							<a href="#" class="ac_icon">
								<i class='bx bx-user'></i>
							</a>	
							
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
						<h2>Contact</h2>
						<p>
							<a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Contact
						</p>
					</div>
				</div>				
			</div>
			
			<img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
			<img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
			<div class="bbig_shape"></div>		
		</section>
		<!-- End Main Banner -->
		

		<!-- Start Contact Us -->
		<section class="contact_us section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 wow fadeInLeft">
						<div class="contact_content">
							<div class="contact-img position-relative">
								<img src="assets/img/contact/contact.jpg" class="con_main_img" alt="image">
								<img src="assets/img/contact/cicon.svg" class="cont-icon z-1" alt="image">
							</div>
							<div class="contact_info position-relative z-1">
								<div class="row">
									<div class="col-xl-6 col-md-6">
										<div class="contact_list bbottom bright">
											<div class="cicon">
												<i class='bx bx-phone-call'></i>
											</div>
											<div class="cinfo_content">
												<h4>For any Query?</h4>
												<p>
													<a href="#">Free +68 (026)-9879</a>
												</p>
											</div>
										</div>
									</div><!-- End contact_list -->

									<div class="col-xl-6 col-md-6">
										<div class="contact_list bbottom">
											<div class="cicon">
												<i class='bx bx-envelope' ></i>
											</div>
											<div class="cinfo_content">
												<h4>Write email Us</h4>
												<p>
													<a href="#">support@example.com</a>
												</p>
											</div>
										</div>		
									</div><!-- End contact_list -->	
									
									<div class="col-xl-6 col-md-6">
										<div class="contact_list bright">
											<div class="cicon">
												<i class='bx bx-map' ></i>
											</div>
											<div class="cinfo_content">
												<h4>Visit anytime</h4>
												<p>
													427 Hall Place Longview
												</p>
											</div>
										</div>
									</div><!-- End contact_list -->

									<div class="col-xl-6 col-md-6">
										<div class="contact_list cllast">
											<div class="cicon">
												<i class='bx bx-time' ></i>
											</div>
											<div class="cinfo_content">
												<h4>Office Time</h4>
												<p>
													10AM - 10PM
												</p>
											</div>
										</div>
									</div><!-- End contact_list -->
								</div>
							</div>
						</div>
					</div> <!-- End Col -->
					
					<div class="col-xl-6 wow fadeInRight">
						<div class="contact-form align-self-center">
							<div class="section-title">
								<span>Send us email</span>
								<h2>Feel Free to write</h2>
							</div>
							
							<form id="contact-form" method="post" action="contact.php">
								<div class="row">
									<div class="col-xl-6">
										<input type="text" name="name" placeholder="Enter Name" class="form-control">
									</div>	

									<div class="col-xl-6">
										<input type="email" name="email" placeholder="Enter Email" class="form-control">
									</div>	

									<div class="col-xl-6">
										<input type="text" name="subject" placeholder="Enter Subject" class="form-control">
									</div>	

									<div class="col-xl-6">
										<input type="text" name="phone" placeholder="Enter Phone" class="form-control">
									</div>	

									<div class="col-12">
										<textarea placeholder="Enter Message" name="message" class="form-control"></textarea>
									</div>
									
									<div class="col-12">
										<button type="submit" class="bg-btn">Send Message</button>
									</div>
								</div>
							</form>
							<p class="form-message mt-4 text-center"></p>
						</div>
					</div> <!-- End Col -->	
					
				</div>
			</div>
		</section>
		<!-- End Contact Us -->
		
		<!-- Start google_map -->
		<div class="google_map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107671.30068149016!2d-94.83771425184243!3d32.5066944202184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x863635ff97df3351%3A0xb30ff0f774195933!2sLongview%2C%20TX%2C%20USA!5e0!3m2!1sen!2sbd!4v1709976191256!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			
		</div>
		<!-- End google_map -->
		@include('main_footer')
	</body>
</html>