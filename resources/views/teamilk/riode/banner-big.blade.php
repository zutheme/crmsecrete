<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_bannerbig = $option->getoptionbyid(1071);
	 $_backgroundbig = $option->getoptionbyid(1072);
?>
<section class="banner-big-section mt-6" style="background-image: url('{{ asset($_backgroundbig[0]->urlfile) }}'); background-color: #444;">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<figure class="banner-media">
					<img src="{{ asset($_bannerbig[0]->urlfile) }}" alt="Dish" width="627" height="342">
				</figure>
			</div>
			<div class="col-lg-5">
				<div class="banner-content">
					<h4 class="banner-subtitle text-uppercase text-white">{{ $_bannerbig[0]->namepro }}</h4>
					{!! $_bannerbig[0]->description !!}		
					<a href="{{ $_bannerbig[0]->link }}" class="btn btn-rounded btn-primary mb-4">{{ $_bannerbig[0]->keyword }}<i class="d-icon-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>