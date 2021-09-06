<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="container-fluid">
	<div class="row page-titles">
		<?php $curent_idcategory = 0;
			if(isset($cate_selected)){
			$curent_idcategory = $cate_selected[0]['idcategory'];
		} ?>
		<ol class="breadcrumb">
			<?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumb-item',0); ?>
		</ol>
	</div>
	<div class="row">
	 @if(isset($rs_lpro))
		@foreach($rs_lpro as $row)
		 <div class="col-xl-3 col-lg-6 col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="new-arrival-product">
						<div class="new-arrivals-img-contnent">
							<img class="img-fluid" src="{{ asset( $row['urlfile'] ) }}" alt="">
						</div>
						<div class="new-arrival-content text-center mt-3">
							<h4><a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h4>
							<ul class="star-rating">
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star-half-empty"></i></li>
								<li><i class="fa fa-star-half-empty"></i></li>
							</ul>
							{{--<span class="price">$761.00</span>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row">
	<?php $countpage = $rs_lpro[0]['count_page']; ?>
		@if($countpage > 1)
		<?php $curent_page = Request::segment(3); 
			if(empty($curent_page)) $curent_page =1; ?>
		<div class="page-nav td-pb-padding-side">
			@for($i=1; $i < ($countpage + 1); $i++)
			<?php  $curent_class = ($curent_page == $i) ? '<span class="current">'.$i.'</span>':''; ?>
				@if (isset($curent_class) and !empty($curent_class))
					{!! $curent_class !!}
				@elseif($i == $countpage)
					<a href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}" class="last" title="{{ $countpage }}">{{ $countpage }}</a><a href="#"><i class="fa fa-arrow-right"></i></a><span class="pages">Page {{ $curent_page }} of {{ $countpage }}</span><div class="clearfix"></div>
				@else
					<a class="page" title="{{ $i }}" href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}">{{ $i }}</a>
				@endif
			@endfor
			
		</div>
		@endif
	@endif
	</div>
</div> 
  
