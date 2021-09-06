<section class="brand-section container pt-6 pb-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
	<div class="title-wrapper mb-4">
		<h2 class="title title-underline mb-0">Đối tác</h2>
	</div>
	<div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
			'nav': false,
			'dots': false,
			'autoplay': true,
			'margin': 20,
			'loop': true,
			'responsive': {
				'0': {
					'items': 2
				},
				'576': {
					'items': 3
				},
				'768': {
					'items': 4
				},
				'992': {
					'items': 5
				},
				'1200': {
					'items': 6
				}
			}
		}">
		@if(isset($rs_partner))
			@foreach($rs_partner as $row)
				<figure><img src="{{ asset( $row['urlfile'] ) }}" alt="brand" width="180" height="100"></figure>
			@endforeach
		@endif
	</div>
</section>