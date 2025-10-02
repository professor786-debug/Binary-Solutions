<!DOCTYPE html>
<html lang="en">
	<x-head />
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
						<h2>Standard Blog</h2>
						<p>
							<a href="#">Home</a> <i class='bx bx-chevrons-right'></i> Standard Blog
						</p>
					</div>
				</div>
			</div>

			<img src="assets/img/shapes/hsmile.svg" alt="img" class="blshape">
			<img src="assets/img/shapes/hstart.svg" alt="img" class="brshape">
			<div class="bbig_shape"></div>
		</section>
		<!-- End Main Banner -->

		<!-- Start Blog -->
		<section class="standard-blog section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-12 col-12 wow fadeIn">
						<div class="blog-item">
							<div class="blog-image">
								<img src="assets/img/blog/1.jpg" alt="image">
								<span class="bl-category">
									<a href="#">Education</a>
								</span>
							</div>

							<div class="blog-content">
								<div class="blog-meta grid">
									<span><i class='fa-regular fa-calendar-check' ></i> May 20, 2025 </span>
									<span><i class='fa-regular fa-comments'></i> 5 Comments </span>
								</div>

								<h2><a href="#">A Student Learning with Online Programme on Computer</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut luctus eget dolor non condimentum. Mauris ac augue eu ex elementum dictum Quisque fermentum augue.
								</p>
								<a href="#" class="blog-btn">Read More</a>
							</div>
						</div>


						<div class="blog-item">
							<div class="blog-image">
								<img src="assets/img/blog/2.jpg" alt="image">
								<span class="bl-category">
									<a href="#">Education</a>
								</span>
							</div>

							<div class="blog-content">
								<div class="blog-meta grid">
									<span><i class='fa-regular fa-calendar-check' ></i> May 20, 2025 </span>
									<span><i class='fa-regular fa-comments'></i> 5 Comments </span>
								</div>

								<h2><a href="#">All Students and Teachers are Happy To Back to School</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut luctus eget dolor non condimentum. Mauris ac augue eu ex elementum dictum Quisque fermentum augue.
								</p>
								<a href="#" class="blog-btn">Read More</a>
							</div>
						</div>


						<div class="col-12 text-center">
							<div class="post_pagination">
								<ul>
									<li><a href="#"><i class="fa-solid fa-arrow-left-long"></i></a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#"><i class="fa-solid fa-arrow-right-long"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- End Col -->

					<div class="col-xl-4 col-lg-4 col-12 sidebar ">
						<div class="widget search-widget wow fadeIn">
							<div class="search-form">
								<form action="#" method="post">
									<input type="text" class="search-control" placeholder="write search query">
									<button type="submit" class="search-btn">
										<i class="ti-search"></i>
									</button>
								</form>
							</div>
						</div><!-- End widget -->

						<div class="widget category-widget wow fadeIn">
							<h3 class="widget-title">Category</h3>
							<ul>
								<li><a href="#">UI / UX Design</a></li>
								<li><a href="#">Web Design</a></li>
								<li><a href="#">App Development</a></li>
								<li><a href="#">Branding and Printing</a></li>
							</ul>
						</div><!-- End widget -->

						<div class="widget popular-posts-widget wow fadeIn">
							<h3 class="widget-title">Popular Posts</h3>
							<ul>
								<li>
									<a href="#">
										<div class="float-start ppimage">
											<img src="assets/img/blog/1.jpg" alt="image">
										</div>
										<div class="ppcontent">
											<h4>Consectetur adipiscing elit. </h4>
											<span>15 July, 2025</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="float-start ppimage">
											<img src="assets/img/blog/2.jpg" alt="image">
										</div>
										<div class="ppcontent">
											<h4>Lorem ipsum dolor sit amet </h4>
											<span>15 July, 2025</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="float-start ppimage">
											<img src="assets/img/blog/3.jpg" alt="image">
										</div>
										<div class="ppcontent">
											<h4>Consectetur adipiscing elit. </h4>
											<span>15 July, 2025</span>
										</div>
									</a>
								</li>
							</ul>
						</div><!-- End widget -->

						<div class="widget popular-posts-widget wow fadeIn">
							<h3 class="widget-title">Tags</h3>
							<div class="tags_clouds">
								<a href="#">Trading</a>
								<a href="#">Education</a>
								<a href="#">Statistics</a>
								<a href="#">Corporate</a>
								<a href="#">Analysis</a>
								<a href="#">Profit</a>
							</div>
						</div><!-- End widget -->

					</div><!-- End Col -->
				</div>
			</div>
		</section>
		<!-- End Blog -->

		<!-- Start Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 footer-logo align-self-center wow fadeIn">
						<div class="footer-widget about-widget ">
							<img src="assets/img/logo-white.svg" class="fot_logo" alt="Edutec">
							<p>
								Lorem ipsum dolor amet consecto adi
								pisicingelit sed eiusm tempor incidid unt
								labore dolore.
							</p>

							<ul class="fsocial-option">
								<li><a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a></li>
								<li><a href="#" class="tw"><i class="fa-brands fa-x-twitter"></i></a></li>
								<li><a href="#" class="lin"><i class="fa-brands fa-linkedin-in"></i></a></li>
								<li><a href="#" class="yt"><i class="fa-brands fa-youtube"></i></a></li>
							</ul>
						</div>
					</div><!-- End Col -->

					<div class="col-lg-3 col-md-6 wow fadeIn">
						<div class="footer-widget">
							<h4 class="ftitle">Useful Links</h4>
							<ul>
								<li><a href="#">About</a></li>
								<li><a href="#">Course</a></li>
								<li><a href="#">Instructor</a></li>
								<li><a href="#">Events</a></li>
								<li><a href="#">Instructor Details</a></li>
								<li><a href="#">Purchase Guide</a></li>
							</ul>
						</div>
					</div><!-- End Col -->

					<div class="col-lg-3 col-md-6 wow fadeIn">
						<div class="footer-widget">
							<h4 class="ftitle">Our Company</h4>
							<ul>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Instructors</a></li>
								<li><a href="#">Pricing</a></li>
								<li><a href="#">Service</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div><!-- End Col -->

					<div class="col-lg-3 col-md-6 wow fadeIn">
						<div class="footer-widget contact-widget">
							<h4 class="ftitle">Contact Us</h4>
							<ul class="fcontact-info">
								<li><span><i class="fa-solid fa-envelope"></i></span> <p>(405) 987-985 <br> (405) 987-985</p></li>
								<li><span><i class="fa-solid fa-phone"></i></span> <p>support@example.com <br> support@example.com</p></li>
								<li><span><i class="fa-solid fa-map"></i></span> <p>Palm Jumeirah, <br> Dubai</p></li>
							</ul>
						</div>
					</div><!-- End Col -->

				</div>
			</div>

			<div class="copyright text-center">
				<div class="container">
					<p>
						Copyright 2025 Edutec | Developed By Themesvila . All Rights Reserved
					</p>
				</div>
			</div><!-- End copyright -->

			<img src="assets/img/icons/graduation-hat.svg" alt="cap" class="fot-cap">
			<img src="assets/img/icons/idea.svg" alt="lamp" class="fot-lamp">
			<img src="assets/img/icons/fotshap.svg" alt="lamp" class="fot-shap">
		</footer>
		<!-- End Footer -->

		<!-- Start progress-wrap -->
		<div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
			</svg>
		</div>
		<!-- End progress-wrap -->

		<!-- Latest jQuery -->
		<script src="assets/js/jquery.min.js" ></script>
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
