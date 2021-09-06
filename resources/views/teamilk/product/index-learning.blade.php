<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='';
	if(isset($rs_lpro) && isset($rs_lpro[0]) && $rs_lpro[0]['_commit'] > 0){
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
@extends('teamilk.master-learning',compact('title','template','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','iduser'))
@section('other_styles')

@stop

@section('content')
	@if(count($errors) > 0)
		{{ $errors }}
	@endif
	@if(isset($rs_lpro) && isset($rs_lpro[0]) && $rs_lpro[0]['_commit'] > 0)
		@if($rs_lpro[0]['nametype']=='lesson')
			@include('teamilk.product.layout-lesson')
		@else
			@include('teamilk.product.show-lesson-no-post')
		@endif
	@else
		@include('teamilk.product.show-lesson-no-post')
	@endif
@stop

@section('other_scripts')
   
@stop