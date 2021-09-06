<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_vege = $option->getoptionbyid(1070);
?>
<section class="products-wrapper container mt-10 pb-lg-4 mb-8">
	<div class="title-wrapper mb-4">
	<h2 class="title title-underline mb-0">{!! $_vege[0]->namepro !!}</h2>
	<a href="{{ $_vege[0]->link }}" class="btn btn-link">{{ $_vege[0]->keyword }}<i class="d-icon-arrow-right"></i></a>
	</div>
	<div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
		'items': 4,
		'nav': false,
		'dots': false,
		'margin': 20,
		'loop': false,
		'responsive': {
			'0': {
				'items': 2
			},
			'768': {
				'items': 3
			},
			'992': {
				'items': 4
			}
		}
	}">
		@if(isset($rs_latestproduct))
				@foreach($rs_latestproduct as $row)
				<div class="product product-with-qty text-center">
						<figure class="product-media">
							<a href="{{ url('/') }}/{{ $row['slug'] }}">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
								<a href="#" class="btn-product-icon btn-compare" title="Add to Compare"><i class="d-icon-compare"></i></a>
							</div>
							<div class="product-label-group">
								<label class="product-label label-top">top</label>
								{{--<label class="product-label label-sale">10% off</label>--}}
							</div>
						</figure>
						<div class="product-details">
							<h3 class="product-name">
								<a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
							</h3>
							<div class="product-price">
								<ins class="new-price"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></ins>
									
							</div>
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:20%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								<a href="{{ url('/') }}/{{ $row['slug'] }}" class="rating-reviews">( 0 reviews )</a>
							</div>
							<div class="product-action">
								<div class="product-quantity">
									<button class="quantity-minus d-icon-minus"></button>
									<input class="quantity form-control" type="number" min="1" max="1000000">
									<button class="quantity-plus d-icon-plus"></button>
								</div>
								<a href="#" idproduct="{{ $row['idproduct'] }}" onclick="addcart(this);"  class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
							</div>
						</div>
					</div>
				
				@endforeach
			@endif
	
	</div>
</section>