<!DOCTYPE html>
<html lang="en">
	<x-head />	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />

	<style>
		#dropzone {
		border: 2px dashed #adb5bd;
		background-color: #f8f9fa;
		border-radius: 1rem;
		padding: 60px 20px;
		text-align: center;
		transition: all 0.3s ease;
		cursor: pointer;
		position: relative;
		min-height: 220px;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	/* Hover effect */
	#dropzone:hover {
		background-color: #e9f3ff;
		border-color: #0d6efd;
	}

	/* Inner text */
	#dropzone-text {
		font-size: 16px;
		color: #6c757d;
		font-weight: 500;
		margin: 0;
	}

	/* Responsive container spacing */
	.container.mt-5 {
		margin-top: 2rem !important;
	}

	/* Optional: Slightly smaller on mobile */
	@media (max-width: 576px) {
		#dropzone {
			padding: 40px 15px;
		}

		#dropzone-text {
			font-size: 15px;
		}
	}

    .dropzone-form textarea {
        font-size: 15px;
    }

    .btn.btn-primary {
        font-size: 16px;
        font-weight: 500;
    }
</style>

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
		@if (session('success'))
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
		@endif
		@if (session('error'))
			<div class="alert alert-success text-center">
				{{ session('error') }}
			</div>
		@endif
		<!-- End Main Banner -->
		

		<!-- Start Contact Us -->
		<section class="contact_us section-padding">
			<div class="container">
				<div class="row">
					
					
				</div>
			</div>
		</section>
		<!-- End Contact Us -->

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#askModal">Post Your Question</button>

<div class="modal fade" id="askModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
		<img src="{{ asset('assets/img/logo.svg') }}" height="100px" width="100px" alt="Binary">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

		<form action="{{ route('custom-solutions.store') }}" class="dropzone-form" method="POST" enctype="multipart/form-data">
			@csrf
	        <div class="modal-body">
          <div class="container">
            <div class="row g-4 align-items-start">
					<div class="col-sm-12">
						<h3 class="text-center mb-1">Post Your Question</h3>
					</div>
              	<div class="col-md-12">
					<div class="container mt-5">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div id="upload-form">
									<div id="dropzone" class="dropzone mb-3">
										<p id="dropzone-text">Drag & drop your file here or click to browse</p>
										<input type="file" name="problem_file" id="file-input" class="d-none">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<textarea name="description" rows="6" class="form-control shadow-sm" placeholder="Type your questions here..." style="resize: none;"></textarea>
				</div>
                <div class="col-12 text-center">
                    <button type="submit" class="bg-btn rounded-pill">Submit</button>
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
		@include('main_footer')
<!-- Dropzone CSS/JS CDN -->
<script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('file-input');
        const dropzoneText = document.getElementById('dropzone-text');

        dropzone.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                dropzoneText.textContent = "Selected: " + fileInput.files[0].name;
            }
        });

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');

            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                dropzoneText.textContent = "Selected: " + e.dataTransfer.files[0].name;
            }
        });
    </script>
	</body>
</html>