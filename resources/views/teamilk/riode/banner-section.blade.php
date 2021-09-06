<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_banner1 = $option->getoptionbyid(1066);
	 $_banner2 = $option->getoptionbyid(1067);
	 $_banner3 = $option->getoptionbyid(1068);
	 $_banner4 = $option->getoptionbyid(1069);
?>
<section class="banners-section">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="banner banner1 banner-fixed overlay-zoom mb-4" style="background-color: #F7F7F7">
					<figure>
						<img src="{{ asset($_banner1[0]->urlfile) }}" alt="banner" width="680" height="305">
					</figure>
					<div class="banner-content y-50">
						<h4 class="banner-subtitle">{{ $_banner1[0]->namepro }}</h4>
						<h3 class="banner-title text-uppercase font-weight-bold mb-6">{!! $_banner1[0]->description !!}</h3>
						<a href="{{ $_banner1[0]->link }}" class="btn btn-sm btn-rounded btn-outline btn-primary">{{ $_banner1[0]->keyword }}</a>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="banner banner2 banner-fixed overlay-zoom mb-4" style="background-color: #EAEBF0">
					<figure>
						<img src="{{ asset($_banner2[0]->urlfile) }}" alt="banner" width="480" height="305">
					</figure>
					<div class="banner-content y-50">
						<h4 class="banner-subtitle">{{ $_banner2[0]->namepro }}</h4>
						<h3 class="banner-title text-uppercase font-weight-bold mb-6">{!! $_banner2[0]->description !!}</h3>
						<a href="{{ $_banner2[0]->link }}" class="btn btn-sm btn-rounded btn-dark">{{ $_banner2[0]->keyword }}</a>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="banner banner3 banner-fixed mb-4">
					<div class="banner-content x-50 y-50 text-center w-100 pr-2 pl-2 appear-animate">
						{!! $_banner3[0]->description !!}
						<form action="#" method="get" class="input-wrapper">
							<input type="email" class="form-control text-center" name="email" id="email" placeholder="Email address here..." required="">
							<button class="btn btn-dark btn-md" type="button">{{ $_banner3[0]->keyword }}<i class="d-icon-arrow-right"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="banner banner4 banner-fixed overlay-zoom mb-4" style="background-color: #E5EDEF">
					<figure>
						<img src="{{ asset('public/riode/images/demos/demo-food/banners/3.jpg') }}" alt="banner" width="680" height="305">
					</figure>
					<div class="banner-content y-50">
						<h4 class="banner-subtitle">{{ $_banner4[0]->namepro }}</h4>
						<h3 class="banner-title text-uppercase font-weight-bold mb-6">{!! $_banner4[0]->description !!}</h3>
						<a href="{{ $_banner4[0]->link }}" class="btn btn-sm btn-rounded btn-outline btn-primary">{{ $_banner4[0]->keyword }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>