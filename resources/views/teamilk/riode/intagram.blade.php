 <section class="instagram-section container pt-10 pb-10 mb-8 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
	<div class="title-wrapper mb-4">
		<h2 class="title title-underline mb-0">Instagram</h2>
	</div>
	<div class="owl-carousel owl-theme row cols-xl-5 cols-lg-4 cols-md-3 cols-sm-2 cols-2" data-owl-options="{
			'nav': false,
			'dots': true,
			'autoplay': true,
			'margin': 20,
			'loop': false,
			'responsive': {
				'0': {
					'items': 2
				},
				'576': {
					'items': 2
				},
				'768': {
					'items': 3
				},
				'992': {
					'items': 4
				},
				'1200': {
					'items': 5,
					'dots': false
				}
			}
		}">
		@if(isset($rs_gallery))
			@foreach($rs_gallery as $row)
				<figure class="instagram">
					<a href="{{ $row['link'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="brand" width="220" height="220"></a>
				</figure>
			@endforeach
		@endif
	</div>
</section>