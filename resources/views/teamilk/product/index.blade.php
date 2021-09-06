<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='';
	if(isset($rs_lpro)){
		$template = $rs_lpro[0]['nametype'];
	}else{
		$template ='archive';
	}
	$curent_slug = Request::segment(1);
	if(isset($_idcategory)) { $curent_idcategory = $_idcategory; }
	if(isset($rs_cat_product)) {
	 	$title = HelperController::Getrootcate($rs_cat_product,$curent_idcategory,'',0); 
	}
	$curent_posttype = Request::segment(3); 
?> 
@extends('teamilk.master',compact('title','template','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','iduser'))
@section('other_styles')
@if(isset($rs_lpro) and $rs_lpro[0]['nametype'] =='product' )
	<link rel="stylesheet" type="text/css" href="{{ asset('public/riode/vendor/nouislider/nouislider.min.css') }}">
		<!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/riode/css/style.min.css') }}">
@else
@endif

@stop

@section('content')
	@if(count($errors) > 0)
		{{ $errors }}
	@endif
	@if(isset($rs_lpro))
		 @if(isset($rs_lpro[0]['_commit']))
		   @if($rs_lpro[0]['_commit'] > 0 and isset($rs_lpro[0]['nametype']))
				@if($rs_lpro[0]['nametype']=='product')
					@include('teamilk.product.layout-product')
				@elseif($rs_lpro[0]['nametype']=='post')
					@include('teamilk.product.layout-post')
				@elseif($rs_lpro[0]['nametype']=='video')
					@include('teamilk.product.layout-video')
				@else
					@include('teamilk.product.layout-post')
				@endif
			@else
				@include('teamilk.product.no-post')
			@endif
		@else
			@include('teamilk.product.no-permit')
		@endif	
	@else
		@include('teamilk.product.no-post')
	@endif

@stop

@section('other_scripts')
   
@stop