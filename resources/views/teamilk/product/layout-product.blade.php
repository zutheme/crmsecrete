<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_bgbanner = $option->getoptionbyid(1091);
?>
<main class="main">
	<div class="page-header" style="background-image: url('{{ asset($_bgbanner[0]->urlfile) }}'); background-color: #3C63A4;">
		<h1 class="page-title">{{ $title }}</h1>
		<ul class="breadcrumb">
			<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
			<li class="delimiter">/</li>
			<li>Riode Shop</li>
		</ul>
	</div>
	<!-- End PageHeader -->
	<div class="page-content mb-10 pb-3">
		<div class="container">
			<div class="row main-content-wrap gutter-lg">
				<aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
					@include('teamilk.riode.shop.sidebar')
				</aside>
				<div class="col-lg-9 main-content">
					@include('teamilk.riode.shop.navbar')
					<div class="row cols-2 cols-sm-3 product-wrapper">
						@if(isset($rs_lpro))
							<?php $count = 0; ?>
							@foreach($rs_lpro as $row)
								<div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="{{ url('/') }}/{{ $row['slug'] }}">
												<img src="{{ asset($row['urlfile']) }}" alt="product" width="280" height="315">
											</a>
											{{--<div class="product-label-group">
												<label class="product-label label-new">new</label>
												<label class="product-label label-sale">12% OFF</label>
											</div>--}}
											<div class="product-action-vertical">
												<a href="#" idproduct="{{ $row['idproduct'] }}" onclick="addcart(this);" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
												<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
											</div>
											{{--<div class="product-action">
												<a href="#" class="btn-product btn-quickview" title="Quick View">Quick
													View</a>
											</div>--}}
										</figure>
										<div class="product-details">
											{{--<div class="product-cat">
												<a href="{{ url('/') }}/{{ $row['slug'] }}">Bags & Backpacks</a>
											</div>--}}
											<h3 class="product-name">
												<a href="product.html">{{ $row['namepro'] }}</a>
											</h3>
											<div class="product-price">
												<ins class="new-price"><span class="currency">{{$row['price'] }}</span><span class="vnd"></span></ins><del class="old-price">$67.99</del>
											</div>
											<div class="ratings-container">
												<div class="ratings-full">
													<span class="ratings" style="width:60%"></span>
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<a href="{{ url('/') }}/{{ $row['slug'] }}" class="rating-reviews">( 0 reviews )</a>
											</div>
										</div>
									</div>
								</div>
							@endforeach	
						@endif	
					</div>
					<nav class="toolbox toolbox-pagination">
						<p class="show-info">Showing <span>12 of 56</span> Products</p>
						<ul class="pagination">
							<li class="page-item disabled">
								<a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
									<i class="d-icon-arrow-left"></i>Prev
								</a>
							</li>
							<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
							<li class="page-item">
								<a class="page-link page-link-next" href="#" aria-label="Next">
									Next<i class="d-icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</main>

