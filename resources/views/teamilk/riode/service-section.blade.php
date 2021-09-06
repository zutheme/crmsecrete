  <?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_item1 = $option->getoptionbyid(1063);
	 $_item2 = $option->getoptionbyid(1064);
	 $_item3 = $option->getoptionbyid(1065);
?>
 <section class="service-section mt-6">
	<div class="container appear-animate">
		<div class="service-list">
			<div class="service-carousel owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
					'items': 3,
					'nav': false,
					'dots': false,
					'loop': true,
					'autoplay': false,
					'autoplayTimeout': 5000,
					'responsive': {
						'0': {
							'items': 1
						},
						'576': {
							'items': 2
						},
						'768': {
							'items': 3,
							'loop': false
						}
					}
				}">
				<div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
						'name': 'fadeInRightShorter',
						'delay': '.3s'
					}">
					<i class="icon-box-icon d-icon-truck" style="font-size: 46px;"></i>
					<div class="icon-box-content">
					{!! $_item1[0]->description !!}
					</div>
				</div>

				<div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
						'name': 'fadeInRightShorter',
						'delay': '.4s'
					}">
					<i class="icon-box-icon d-icon-service"></i>
					<div class="icon-box-content">
						{!! $_item2[0]->description !!}
					</div>
				</div>

				<div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
						'name': 'fadeInRightShorter',
						'delay': '.5s'
					}">
					<i class="icon-box-icon d-icon-secure"></i>
					<div class="icon-box-content">
						{!! $_item3[0]->description !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>