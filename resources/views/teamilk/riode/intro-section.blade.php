 <section class="intro-section">
	<div class="owl-carousel owl-theme row owl-nav-fade intro-slider animation-slider cols-1 gutter-no" data-owl-options="{
		'nav': true,
		'dots': false,
		'loop': false,
		'items': 1,
		'autoplay': false,
		'autoplayTimeout': 8000
	}">
	@if(isset($rs_latestslider))
		@foreach($rs_latestslider as $row)
		<div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6;">
			<figure>
				<img src="{{ asset( $row['urlfile'] ) }}" alt="intro-banner" width="1903" height="530" style="background-color: #f6f6f6;">
			</figure>
			<div class="container">
				
				<div class="banner-content y-50">
					<h4 class="banner-subtitle slide-animate" data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
						{{ preg_replace('/<[^>]*>/', '', $row['namepro'])  }}
					</h4>
					{!! $row['description'] !!}
					{!! $row['short_desc'] !!}
					<a href="{{ $row['link'] }}" class="btn btn-primary btn-rounded slide-animate" data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">{!! $row['keyword'] !!}<i class="d-icon-arrow-right"></i></a>
					
				</div>
			</div>
		</div>
		@endforeach
	@endif
	</div>

</section>