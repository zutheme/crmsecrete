<?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
?>
<div class="header-bottom sticky-header fix-top sticky-content d-lg-show">
	<div class="container">
		<div class="header-left">
			<nav class="main-nav">
				<ul class="menu">
					<li class="active">
						<a href="demo-food.html">Home</a>
					</li>
					<li>
						<a href="demo-food-shop.html">Categories</a>
						<div class="megamenu">
							<div class="row">
								<div class="col-6 col-sm-4 col-md-3 col-lg-4">
									<h4 class="menu-title">Variations 1</h4>
									<ul>
										<li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
										<li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
										<li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
										<li><a href="shop-horizontal-filter.html">Horizontal Filter</a>
										</li>
										<li><a href="shop-navigation-filter.html">Navigation Filter<span class="tip tip-hot">Hot</span></a></li>

										<li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
										<li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
									</ul>
								</div>
								<div class="col-6 col-sm-4 col-md-3 col-lg-4">
									<h4 class="menu-title">Variations 2</h4>
									<ul>

										<li><a href="shop-grid-3cols.html">3 Columns Mode<span class="tip tip-new">New</span></a></li>
										<li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
										<li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
										<li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
										<li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
										<li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
										<li><a href="shop-list.html">List Mode</a></li>
									</ul>
								</div>
								<div class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner1 banner banner-fixed">
									<figure>
										<img src="{{ asset('public/riode/images/menu/banner-1.jpg') }}" alt="Menu banner" width="221" height="330">
									</figure>
									<div class="banner-content y-50">
										<h4 class="banner-subtitle font-weight-bold text-primary ls-m">Sale.
										</h4>
										<h3 class="banner-title font-weight-bold"><span class="text-uppercase">Up to</span>70% Off</h3>
										<a href="demo-food-shop.html" class="btn btn-link btn-underline">shop now<i class="d-icon-arrow-right"></i></a>
									</div>
								</div>
								<!-- End Megamenu -->
							</div>
						</div>
					</li>
					<li>
						<a href="demo-food-product.html">Products</a>
						<div class="megamenu">
							<div class="row">
								<div class="col-6 col-sm-4 col-md-3 col-lg-4">
									<h4 class="menu-title">Product Pages</h4>
									<ul>
										<li><a href="product-simple.html">Simple Product</a></li>
										<li><a href="product.html">Variable Product</a></li>
										<li><a href="product-sale.html">Sale Product</a></li>
										<li><a href="product-featured.html">Featured &amp; On Sale</a></li>

										<li><a href="product-left-sidebar.html">With Left Sidebar</a></li>
										<li><a href="product-right-sidebar.html">With Right Sidebar</a></li>
										<li><a href="product-sticky-cart.html">Add Cart Sticky<span class="tip tip-hot">Hot</span></a></li>
										<li><a href="product-tabinside.html">Tab Inside</a></li>
									</ul>
								</div>
								<div class="col-6 col-sm-4 col-md-3 col-lg-4">
									<h4 class="menu-title">Product Layouts</h4>
									<ul>
										<li><a href="product-grid.html">Grid Images<span class="tip tip-new">New</span></a></li>
										<li><a href="product-masonry.html">Masonry</a></li>
										<li><a href="product-gallery.html">Gallery Type</a></li>
										<li><a href="product-full.html">Full Width Layout</a></li>
										<li><a href="product-sticky.html">Sticky Info</a></li>
										<li><a href="product-sticky-both.html">Left &amp; Right Sticky</a>
										</li>
										<li><a href="product-horizontal.html">Horizontal Thumb</a></li>

										<li><a href="#">Build Your Own</a></li>
									</ul>
								</div>
								<div class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner2 banner banner-fixed">
									<figure>
										<img src="{{ asset('public/riode/images/menu/banner-2.jpg') }}" alt="Menu banner" width="221" height="330">
									</figure>
									<div class="banner-content x-50 text-center">
										<h3 class="banner-title text-white text-uppercase">Sunglasses</h3>
										<h4 class="banner-subtitle font-weight-bold text-white mb-0">$23.00
											-
											$120.00</h4>
									</div>
								</div>
								<!-- End MegaMenu -->
							</div>
						</div>
					</li>
					<li>
						<a href="#">Pages</a>
						<ul>
							<li><a href="about-us.html">About</a></li>
							<li><a href="contact-us.html">Contact Us</a></li>
							<li><a href="account.html">My Account</a></li>
							<li><a href="wishlist.html">Wishlist</a></li>
							<li><a href="faq.html">FAQs</a></li>
							<li><a href="error-404.html">Error 404</a></li>
							<li><a href="coming-soon.html">Coming Soon</a></li>
						</ul>
					</li>
					<li class="d-xl-show">
						<a href="#">Elements</a>
						<ul>
							<li><a href="element-products.html">Products</a></li>
							<li><a href="element-typography.html">Typography</a></li>
							<li><a href="element-titles.html">Titles</a></li>
							<li><a href="element-categories.html">Product Category</a></li>
							<li><a href="element-buttons.html">Buttons</a></li>
							<li><a href="element-accordions.html">Accordions</a></li>
							<li><a href="element-alerts.html">Alert &amp; Notification</a></li>
							<li><a href="element-tabs.html">Tabs</a></li>
							<li><a href="element-testimonials.html">Testimonials</a></li>
							<li><a href="element-blog-posts.html">Blog Posts</a></li>
							<li><a href="element-instagrams.html">Instagrams</a></li>
							<li><a href="element-cta.html">Call to Action</a></li>
							<li><a href="element-icon-boxes.html">Icon Boxes</a></li>
							<li><a href="element-icons.html">Icons</a></li>
						</ul>
					</li>
					<li>
						<a href="about-us.html">About Us</a>
					</li>
					<li>
						<a href="https://d-themes.com/buynow/riodehtml" target="_blank">Buy Riode!</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="header-right">
			<a href="#"><i class="d-icon-map"></i>Track Order</a>
			<a href="#" class="ml-6"><i class="d-icon-card"></i>Daily Deals</a>
		</div>
	</div>
</div>