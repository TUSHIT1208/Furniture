@extends('Template.master')
@section('home')

	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
						<p><a href="/shop" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="images/couch.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
				<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
				<p><a href="/shop" class="btn">Explore</a></p>
			</div> 
			<!-- End Column 1 -->

			<!-- Start Column 2 -->
			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="/cart">
					<img src="images/product-1.png" class="img-fluid product-thumbnail">
					<h3 class="product-title">Nordic Chair</h3>
					<strong class="product-price">$50.00</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div> 
			<!-- End Column 2 -->

			<!-- Start Column 3 -->
			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="/cart">
					<img src="images/product-2.png" class="img-fluid product-thumbnail">
					<h3 class="product-title">Kruzo Aero Chair</h3>
					<strong class="product-price">$78.00</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>
			<!-- End Column 3 -->

			<!-- Start Column 4 -->
			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="/cart">
					<img src="images/product-3.png" class="img-fluid product-thumbnail">
					<h3 class="product-title">Ergonomic Chair</h3>
					<strong class="product-price">$43.00</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>
			<!-- End Column 4 -->

		</div>
	</div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<h2 class="section-title">Why Choose Us</h2>
				<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

				<div class="row my-5">
					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Fast &amp; Free Shipping</h3>
							<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Easy to Shop</h3>
							<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>24/7 Support</h3>
							<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Hassle Free Returns</h3>
							<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-5">
				<div class="img-wrap">
					<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
					<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
					<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
				<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
				</ul>
				<p><a herf="/shop" class="btn">Explore</a></p>
			</div>
		</div>
	</div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product -->
<div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-1.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Nordic Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-2.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Kruzo Aero Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/product-3.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Ergonomic Chair</h3>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Popular Product -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center">
				<h2 class="section-title">Testimonials</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div id="testimonial-carousel" class="carousel slide testimonial-slider-wrap text-center" data-bs-ride="carousel">
					<!-- Carousel indicators -->
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>

					<!-- Carousel items (Testimonial Blocks) -->
					<div class="carousel-inner">

						<!-- Testimonial Item 1 -->
						<div class="carousel-item active">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">
									<div class="testimonial-block text-center">
										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Maria Jones</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Testimonial Item 2 -->
						<div class="carousel-item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">
									<div class="testimonial-block text-center">
										<div class="author-info">
											<div class="author-pic">
												<img src="https://www.sainsburywellcome.org/web/sites/default/files/styles/large_scale_and_crop/public/2018-11/rob.jpg?itok=zvMFjPa2" alt="John Smith" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">John Smith</h3>
											<span class="position d-block mb-3">CTO, ABC Corp.</span>
											<blockquote class="mb-5">
												<p>&ldquo;Cras auctor, nisi nec tincidunt malesuada, lorem justo dapibus elit, nec convallis arcu eros ac nulla. Nullam vel turpis nec sapien suscipit dignissim sit amet et ante.&rdquo;</p>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Testimonial Item 3 -->
						<div class="carousel-item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">
									<div class="testimonial-block text-center">
										<div class="author-info">
											<div class="author-pic">
												<img src="https://th.bing.com/th/id/OIP.0egva0PdM8f-ZMLKfNNwcwHaHB?w=833&h=790&rs=1&pid=ImgDetMain" alt="Alice Williams" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Alice Williams</h3>
											<span class="position d-block mb-3">Marketing Manager, XYZ Corp.</span>
											<blockquote class="mb-5">
												<p>&ldquo;Vivamus quis erat nec nulla euismod posuere non vel nunc. Aenean hendrerit odio ut risus placerat volutpat. Integer posuere urna vel velit suscipit ultricies.&rdquo;</p>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<!-- Carousel controls (previous & next buttons) -->
					<button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Testimonial Slider -->

<!-- Start Blog Section -->
<div class="blog-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-6">
				<h2 class="section-title">Recent Blog</h2>
			</div>
			<div class="col-md-6 text-start text-md-end">
				<a href="#" class="more">View All Posts</a>
			</div>
		</div>

		<div class="row">

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="#">First Time Home Owner Ideas</a></h3>
						<div class="meta">
							<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
						<div class="meta">
							<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
						<div class="meta">
							<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Blog Section -->	

<style>
	/* General styling for the testimonial section */
.testimonial-section {
  background: #f9f9f9;
  padding: 60px 0;
}

/* Styling the carousel container */
.testimonial-slider-wrap {
  position: relative;
}

/* Styling each testimonial block */
.testimonial-block {
  padding: 40px;
  background-color: #ffffff;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Author image styling */
.author-pic img {
  border-radius: 50%;
  width: 80px;
  height: 80px;
  object-fit: cover;
  margin-bottom: 20px;
}

/* Author name and position */
h3.font-weight-bold {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.position {
  font-size: 1.1rem;
  color: #888;
}

/* Styling the blockquote */
blockquote {
  font-style: italic;
  color: #555;
  margin-bottom: 20px;
}

/* Smooth transition effect for carousel */
.carousel-item {
  transition: transform 1s ease-in-out;
}

/* Styling the carousel indicators (dots) */
.carousel-indicators li {
  background-color: #3b5d50; /* Custom color for inactive indicators */
  border-radius: 50%; /* Make the indicators round */
}

/* Change color of the active indicator */
.carousel-indicators .active {
  background-color: #5c7b69; /* Custom color for the active indicator */
}

/* Optional: Adjust the size of the indicators */
.carousel-indicators li {
  width: 12px;
  height: 12px;
}

/* Add hover effect for the indicators */
.carousel-indicators li:hover {
  background-color: #3b5d50; /* Light hover effect */
}

/* Additional styling for section title */
.section-title {
  font-size: 2rem;
  font-weight: 600;
  margin-bottom: 30px;
  color: #333;
}

/* Styling the carousel control buttons (previous & next) */
.carousel-control-prev-icon, .carousel-control-next-icon {
  background-color: #3b5d50; /* Custom color for the button icons */
  border-radius: 50%;
}

/* Optional: Adjust the size of the control icons */
.carousel-control-prev-icon, .carousel-control-next-icon {
  width: 30px;
  height: 30px;
  background-size: 100%;
}

/* Ensure the carousel control buttons have a nice background when active */
.carousel-control-prev, .carousel-control-next {
  color: #fff; /* Make the buttons' text white for better contrast */
  background-color: transparent; /* Transparent background for the buttons */
}

</style>
@endsection
