<section class="products-wrapper container mt-10 pt-lg-4">
	<div class="row">
		<div class="col-md-4 mb-4">
			<div class="widget widget-products appear-animate" data-animation-options="{
				'name': 'fadeInLeftShorter',
				'delay': '.5s'
			}">
				<div class="title-wrapper mb-4">
					<h2 class="title title-underline mb-0">Nổi bật</h2>
				</div>
			@if(isset($rs_feature))
				@foreach($rs_feature as $row)
					<div class="products-col">
						<div class="product product-list-sm">
							<figure class="product-media">
								<a href="{{ url('/') }}/{{ $row['slug'] }}">
									<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
									<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
								</a>
							</figure>
							<div class="product-details">
								<h3 class="product-name">
									<a href="demo-food-product.html">{{ $row['namepro'] }}</a>
								</h3>
								<div class="product-price">
									<span class="price"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></span>
								</div>
								<div class="ratings-container">
									<div class="ratings-full">
										<span class="ratings" style="width:40%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
				
			</div>
		</div>
		<div class="col-md-4 mb-4 ">
			<div class="widget widget-products appear-animate" data-animation-options="{
				'name': 'fadeIn',
				'delay': '.3s'
			}">
				<div class="title-wrapper mb-4">
					<h2 class="title title-underline mb-0">Sản phảm mới</h2>
				</div>
				<div class="products-col">
					@if(isset($rs_latestproduct))
						@foreach($rs_latestproduct as $row)
							<div class="products-col">
								<div class="product product-list-sm">
									<figure class="product-media">
										<a href="{{ url('/') }}/{{ $row['slug'] }}">
											<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
											<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
										</a>
									</figure>
									<div class="product-details">
										<h3 class="product-name">
											<a href="demo-food-product.html">{{ $row['namepro'] }}</a>
										</h3>
										<div class="product-price">
											<span class="price"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></span>
										</div>
										<div class="ratings-container">
											<div class="ratings-full">
												<span class="ratings" style="width:40%"></span>
												<span class="tooltiptext tooltip-top"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
					
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="widget widget-products appear-animate" data-animation-options="{
				'name': 'fadeInRightShorter',
				'delay': '.5s'
			}">
				<div class="title-wrapper mb-4">
					<h2 class="title title-underline mb-0">Hàng đầu</h2>
				</div>
				<div class="products-col">
					@if(isset($rs_feature))
						@foreach($rs_feature as $row)
							<div class="products-col">
								<div class="product product-list-sm">
									<figure class="product-media">
										<a href="{{ url('/') }}/{{ $row['slug'] }}">
											<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
											<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="150" height="169" style="background-color: #f5f5f5;">
										</a>
									</figure>
									<div class="product-details">
										<h3 class="product-name">
											<a href="demo-food-product.html">{{ $row['namepro'] }}</a>
										</h3>
										<div class="product-price">
											<span class="price"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></span>
										</div>
										<div class="ratings-container">
											<div class="ratings-full">
												<span class="ratings" style="width:40%"></span>
												<span class="tooltiptext tooltip-top"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>